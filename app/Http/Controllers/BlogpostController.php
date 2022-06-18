<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogpostRequest;
use App\Models\Blogpost;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BlogpostController extends Controller
{

    public function  __construct()
    {
        return $this->middleware('auth')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Blogpost::all();

        return Inertia::render('Posts', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogpostRequest $request)
    {
        $data = $request->validated();

        auth()->user()->posts()->create($data);
        return redirect(route('posts.create'))->with('sucess','Post added successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blogpost  $blogpost
     * @return \Illuminate\Http\Response
     */
    public function show(Blogpost $post)
    { 
        $post = [
            'id'=>$post->id,
            'body'=>$post->body,
            'userid'=>$post->user->id,
            'username'=>$post->user->name,
            'useravatar'=>$post->user->avatar,
            'likersCount'=>$post->likersCount(),
            'publish_at' => $post->publish_at(),
            'isLikedBy' =>Auth::check() ? $post->isLikedBy(Auth::user()) : false

        ];
        return Inertia::render('Posts/Single-post',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blogpost  $blogpost
     * @return \Illuminate\Http\Response
     */
    public function edit(Blogpost $post)
    {
        $this->authorize('edit',$post);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blogpost  $blogpost
     * @return \Illuminate\Http\Response
     */
    public function update(BlogpostRequest $request, Blogpost $post)
    {
        $this->authorize('update',$post);
        $data =$request->validated();
        $post->update($data);
        return redirect(route('posts.index'))->with('Post updated succesfull ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blogpost  $blogpost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blogpost $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
       return redirect(route('posts.index'));
    }
}
