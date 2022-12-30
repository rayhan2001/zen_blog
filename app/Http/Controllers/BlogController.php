<?php

namespace App\Http\Controllers;

use App\Models\Authore;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(){
        return view('admin.blog.add_blog',[
            'categories'=> Category::all(),
            'authores'=> Authore::all()
        ]);
    }
    public function blogSave (Request $request){
        $blog = new Blog();
        $blog->category_id = $request->category_id;
        $blog->authore_id = $request->authore_id;
        $blog->title = $request->title;
        $blog->slug = $this->makeSlug($request);
        $blog->description = $request->description;
        $blog->image = $this->saveImage($request);
        $blog->date = $request->date;
        $blog->blog_type = $request->blog_type;
        $blog->status = $request->status;
        $blog->save();
        return back()->with('message','Blog Add Successfully!!');
    }
    public function saveImage($request){
        $image =$request->file('image');
        $imageName =rand().'.'.$image->getClientOriginalExtension();
        $dir ='upload/blog/';
        $imageUrl = $dir.$imageName;
        $image->move($dir,$imageName);
        return $imageUrl;
    }
    public function makeSlug($request){
        if ($request->slug){
            $str = $request->slug;
            return preg_replace('/\s+/u','-',trim($str));
        }
        $str =$request->title;
        return preg_replace('/\s+/u','-',trim($str));
    }

    public function manageBlog(){
        return view('admin.blog.show_blog',[
            'blogs'=>DB::table('blogs')
                ->join('categories','blogs.category_id','=','categories.id')
                ->join('authores','blogs.authore_id','=','authores.id')
                ->select('blogs.*','categories.category_name','authores.authore_name')
                ->get()
        ]);
    }

    public function editBlog($id){
        return view('admin.blog.edit_blog',[
            'blog' => Blog::find($id),
            'categories'=>Category::all(),
            'authors'=>Authore::all(),
        ]);
    }
    public function blogStatus($id){
        $blog = Blog::find($id);
        if ($blog->status==1){
            $blog->status=0;
        }else{
            $blog->status=1;
        }
        $blog->save();
        return back();
    }
    public function updateBlog(Request $request){
        $blog = Blog::find($request->blog_id);
        $blog->category_id = $request->category_id;
        $blog->author_id = $request->author_id;
        $blog->title = $request->title;
        $blog->slug = $this->makeSlug($request);
        $blog->description = $request->description;
        $blog->status = $request->status;
        if ($request->file('image')){
            if ($blog->image !=null){
                unlink($blog->image);
            }
            $blog->image = $this->saveImage($request);
        }
        $blog->date = $request->date;
        $blog->blog_type = $request->blog_type;
        $blog->save();
        return redirect(route('manage.blog'));
    }
    public function deleteBlog(Request $request){
        $blog = Blog::find($request->blog_id);
        if ($blog->image){
            unlink($blog->image);
        }
        $blog->delete();
        return back();
    }
}
