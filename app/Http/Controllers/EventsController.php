<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\AttEventImage;
use Image;
use Illuminate\Support\Facades\File;

class EventsController extends Controller
{
    public function index()
    {
        $events = Events::orderBy('id','desc')->get();/* :latest()->paginate(10); */
        return view('backEnd.events.index')->with('events', $events);
    }

    public function show($id=null){

        /* $products = Product::findOrFail($id); */
        $data = Events::where('status','1')->where('id', $id)->first();
        
        $dataImage = AttEventImage::where('status','1')->where('event_id', $id)->get();

        return view('backEnd.events.show', compact(['data', 'dataImage']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.events.create');
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);
        
        if($request->hasFile('image')){

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/events/',$filename);
        }

        $events = Events::create([
            'name' => $request->name,
            'image' => $filename,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        if (!$events) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating events.');
        }
        return redirect()->route('events.index')->with('success', 'Success, you events have been create.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit(Events $event)
    {
        return view('backEnd.events.edit', compact('event'));
    }



    public function update(Request $request, $id)
    {
            $events = Events::find($id);

            $events->name = $request->name;
            $events->title = $request->title;
            $events->description = $request->description;
            $events->status = $request->status;

        if($request->hasFile('image')){
            // Delete old image
            $pathImage = 'uploads/events/'.$events->image;
            if(File::exists($pathImage))
            {
                File::delete($pathImage);
            }

            // Store image
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/events/',$filename);
            
            // Save to Datebase
            $events->image = $filename;
        }

        if(! $events->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating events.');
        }
        return redirect()->route('events.index')->with('success', 'Success, your events have been updated.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $events)
    {
        $pathImage = 'uploads/events/'.$events->image;
        if(File::exists($pathImage))
        {
            File::delete($pathImage);
        }
        
        $events->delete();
        
        return response()->json([
            'success' => true
        ]);
    }


    public function ViewAttributes(Request $request, $id=null){
        $events = Events::where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasfile('image')){
                $files = $request->file('image');
                foreach($files as $file){
                    $image = new AttEventImage;
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(111,9999).'.'.$extension;
                    $image_path = 'uploads/events/'.$filename;
                    Image::make($file)->save($image_path);
                    $image->image = $filename;
                    $image->event_id = $data['event_id'];
                    $image->description = $data['description'];
                    $image->status = $data['status'];
                    $image->save();
                }
            }
            return redirect('admin/eventsImageAtrr/'.$id)->with('success','Image has been updated!');
        }
        $productImages = AttEventImage::where(['event_id'=>$id])->get();
        return view('backEnd.events.viewAttributes')->with(compact('events','productImages'));
    }

    public function deleteAttributeImage(AttEventImage $id)
    {
        $id->delete();
        return response()->json([
            'error' => true
        ]);
    }


    public function showAllEvents(){
        $events = Events::where('status','1')->get();
        return view('frontEnd.events.index', compact(['events']));
    }

    public function detailEvents($id=null){

        /* $products = Product::findOrFail($id); */
        $eventsData = Events::where('status','1')->where('id', $id)->first();
        
        $imageEvents = AttEventImage::where('status','1')->where('event_id', $id)->get();

        $relatedEvents = Events::where('status','1')->where('id','!=',$id)->take(9)->get();

        $id_= $id;

        return view('frontEnd.events.eventsDetail', compact(['eventsData', 'imageEvents','relatedEvents','id_']));
    }

    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        Events::where('id',$data['id'])->update(['status'=>$data['status']]);
        return redirect()->back()->with('success','Events status updated successfully!');
    }

}
