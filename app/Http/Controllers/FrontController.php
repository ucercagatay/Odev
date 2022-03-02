<?php

namespace App\Http\Controllers;

use App\Models\Bolum;
use App\Models\Fakulte;
use App\Models\Gonderi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function __construct(){

        view()->share('fakulte',Fakulte::all());
    }
    public function index(){
        $gonderiler = Gonderi::all();
        return view('front.page.homepage',compact('gonderiler'));
    }
    public function fakulteler_index($id){
        $fakulte_single = Fakulte::where('id',$id)->first();
        $bolum = Bolum::where('fakulte_id',$id)->get();

        return view('front.page.fakulteler',compact('fakulte_single','bolum'));
    }
    public function mezunlar_index($id){
        $bolum_single = Bolum::where('id',$id)->first();
        $mezunlar = User::where('bolum_id',$id)->get();
        return view('front.page.mezunlar',compact('bolum_single','mezunlar'));
    }
    public function post_create(Request $request){
        $request->validate([
            'description'=>['required','min:10']
        ]);
        $post = new Gonderi();
        $post->icerik = $request->description;
        $post->user_id = Auth::id();
        if ($request->hasFile('image')) {
            //benzersiz isim oluşturma algoritması
            $imageName =Str::limit(Str::slug($request->description),20) . '.' . $request->image->getClientOriginalExtension();
           //imageyi uploadın içine koyuyor
            $request->image->move(public_path('uploads'), $imageName);
            $post->image = 'uploads/' . $imageName;
        }
        $post->save();

        //bir önceki sayfaya yönlendiriyor
        return redirect()->back();
    }

    public function mezun_info($id){
        $user = User::find($id);
        //json düz yazı
        return response()->json($user);
    }
    public function user_update(Request $request){
        //gelen inputtaki kurallar
        $request->validate([
            'name'=>'required|max:40|string',
            'phone_number'=>'required|numeric',
        ]);
        $user = Auth::user();

        $user->name = $request->name;
        $user->calistigi_yer = $request->calistigi_yer;
        $user->pozisyon = $request->pozisyon;
        $user->medeni_durumu = $request->medeni_durum;
        $user->tel_no = $request->phone_number;
        if ($request->hasFile('image')) {
            $imageName =Str::limit(Str::slug($request->tc_no),20) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imageName);
            $user->image = 'uploads/' . $imageName;
        }
        $user->save();
        return redirect()->route('homepage');
    }
}
