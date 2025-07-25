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
                <div class="row">
                    {{-- <div class="col text-tertiary">Count - {{count($data)}} </div> --}}
                    <div class="col offset-6">
                        <form action="{{route('blogList')}}" method="get">
                            <div class="input-group mb-3">
                                <input type="text"name="searchKey" value="{{request('searchKey')}}" class="form-control" placeholder="Search keywords..." aria-label="Recipient’s username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                Search<i class="ms-1 fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
                @foreach ($data as $item)
                    <div class="card shadow-sm my-2">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class=""> {{$item->title}}</div>

                                <div class=""> {{$item->created_at->format('j-F-Y')}} </div> {{-- collection ဖြစ်မှ format သုံးလို့ရမယ် --}}
                            </div>
                            <div class="my-2 text-muted">
                                {{Str::words($item->description , 20 , ' ...')}}  {{-- word ဘယ်နှစ်ခုစာပြမှာလဲ --}}
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <i class="fa-solid me-2 fa-money-bill-1 text-primary"></i>{{$item->fee}} mmk |
                                    <i class="fa-solid me-2 fa-location-dot text-danger"></i>{{$item->address}} |
                                    <i class="fa-solid me-2 fa-star text-warning"></i>{{$item->rating}} |
                                </div>
                                <div class="">
                                    <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                                    <button class="btn btn-dark"><i class="fa-solid fa-pen-to-square"></i></button>
                                    {{-- <a href="{{url('/blogs/delete/'.$item->id)}}"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a> --}}
                                    {{-- or  --}}
                                    <a href="{{route('blogDelete',$item->id)}}"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                {{-- pagination --}}
                <span class="d-flex justify-content-end mt-3">{{$data->links()}}</span>

            </div>
        </div>
    </div>
@endsection


