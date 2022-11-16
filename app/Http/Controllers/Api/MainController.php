<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\City;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Government;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Token;
use Illuminate\Http\Request;

class MainController extends Controller
{


    public function government(){
        $governments=Government::all();
        return $governments;
    }

    public function city(){
        $cities=City::all();
        return $cities;
    }

    public function setting(){
        $setting=Setting::first();
        return $setting;
    }

//store data
    public function contact(Request $request)
    {
        $validation=validator()->make($request->all(),[
            'subject'=>'required',
            'message'=>'required',
        ]);

        $contact=Contact::create($request->all());

        $response = [
            'status' => 1,
            'message' => 'your data sent successfully',
            'data' => $contact,
        ];

        return $response;

    }

    public function category(){
        $categories=Category::all();
        return $categories;
    }


    public function bloodType(){
        $types=BloodType::all();
        return $types;
    }

    public function postFavourite(Request $request)
    {
        $validation=validator()->make($request->all(),[
            'post_id'=>'required|exists:posts,id',
        ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            $response = [
                'status' => 1,
                'message' => $validation->errors()->first(),
                'data' => $data,
            ];
        }

        $toggle=$request->user()->favourites()->toggle($request->post_id);
        return 'success';
    }

    public function myfavourite(Request $request)
    {
        $posts=$request->user()->favourites()->latest()->paginate(20);

        return $posts;
    }

    public function posts()
    {
        $posts=Post::with('category')->paginate(10);
        return $posts;
    }


    public function donationRequest(Request $request)
    {
        $validation=validator()->make($request->all(),[
            'name'=>'required',
            'phone'=>'required',
            'num_bags'=>'required',
            'hospital_address'=>'required',
            'age'=>'required',
            'details'=>'required',
            'longitude'=>'required',
            'latitude'=>'required',
            'client_id'=>'required',
            'government_id'=>'required',
            'blood_type_id'=>'required',
            'city_id'=>'required',
        ]);


        if ($validation->fails()) {
            $data = $validation->errors();
            $response = [
                'status' => 1,
                'message' => $validation->errors()->first(),
                'data' => $data,
            ];
        }


        $donation=$request->user()->donationRequest()->create($request->all());

        $clientIds=$donation->city->governorate->clients()->whereHas('bloodtypes',function ($q) use ($request,$donation){
           $q->where('blood__types.name',$donation->blood_type);
        })->pluck('clients.id')->toArray();

        if (count($clientIds))
        {
            $notification=$donation->notification()->create([
                'title'=>'يوجد حالة تبرع قريبة منك',
                'content'=>$donation->blood_type.'نحتاج متبرع لفصيلة : ',
            ]);

            $notification->clients()->attach($clientIds);

            $tokens=Token::whereIn('client_id',$clientIds)->where('token','!=',null)->pluck('token')->toArray();

            if (count($tokens))
            {
                $title=$notification->title;
                $body=$notification->content;
                $data=[
                    'donation_request_id'=>$donation->id,
                ];
            }

            //call firebase function

            $response = [
                'status' => 1,
                'message' => 'Message Sent Successfully',
            ];

            return $response;
        }


    }

}
