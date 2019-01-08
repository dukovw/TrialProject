<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
class UserPostController extends Controller
{

    public function index()
    {
        $posts = Posts::orderBy('created_at', 'max', 'asc')->paginate(5);
        return view ('public.index')->withPost($posts);
    }


    public function show($id)
    {
        $post = Posts::find($id);
        return view ('public.show')->withPost($post);
    }


    public function ShowPostOnTheTemplate(){
        $posts = Posts::orderBy('created_at', 'max', 'asc')->get();
        return view ('layouts._layout')->withPost($posts);
    }
}
