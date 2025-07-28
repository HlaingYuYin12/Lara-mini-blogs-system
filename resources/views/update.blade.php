@extends('layouts.master')

@section('content')


    <div class="container mt-5">
        <form action="{{route('blogUpdate')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    @if ($data->image == null)
                        <img src="{{asset('default_image/default_image.png')}}" id="output" alt="" class="img-thumbnail w-100 h-100">
                    @else
                        <img src="{{asset('uploads/'.$data->image)}}" alt="" id="output" class="img-thumbnail w-100 h-100">
                    @endif

                    <input type="file" name="image" id="" class="form-control my-2 @error('image') is-invalid @enderror "  onchange="loadFile(event)">
                    @error('image')
                    <div class="invalid-feedback">{{$message}} </div>
                    @enderror


                </div>
                <div class="col-lg-6">

                    <input type="hidden" name="blog_id" value="{{$data->id}}" class="form-control">
                    <input type="hidden" name="old_image" value="{{$data->image}}" class="form-control">

                    <input type="text" name="title" id="" placeholder="Enter title..."  value="{{old('title',$data->title)}}" class="form-control my-2 @error('title') is-invalid @enderror">
                    @error('title')
                    <div class="invalid-feedback">{{$message}} </div>
                    @enderror


                    <textarea name="description" id="" cols="30" rows="10"  class="form-control my-2 @error('description') is-invalid @enderror" placeholder="Enter description...">{{old('description',$data->description)}}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{$message}} </div>
                    @enderror


                    <div class="">
                        <input type="number" name="fee" id="" class="form-control my-2 @error('fee') is-invalid @enderror"   value="{{old('fee',$data->fee)}}" placeholder="Enter fee...">
                        @error('fee')
                            <div class="invalid-feedback">{{$message}} </div>
                        @enderror


                        <input type="text" name="address" id="" class="form-control my-2 @error('address') is-invalid @enderror"   value="{{old('address',$data->address)}}" placeholder="Enter address...">
                        @error('address')
                            <div class="invalid-feedback">{{$message}} </div>
                        @enderror

                        <select name="rating" id="" class="form-control my-2 @error('rating') is-invalid @enderror my-2" >
                            <option value="">Choose Rating...</option>
                            <option value="1" @if(old('rating',$data->rating ==1)) selected @endif> 1 Stars</option>
                            <option value="2" @if(old('rating',$data->rating ==2)) selected @endif> 2 Stars</option>
                            <option value="3" @if(old('rating',$data->rating ==3)) selected @endif> 3 Stars</option>
                            <option value="4" @if(old('rating',$data->rating ==4)) selected @endif> 4 Stars</option>
                            <option value="5" @if(old('rating',$data->rating ==5)) selected @endif> 5 Stars</option>
                        </select>
                        @error('rating')
                            <div class="invalid-feedback">{{$message}} </div>
                        @enderror

                        {{-- <button type="button" class="btn btn-sm bg-black text-white mt-4" onclick="history.back()">Back</button>
                        <button type="submit" class="btn btn-sm bg-danger text-white mt-4" onclick="history.back()">Update</button> --}}

                        <a href="{{route('blogList')}}"><button type="button" class="btn btn-sm bg-black text-white mt-4" >Back</button></a>
                        <a href="{{route('blogUpdate')}}"><button type="submit" class="btn btn-sm bg-danger text-white mt-4" >Update</button></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
