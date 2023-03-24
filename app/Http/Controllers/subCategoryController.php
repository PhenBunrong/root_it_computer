<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Product;

class subCategoryController extends Controller
{

    public function index()
    {
        $categories = Category::pluck('name','id', 'image');
        $subCategory = SubCategory::orderBy('id','desc')->get();/* :latest()->paginate(10); */
        return view('backEnd.subCategory.index', compact('subCategory','categories'));
    }

    public function show($id=null){

        /* $products = Product::findOrFail($id); */
        $data = SubCategory::where('id', $id)->first();

        return view('backEnd.subCategory.show', compact(['data']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id', 'image');
        return view('backEnd.subCategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $file->move('uploads/subCategory/',$filename);
        }

        $subCategory = SubCategory::create([
            'name' => $request->name,
            'image' => $filename,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        if (!$subCategory) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating subCategory.');
        }
        return redirect()->route('subCategory.index')->with('success', 'Success, you subCategory have been create.');
    }

    public function edit(SubCategory $subCategory)
    {
        
        $categories = Category::pluck('name','id', 'image');
        return view('backEnd.subCategory.edit', compact('subCategory','categories'));
    }


    public function update(Request $request, $id)
    {

        $subCategory = SubCategory::find($id);

        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->title = $request->title;
        $subCategory->description = $request->description;
        $subCategory->status = $request->status;

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);
        
        if($request->hasFile('image')){
           // Delete old image
           $pathImage = 'uploads/subCategory/'.$subCategory->image;
           if(File::exists($pathImage))
           {
               File::delete($pathImage);
           }

           // Store image
           $file = $request->file('image');
           $ext = $file->getClientOriginalExtension();
           $filename = time().'.'.$ext;
           $file->move('uploads/subCategory/',$filename);
           
           // Save to Datebase
           $subCategory->image = $filename;
        }

        if(! $subCategory->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating subCategory.');
        }
        return redirect()->route('subCategory.index')->with('success', 'Success, your subCategory have been updated.');
    }


    public function destroy(SubCategory $subCategory)
    {
        $pathImage = 'uploads/subCategory/'.$subCategory->image;
        if(File::exists($pathImage))
        {
            File::delete($pathImage);
        }


        $subCategory->delete();
        
        return response()->json([
            'success' => true
        ]);
    }

    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        SubCategory::where('id',$data['id'])->update(['status'=>$data['status']]);
        return redirect()->back()->with('success','SubCategory status updated successfully!');
    }
}
