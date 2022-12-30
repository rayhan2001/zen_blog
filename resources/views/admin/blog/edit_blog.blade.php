@extends('admin.master')
@section('title')
    Blog Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Blog Form</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Blog Edit</h5>
                        </div>
                        <hr/>
                        <form action="{{route('blog.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{$blog->id}}">
                            <div class="row mb-3">
                                <label for="category" class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select name="category_id" id="category" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$blog->category_id == $category->id? 'selected':''}} >{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="author" class="col-sm-3 col-form-label">Author</label>
                                <div class="col-sm-9">
                                    <select name="author_id" id="author" class="form-control">
                                        <option value="">Select One</option>
                                        @foreach($authors as $author)
                                            <option value="{{$author->id}}"{{$blog->author_id ==$author->id? 'selected':''}}>{{$author->authore_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="title" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control" id="title" value="{{$blog->title}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="slug" class="col-sm-3 col-form-label">Slug</label>
                                <div class="col-sm-9">
                                    <input type="text" name="slug" class="form-control" id="slug" value="{{$blog->slug}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="description" id="description" rows="3" >{{$blog->description}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control" id="image">
                                    <img src="{{asset($blog->image)}}" width="100" class="img-thumbnail mt-2" alt="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="date" class="form-control" id="date" value="{{$blog->date}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="blog_type" class="col-sm-3 col-form-label">Blog Type</label>
                                <div class="col-sm-9">
                                    <select name="blog_type" id="blog_type" class="form-control">
                                        <option value="">Select One</option>
                                        <option value="popular" {{$blog->blog_type=='popular'? 'selected':''}} >Popular</option>
                                        <option value="trending" {{$blog->blog_type=='trending'? 'selected':''}}>Trending</option>
                                        <option value="latest" {{$blog->blog_type=='latest'? 'selected':''}}>Latest</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9 mt-1">
                                    <input type="radio" name="status" id="status" value="1" {{$blog->status==1? 'checked':''}}>Published &nbsp;
                                    <input type="radio" name="status" id="status" value="0" {{$blog->status==0? 'checked':''}}>Unpublished
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
