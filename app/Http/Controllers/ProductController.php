<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Storage;

class ProductController extends Controller
{

    // Create Page
    public function product_create(){
        $categories_datas = Category::select('name','id')->orderBy('id','asc')->get();
        return view('admin.product.create',compact('categories_datas'));
    }

    // Create Product
    public function create(Request $request){
        $this->checkvalidationproduct($request,'create');
        $datas = $this->productdata($request);
        $image = uniqid().$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/product_image/',$image);
        $datas['image'] = $image;
        Product::create($datas);
        return redirect()->route('product#list')->with(['createsuccess' => 'Create Success']);
    }

    // List Page
    public function product_list(){
        $products = Product::orderBy('id','desc')->paginate(12);
        return view('admin.product.list',compact('products'));
    }

    // Edit Page
    public function product_edit($id){
        $data = Product::where('id',$id)->first();
        $category_datas = Category::select('name','id')->get();
        return view('admin.product.edit',compact('data','category_datas'));
    }

    // Edit Product
    public function edit(Request $request){
        $this->checkvalidationproduct($request,'update');
        $data= $this->productdata($request);
        if($request->hasfile('image')){
            $oldimage = Product::Where('id',$request->product_id)->first()->image;
            Storage::delete('public/product_image/'.$oldimage);
            $newimage = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/product_image/',$newimage);
            $data['image'] = $newimage;
        }
        Product::where('id',$request->product_id)->update($data);
        return redirect()->route('product#list')->with(['updatesuccess' => 'Update Success']);
    }

    // Delete
    public function delete($id){
        $dbimage = Product::where('id',$id)->first()->image;
        if($dbimage != null){
            Storage::delete('public/product_image/'.$dbimage);
        }
        Product::where('id',$id)->delete();
        return back()->with(['deletesuccess' => 'Delete Success']);
    }


    // Validation Product
    private function checkvalidationproduct($request,$action){
        $validation = [
            'ProductName' => 'required|unique:products,name,'.$request->product_id,
            'ProductDescription' => 'required',
            'price' => 'required|numeric',
            'Category' => 'required',
        ];
        $validation['image'] = $action == 'create' ? 'required|mimes:png,jpg,jpeg,webp |file' : 'mimes:png,jpg,jpeg,webp |file';
        Validator::make($request->all(),$validation)->Validate();
    }

    // Change Array
    private function productdata($request){
        return [
            'name' => $request->ProductName,
            'description' => $request->ProductDescription,
            'price' => $request->price,
            // 'view_cont' => $request->ProductName,
            'category_id' => $request->Category,
            'updated_at' => Carbon::now(),
        ];
    }

}
