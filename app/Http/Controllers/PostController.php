<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
  public function index()
  {
      $posts = Post::latest()->with(['user', 'likes'])->paginate(5);
    return view('posts.index', ['posts' => $posts]);
  }

  public function submit(Request $request)
  {
      $this->validate($request, [
        'body' => 'required'
      ]);

      $request->user()->posts()->create([
        'body' => $request->body
      ]);

      return back()->with('status', "Post Uploaded.");
  }

  public function destroy(Post $post)  {
    if (!$post->ownedBy(auth()->user())) {
      dd("No");
    }
    $post->delete();
    return back();
  }

  public function createPost() {
    return view('posts.create');
  }


  public function addPost(Request $request) {
    $this->validate($request, [
      'title' => 'required',
      'image' => 'required|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'body' => 'required'
    ]);

    $image = $request->file('image');
    $imagename = time().'.'.$image->getClientOriginalExtension();
    $destinationPath = public_path('/images');
    $image->move($destinationPath, $imagename);

    $request->user()->posts()->create([
      'title' => $request->title,
      'image' => $imagename,
      'body'  => $request->body
    ]);

    return back();
  }

}
