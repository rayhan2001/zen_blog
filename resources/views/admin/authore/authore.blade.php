@extends('admin.master')
@section('title')
    Authore
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Authore Form</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('authore.store')}}" method="post">
                        @csrf
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center d-flex justify-content-between">
                                <h5 class="mb-0">Authore Add</h5>
                                <h4 class="text-success">{{session('message')}}</h4>
                            </div>
                            <hr/>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Authore Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="authore_name" class="form-control" id="inputEnterYourName" placeholder="Enter Authore Name" required>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Submit</button>
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
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($authores as $authore)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$authore->authore_name}}</td>
                        <td>
                            <a href="{{route('authore.edit',['id'=>$authore->id])}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{route('authore.delete')}}" method="post" style="display: inline-block;">
                                @csrf
                                <input type="hidden" name="authore_id" value="{{$authore->id}}">
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
