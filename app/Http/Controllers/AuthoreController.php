<?php

namespace App\Http\Controllers;

use App\Models\Authore;
use Illuminate\Http\Request;

class AuthoreController extends Controller
{
    public $authore;
    public function index(){
        return view('admin.authore.authore',[
            'authores'=>Authore::all()
        ]);
    }
    public function save(Request $request){
        $this->authore = new Authore();
        $this->authore->authore_name = $request->authore_name;
        $this->authore->save();
        return back()->with('message','Authore Add Successfully!');
    }
    public function authoreEdit($id){
        $this->authore=Authore::find($id);
        return view('admin.authore.authore_edit',[
            'authore'=>$this->authore,
        ]);
    }
    public function update(Request $request){
        $this->authore = Authore::find($request->authore_id);
        $this->authore->authore_name = $request->authore_name;
        $this->authore->save();
        return redirect(route('authore'))->with('message','Authore Update Successfully!');
    }
    public function delete(Request $request){
        $this->authore = Authore::find($request->authore_id);
        $this->authore->delete();
        return back()->with('message','Authore Delete Successfully');
    }
}
