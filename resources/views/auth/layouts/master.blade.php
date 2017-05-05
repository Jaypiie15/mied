<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta http-equiv="cache-control" content="private, max-age=0, no-cache">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="expires" content="0"> 
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('resources/src/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('resources/src/dist/css/AdminLTE.min.css') }}">
  <link href="{{ asset('resources/src/plugins/animate.css/animate.min.css') }}" rel="stylesheet">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('resources/src/plugins/iCheck/square/blue.css') }}">
  <link rel="stylesheet" href="{{ asset('resources/src/dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('resources/src/plugins/parsleyjs/src/parsley.css') }}">
  <link rel="stylesheet" href="{{ asset('resources/src/build/sweetalert.css') }}">
  <script type="text/javascript" src="{{ asset('resources/src/build/sweetalert-dev.js') }}"></script>
  <script type="text/javascript" src="{{ asset('resources/src/build/sweetalert.min.js') }}"></script>



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
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


  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
</body>
<script src="{{ asset('resources/src/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('resources/src/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- iCheck -->
<script src="{{ asset('resources/src/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('resources/src/plugins/parsleyjs/parsley.js') }}"></script>
<script src="{{ asset('resources/src/plugins/parsleyjs/dist/parsley.min.js') }}"></script>
<script src="{{ asset('resources/src/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('resources/src/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('resources/src/dist/js/app.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('resources/src/dist/js/demo.js') }}"></script>

<script src="{{ asset('resources/src/plugins/select2/select2.full.min.js') }}"></script>
    <!-- Datatables -->
<script type="text/javascript">
  $('#form').parsley();

</script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

</html>
