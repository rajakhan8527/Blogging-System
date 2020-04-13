@extends('admin.layout.master')

@section('content')

<section class="content-header">
    <h1>
        Dashboard
    </h1>
</section>
<section class="content">
    <div class="row">

        <div class="col-lg-3">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <!-- <h3>0</h3> -->

                    <p>Users</p>
                </div>
                <a href="{{url('/admin/bloguser')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        
        <div class="col-lg-3">
            <div class="small-box bg-green">
                <div class="inner">
                    <!-- <h3>194</h3> -->

                    <p>Category</p>
                </div>
                <a href="{{url('/admin/bloguser/category')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        
        
    </div>
    <!-- <div class="row">
        <div class="col-lg-6">
            <h4 class="mb-5">Monthly Leads</h4>
            <canvas id="myChart" width="400"></canvas>
        </div>
    </div> -->


</section>


@stop
@section('js')


@endsection
