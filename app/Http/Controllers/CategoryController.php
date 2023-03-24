<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Requests\CategoryStore;
use App\Http\Requests\CategoryUpdate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    // public $search;
    // public $product_cat;
    // public $product_cat_id;

    // public function mount(){
    //     $this->product_cat = 'All Category';
    //     $this->fill(request()->only('search','product_cat', 'product_cat_id'));
    
    // }

    // where('name','like','%'.$this->search .'%')->where('category_id',$this->$product_cat_id)->

    
    public function index()
    {
        $categories = Category::orderBy('id','desc')->get();/* :latest()->paginate(10); */

        return view('backEnd.category.index', compact('categories'));
    }

    public function show($id=null){

        /* $products = Product::findOrFail($id); */
        $data = Category::where('id', $id)->first();

        return view('backEnd.category.show', compact(['data']));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.category.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'image' => 'required|nullable|image',
            'title' => 'required|nullable|string',
            'description' => 'required|nullable|string',
            'status' => 'required|boolean',
        ]);
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/categories/',$filename);
        }

        $categories = Category::create([
            'name' => $request->name,
            'image' => $filename,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);


        if (!$categories) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating categories.');
        }
        return redirect()->route('category.index')->with('success', 'Success, you categories have been create.');
    }


    public function edit(Category $category)
    {
        return view('backEnd.category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {

        $categories = Category::find($id);

        $categories->name = $request->name;
        $categories->title = $request->title;
        $categories->description = $request->description;
        $categories->status = $request->status;

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'title' => 'required|nullable|string',
            'description' => 'required|nullable|string',
            'status' => 'required|boolean',
        ]);
        
        if($request->hasFile('image')){
           // Delete old image
           $pathImage = 'uploads/categories/'.$categories->image;
           if(File::exists($pathImage))
           {
               File::delete($pathImage);
           }

           // Store image
           $file = $request->file('image');
           $ext = $file->getClientOriginalExtension();
           $filename = time().'.'.$ext;
           $file->move('uploads/categories/',$filename);
           
           // Save to Datebase
           $categories->image = $filename;
        }

        if(!$categories->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating categoriess.');
        }
        return redirect()->route('category.index')->with('success', 'Success, your categoriess have been updated.');
    }


    public function destroy(Category $category)
    {

        $pathImage = 'uploads/categories/'.$category->image;
        if(File::exists($pathImage))
        {
            File::delete($pathImage);
        }

        $category->delete();
        
        return response()->json([
            'success' => true
        ]);
    }

    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        Category::where('id',$data['id'])->update(['status'=>$data['status']]);
        return redirect()->back()->with('success','Category status updated successfully!');
    }
}
