@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="col-md-9">Update Banner<span class="col-md-3"><a href="{{ route('banner.create') }}"class="btn btn-sm btn-success">User List</a></span></h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('banner.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2">
                            <input type="hidden" name="id" value="{{$banner_info->id}}">
                            <label for="">Title1</label>
                            <input type="text" name="title1" class="form-control" value="{{$banner_info->title1}}">
                            @error('title1')
                                <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="">Title2</label>
                            <input type="text" name="title2" class="form-control" value="{{$banner_info->title2}}">
                            @error('title2')
                                <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="">Btton Text</label>
                            <input type="text" name="btn_text" class="form-control" value="{{$banner_info->btn_text}}">
                            @error('btn_text')
                              <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="file">Photo</label>
                            <input type="file" class="form-control"name="photo" value="{{ $banner_info->photo }}">
                            @error('photo')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <button type="submit"class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
