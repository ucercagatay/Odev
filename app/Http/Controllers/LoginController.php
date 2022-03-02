<?php

namespace App\Http\Controllers;

use App\Models\Bolum;
use App\Models\Fakulte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index(){
        $bolum = Bolum::all();
        $fakulte = Fakulte::all();
        return view('front.page.login',compact('bolum','fakulte'));
    }

    public function login(Request $request){
        //login nesnesi oluşuyor
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('homepage');
        }
        else{
            return redirect()->back()->with('error','Email veya şifre hatalı');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('loginn');
    }
    public function create_user(Request $request){
        $request->validate([
           'name'=>'required|max:40|string',
           'tc_no'=>'required|numeric',
           'country'=>'required',
           'bolum'=>'required',
           'email'=>'required|email',
           'fakulte'=>'required',
           'password'=>'required',
            'phone_number'=>'required|numeric',
            'graduated_date'=>'required'
        ]);
        //yeni user oluşturuyor datatablede
        $user = new User();
        $user->tc_kimlik=$request->tc_no;
        $user->name=$request->name;
        $user->email = $request->email;
        $user->mezuniyet_yili=$request->graduated_date;
        $user->sehir=$request->country;
        $user->fakulte_id=$request->fakulte;
        $user->bolum_id=$request->bolum;
        $user->calistigi_yer=$request->company;
        $user->pozisyon=$request->position;
        $user->medeni_durumu=$request->medeni_hal;
        $user->tel_no=$request->phone_number;
        $user->password=bcrypt($request->password);
        //resim inputu varsa kaydedyoruz
        if ($request->hasFile('image')) {
            $imageName =Str::limit(Str::slug($request->tc_no),20) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imageName);
            $user->image = 'uploads/' . $imageName;
        }
        //başarıyla save edince login oluyoruz anasayfaya gdiyoruz
        if($user->save()){
            Auth::login($user);
            return redirect()->route('homepage');
        }
    }

}
