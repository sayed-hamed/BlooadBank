<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts=Post::paginate(15);
        $cats=Category::all();
        return view('admin.pages.post',compact('posts','cats'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
           'title'=>'required',
           'desc'=>'required',
           'cat_id'=>'required',
           'img'=>'required',
        ]);


        if ($request->file('img'))
        {
            $filename=$request->img->getClientOriginalName();
            $file=$request->file('img')->storeAs('posts',$filename,'upload');
        }

        Post::create([
           'title'=>$request->title,
           'desc'=>$request->desc,
            'img'=>$filename,
            'cat_id'=>$request->cat_id,
        ]);

        toastr()->success('Data has been saved successfully!');
        return redirect()->route('post.index');


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
            'title'=>'required',
            'desc'=>'required',
            'cat_id'=>'required',
            'img'=>'required',
        ]);

        $old_name=Post::findOrFail($request->id)->img;
        if ($request->file('img'))
        {
            Storage::disk('upload')->delete('posts/'.$old_name);
            $filename=$request->img->getClientOriginalName();
            $file=$request->file('img')->storeAs('posts',$filename,'upload');
        }

        $post=Post::findOrFail($request->id);

        $post->update([
            'title'=>$request->title,
            'desc'=>$request->desc,
            'img'=>$filename,
            'cat_id'=>$request->cat_id,
        ]);

        toastr()->success('Data has been saved successfully!');
        return redirect()->route('post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $post=Post::findOrFail($request->id);
        Storage::disk('upload')->delete('posts/'.$post->img);

        $post->delete();
        toastr()->error('Data has been Deleted successfully!');
        return redirect()->route('post.index');
    }
}
