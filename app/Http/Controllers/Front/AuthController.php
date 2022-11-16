<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\Government;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{




    public function index()
    {
        $govers=Government::all();
        $types=BloodType::all();
        return view('front.signup',compact('govers','types'));
    }

    public function getCities($id)
    {
        $cities=City::where('govern_id',$id)->pluck('name','id');
        return $cities;

    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'date'=>'required',
            'blood_type'=>'required',
            'Govern_id'=>'required',
            'phone'=>'required',
            'don_date'=>'required',
            'password'=>'required',
        ]);

        $pass=bcrypt($request->password);

        Client::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'blood_type_id'=>$request->blood_type,
            'd_o_b'=>$request->date,
            'last_donation_date'=>$request->don_date,
            'phone'=>$request->phone,
            'password'=>$pass,

        ]);
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('home');
    }


    public function signin()
    {

        return view('front.signin');
    }

    public function doSign(Request $request)
    {
        //dd(bcrypt(123));
        $request->validate([
            'phone'=>'required',
            'password'=>'required',
        ]);

        $credentials = $request->only('phone', 'password');


        if (auth('client')->attempt($credentials))
        {
            return redirect()->route('home');
        }
        else{
            echo 'لا يمكن الدخول';
        }
    }

    public function logout()
    {
        \auth('client')->logout();
        return redirect()->route('home');
    }


}
