@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quản lí Thể Loại</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(!isset($genre))
                        {!! Form::open(['route'=>'genre.store','method'=>'POST']) !!}
                        @else 
                        {!! Form::open(['route'=>['genre.update',$genre->id],'method'=>'PUT']) !!}
                        @endif
                   {!! Form::open(['route' => 'genre.store','method'=>'POST']) !!}
                   <div class="form-group">  
                   {!! Form::label('title', 'title', []) !!}
                   {!! Form::text('title', isset($genre) ? $genre->title : '', ['class'=>'form-control','placeholder'=>'nhập title','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                </div> 
                <div class="form-group">  
                    {!! Form::label('description', 'description', []) !!}
                    {!! Form::textarea('description',  isset($genre) ? $genre->description : '', ['style'=>'resiz:none','class'=>'form-control','placeholder'=>'nhập description']) !!}
                 </div> 
                 <div class="form-group">  
                    {!! Form::label('status', 'status', []) !!}
                    {!! Form::text('status',  isset($genre) ? $genre->status : '', ['class'=>'form-control','placeholder'=>'nhập status']) !!}
                 </div> 
                 <div class="form-group">  
                    {!! Form::label('slug', 'slug', []) !!}
                    {!! Form::text('slug',  isset($genre) ? $genre->slug : '', ['class'=>'form-control','placeholder'=>'nhập status','id'=>'convert_slug']) !!}
                 </div> 
                 @if(!isset($genre))
                 {!! Form::submit('thêm dữ liệu ', ['style'=>'margin:10px','class'=>'btn btn-success']) !!}
                 @else 
                 {!! Form::submit('Sửa Dữ Liệu ', ['style'=>'margin:10px','class'=>'btn btn-success']) !!}
                 @endif
                 {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">status</th>
            <th scope="col">slug</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($list as $item ) 
          <tr>
          
            <th scope="row">{{$item ->id}}</th>
            <td>{{$item->title}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->status}}</td>
            <td>{{$item->slug}}</td>
            <td>{!! Form::open([
                'method'=>'delete',
                'route' => ['genre.destroy',
                 $item->id]
            ,'onsubmit'=>'return confirm("xóa?")']) !!}
            {!! Form::submit('xóa', ['class'=> 'btn btn-danger ']) !!}
                 {!! Form::close() !!}
                 <a href="{{route('genre.edit',$item->id)}}" class="btn btn-warning" style="margin-top:5px">Sửa </a>
                </td>
               
          </tr>
     @endforeach
        </tbody>
      </table>
    
</div>
@endsection
