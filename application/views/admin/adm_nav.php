<div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?= base_url() ?>" class="logo"><b>FRESHY</b>.COM</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- Notifications: style can be found in dropdown.less -->
              
              <!-- Tasks: style can be found in dropdown.less -->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= base_url('assets/admin-lte/') ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?= ucfirst($this->session->userdata("nama")) ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Ubah Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?= base_url('admin/act_logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?= base_url('assets/admin-lte/') ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?= ucfirst($this->session->userdata("nama")) ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <?php 
            if ($this->session->userdata('role') == 1){
            ?>
            <!-- Nav User -->
            <li class="<?= $page == 'admin.index'?"active":""?>">
              <a href="<?= base_url('admin') ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="<?= $page == 'cart.index'?"active":""?>">
              <a href="<?= base_url('cart') ?>">
                <i class="fa fa-th"></i> <span>Keranjang</span>
                <?php
                $resusr = $this->db->get_where('tb_user',array('username'=>$this->session->userdata('username')))->result();
                $count_cart = $this->db->get_where('tb_cart',array('user_id'=>$resusr[0]->id))->num_rows();
                if($count_cart > 0){
                  ?>
                <small class="label pull-right bg-yellow"><?=$count_cart?></small>
                  <?php
                }
                ?>
              </a>
            </li>
            <li class="<?= $page == 'invoice'?"active":""?>">
              <a href="<?= base_url('cart/invoice') ?>">
                <i class="fa fa-dashboard"></i> <span>Invoice</span>
              </a>
            </li>
            <!-- End Nav User -->
            <?php
            } elseif($this->session->userdata('role') == 0){
            ?>
            <!-- Nav Admin -->
            <li class="<?= $page == 'admin.index'?"active":""?>">
              <a href="<?= base_url('admin') ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="<?= $page == 'invoice'?"active":""?>">
              <a href="<?= base_url('cart/adm_invoice') ?>">
                <i class="fa fa-dashboard"></i> <span>Invoice</span>
              </a>
            </li>
            <li class="<?= $page == 'barang'?"active":""?>">
              <a href="<?= base_url('product') ?>">
                <i class="fa fa-dashboard"></i> <span>Barang</span>
              </a>
            </li>
            <li class="<?= $page == 'user'?"active":""?>">
              <a href="<?= base_url('user') ?>">
                <i class="fa fa-dashboard"></i> <span>User</span>
              </a>
            </li>
            <!-- End Nav Admin -->
            <?php
            }
            ?>

            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>