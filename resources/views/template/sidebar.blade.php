<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if(auth()->user()->foto != null){?>
                <!-- <img src="http://localhost/laravel8-com/public/img/<?php echo auth()->user()->foto?>" class="img-circle" alt="User Image"> -->
                <img src="{{ asset('img') }}/<?= auth()->user()->foto?>" class="brand-image img-circle elevation-3" style="opacity: .8;width:40px;height:40px;" alt="User Image">
          <?php }else{ ?>
                <img src="{{ asset('AdminLTE2/dist/img/avatar5.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <?php } ?>
        </div>
        <div class="pull-left info">
          <p> <?php echo auth()->user()->name ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Menu Task</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('task') }}"><i class="fa fa-circle-o"></i>Data Task</a></li>
            
          </ul>
        </li>
       

        <?php if(auth()->user()->level == 10){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Menu 2</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{ url('user') }}"><i class="fa fa-circle-o"></i>Data User</a></li>
            <li><a href="{{ url('home') }}"><i class="fa fa-circle-o"></i>Home </a></li>
          </ul>
        </li>
        <?php } ?>

       
        <?php if(auth()->user()->level == 10){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Menu 3</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{ url('user') }}"><i class="fa fa-circle-o"></i>Data User</a></li>
            <li><a href="{{ url('home') }}"><i class="fa fa-circle-o"></i>Home </a></li>
          </ul>
        </li>
        <?php } ?>

       
       
        <li><a href="{{ route('logout') }}">
            <i class="fa  fa-sign-out"></i>
             <span>Logout</span></a>
            </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>