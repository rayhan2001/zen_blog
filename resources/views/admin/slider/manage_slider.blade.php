@extends('admin.master')
@section('title')
    Slider List
@endsection
@section('content')
    <h6 class="mb-0 text-uppercase mt-5">Slider list</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr class="text-center">
                        <th>Sl</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $slider)
                        <tr class="text-center">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$slider->title}}</td>
                            <td>{{substr($slider->description,0,50)}}</td>
                            <td>
                                <img src="{{asset($slider->image)}}" width="100" class="img-fluid" alt="...">
                            </td>
                            <td><p class="{{$slider->status==1? 'text-success':'text-warning'}}">{{$slider->status==1? 'Active':'Inactive'}}</p></td>
                            <td>
                                @if($slider->status==1)
                                <a href="{{route('slider.status',['id'=>$slider->id])}}" class="btn btn-info"><i class="bi bi-hand-thumbs-up"></i></a>
                                @else
                                <a href="{{route('slider.status',['id'=>$slider->id])}}" class="btn btn-warning"><i class="bi bi-hand-thumbs-down"></i></a>
                                @endif

                                <a href="{{route('edit.slider',['id'=>$slider->id])}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>

                                <form action="{{route('delete.slider')}}" method="post" style="display: inline-block">
                                    @csrf
                                    <input type="hidden" name="slider_id" value="{{$slider->id}}">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure!!')"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
