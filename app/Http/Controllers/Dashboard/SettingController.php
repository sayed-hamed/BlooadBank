<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $setting=Setting::first();
        return view('admin.pages.setting',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {

        $request->validate([
            'notification_setting_text' => 'required',
            'about_app' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'fb_link' => 'required',
            'inst_link' => 'required',
            'tw_link' => 'required',
            'yt_link' => 'required',
        ]);

        $sett=Setting::findOrFail($request->id);
        $sett->update([
            'notification_setting_text'=>$request->notification_setting_text,
            'about_app'=>$request->about_app,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'fb_link'=>$request->fb_link,
            'inst_link'=>$request->inst_link,
            'tw_link'=>$request->tw_link,
            'yt_link'=>$request->yt_link,
        ]);

        toastr()->success('Data has been saved successfully!');
        return redirect()->route('setting.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
