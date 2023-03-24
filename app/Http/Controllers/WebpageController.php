<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Webpage;
use App\Models\Category;
use App\Models\Product;

class WebpageController extends Controller
{
    public function index()
    {
        $categories = Category::pluck('name','id', 'image');
        $webpage = Webpage::orderBy('id','desc')->get();/* :latest()->paginate(10); */

        return view('backEnd.webpage.index', compact('webpage','categories'));
    }

    public function show($id=null){

        /* $products = Product::findOrFail($id); */
        $data = Webpage::where('id', $id)->first();

        return view('backEnd.webpage.show', compact(['data']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id', 'image');
        return view('backEnd.webpage.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $webpage = Webpage::create([
            'name' => $request->name,
            'product_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        if ($webpage->product_id == null) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating webpage.');
        }
        return redirect()->route('webpage.index')->with('success', 'Success, you webpage have been create.');
    }


    public function edit(Webpage $webpage)
    {
        $categories = Category::pluck('name','id', 'image');
        return view('backEnd.webpage.edit', compact('webpage','categories'));
    }


    public function update(Request $request, $id)
    {

        $webpage = Webpage::find($id);

        $webpage->name = $request->name;
        $webpage->product_id = $request->category_id;
        $webpage->title = $request->title;
        $webpage->description = $request->description;
        $webpage->status = $request->status;

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);
        

        if(!$webpage->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating webpages.');
        }
        return redirect()->route('webpage.index')->with('success', 'Success, your webpages have been updated.');
    }


    public function destroy(Webpage $webpage)
    {

        $webpage->delete();
        
        return response()->json([
            'success' => true
        ]);
    }

    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        Webpage::where('id',$data['id'])->update(['status'=>$data['status']]);
        return redirect()->back()->with('success','Webpage status updated successfully!');
    }
}
