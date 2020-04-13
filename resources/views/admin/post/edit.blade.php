@extends('admin.layout.master')

@section('content')

<ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Post</li>
    </ol>
    <section class="content-header">
        <h1>
        Update Post
            
        </h1>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Sections</h3>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
        <li class="active pointer">
        <a>
            <i class="fa fa-info-circle" aria-hidden="true"></i> Summary
        </a>
    </li>
    </ul>
                </div>
            </div>
        </div>
         
       <div class="col-md-9">
       <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
 
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    </p>
                    @endif
                @endforeach
        </div>

        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Basic Information</h3>
                </div>
            <div class="box-body">
<form action="{{url('/admin/bloguser/post/update')}}" method="post" enctype="multipart/form-data">
                  @csrf          
<input type="hidden" name="pid" value="{{$update->id}}">

<div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{$update->title}}">
</div>

<div class="form-group">
    <label>Author</label>
    <input type="text" class="form-control" name="author" placeholder="Enter Author" value="{{$update->author}}">
</div>

<div class="form-group">
<label>Category</label>
    <select class="form-control" name="category_id">
      <option value="">-- Select Category --</option>
      @foreach($categories as $category)
       <option value="{{$category->id}}"{{ ($update->category_id == $category->id)?"selected":""}}>{{$category->category}}</option>
      @endforeach
    </select>
</div>

<div class="form-group">
    <label>Image</label>
    <img src="{{ asset('upload/post/'.$update->image) }}" style="height: 40%; width:20%;">
    <input type="file" class="form-control" name="image" >
</div>

<div class="form-group">
    <label>Description</label>
    <textarea class="form-control ckeditor" name="description" placeholder="Enter Description" rows="10"> {{$update->description}} </textarea>
</div>



<div class="box-footer">
    <button type="submit" name="submit" class="btn btn-primary pull-right">Save</button>
</div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</section>

@stop
