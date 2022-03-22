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
                    <form action="{{route('service.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2">
                            <input type="hidden" name="id" value="{{$service->id}}">
                            <label for="">name</label>
                            <textarea type="text" name="name" class="form-control">{{ $service->name}}</textarea>
                            @error('service')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="">Discripton</label>
                            <textarea type="text" name="discription" class="form-control">{{$service->discription}}</textarea>
                            @error('discription')
                                <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="">File</label>
                            <input type="file" name="photo" class="form-control" value="{{$service->photo}}">
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
