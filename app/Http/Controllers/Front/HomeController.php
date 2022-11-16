<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Post;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {

        $posts=Post::take(9)->get();
        $donations=DonationRequest::take(4)->get();
        return view('front.home',compact('posts','donations'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function blog($id)
    {
        $post=Post::findOrFail($id);
        $posts=Post::take(8)->get();
        return view('front.blog',compact('post','posts'));
    }

    public function articles()
    {
        $posts=Post::all();
        return view('front.blogs',compact('posts'));
    }

    public function contact()
    {

        return view('front.contact');
    }

    public function contactForm(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'title'=>'required',
            'desc'=>'required',
        ]);

        Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'subject'=>$request->title,
            'message'=>$request->desc,
        ]);


        return redirect()->route('contact')->with('message','Thanks for your message');
    }


    public function donation()
    {
        $donations=DonationRequest::paginate(8);
        return view('front.donation',compact('donations'));
    }

    public function singleDonation($id)
    {
        $donation=DonationRequest::findOrFail($id);
        return view('front.inside-donation',compact('donation'));
    }

    public function toggleFavourite(Request $request)
    {
        $toggle=$request->user()->favourites()->toggle($request->post_id);
    }


}
