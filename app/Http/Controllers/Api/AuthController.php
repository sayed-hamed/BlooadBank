<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Mail\ResetPassword;
use App\Models\BloodType;
use App\Models\Client;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{


    public function register(Request $request)
    {


        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:clients',
            'd_o_b' => 'required',
            'last_donation_date' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            'pin_code' => 'required',
//            'blood_type_id'=>'required',
//            'city_id'=>'required',
        ]);

        if ($validator->fails()) {
            return 'please try again';
        }

        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = Str::random(60);
        $client->save();

        $response = [
            'status' => 1,
            'message' => 'Added Successfully',
            'api_token' => $client->api_token,
            'data' => $client,
        ];

        return $response;

    }


    public function login(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'phone' => 'required',
            'password' => 'required',
        ]);


        if ($validator->fails()) {
            return 'please try again';
        }

        $client = Client::where('phone', $request->phone)->first();
        if ($client) {
            if (Hash::check($request->password, $client->password)) {
                return $response = [
                    'status' => 1,
                    'message' => 'successfully',
                    'api_token' => $client->api_token,
                    'data' => $client,
                ];


            } else {
                return 'error on pass';
            }
        } else {
            return 'errrrrrrror';
        }


    }


    public function profile(Request $request)
    {
        $validation = validator()->make($request->all(), [
            'password' => 'confirmed',
            'email' => Rule::unique('clients'),
            'phone' => Rule::unique('clients'),
        ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            $response = [
                'status' => 1,
                'message' => $validation->errors()->first(),
                'data' => $data,
            ];

        }

            $loginUser = $request->user();
            $loginUser->update($request->all());

            if ($request->has('password')) {
                $loginUser->password = bcrypt($request->password);
            }
            $loginUser->save();

//            if ($request->has('governorate_id')) {
//                $loginUser->city()->detach($request->city_id);
//                $loginUser->city()->attach($request->city_id);
//            }
//
//            if ($request->has('blood_type_id')) {
//                $bloodType = BloodType::where('name', $request->blood_type)->first();
//                $loginUser->bloodType()->detach($bloodType->id);
//                $loginUser->bloodType()->attach($bloodType->id);
//            }

            return 'modified successfully';


        }



    public function resetPassword(Request $request)
    {
        $validation = validator()->make($request->all(), [

            'phone' => 'required',
        ]);

        if ($validation->fails()) {
            $data = $validation->errors();
            $response = [
                'status' => 1,
                'message' => $validation->errors()->first(),
                'data' => $data,
            ];
        }

            $user = Client::where('phone', $request->phone)->first();
            if ($user) {

                $code = rand(1111, 9999);
                $update = $user->update(['pin_code' => $code]);

                if ($update) {

                    Mail::to($user->email)
                        ->bcc('gadsayed964@gmail.com')
                        ->send(new ResetPassword($code));
                }
            }


        }

        public function password(Request $request)
        {
            $validation=validator()->make($request->all(),[
               'pin_code'=>'required',
               'password'=>'required|confirmed',
            ]);

            if ($validation->fails()) {
                $data = $validation->errors();
                $response = [
                    'status' => 1,
                    'message' => $validation->errors()->first(),
                    'data' => $data,
                ];
            }

            $user=Client::where('pin_code',$request->pin_code)->where('pin_code','!=','0')->first();

            if ($user)
            {
                $user->password=bcrypt($request->password);
                $user->pin_code=null;

                if ($user->save())
                {
                    return 'password modified successfully';
                }
                else{
                    return  'error!!:please try again';
                }
            }

            else{
                return 'invalide code please try again';
            }

        }




        public function registerToken(Request $request)
        {
            $validation=validator()->make($request->all(),[
               'token'=>'required',
               'platform'=>'required|in:android,ios',
            ]);


            if ($validation->fails()) {
                $data = $validation->errors();
                $response = [
                    'status' => 1,
                    'message' => $validation->errors()->first(),
                    'data' => $data,
                ];
            }

            $token=$request->user()->token()->create($request->all());

            $response = [
                'status' => 1,
                'message' => 'Token Registered Successfully',
                'token' => $token,
            ];

            return $response;


        }



    public function removeToken(Request $request)
    {
        $validation=validator()->make($request->all(),[
            'token'=>'required',
        ]);


        if ($validation->fails()) {
            $data = $validation->errors();
            $response = [
                'status' => 1,
                'message' => $validation->errors()->first(),
                'data' => $data,
            ];
        }

        Token::where('token',$request->token)->delete();

        $response = [
            'status' => 1,
            'message' => 'Token Dleted Successfully',
        ];

        return $response;


    }





































}
