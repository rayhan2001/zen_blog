@extends('admin.master')
@section('title')
    Edit Category
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Category Form</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('category.update')}}" method="post">
                        @csrf
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center d-flex justify-content-between">
                                <h5 class="mb-0">Category Edit</h5>
                                <h4 class="text-success">{{session('message')}}</h4>
                            </div>
                            <hr/>
                            <input type="hidden" name="category_id" value="{{$category->id}}">
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="category_name" class="form-control" id="inputEnterYourName" value="{{$category->category_name}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input {{ $category->status == 1 ? 'checked' : '' }} class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="1">
                                        <label class="form-check-label" for="flexRadioDefault1">Active</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" {{ $category->status == 0 ? 'checked' : '' }}  type="radio" name="status" id="flexRadioDefault2" value="0">
                                        <label class="form-check-label" for="flexRadioDefault2">Inactive</label>
                                    </div>
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
