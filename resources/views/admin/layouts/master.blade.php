<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta id="token" name="csrf-token" content="{{csrf_token()}}">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('resources/src/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('resources/src/dist/css/AdminLTE.min.css') }}">
  <link href="{{ asset('resources/src/plugins/animate.css/animate.min.css') }}" rel="stylesheet">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('resources/src/dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('resources/src/plugins/parsleyjs/src/parsley.css') }}">

      <!-- PNotify -->
    <link href="{{ asset('resources/src/plugins/pnotify/dist/pnotify.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('resources/src/build/sweetalert.css') }}">
  <script type="text/javascript" src="{{ asset('resources/src/build/sweetalert-dev.js') }}"></script>
  <script type="text/javascript" src="{{ asset('resources/src/build/sweetalert.min.js') }}"></script>


  <link href="{{ asset('resources/src/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('resources/src/plugins/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('resources/src/plugins/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('resources/src/plugins/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('resources/src/plugins/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('resources/src/plugins/select2/select2.min.css') }}">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
@yield('content')
      <div class="row">

        <!-- /.col -->
     
        <!-- /.col -->
      </div>




 
  <!-- /.form-box -->

        </div>
        <!-- /.box-body -->


      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>National Meat Inspection Services   Meat Cuts Catalogue  <?php echo date('Y')?></strong>
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
</body>
<!-- jQuery 2.2.3 -->
<script src="{{ asset('resources/src/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('resources/src/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('resources/src/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('resources/src/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('resources/src/dist/js/app.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('resources/src/dist/js/demo.js') }}"></script>

    <!-- PNotify -->
    <script src="{{ asset('resources/src/plugins/pnotify/dist/pnotify.js') }}"></script>


<script src="{{ asset('resources/src/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('resources/src/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('resources/src/plugins/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('resources/src/plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('resources/src/plugins/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('resources/src/plugins/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('resources/src/plugins/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('resources/src/plugins/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('resources/src/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('resources/src/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('resources/src/plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('resources/src/plugins/datatables.net-scroller/js/datatables.scroller.min.js') }}"></script>
<script src="{{ asset('resources/src/plugins/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('resources/src/plugins/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('resources/src/plugins/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('resources/src/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('resorces/src/plugins/parsleyjs/parsley.js') }}"></script>
<script src="{{ asset('resources/src/plugins/parsleyjs/dist/parsley.min.js') }}"></script>
  <script src="{{ asset('resources/src/pnotify/dist/pnotify.js') }}"></script>

    <!-- Datatables -->
<script type="text/javascript">
  $('#form').parsley();

</script>
  <script>
    var selDiv = "";
        
    document.addEventListener("DOMContentLoaded", init, false);
    
    function init() {
        document.querySelector('#files').addEventListener('change', handleFileSelect, false);
        selDiv = document.querySelector("#selectedFiles");
    }
        
    function handleFileSelect(e) {
        
        if(!e.target.files) return;
        
        selDiv.innerHTML = "";
        
        var files = e.target.files;
        for(var i=0; i<files.length; i++) {
            var f = files[i];
            
            selDiv.innerHTML += f.name + "<br/>";

        }
        
    }
    </script>
    <script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
      });
</script>
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdf",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };



        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>



</html>
