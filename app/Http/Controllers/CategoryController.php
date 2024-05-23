<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Storage;

class CategoryController extends Controller
{
    // Create page
    public function category_create(){
        return view('admin.category.create');
    }

    // List page
    public function category_list(){
        $categories = Category::orderBy('id','desc')->paginate(5);
        return view('admin.category.list',compact('categories'));
    }

    // Edit Page
    public function category_edit($id){
        $datas = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('datas'));
    }

    // Create Category
    public function create(Request $request){
        $this->checkcategoryvalidation($request);
        $datas = $this->categorydata($request);
        if($request->hasfile('image')){
            $image = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/category_image/',$image);
            $datas['image'] = $image;
        }
        Category::create($datas);
        return redirect()->route('category#list')->with(['createsuccess' => 'Category Create Success']);
    }

    // Delete Category
    public function delete($id){
        $dbimage = Category::where('id',$id)->first()->image;
        if($dbimage != null){
            Storage::delete('public/category_image/'.$dbimage);
        }
        Category::where('id',$id)->delete();
        return back()->with(['deletesuccess' => 'Category Delete Success']);
    }

    // Edit Category
    public function edit(Request $request){
        $this->checkcategoryvalidation($request);
        $datas = $this->categorydata($request);
        if($request->hasfile('image')){
            $oldimage = Category::where('id',$request->category_id)->first()->image;
            if($oldimage != null){
                Storage::delete('public/category_image/'.$oldimage);
            }
            $newimage = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/category_image/',$newimage);
            $datas['image'] = $newimage;
        }
        Category::where('id',$request->category_id)->update($datas);
        return redirect()->route('category#list')->with(['updatesuccess' => 'Category Update Success']);
    }

    // Validation
    private function checkcategoryvalidation($request){
        Validator::make($request->all(),[
            'CategoryName' => 'required|unique:categories,name,'.$request->category_id,
            'image' => 'mimes:png,jpg,jpeg,webp|file'
        ])->validate();
    }

    // Change Array
    private function categorydata($request){
        return [
            'name' => $request->CategoryName,
            'updated_at' => Carbon::now()
        ];
    }

}
