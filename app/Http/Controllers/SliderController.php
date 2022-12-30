<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        return view('admin.slider.add_slider');
    }

    public function saveSlider(Request $request){
        $validator = $request->validate([
            'image' => 'required',
            'title' => 'required',
            'status' => 'required',
        ], [
            'image.required' => 'This field is required !!',
            'title.required' => 'This field is required !!',
            'status.required' => 'This field is required !!',
        ]);
        $slider = new Slider();
        $slider->image = $this->saveImage($request);
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->status = $request->status;
        $slider->save();
        return back();
    }
    public function saveImage($request){
        $image = $request->file('image');
        $imageName = rand().'.'.$image->getClientOriginalExtension();
        $dir ='asset/slider/';
        $imageUrl = $dir.$imageName;
        $image->move($dir,$imageName);
        return $imageUrl;
    }

    public function manageSlider(){
        return view('admin.slider.manage_slider',[
            'sliders'=>Slider::all()
        ]);
    }
    public function editSlider($id){
        $slider = Slider::find($id);
        return view('admin.slider.edit_slider',[
            'slider'=>$slider,
        ]);
    }
    public function sliderStatus($id){
        $slider = Slider::find($id);
        if ($slider->status==1){
            $slider->status=0;
        }else{
            $slider->status=1;
        }
        $slider->save();
        return back();
    }
    public function updateSlider(Request $request){
        $slider = Slider::find($request->slider_id);
        if ($request->file('image')){
            if ($slider->image !=null){
                unlink($slider->image);
            }
            $slider->image = $this->saveImage($request);
        }
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->status = $request->status;
        $slider->save();
        return redirect(route('manage.slider'));
    }
    public function deleteSlider(Request $request){
        $slider = Slider::find($request->slider_id);
        $slider->delete();
        return back();
    }
}
