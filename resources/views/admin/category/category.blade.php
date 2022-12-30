@extends('admin.master')
@section('title')
    Category
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Category Form</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('category.store')}}" method="post" id="catForm">
                        @csrf
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center d-flex justify-content-between">
                                <h5 class="mb-0">Category Add</h5>
                                <h4 class="text-success">{{session('message')}}</h4>
                            </div>
                            <hr/>
                            <div class="row mb-3">
                                <label for="category" class="col-sm-3 col-form-label">Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="category_name" class="form-control" id="category" placeholder="Enter Category Name">
                                    <span id="errorMessage" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5" id="catBtn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <table class="table mb-0">
                <thead>
                <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$category->category_name}}</td>
                        <td><p class="{{$category->status==1? 'text-primary':'text-warning'}}">{{$category->status==1? 'Active':'Inactive'}}</p></td>
                        <td>
                            <a href="{{route('edit',['id'=>$category->id])}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{route('delete')}}" method="post" style="display: inline-block;">
                                @csrf
                                <input type="hidden" name="category_id" value="{{$category->id}}">
                                <button type="submit" onclick="return confirm('Are You Sure!!')" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
