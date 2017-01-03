<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PostUser;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        return $this->middleware('post');

    }


    public function index()
    {
        //
        $user = Auth::user();

        return view('admin.posts.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //
       // $title = $request->old('title');
        $user_id = Auth::user()->id;

        $title = $request->input('title');
        $text = $request->input('text');

        $imagen = $request->file('file');
        $name = time() . '.' . $imagen->getClientOriginalExtension();
        Image::make($imagen)->resize(300,300)->save( public_path('uploads/images/' . $name));

        $post = Post::create(['title' => $title, 'text' => $text, 'path' => $name]);

        $post_id = $post->id;

        PostUser::create(['user_id' => $user_id, 'post_id' => $post_id]);


        return redirect('/posts');




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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        $post = Post::findOrFail($id);

        unlink(public_path('uploads/images/') . $post->path );

        $post->delete();
    }

    public function showPosts(){

        $userId = Auth::user()->id;

        $posts = PostUser::where('user_id', $userId);

        return view('admin.posts.edit', ['posts' => $posts]);

    }
}
