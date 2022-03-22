@extends('admin.master')
@section('content')
@section('title','Add Skill')
@include('sweetalert::alert')
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{route('skill.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Skill Title">
                            @error('title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="">Persen</label>
                            <input type="text" name="persen" class="form-control" placeholder="Example:90%">
                            @error('persen')
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
                                        <th>Persen</th>
                                        <th>Status</th>
                                        <th width='100'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($skills as $skill )
                                         <tr>
                                             <td>{{$skill->id}}</td>
                                             <td>{{$skill->title}}</td>
                                             <td>{{$skill->persen}}</td>
                                             <td><a href="{{route('skill.status',$skill->id)}}" class="btn btn-sm btn-{{$skill->status==1 ? "success":"warning"}}">{{ $skill->status == 1 ? "Active":"Dactive"}}</a></td>
                                             <td>
                                                <a href="{{route('skill.destroy',$skill->id)}}" class="btn btn-sm btn-danger">
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
