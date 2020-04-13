@extends('admin.layout.master')

@section('content')

<ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Comment</li>
    </ol>
    <section class="content-header">
        <h1>
        Update Comment
            
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
<form action="{{url('/admin/bloguser/post/comment/update')}}" method="post">
                  @csrf          
<input type="hidden" name="cid" value="{{$update->id}}">

<div class="form-group">
<label>Comment</label>
    <textarea class="form-control ckeditor" name="comment" placeholder="Enter Comment" rows="10"> {{$update->comment}} </textarea>
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