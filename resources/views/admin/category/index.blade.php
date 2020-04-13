@extends('admin.layout.master')

@section('content')
<ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Category</li>
    </ol>
    <section class="content-header">
        <h1>
        Manage Category
            <a href="{{url('/admin/bloguser/category/create')}}">
                <button class="btn btn-primary pull-right">ADD</button>
            </a>
        </h1>
    </section>


<link rel="icon" type="image/png" href="http://www.yogihosting.com/wp-content/themes/yogi-yogihosting/Images/favicon.ico">
    <meta charset="utf-8" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
    <style>
        
        .container {
            width: 1000px;
            margin: auto;
            font-size: 25px;
        }

           
        #content {
            border: solid 2px #CCC;
            padding: 10px;
            background-color: #FFF;
            margin-bottom: 10px;
        }

            #content p {
                color: #000000;
                margin: 5px;
                padding: 5px;
            }

            #content > p {
                color: #000000;
                margin: 5px;
                font-size:20px;
            }

            #content #table2 tr {
                background-color: #f1ebeb;
            }

            #content #table3 tr {
                background-color: #c5f3c8;
            }

            #content #table4 tr {
                background-color: #f3c5f3;
            }

        
    </style>
<section class="content">
        <div class="box box-primary">
            <div class="box-body">

            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
 
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    </p>
                    @endif
                @endforeach
        </div>
    
        <div id="content">
            <p><strong>Manage Category</strong></p>
            <table id="table1">
                <thead style="background:#00c0ef;color:#fff;">
                    <tr>
                        <th>Sn</th>
                        <th>Category Name</th>                        
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $sn=1; ?>
                @foreach($records as $record)
                 <tr>
                        <td>{{ $sn++ }}</td>
                        <td>{{ $record->category }}</td>                        
                        <td>{{ ($record->status == 1)?'Active':'Inactive' }}</td>
                        <td>{{ date('d-m-Y', strtotime($record->created_at)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($record->updated_at)) }}</td>
                        <td>
                          <a href=" {{url('/admin/bloguser/category/edit/' . $record->id) }}"><i class="fa fa-edit" style="color:green; font-size:20px;"></i></a>
                          <a href=" {{url('/admin/bloguser/category/delete/'. $record->id) }}" onclick="return confirm('Are sure, You want delete it?')"><i class="fa fa-trash" style="color:red; font-size:20px;"></i></a>
                        </td>
                        
                    </tr>
                @endforeach
                   
                </tbody>
            </table>

            
           
        </div>
    </div>
 </div>
</section>
   

@stop
@section('js')
 



@endsection
