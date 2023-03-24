<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Image;
use App\Http\Requests\ServiceDataStore;
use App\Http\Requests\ServiceDataUpdate;
use Illuminate\Support\Facades\Storage;
use App\Models\AttServiceImage;
use Illuminate\Support\Facades\File;

class ServiceDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::orderBy('id','desc')->get();/* :latest()->paginate(10); */
        return view('backEnd.service.index')->with('service', $service);
    }

    public function show($id=null){

        /* $products = Product::findOrFail($id); */
        $data = Service::where('status','1')->where('id', $id)->first();
        
        $dataImage = AttServiceImage::where('status','1')->where('service_id', $id)->get();

        return view('backEnd.service.show', compact(['data', 'dataImage']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.service.create');
    }



    public function store(ServiceDataStore $request)
    {
        if($request->hasFile('image')){

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/service/',$filename);
        }

        $service = Service::create([
            'name' => $request->name,
            'image' => $filename,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        if (!$service) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating Service.');
        }
        return redirect()->route('service.index')->with('success', 'Success, you Service have been create.');
    }


    public function edit(Service $service)
    {
        return view('backEnd.service.edit', compact('service'));
    }



    public function update(ServiceDataUpdate $request, Service $service)
    {
            $service->name = $request->name;
            $service->title = $request->title;
            $service->description = $request->description;
            $service->status = $request->status;

        if($request->hasFile('image')){
            // Delete old image
            $pathImage = 'uploads/service/'.$service->image;
            if(File::exists($pathImage))
            {
                File::delete($pathImage);
            }

            // Store image
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/service/',$filename);
            
            // Save to Datebase
            $service->image = $filename;
        }

        if(! $service->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating service.');
        }
        return redirect()->route('service.index')->with('success', 'Success, your service have been updated.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $pathImage = 'uploads/service/'.$service->image;
        if(File::exists($pathImage))
        {
            File::delete($pathImage);
        }
        
        $service->delete();
        
        return response()->json([
            'success' => true
        ]);
    }


    public function ViewAttributes(Request $request, $id=null){
        $Service = Service::where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasfile('image')){
                $files = $request->file('image');
                foreach($files as $file){
                    $image = new AttServiceImage;
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(111,9999).'.'.$extension;
                    $image_path = 'uploads/products/'.$filename;
                    Image::make($file)->save($image_path);
                    $image->image = $filename;
                    $image->service_id = $data['service_id'];
                    $image->description = $data['description'];
                    $image->status = $data['status'];
                    $image->save();
                }
            }
            return redirect('admin/serviceImageAtrr/'.$id)->with('success','Image has been updated!');
        }
        $productImages = AttServiceImage::where(['service_id'=>$id])->get();
        return view('backEnd.service.viewAttributes')->with(compact('Service','productImages'));
    }

    public function deleteAttributeImage(AttServiceImage $id)
    {
        $id->delete();
        return response()->json([
            'error' => true
        ]);
    }

    public function showAllService(){

        $service = Service::all();
        return view('frontEnd.service.index', compact('service'));

    }


    public function detailService($id=null){

        /* $products = Product::findOrFail($id); */
        $serviceData = Service::where('status','1')->where('id', $id)->first();
        
        $imageService = AttServiceImage::where('status','1')->where('service_id', $id)->get();

        $relatedService = Service::where('status','1')->where('id','!=',$id)->take(9)->get();

        $id_= $id;

        return view('frontEnd.service.serviceDetail', compact(['serviceData', 'imageService','relatedService','id_']));
    }

    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        Service::where('id',$data['id'])->update(['status'=>$data['status']]);
        return redirect()->back()->with('success','Service status updated successfully!');
    }
}
