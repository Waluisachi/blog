<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" initial-scale=1.0>
    <title>Blog</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
  </head>
  <body class="bg-gray-300">
    <nav class="p-6 bg-white flex justify-between mb-6">
      <ul class="flex items-center">
        <li class="text-red-800 mr-3">
          <a href="/" class="p-3">CYPBERPUNK2077</a>
        </li>
        <li>
          <a href="{{ route('dashboard')}}" class="p-3">Dashboard</a>
        </li>
        <li>
          <a href="{{ route('posts')}}" class="p-3">Add Posts</a>
        </li>
        <!-- <li>
          <a href="{{ route('createPost')}}" class="p-3">Create Posts</a>
        </li> -->
      </ul>

      <ul class="flex items-center">
        @auth
          <li>
            <a href="" class="p-3">{{auth()->user()->username}}</a>
          </li>
          <li>
            <form class="inline p-3" action="{{route('logout')}}" method="post">
              @csrf
              <button type="submit" name="button">Logout</button>
            </form>

          </li>
        @endauth

        @guest
          <li>
            <a href="{{ route('login')}}" class="p-3">Login</a>
          </li>
          <li>
            <a href="{{ route('register')}}" class="p-3">Register</a>
          </li>
        @endguest

      </ul>
    </nav>
    @yield('content')
  </body>
</html>
