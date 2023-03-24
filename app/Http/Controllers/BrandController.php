<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Catogory;
use App\Http\Requests\BrandStore;
use App\Http\Requests\BrandUpdate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id','desc')->get();/* :latest()->paginate(10); */
        return view('backEnd.brand.index')->with('brands', $brands);
    }

    public function show($id=null){

        /* $products = Product::findOrFail($id); */
        $data = Brand::where('id', $id)->first();

        return view('backEnd.brand.show', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.brand.create');
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
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/brand/',$filename);
        }

        $brand = Brand::create([
            'name' => $request->name,
            'image' => $filename,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        if (!$brand) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating brand.');
        }
        return redirect()->route('brand.index')->with('success', 'Success, you brand have been create.');
    }


    public function edit(Brand $brand)
    {
        return view('backEnd.brand.edit', compact('brand'));
    }


    public function update(Request $request, $id)
    {

        $brand = Brand::find($id);

        $brand->name = $request->name;
        $brand->title = $request->title;
        $brand->description = $request->description;
        $brand->status = $request->status;

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);
        
        if($request->hasFile('image')){
           // Delete old image
           $pathImage = 'uploads/brand/'.$brand->image;
           if(File::exists($pathImage))
           {
               File::delete($pathImage);
           }

           // Store image
           $file = $request->file('image');
           $ext = $file->getClientOriginalExtension();
           $filename = time().'.'.$ext;
           $file->move('uploads/brand/',$filename);
           
           // Save to Datebase
           $brand->image = $filename;
        }

        if(! $brand->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating brands.');
        }
        return redirect()->route('brand.index')->with('success', 'Success, your brands have been updated.');
    }


    public function destroy(Brand $brand)
    {
        $pathImage = 'uploads/brand/'.$brand->image;
        if(File::exists($pathImage))
        {
            File::delete($pathImage);
        }


        $brand->delete();
        
        return response()->json([
            'success' => true
        ]);
    }

    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        Brand::where('id',$data['id'])->update(['status'=>$data['status']]);
        return redirect()->back()->with('success','Brand status updated successfully!');
    }
}
