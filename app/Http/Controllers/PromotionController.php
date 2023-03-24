<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\AttPromotion;
use App\Models\ImagePromotion;

class PromotionController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::pluck('name','id', 'image');
        $brands = Brand::pluck('name','id', 'image');
        $subCategory = SubCategory::pluck('name','id', 'image');

        $promotions = new Promotion();

        $promotions = $promotions->latest()->get();

        return view('backEnd.promotion.index', compact('categories','promotions','brands','subCategory'));
    }


    public function show($id=null){

        /* $products = Product::findOrFail($id); */
        $data = Promotion::with('attributes')->where('id', $id)->first();
        
        $dataImage = ImagePromotion::where('product_id', $id)->get();

        return view('backEnd.promotion.show', compact(['data', 'dataImage']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id', 'image');
        $brands = Brand::pluck('name','id', 'image');
        $subCategory = SubCategory::pluck('name','id', 'image');
        return view('backEnd.promotion.create', compact('categories','brands','subCategory'));
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
            'name' => ['required'],
            'price' => ['required'],
            'image' => ['required'],
            'category_id' => ['required'],
            // 'subcategory_id' => ['required'],
            'brand_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'spl_price' => ['required'],
            // 'discount' => ['required'],
            'qty' => ['required'],
            'tax_amt' => ['required'],
            'status' => ['required'],
        ]);

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/promotion/',$filename);
        }

        $promotion = new Promotion();
        $promotion->name = $request->name;
        $promotion->price = $request->price;
        $promotion->pro_code = '';
        $promotion->image = $filename;
        $promotion->category_id = $request->category_id;
        $promotion->subcategory_id = $request->subcategory_id;
        $promotion->brand_id = $request->brand_id;
        $promotion->title = $request->title;
        $promotion->description = $request->description;
        $promotion->spl_price = $request->spl_price;
        // $promotion->discount = $request->discount;
        $promotion->qty = $request->qty;
        $promotion->tax_amt = $request->tax_amt;
        $promotion->status = $request->status;
        $promotion->save();

        $promotion->pro_code = 'ECO-' . Carbon::now()->year . Carbon::now()->month . $promotion->id . Carbon::now()->day;

        $promotion->save();

        if (!$promotion) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating promotion.');
        }
        return redirect()->route('promotion.index')->with('success', 'Success, you promotion have been create.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        $categories = Category::pluck('name','id', 'image');
        $brands = Brand::pluck('name','id', 'image');
        $subCategory = SubCategory::pluck('name','id', 'image');
        return view('backEnd.promotion.edit', compact('categories','brands','promotion','subCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $promotion = Promotion::find($id);

            $promotion->name = $request->name;
            $promotion->price = $request->price;
            // $promotion->pro_code = $request->pro_code;
            $promotion->category_id = $request->category_id;
            $promotion->subcategory_id = $request->subcategory_id;
            $promotion->brand_id = $request->brand_id;
            $promotion->title = $request->title;
            $promotion->description = $request->description;
            $promotion->spl_price = $request->spl_price;
            $promotion->qty = $request->qty;
            $promotion->tax_amt = $request->tax_amt;
            $promotion->status = $request->status;


        if($request->hasFile('image')){
            // Delete old image
           $pathImage = 'uploads/promotion/'.$promotion->image;
           if(File::exists($pathImage))
           {
               File::delete($pathImage);
           }

           // Store image
           $file = $request->file('image');
           $ext = $file->getClientOriginalExtension();
           $filename = time().'.'.$ext;
           $file->move('uploads/promotion/',$filename);
           
           // Save to Datebase
           $promotion->image = $filename;
        }

        if(!$promotion->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating promotions.');
        }
        return redirect()->route('promotion.index')->with('success', 'Success, your promotions have been updated.');
    }

    public function destroy(Promotion $promotion)
    {
        $pathImage = 'uploads/promotion/'.$promotion->image;
        if(File::exists($pathImage))
        {
            File::delete($pathImage);
        }
        $promotion->delete();
        
        return response()->json([
            'success' => true
        ]);
    }


    public function addAttributes(Request $request, $id=null){
        $productAtrributes = AttPromotion::latest()->paginate(5);
        $products = Promotion::with('attributes')->where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            /* echo "<pre>";print_r($data);die; */
            foreach($data['pro_info'] as $key =>$val){
                if(!empty($val)){
                    //Prevent duplicate size Recode
                    $attribCountInfo = AttPromotion::where('id', $val)->count();
                    if($attribCountInfo>0){
                        return redirect('admin/promotion_attributes/'.$id)->with('error','Info is already exist please select another Info');
                    }
                    $attribCountID = AttPromotion::where(['product_id'=>$id])->count();
                    
                    $attribute = new AttPromotion;
                    $attribute->product_id = $id;
                    $attribute->pro_info = $val;
                    $attribute->save();
                }
                
            }
            return redirect('admin/promotion_attributes/'.$id)->with('success','Promotion Attributes added successfully!');
        }
        return view('backEnd.promotion.add_attributes')->with(compact('products','productAtrributes'));
    }


    public function deleteAttribute(AttPromotion $id)
    {
        $id->delete();
        return response()->json([
            'error' => true
        ]);
    }

    public function editAttributes(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            foreach($data['attr'] as $key=>$attr){
                AttPromotion::where(['id'=>$data['attr'][$key]])->update(['pro_info'=>$data['pro_info'][$key]]);
            }
            return redirect()->back()->with('success','Products Attributes update successfully!');
        }
    }


    public function ViewAttributes(Request $request, $id=null){
        $Viewproducts = Promotion::where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasfile('image')){
                $files = $request->file('image');
                foreach($files as $file){
                    $image = new ImagePromotion;
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(111,9999).'.'.$extension;
                    $image_path = 'uploads/promotion/'.$filename;
                    Image::make($file)->save($image_path);
                    $image->image = $filename;
                    $image->product_id = $data['product_id'];
                    $image->description = $data['description'];
                    $image->save();
                }
            }
            return redirect('admin/promotion_image/'.$id)->with('success','Image has been updated!');
        }
        $productImages = ImagePromotion::where(['product_id'=>$id])->get();
        return view('backEnd.promotion.ImagePromotion')->with(compact('Viewproducts','productImages'));
    }

    public function deleteAttributeImage(ImagePromotion $id)
    {
        $pathImage = 'uploads/promotion/'.$id->image;
        if(File::exists($pathImage))
        {
            File::delete($pathImage);
        }
        $id->delete();
        
        return response()->json([
            'success' => true
        ]);
    }

    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        Promotion::where('id',$data['id'])->update(['status'=>$data['status']]);
        return redirect()->back()->with('success','Promotion status updated successfully!');
    }
}








///////==================================================================================///////






// public function store(Request $request)
// {
//     $this->validate($request, [
//         'name' => 'required|string|max:255',
//         'image' => 'required',
//         'title' => 'nullable|string',
//         'description' => 'nullable|string',
//         'status' => 'required|boolean',
//     ]);

//     if($request->image){
        
//         $file = $request->file('image');
//         $extension = $file->getClientOriginalExtension();
//         $filename = rand(111,9999).'.'.$extension;
//         $image_path = 'uploads/products/'.$filename;
//         Image::make($file)->save($image_path);

//     }

//     $slider =Slider::create([
//         'name' => $request->name,
//         'image' => $filename,
//         'title' => $request->title,
//         'description' => $request->description,
//         'status' => $request->status,
//     ]);

//     if (!$slider) {
//         return redirect()->back()->with('error', 'Sorry, there a problem while creating slider.');
//     }
//     return redirect()->route('slider.index')->with('success', 'Success, you slider have been create.');
// }