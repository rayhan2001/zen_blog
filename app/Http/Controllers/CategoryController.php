<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.category',[
            'categories'=>Category::all()
        ]);
    }
    public function save(Request $request){
        Category::saveCategory($request);
        return back()->with('message','Category Add Successfully!');
    }
    public function edit($id){
        $this->category=Category::find($id);
        return view('admin.category.category_edit',[
            'category'=>$this->category,
        ]);
    }
    public function categoryUpdate(Request $request){
        $this->category = Category::find($request->category_id);
        $this->category->category_name = $request->category_name;
        $this->category->status = $request->status;
        $this->category->save();
        return redirect(route('category'))->with('message','Category Update Successfully!');
    }
    public function categoryDelete(Request $request){
        $this->category = Category::find($request->category_id);
        $this->category->delete();
        return back()->with('message','Category Delete Successfully');
    }
}
