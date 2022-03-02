<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index(){
        $users = User::where('is_admin',0)->get();
        return view('back.page.dashboard',compact('users'));
    }
    public function switch($id,Request $request){
        $user=User::find($request->id);
        $user->onay=$request->statu=='true' ? 1 : 0;
        $user->save();
    }
}
