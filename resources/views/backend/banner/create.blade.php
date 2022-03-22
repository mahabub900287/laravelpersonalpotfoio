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
                    <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2">
                            <label for="">Title1</label>
                            <input type="text" name="title1" class="form-control">
                            @error('title1')
                                <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="">Title2</label>
                            <input type="text" name="title2" class="form-control">
                            @error('title2')
                                <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="">Btton Text</label>
                            <input type="text" name="btn_text" class="form-control">
                            @error('btn_text')
                              <span class="text-danger">{{$message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="file">Photo</label>
                            <input type="file" class="form-control"name="photo">
                            <span>Photo size 487px and 762px</span>
                            @error('photo')
                              <span class="text-danger">{{$message}}</span>
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
                                        <th>Image</th>
                                        <th>Title1</th>
                                        <th>Title2</th>
                                        <th>Btn_text</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($banners as $banner )
                                         <tr>
                                             <td>{{$banner->id}}</td>
                                             <td>
                                                 <img width="40" src="{{ asset('storage/banner/'.$banner->photo)}}" alt="">
                                             </td>
                                             <td>{{$banner->title1 }}</td>
                                             <td>{{$banner->title2 }}</td>
                                             <td>{{$banner->btn_text}}</td>
                                             <td><a href="{{route('banner.status',$banner->id)}}" class="btn btn-sm btn-{{$banner->status==1 ? "success":"warning"}}">{{ $banner->status == 1 ? "Active":"Dactive"}}</a></td>
                                             <td>
                                                <a href="{{ route('banner.edit',$banner->id) }}" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('banner.destroy',$banner->id) }}" class="btn btn-sm btn-danger">
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
