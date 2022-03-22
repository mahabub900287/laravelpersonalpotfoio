@extends('admin.master')
@section('content')
@section('title','MyWork Diteles')
@include('sweetalert::alert')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="col-md-12">Add New User <span class="col-md-3"><a href="" class="btn btn-sm btn-success">User List</a></span></h6>
            </div>
            <div class="card-body">
                <form action="{{route('mywork.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-2">
                        <label for="name">Title</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="title">Title</label>
                        <textarea type="text" name="title" class="form-control" placeholder="Enter Your Title"></textarea>
                        @error('title')
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
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th width='100'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($works as $work )
                                     <tr>
                                         <td>{{$work->id}}</td>
                                         <td class="bg-dark text-center">
                                            <img width="40" src="{{asset('storage/service/'.$work->photo)}}" alt="">
                                        </td>
                                         <td>{{$work->name}}</td>
                                         <td>{{Str::limit($work->title,30)}}</td>
                                         <td><a href="{{route('work.status',$work->id)}}" class="btn btn-sm btn-{{$work->status==1 ? "success":"warning"}}">{{ $work->status == 1 ? "Active":"Dactive"}}</a></td>
                                         <td>
                                            <a href="{{ route('work.edit',$work->id) }}" class="btn btn-sm btn-danger">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('work.destroy',$work->id)}}" class="btn btn-sm btn-danger">
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
