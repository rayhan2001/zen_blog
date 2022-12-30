@extends('admin.master')
@section('title')
    Edit Authore
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Authore Form</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('authore.update')}}" method="post">
                        @csrf
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center d-flex justify-content-between">
                                <h5 class="mb-0">Authore Edit</h5>
                                <h4 class="text-success">{{session('message')}}</h4>
                            </div>
                            <hr/>
                            <input type="hidden" name="authore_id" value="{{$authore->id}}">
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Authore Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="authore_name" class="form-control" id="inputEnterYourName" value="{{$authore->authore_name}}">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-success px-5">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
