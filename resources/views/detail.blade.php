@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                @if ($data->image == null)
                    <img src="{{asset('default_image/default_image.png')}}" alt="" class="img-thumbnail w-100 h-100">
                @else
                    <img src="{{asset('uploads/'.$data->image)}}" alt="" class="img-thumbnail w-100 h-100">
                @endif
            </div>
            <div class="col-lg-6">
                <h3>{{ $data->title }} </h3>
                <hr>
                <p class="text-muted">{{ $data->description }}</p>
                <div class="">
                    <i class="fa-solid me-2 fa-money-bill-1 text-primary"></i>{{ $data->fee }} mmk |
                    <i class="fa-solid me-2 fa-location-dot text-danger"></i>{{ $data->address }} |
                    <i class="fa-solid me-2 fa-star text-warning"></i>{{ $data->rating }} |
                </div>

                {{-- <a href="{{route('blogList')}}"><button class="btn btn-sm bg-black text-white mt-4">Back</button></a> --}}
                {{-- or --}}
                <button class="btn btn-sm bg-black text-white mt-4" onclick="history.back()">Back</button>
            </div>
        </div>
    </div>
@endsection
