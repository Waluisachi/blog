@extends('layouts.app')

@section('content')
<div class="flex justify-center ">
  <div class="w-8/12 bg-white p-6 rounded-lg shadow-lg">
    <p class="mb-5">All Posts</p>
    <div class="grid grid-rows-2 md:grid-rows-6">
        @if ($posts->count())
             @foreach ($posts as $post)
              <div class="mb-10 shadow-lg">
                <a href="" class="font-bold">{{ $post->user->username }}</a>
                <span class="text-grey-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

                <p class="mb-3">{{ $post->body }}</p>
                @auth
                  @if($post->ownedBy(auth()->user()))
                    <div class="">
                      <form class="mr-1" action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                      </form>
                    </div>
                  @endif
                @endauth
                <div class="flex items-center">
                  @auth
                  @if(!$post->likedBy(auth()->user()))
                    <form class="mr-1" action="{{ route('posts.likes', $post) }}" method="post">
                      @csrf
                      <button type="submit" class="text-blue-500">Like</button>
                    </form>
                    @else
                    <form class="mr-1" action="{{ route('posts.likes', $post) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-yellow-500">Unike</button>
                    </form>

                  @endif
                  @endauth
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
</div>
@endsection
