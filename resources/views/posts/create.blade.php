@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
      <div class="w-4/12 bg-white p-6 rounded-lg">
        <h2 class="mb-3">Upload post</h2>
        @if(session('status'))
        <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
             {{session('status')}}
        </div>
        @endif

        <form class="" action="{{route('login')}}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="mb-4">
            <label for="name" class="sr-only">Title</label>
            <input type="text" name="title" id="email" placeholder="Title" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email')}}">
            @error('email')
              <div class="text-red-500 mt-2 text-sm" >
                {{$message}}
              </div>
            @enderror
          </div>

          <div class="mb-4">
            <div class="flex items-center">
              <input type="file" name="image" id="image" class="mr-2">
              <label for="image">Photo</label>
            </div>
          </div>

          <div class="mb-4">
            <label for="body" class="sr-only">Body</label>
            <textarea name="body" id="body" rows="4" cols="30" class="bg-grey-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Add Post!"></textarea>

            @error('body')
              <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div>
            <button type="submit" class="bg-green-500 text-white px-4 py-4 rounded font-medium w-full" name="button">Post</button>
          </div>
        </form>
      </div>
    </div>
@endsection
