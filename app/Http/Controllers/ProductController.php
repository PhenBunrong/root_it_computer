<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdate;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductAttribute;
use App\Models\ImageAttribute;

class ProductController extends Controller
{
    
    public function getCategory($id){
        $getCategory = SubCategory::where('cetegory_id',$id)->pluck('name','id');
        return json_encode($getCategory);
    }

    public function show($id=null){

        /* $products = Product::findOrFail($id); */
        $data = Product::with('attributes')->where('id', $id)->first();
        
        $dataImage = ImageAttribute::where('product_id', $id)->get();

        $dataProduct = Product::where('id', $id)->get();


        $relatedProducts = Product::where('id','!=',$id)->where(['category_id'=>$data->category_id])->take(9)->get();

        $id_= $id;

        return view('backEnd.product.show', compact(['data', 'dataImage', 'relatedProducts', 'id_', 'dataProduct']));
    }

    public function index()
    {
        $categories = Category::pluck('name','id', 'image');
        $brands = Brand::pluck('name','id', 'image');
        $subCategory = SubCategory::pluck('name','id', 'image');
        $products = new Product();

        $products = $products->latest()->get();

        return view('backEnd.product.index', compact('categories','subCategory','products','brands'));
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
        return view('backEnd.product.create', compact('categories','subCategory','brands'));
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
            $file->move('uploads/product/',$filename);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->pro_code = '';
        $product->image = $filename;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->spl_price = $request->spl_price;
        // $product->discount = $request->discount;
        $product->qty = $request->qty;
        $product->tax_amt = $request->tax_amt;
        $product->status = $request->status;
        $product->save();

        $product->pro_code = 'ECO-' . Carbon::now()->year . Carbon::now()->month . $product->id . Carbon::now()->day;

        $product->save();

        if (!$product) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating product.');
        }
        return redirect()->route('product.index')->with('success', 'Success, you product have been create.');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name','id', 'image');
        $brands = Brand::pluck('name','id', 'image');
        $subCategory = SubCategory::pluck('name','id', 'image');
        return view('backEnd.product.update', compact('categories','subCategory','brands','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdate $request, Product $product)
    {
            $product->name = $request->name;
            $product->price = $request->price;
            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->brand_id = $request->brand_id;
            $product->description = $request->description;
            $product->spl_price = $request->spl_price;
            // $product->discount = $request->discount;
            $product->qty = $request->qty;
            $product->tax_amt = $request->tax_amt;
            $product->status = $request->status;

        if($request->hasFile('image')){
            // Delete old image
           $pathImage = 'uploads/product/'.$product->image;
           if(File::exists($pathImage))
           {
               File::delete($pathImage);
           }

           // Store image
           $file = $request->file('image');
           $ext = $file->getClientOriginalExtension();
           $filename = time().'.'.$ext;
           $file->move('uploads/product/',$filename);
           
           // Save to Datebase
           $product->image = $filename;
        }

        if(!$product->save()){
            return redirect()->back()->with('error', 'Sorry, there\' a problem while updating product.');
        }
        return redirect()->route('product.index')->with('success', 'Success, your product have been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $pathImage = 'uploads/product/'.$product->image;
        if(File::exists($pathImage))
        {
            File::delete($pathImage);
        }
        $product->delete();
        
        return response()->json([
            'success' => true
        ]);
    }

    public function addAttributes(Request $request, $id=null){
        $productAtrributes = ProductAttribute::latest()->paginate(5);
        $products = Product::with('attributes')->where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            /* echo "<pre>";print_r($data);die; */
            foreach($data['pro_info'] as $key =>$val){
                if(!empty($val)){
                    //Prevent duplicate size Recode
                    $attribCountInfo = ProductAttribute::where('id', $val)->count();
                    if($attribCountInfo>0){
                        return redirect('admin/add_attributes/'.$id)->with('error','Info is already exist please select another Info');
                    }
                    $attribCountID = ProductAttribute::where(['product_id'=>$id])->count();
                    
                    $attribute = new ProductAttribute;
                    $attribute->product_id = $id;
                    $attribute->pro_info = $val;
                    $attribute->save();
                }
                
            }
            return redirect('admin/add_attributes/'.$id)->with('success','Products Attributes added successfully!');
        }
        return view('backEnd.product.add_attributes')->with(compact('products','productAtrributes'));
    }


    public function deleteAttribute(ProductAttribute $id)
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
                ProductAttribute::where(['id'=>$data['attr'][$key]])->update(['pro_info'=>$data['pro_info'][$key]]);
            }
            return redirect()->back()->with('success','Products Attributes update successfully!');
        }
    }


    public function ViewAttributes(Request $request, $id=null){
        $Viewproducts = Product::where(['id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasfile('image')){
                $files = $request->file('image');
                foreach($files as $file){
                    $image = new ImageAttribute;
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(111,9999).'.'.$extension;
                    $image_path = 'uploads/products/'.$filename;
                    Image::make($file)->save($image_path);
                    $image->image = $filename;
                    $image->product_id = $data['product_id'];
                    $image->description = $data['description'];
                    $image->save();
                }
            }
            return redirect('admin/view_attributes/'.$id)->with('success','Image has been updated!');
        }
        $productImages = ImageAttribute::where(['product_id'=>$id])->get();
        return view('backEnd.product.ImageAttributes')->with(compact('Viewproducts','productImages'));
    }

    public function deleteAttributeImage(ImageAttribute $id)
    {
        $id->delete();
        return response()->json([
            'error' => true
        ]);
    }


    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        Product::where('id',$data['id'])->update(['status'=>$data['status']]);
        return redirect()->back()->with('success','Products status updated successfully!');
    }

/*     public function changeStatus(Request $request){
        $data = Product::find($request->status_id);
        $data->status = $request->status;
        $data->save();
    } */
}
