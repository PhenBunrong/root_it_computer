<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Requests\Request\BannerEdit;
use App\Http\Requests\Request\BannerStore;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::all();
        return view('backEnd.banner.index', compact('banner'));
    }

    public function show($id=null){

        /* $products = Product::findOrFail($id); */
        $data = Banner::where('id', $id)->first();

        return view('backEnd.banner.show', compact(['data']));
    }

    public function create()
    {
        return view('backEnd.banner.create');
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
            $file->move('uploads/banner/',$filename);
        }

        $banner = Banner::create([
            'name' => $request->name,
            'image' => $filename,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        if (!$banner) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating banner.');
        }
        return redirect()->route('banner.index')->with('success', 'Success, you banner have been create.');
    }


    public function edit(Banner $banner)
    {
        return view('backEnd.banner.edit', compact('banner'));
    }


    public function update(Request $request, $id)
    {

        $banner = Banner::find($id);

        $banner->name = $request->name;
        $banner->description = $request->description;
        $banner->status = $request->status;

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);
        
        if($request->hasFile('image')){
           // Delete old image
           $pathImage = 'uploads/banner/'.$banner->image;
           if(File::exists($pathImage))
           {
               File::delete($pathImage);
           }

           // Store image
           $file = $request->file('image');
           $ext = $file->getClientOriginalExtension();
           $filename = time().'.'.$ext;
           $file->move('uploads/banner/',$filename);
           
           // Save to Datebase
           $banner->image = $filename;
        }

        if(! $banner->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating banner.');
        }
        return redirect()->route('banner.index')->with('success', 'Success, your banner have been updated.');
    }


    public function destroy(Banner $banner)
    {
        $pathImage = 'uploads/banner/'.$banner->image;
        if(File::exists($pathImage))
        {
            File::delete($pathImage);
        }

        $banner->delete();
        
        return response()->json([
            'success' => true
        ]);
    }

    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        Banner::where('id',$data['id'])->update(['status'=>$data['status']]);
        return redirect()->back()->with('success','Slideshow status updated successfully!');
    }
}
