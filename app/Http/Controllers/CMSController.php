<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CMS;

class CMSController extends Controller
{
    public function index()
    {
        $cms = CMS::orderBy('id','desc')->get();/* :latest()->paginate(10); */
        return view('backEnd.cms.index')->with('cms', $cms);
    }

    public function show($id=null){

        /* $products = Product::findOrFail($id); */
        $data = CMS::where('id', $id)->first();

        return view('backEnd.cms.show', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.cms.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'url' => 'nullable|string',
            'status' => 'required|boolean',
        ]);
        

        $cms = CMS::create([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'status' => $request->status,
        ]);

        if (!$cms) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating cms.');
        }
        return redirect()->route('cms.index')->with('success', 'Success, you cms have been create.');
    }


    public function edit(CMS $cm)
    {
        return view('backEnd.cms.edit', compact('cm'));
    }


    public function update(Request $request, $id)
    {
        $cms = CMS::find($id);

        $cms->name = $request->name;
        $cms->title = $request->title;
        $cms->description = $request->description;
        $cms->url = $request->url;
        $cms->status = $request->status;

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'url' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        if(! $cms->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating cms.');
        }
        return redirect()->route('cms.index')->with('success', 'Success, your cms have been updated.');
    }


    public function destroy(CMS $cm)
    {
        $cm->delete();
        
        return response()->json([
            'success' => true
        ]);
    }

    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        CMS::where('id',$data['id'])->update(['status'=>$data['status']]);
        return redirect()->back()->with('success','CMS status updated successfully!');
    }
}
