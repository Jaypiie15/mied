  <div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>MCC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Meat Cuts Catalogue</span>
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
              <span class="hidden-xs">Hello</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->

              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4">
                    <a href="logout.php">Logout  <i class="fa fa-sign-out"></i></a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
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
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>

          </a>
        </li>

        <li>
          <a href="#">
            <i class="fa fa-cut"></i> <span>Meat Cuts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('show-meat') }}"><i class="fa fa-circle-o"></i> View Meat Cuts</a></li>
            <li><a href="{{ route('add-meatcuts') }}"><i class="fa fa-circle-o"></i> Add Meat Cuts</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin.php"><i class="fa fa-circle-o"></i> Administrators</a></li>
            <li><a href="{{ route('register') }}"><i class="fa fa-circle-o"></i> Add Users</a></li>
          </ul>
        </li>


        <li>
          <a href="{{ route('edit-commodity') }}">
            <i class="fa fa-pencil"></i> <span>Edit Commodity</span>

          </a>
        </li>

          <li>
          <a href="{{ route('edit-cut') }}">
            <i class="fa fa-pencil"></i> <span>Edit Meat Cut Type</span>

          </a>
        </li>

          <li>
          <a href="{{ route('edit-hscode') }}">
            <i class="fa fa-pencil"></i> <span>Edit HS Code</span>

          </a>
        </li>

        <li>
          <a href="edit-country.php">
            <i class="fa fa-pencil"></i> <span>Edit Country</span>

          </a>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>