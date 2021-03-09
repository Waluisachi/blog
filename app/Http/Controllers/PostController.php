<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    return view('posts.index');
  }

  public function submit(Request $request)
  {
      $this->validate($request, [
        'data' => 'require'
      ]);

      Post::create([
        'user_id' => auth()->id(),
        'body' => $request->body
      ]);
      auth()->user()->posts()->create();
  }

  public function indetx()
  {

  }
}
