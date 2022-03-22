@extends('admin.master')
@section('content')
@include('sweetalert::alert')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="col-md-12">Add New User <span class="col-md-3"><a href="" class="btn btn-sm btn-success">User List</a></span></h6>
                </div>
                <div class="card-body">
                    <form action="{{route('download.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2">
                            <input type="hidden" name="id" value="{{$down_info->id}}">
                            <label for="">Title</label>
                            <textarea type="text" name="title" class="form-control">{{ $down_info->title}}</textarea>
                            @error('title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="">Discripton</label>
                            <textarea type="text" name="discription" class="form-control">{{$down_info->discription}}</textarea>
                            @error('discription')
                                <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="">File</label>
                            <input type="file" name="file" class="form-control" value="{{$down_info->file}}">
                        </div>
                        <div class="mt-2">
                            <button type="submit"class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
