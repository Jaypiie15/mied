  <div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('main') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>IMC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">ImportedMeatCatalogue</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            @if(Auth::user())
              <span class="hidden-xs"><label style="padding:10px;font-weight:bolder" class="label label-warning">Howdy, {{Auth::user()->firstname }} <i class="fa fa-caret-down"></i> </label></span>
            </a>
            
            <ul class="dropdown-menu">
              <!-- User image -->

              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4">
                    <a href="{{ route('admin-logout') }}">Logout  <i class="fa fa-sign-out"></i></a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              @else
              <span class="hidden-xs"><label style="padding:10px;font-weight:bolder" class="label label-warning"> Welcome Hacker!</label></span>
              @endif
              <!-- Menu Footer-->

        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

        <li>
          <a href="{{ route('main') }}">
            <i class="fa fa-eye"></i> <span>Show Meatcuts</span>

          </a>
        </li>

        <li>
          <a href="{{ route('show-dots')}}">
            <i class="fa fa-question-circle"></i> <span>Definition of Terms</span>

          </a>
        </li>

        <li>
          <a href="{{ route('show-faqs')}}">
            <i class="fa fa-question-circle"></i> <span>FAQ's</span>

          </a>
        </li>



      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>