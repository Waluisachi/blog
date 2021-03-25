@extends('layouts.app')

@section('content')
    <div class="flex justify-center ">
      <div class="w-8/12 bg-white p-6 rounded-lg shadow-lg">
        Dashboard
        <div class="grid grid-rows-2 md:grid-rows-6">
          <div class="mb-10 shadow-lg">
            <h3>TITLE</h3>
            <h4> <strong>#team</strong> </h4>
            <div class="">
              <img src="{{ asset('storage/app/public/images/alex-chumak-zGuBURGGmdY-unsplash.jpg')}}" alt="">
            </div>
          </div>
          <div class="mb-10 shadow-lg">2</div>
          <div class="mb-10 shadow-lg">3</div>
        </div>
      </div>
    </div>
@endsection
