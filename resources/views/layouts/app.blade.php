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
        <li>
          <a href="{{route('home')}}" class="p-3">Home</a>
        </li>
        <li>
          <a href="{{ route('dashboard')}}" class="p-3">Dashboard</a>
        </li>
        <li>
          <a href="{{ route('posts')}}" class="p-3">Posts</a>
        </li>
      </ul>

      <ul class="flex items-center">
        @auth
          <li>
            <a href="" class="p-3">Phil</a>
          </li>
          <li>
            <a href="{{route('logout')}}" class="p-3">Logout</a>
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