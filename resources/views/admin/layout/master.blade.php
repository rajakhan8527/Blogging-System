<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> CMS Panel </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href="https://transloadit.edgly.net/releases/uppy/v0.29.0/dist/uppy.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://transloadit.edgly.net/releases/uppy/v0.29.0/dist/uppy.min.css" rel="stylesheet">

   <link href="{{asset('admin/css/style.css?id=88479922aa715b61c58a')}}" rel="stylesheet" type="text/css">
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
            .breadcrumb{
                margin-top: 12px;
            }
        
    </style>

    <!--Reference to jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#reset").click(function (e) {
                location.reload();
            });

            $('#table1').DataTable();

        });
    </script>
</head>
<body class="hold-transition skin-black fixed sidebar-mini">
  

<div class="modal modal-danger fade" id="confirm-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirm</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline delete">Delete</button>
            </div>
        </div>
    </div>
</div>


<div class="wrapper">
    @include('admin.layout.header')
    @include('admin.layout.sidebar')
    <div class="content-wrapper">   
      @yield('content')
     </div>
    @include('admin.layout.footer')
</div>
<script src="{{ asset('admin/js/vendor.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{asset('admin/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<script src="https://transloadit.edgly.net/releases/uppy/v0.29.0/dist/uppy.min.js"></script>
<script type="text/javascript">
    $(function() {
        var url = window.location.href;
        var $match = $('.sidebar a[href="'+ url +'"]');
        if($match.closest('li.treeview').length > 0 ) {
            $match.closest('li.treeview').addClass('active');
        }
        $match.closest('li').addClass('active');
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["September","October","November","December","January","February","March"],
            datasets: [{
                label: '# of Leads',
                data: [20,40,44,53,55,58,31],
                borderColor : "#46FF33",
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
            legend: {
                display: false
            },
              tooltips: {
                callbacks: {
                  label: function(tooltipItem) {
                console.log(tooltipItem)
                    return tooltipItem.yLabel;
                }
              }
            }
        }
    });
</script>

<!--Reference to jQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#reset").click(function (e) {
                location.reload();
            });

            $('#table1').DataTable();

        });
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
@yield('js')
</body>
</html>
