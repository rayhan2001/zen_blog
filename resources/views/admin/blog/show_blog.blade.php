@extends('admin.master')
@section('title')
    Manage Blog
@endsection
@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table mb-0">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">Sl</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Authore Name</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Date</th>
                        <th scope="col">Blog Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blogs as $blog)
                        <tr class="text-center">
                            <td scope="row">{{$loop->iteration}}</td>
                            <td scope="col">{{$blog->category_name}}</td>
                            <td scope="col">{{$blog->authore_name}}</td>
                            <td scope="col">{{substr($blog->title,0,10)}}</td>
                            <td scope="col">{{substr($blog->slug,0,10)}}</td>
                            <td scope="col">{{substr($blog->description,0,20)}}</td>
                            <td scope="col">
                                <img src="{{asset($blog->image)}}" class="rounded-circle w-100" alt="dasd">
                            </td>
                            <td scope="col">{{$blog->date}}</td>
                            <td scope="col">{{$blog->blog_type}}</td>
                            <td scope="col">{{$blog->status==1 ? 'Published':'Unpublished'}}</td>
                            <td>
                                @if($blog->status==1)
                                    <a href="{{route('status',['id'=>$blog->id])}}" class="btn btn-info"><i class="bi bi-hand-thumbs-up"></i></a>
                                @else
                                    <a href="{{route('status',['id'=>$blog->id])}}" class="btn btn-warning"><i class="bi bi-hand-thumbs-down"></i></a>
                                @endif
                                <a href="{{route('edit.blog',['id'=>$blog->id])}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>

                                <form action="{{route('delete.blog')}}" method="post" style="display: inline-block">
                                    @csrf
                                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure!!')"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
