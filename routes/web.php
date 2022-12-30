<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthoreController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//========================FrontendRoute======================

Route::get('/categories/{id}',[HomeController::class,'categories'])->name('categories');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/search-result',[HomeController::class,'searchResult'])->name('search_result');

Route::get('/user-register',[HomeController::class,'userRegister'])->name('user.register');
Route::post('/user-save',[HomeController::class,'userSave'])->name('user.save');
Route::get('/user-login',[HomeController::class,'userLogin'])->name('user.login');
Route::post('/user-login',[HomeController::class,'loginCheck'])->name('user.add');


Route::group(['middleware'=>'blogUser'],function (){
    Route::get('/blog-details/{slug}',[HomeController::class,'blogDetails'])->name('blog.details');
    Route::post('/new-comment',[CommentController::class,'saveComment'])->name('new.comment');
    Route::get('/user-logout',[HomeController::class,'Logout'])->name('user.logout');
    Route::get('/',[HomeController::class,'index'])->name('home');
});



//=====================AdminRoute=============================
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/slider',[SliderController::class,'index'])->name('slider');
    Route::post('/slider-save',[SliderController::class,'saveSlider'])->name('save.slider');
    Route::get('/slider-manage',[SliderController::class,'manageSlider'])->name('manage.slider');
    Route::get('/slider-edit/{id}',[SliderController::class,'editSlider'])->name('edit.slider');
    Route::get('/slider-status/{id}',[SliderController::class,'sliderStatus'])->name('slider.status');
    Route::post('/slider-update',[SliderController::class,'updateSlider'])->name('slider.update');
    Route::post('/slider-delete',[SliderController::class,'deleteSlider'])->name('delete.slider');

    Route::get('/category',[CategoryController::class,'index'])->name('category');
    Route::post('/category-store',[CategoryController::class,'save'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
    Route::post('/category-update',[CategoryController::class,'categoryUpdate'])->name('category.update');
    Route::post('/category-delete',[CategoryController::class,'categoryDelete'])->name('delete');

    Route::get('/authore',[AuthoreController::class,'index'])->name('authore');
    Route::post('/authore-store',[AuthoreController::class,'save'])->name('authore.store');
    Route::get('/authore-edit/{id}',[AuthoreController::class,'authoreEdit'])->name('authore.edit');
    Route::post('/authore-update',[AuthoreController::class,'update'])->name('authore.update');
    Route::post('/authore-delete',[AuthoreController::class,'delete'])->name('authore.delete');


    Route::get('/blog',[BlogController::class,'index'])->name('blog');
    Route::post('/blog-save',[BlogController::class,'blogSave'])->name('blog.save');
    Route::get('/blog-manage',[BlogController::class,'manageBlog'])->name('manage.blog');
    Route::get('/status/{id}',[BlogController::class,'blogStatus'])->name('status');
    Route::get('/blog-edit/{id}',[BlogController::class,'editBlog'])->name('edit.blog');
    Route::post('/blog-update',[BlogController::class,'updateBlog'])->name('blog.update');
    Route::post('/blog-delete',[BlogController::class,'deleteBlog'])->name('delete.blog');
});
