@extends('admin.layout.master')

@section('content')

<ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Category</li>
    </ol>
    <section class="content-header">
        <h1>
        Update Category
            
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
<form action="{{url('/admin/bloguser/category/update')}}" method="post">
                  @csrf          
<input type="hidden" name="catid" value="{{$update->id}}">

<div class="form-group">
    <label>Category Name</label>
    <input type="text" class="form-control" name="category" placeholder="Enter Category Name" value="{{$update->category}}">
</div>

<div class="form-group">
<label>Status</label>
    <select class="form-control" name="status">
      <option value="">-- Select Status --</option>
      <option value="1"<?php if($update->status == 1){echo "selected";} ?>>Active</option>
      <option value="0"<?php if($update->status == 0){echo "selected";} ?>>Inactive</option>
    </select>
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