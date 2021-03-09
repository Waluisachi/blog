@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
      <div class="w-4/12 bg-white p-6 rounded-lg">
        <form class="" action="{{route('register')}}" method="post">
          @csrf
          <div class="mb-4">
            <label for="name" class="sr-only">Name</label>
            <input type="text" name="name" id="name" placeholder="Your Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name')}}">
            @error('name')
              <div class="text-red-500 mt-2 text-sm" >
                {{$message}}
              </div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="name" class="sr-only">Username</label>
            <input type="text" name="username" id="username" placeholder="Your Username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username')}}">
            @error('name')
              <div class="text-red-500 mt-2 text-sm" >
                {{$message}}
              </div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="name" class="sr-only">E-mail</label>
            <input type="email" name="email" id="email" placeholder="Your E-mail" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email')}}">
            @error('email')
              <div class="text-red-500 mt-2 text-sm" >
                {{$message}}
              </div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="name" class="sr-only">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Your Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">
            @error('password')
              <div class="text-red-500 mt-2 text-sm" >
                {{$message}}
              </div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="name" class="sr-only">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Your Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg " value="">

          </div>

          <div >
            <button type="submit" class="bg-green-500 text-white px-4 py-4 rounded font-medium w-full" name="button">Register</button>
          </div>
        </form>
      </div>
    </div>
@endsection
