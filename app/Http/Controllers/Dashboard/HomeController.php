<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {
        $count_client=Client::all()->count();
        $count_donation=DonationRequest::all()->count();
        $count_post=Post::all()->count();
        $count_city=City::all()->count();



        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 350, 'height' => 200])
//            ->labels(['Clients', 'Donation Requests','Posts','Cities'])
            ->datasets([
                [
                    "label" => "Clients",
                    'backgroundColor' => ['#ec5858'],
                    'data' => [$count_client]
                ],
                [
                    "label" => "Donation Requests",
                    'backgroundColor' => ['#81b214'],
                    'data' => [$count_donation]
                ],
                [
                    "label" => "Posts",
                    'backgroundColor' => ['#ff9642'],
                    'data' => [$count_post]
                ],
                [
                    "label" => "Cities",
                    'backgroundColor' => ['#BCD9FF'],
                    'data' => [$count_city]
                ],


            ])
            ->options([]);


        $chartjs_2 = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 340, 'height' => 200])
            ->labels(['Clients', 'Donation Requests','Posts','Cities'])
            ->datasets([
                [
                    'backgroundColor' => ['#ec5858', '#81b214','#ff9642'],
                    'data' => [$count_client, $count_donation,$count_post,$count_city]
                ]
            ])
            ->options([]);
        return view('admin.dashboard',compact('chartjs','chartjs_2'));
    }

}
