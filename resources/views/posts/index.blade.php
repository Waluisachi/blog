@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
      <div class="w-8/12 bg-white p-6 rounded-lg">
        <form class="mb-4" action="{{ route('posts') }}" method="post">
          @csrf
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
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded font-medium">Post</button>
          </div>
        </form>

        @if ($posts->count())
             @foreach ($posts as $post)
              <div class="mb-4">
                <a href="" class="font-bold">{{ $post->user->username }}</a>
                <span class="text-grey-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

                <p class="mb-3">{{ $post->body }}</p>

                <div class="flex items-center">
                  <form class="mr-1" action="{{ route('posts.likes', $post->id) }}" method="post">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                  </form>

                  <form class="mr-1" action="" method="post">
                    @csrf
                    <button type="submit" class="text-blue-500">Unike</button>
                  </form>

                  <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }} </span>
                </div>
              </div>
            @endforeach

            {{ $posts->links() }}
          @else
          <p>There are No Posts creeated.</p>
        @endif
      </div>
    </div>
@endsection
