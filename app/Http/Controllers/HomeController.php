<?php

namespace App\Http\Controllers;

use App\Models\BlogUser;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class HomeController extends Controller
{
    public function index(){
        $blogs = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->select('blogs.*','categories.category_name')
            ->where('blogs.status',1)
            ->where('blog_type','trending')
            ->orderBy('blogs.id','desc')
            ->take(3)
            ->get();

        return view('frontEnd.home.home',[
            'blogs'=>$blogs,
            'sliders' => Slider::where('status',1)->get(),
        ]);
    }
    public function blogDetails($slug){
        $blog = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authores','blogs.authore_id','authores.id')
            ->select('blogs.*','categories.category_name','authores.authore_name')
            ->where('slug',$slug)
            ->first();
        $catId= $blog->category_id;
        $categoryWiseBlogs = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authores','blogs.authore_id','authores.id')
            ->select('blogs.*','categories.category_name','authores.authore_name')
            ->where('blogs.category_id',$catId)
            ->get();
        $comments= DB::table('comments')
            ->join('blog_users','comments.user_id','blog_users.id')
            ->select('comments.*','blog_users.name')
            ->where('comments.blog_id',$blog->id)
            ->get();
        return view('frontEnd.blog.blog-details',[
            'blog'=>$blog,
            'categoryWiseBlogs'=>$categoryWiseBlogs,
            'comments'=>$comments,
        ]);
    }
    public function categories($id){
        $categories = Category::where('id',$id)->first();
        $blog = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authores','blogs.authore_id','authores.id')
            ->select('blogs.*','categories.category_name','authores.authore_name')
            ->where('blogs.category_id',$id)
            ->get();
        return view('frontEnd.category.category',[
            'category'=> $categories,
            'blogs'=>$blog,
        ]);
    }
    public function about(){
        return view('frontEnd.about.about');
    }
    public function contact(){
        return view('frontEnd.contact.contact');
    }
    public function searchResult(){
        return view('frontEnd.search.search');
    }

    public function userRegister(){
        return view('frontEnd.user.user_register');
    }
    public function userSave(Request $request){
       $user = new BlogUser();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->phone = $request->phone;
       $user->password = bcrypt($request->password);
       $user->save();
       return back()->with('message','Registration Successfully');
    }
    public function userLogin(){
        return view('frontEnd.user.user_login');
    }
    public function loginCheck(Request $request){
        $userInfo = BlogUser::where('email',$request->user_name)
            ->orWhere('phone',$request->user_name)
            ->first();

        if ($userInfo){
            $exPassword = $userInfo->password;
            if (password_verify($request->password,$exPassword)){
                Session::put('userId',$userInfo->id);
                Session::put('userName',$userInfo->name);
                return redirect('/');
            }else{
                return back()->with('message','Invalid Password!');
            }
        }else{
            return back()->with('message','Please use valid email or phone!');
        }
    }
    public function Logout(){
        Session::forget('userId');
        Session::forget('userName');
        return back();
    }
    public function apiBlogDetails($id){
        $blog = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authores','blogs.authore_id','authores.id')
            ->select('blogs.*','categories.category_name','authores.authore_name')
            ->where('blogs.id',$id)
            ->first();
        return json_encode($blog);
    }
}
