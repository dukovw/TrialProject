<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use App\Posts;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //неправильное использование where
        //неправильное название переменной
        //неправильно передаю параметр
        //$posts = DB::table('posts')->where('created_at', 5)->get();
       /* $posts = DB::table('posts')
            ->latest()
            ->first();
       */
        $posts = Posts::orderBy('created_at', 'asc')->paginate(5);
        return view ('posts.index')->withPost($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',]);

        $post=new Posts();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        $request->session()->flash('success', 'Post published successful!');

        return redirect()->route('post.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Posts::find($id);
        return view ('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);
        return view ('posts.edit')->withPost($post);

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
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',]);

        $post=Posts::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        $request->session()->flash('success', 'You succesfully changed post');

        return redirect()->route('post.show',$post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Posts::find($id);

            $post->delete();

          return redirect ('/post');
        //return view('posts.index');
    }
}