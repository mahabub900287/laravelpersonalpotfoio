@extends('admin.master')
@section('content')
@section('title','Service Diteles')
@include('sweetalert::alert')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="col-md-12">Add New User <span class="col-md-3"><a href="" class="btn btn-sm btn-success">User List</a></span></h6>
            </div>
            <div class="card-body">
                <form action="{{route('service.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-2">
                        <label for="name">Title</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="discription">Discripton</label>
                        <textarea type="text" name="discription" class="form-control" placeholder="Enter Your Discription"></textarea>
                        @error('discription')
                            <span class="text-danger">{{$message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="">Photo</label>
                        <input type="file" name="photo" class="form-control" placeholder="Enter Your Icon">
                        @error('photo')
                          <span class="text-danger">{{$message }}</span>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <button type="submit"class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
            <div class="col-lg-12 mt-5">
                <div class="card border-left-success shadow">
                    <div class="card-header">
                        <h6>Users list</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover" id="user_table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Photo</th>
                                    <th>Service Name</th>
                                    <th>Discription</th>
                                    <th>Status</th>
                                    <th width='100'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($services as $service )
                                     <tr>
                                         <td>{{$service->id}}</td>
                                         <td class="bg-dark text-center">
                                            <img width="40" src="{{asset('storage/service/'.$service->photo)}}" alt="">
                                        </td>
                                         <td>{{$service->name}}</td>
                                         <td>{{Str::limit($service->discription,30)}}</td>
                                         <td><a href="{{route('service.status',$service->id)}}" class="btn btn-sm btn-{{$service->status==1 ? "success":"warning"}}">{{ $service->status == 1 ? "Active":"Dactive"}}</a></td>
                                         <td>
                                            <a href="{{ route('service.edit',$service->id) }}" class="btn btn-sm btn-danger">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('service.destroy',$service->id)}}" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                         </td>
                                     </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </div>
    </div>
@endsection
