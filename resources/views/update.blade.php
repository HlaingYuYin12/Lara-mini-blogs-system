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

                    <input type="file" name="image" id="" class="form-control my-2" onchange="loadFile(event)">
                </div>
                <div class="col-lg-6">
                    <input type="text" name="title" id="" placeholder="Enter title..." value="{{$data->title}}" class="form-control my-2">

                    <textarea name="description" id="" cols="30" rows="10" class="form-control my-2" placeholder="Enter description...">{{$data->description}}</textarea>

                    <div class="">
                        <input type="number" name="fee" id="" class="form-control my-2" value="{{$data->fee}}" placeholder="Enter fee...">

                        <input type="text" name="address" id="" class="form-control my-2" value="{{$data->address}}" placeholder="Enter address...">

                        <select name="rating" id="" class="form-control my-2 my-2">
                            <option value="">Choose Rating...</option>
                            <option value="1" @if($data->rating ==1) selected @endif> 1 Stars</option>
                            <option value="2" @if($data->rating ==2) selected @endif> 2 Stars</option>
                            <option value="3" @if($data->rating ==3) selected @endif> 3 Stars</option>
                            <option value="4" @if($data->rating ==4) selected @endif> 4 Stars</option>
                            <option value="5" @if($data->rating ==5) selected @endif> 5 Stars</option>
                        </select>

                        <button type="button" class="btn btn-sm bg-black text-white mt-4" onclick="history.back()">Back</button>
                        <button type="submit" class="btn btn-sm bg-danger text-white mt-4" onclick="history.back()">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
