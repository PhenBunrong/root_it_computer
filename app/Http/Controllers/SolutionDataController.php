<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solution;
use App\Models\Product;
use Image;
use App\Models\AttSolutionImage;
use App\Http\Requests\SolutionDataUpdata;
use App\Http\Requests\SolutionDataStore;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SolutionDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solution = Solution::orderBy('id','desc')->get();/* :latest()->paginate(10); */
        return view('backEnd.solution.index')->with('solution', $solution);
    }

    public function show($id=null){

        /* $products = Product::findOrFail($id); */
        $data = Solution::where('status','1')->where('id', $id)->first();
        
        $dataImage = AttSolutionImage::where('status','1')->where('solution_id', $id)->get();

        return view('backEnd.solution.show', compact(['data', 'dataImage']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.solution.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolutionDataStore $request)
    {

        if($request->hasFile('image')){

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/solution/',$filename);
        }

        $solutionData = Solution::create([
            'name' => $request->name,
            'image' => $filename,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        if (!$solutionData) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating solution.');
        }
        return redirect()->route('solution.index')->with('success', 'Success, you solution have been create.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Solution $solution)
    {
        return view('backEnd.solution.update', compact('solution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SolutionDataUpdata $request, Solution $solution)
    {
            $solution->name = $request->name;
            $solution->title = $request->title;
            $solution->description = $request->description;
            $solution->status = $request->status;

        if($request->hasFile('image')){
            // Delete old image
            $pathImage = 'uploads/solution/'.$solution->image;
            if(File::exists($pathImage))
            {
                File::delete($pathImage);
            }

            // Store image
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/solution/',$filename);
            
            // Save to Datebase
            $solution->image = $filename;
        }

        if(! $solution->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating solution.');
        }
        return redirect()->route('solution.index')->with('success', 'Success, your solution have been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solution $solution)
    {
        $pathImage = 'uploads/solution/'.$solution->image;
        if(File::exists($pathImage))
        {
            File::delete($pathImage);
        }
        $solution->delete();
        
        return response()->json([
            'success' => true
        ]);
    }

    public function ViewAttributes(Request $request, $id=null){
        $Solution = Solution::where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasfile('image')){
                $files = $request->file('image');
                foreach($files as $file){
                    $image = new AttSolutionImage;
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(111,9999).'.'.$extension;
                    $image_path = 'uploads/products/'.$filename;
                    Image::make($file)->save($image_path);
                    $image->image = $filename;
                    $image->solution_id = $data['solution_id'];
                    $image->description = $data['description'];
                    $image->status = $data['status'];
                    $image->save();
                }
            }
            return redirect('admin/solutionImageAtrr/'.$id)->with('success','Image has been updated!');
        }
        $productImages = AttSolutionImage::where(['solution_id'=>$id])->get();
        return view('backEnd.solution.viewAttributes')->with(compact('Solution','productImages'));
    }

    public function deleteAttributeImage(AttSolutionImage $id)
    {
        $id->delete();
        return response()->json([
            'error' => true
        ]);
    }

    public function showAllSolutions(){

        $solution = Solution::all();
        return view('frontEnd.solution.index', compact('solution'));

    }

    public function detailSolution($id=null){

        /* $products = Product::findOrFail($id); */
        $solutionData = Solution::where('status','1')->where('id', $id)->first();
        
        $imageSolution = AttSolutionImage::where('status','1')->where('solution_id', $id)->get();

        $relatedSolution = Solution::where('status','1')->where('id','!=',$id)->take(9)->get();

        $id_= $id;

        return view('frontEnd.solution.solotionDetail', compact(['solutionData', 'imageSolution','relatedSolution','id_']));
    }


    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        Solution::where('id',$data['id'])->update(['status'=>$data['status']]);
        return redirect()->back()->with('success','Solution status updated successfully!');
    }



/*     public function showAttr(Solution $solution){
        return view('backEnd.solution.viewAttributes', compact('solution'));
    }

    public function attrImage(Request $request, $id=null){
        $image_path = '';


        $this->validate($request, [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            
        ]);

        if($request->hasFile('image')){
            $name = now()->format('dmY.His'). "-" . time(). '.' . explode( '/' , explode( ':' , substr($request->photo,0, strpos($request->photo, ";")))[1])[1];
            $image_path = $request->file('image')->store('solutionsAttr');
        }

        $AttSolutionImage = AttSolutionImage::create([
            'image' => $image_path,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        if (!$AttSolutionImage) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating solution.');
        }

        return redirect()->route('solution.attrImage')->with('success', 'Success, you solution have been create.');

        $AttSolutionImage = AttSolutionImage::where(['solution_id'=>$id])->get();
        return view('backEnd.solution.viewAttributes', compact('AttSolutionImage'));
    } */

}




/* 
public function store(SolutionDataStore $request)
{

    if($request->hasFile('image')){

        $local_path = 'solutions';
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $path = $request->file('image')->storeAs($local_path,$image_name);

    }

    $solutionData = Solution::create([
        'name' => $request->name,
        'image' => $image_name,
        'title' => $request->title,
        'description' => $request->description,
        'status' => $request->status,
    ]);

    if (!$solutionData) {
        return redirect()->back()->with('error', 'Sorry, there a problem while creating solution.');
    }
    return redirect()->route('solution.index')->with('success', 'Success, you solution have been create.');
} */