<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        $image = Image::all();

        

    return Inertia::render('Post/Index', compact('posts', 'image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Post/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $request->validate([
        'name'=> 'required|string|max:20',
        'slug'=> 'required|string',
        'descripcion'=> 'required|string',
        'extract'=>'required',
        'category_id'=> 'required',
        'image'=>"image"

       ]);

    $image_path = '';

    if($request->hasFile('image')) {
        $image_path = $request->file('image')->store('image', 'public');
    }

       $post =  Post::create($request->all());

       return Inertia::render('Post/Show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return Inertia::render('Post/Show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return Inertia::render('Post/Edit', compact('post'));
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
        

       $post = Post::find($id);
       $post->update($request->all());
       request()->session()->flash('message', 'hola');

        return Inertia::render('Post/Show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
         
       return redirect()->route('post.index')->with('message', 'hola que paso');
    }
}
