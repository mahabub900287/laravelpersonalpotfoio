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
                    <form action="{{route('download.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2">
                            <label for="">Title</label>
                            <textarea type="text" name="title" class="form-control"> </textarea>
                            @error('title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="">Discripton</label>
                            <textarea type="text" name="discription" class="form-control"></textarea>
                            @error('discription')
                                <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="">File</label>
                            <input type="file" name="file" class="form-control">
                            @error('file')
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
                                        <th>Title</th>
                                        <th>Discription</th>
                                        <th>FIle</th>
                                        <th>Status</th>
                                        <th width='100'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($download as $down )
                                         <tr>
                                             <td>{{$down->id}}</td>
                                             <td>{{Str::limit($down->title,30)}}</td>
                                             <td>{{Str::limit($down->discription, 50)}}</td>
                                             <td>{{Str::limit($down->file,40)}}</td>
                                             <td><a href="{{route('download.status',$down->id)}}" class="btn btn-sm btn-{{$down->status==1 ? "success":"warning"}}">{{ $down->status == 1 ? "Active":"Dactive"}}</a></td>
                                             <td>
                                                <a href="{{ route('download.edit',$down->id) }}" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{route('download.destroy',$down->id)}}" class="btn btn-sm btn-danger">
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
