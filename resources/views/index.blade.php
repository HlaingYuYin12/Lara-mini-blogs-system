@extends('layouts.master')

@section('content')
    {{-- <h1 class="text-danger"><i class=" fa fa-user"></i>This is title</h1> --}}


    <div class="container m-5">
        <div class="row">
            <div class="col-lg-4">

                {{-- alert --}}
                {{-- @if (session('createSuccess'))
                    <div class="alert alert-warning alert-dismissible fade show w-25" role="alert">
                        {{session('createSuccess')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label='Close'></button>
                    </div>
                @endif --}}


                <form action="{{ route('blogCreate')}}" method="post" enctype="multipart/form-data">

                    @csrf
                    {{-- image preview --}}
                    <img src="" alt="" id="output" class="w-100 m-2">
                    <input type="file"  name="image" id="" class="form-control  @error('image') is-invalid @enderror" onchange="loadFile(event)">
                    @error('image')
                    <div class="invalid-feedback">{{$message}} </div>
                    @enderror


                    <input type="text" name="title" value="{{old('title')}}" id="" class="form-control my-2  @error('title') is-invalid @enderror" placeholder="Enter title...">
                    @error('title')
                    <div class="invalid-feedback">{{$message}} </div>
                    @enderror


                    <textarea name="description" id="" cols="30" rows="10" class="form-control my-2  @error('description') is-invalid @enderror" placeholder="Enter Description..." >{{old('description')}}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{$message}} </div>
                    @enderror


                    <input type="number" name="fee" id="" value="{{old('fee')}}" class="form-control my-2  @error('fee') is-invalid @enderror" placeholder="Enter Blog Fee...">
                    @error('fee')
                    <div class="invalid-feedback">{{$message}} </div>
                    @enderror


                    <input type="text" name="address" id="" value="{{old('address')}}" class="form-control my-2  @error('address') is-invalid @enderror" placeholder="Enter BLog Address...">
                    @error('address')
                    <div class="invalid-feedback">{{$message}} </div>
                    @enderror


                    <select name="rating" id="" class="form-control my-2 @error('rating') is-invalid @enderror">
                        <option value="">Choose Rating...</option>
                        <option value="1"@if (old('rating')==1) selected @endif> 1 Stars</option>
                        <option value="2"@if (old('rating')==2) selected @endif> 2 Stars</option>
                        <option value="3"@if (old('rating')==3) selected @endif> 3 Stars</option>
                        <option value="4"@if (old('rating')==4) selected @endif> 4 Stars</option>
                        <option value="5"@if (old('rating')==5) selected @endif> 5 Stars</option>
                    </select>
                    @error('rating')
                    <div class="invalid-feedback">{{$message}} </div>
                    @enderror


                    <input type="submit" value="Create" class="btn btn-danger my-4">
                </form>
            </div>
            <div class="col-lg offset-1 mt-2">
                <div class="card shadow-sm my-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class=""> This is title</div>
                            <div class=""> 24/7/2025</div>
                        </div>
                        <div class="my-2 text-muted">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, quisquam suscipit nemo vel necessitatibus eveniet beatae sint ratione facilis temporibus, nisi repellat saepe, asperiores aliquam? Illo et eius non quas.
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="">
                                <i class="fa-solid me-2 fa-money-bill-1 text-primary"></i>10000 mmk |
                                <i class="fa-solid me-2 fa-location-dot text-danger"></i>Yangon |
                                <i class="fa-solid me-2 fa-star text-warning"></i>5 |
                            </div>
                            <div class="">
                                <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                                <button class="btn btn-dark"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


