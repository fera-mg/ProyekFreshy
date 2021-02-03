<div class="content-wrapper">
        <?php 
        if($this->session->userdata('role')==0){
        ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>150</h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>
                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>44</h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                  <!-- <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li> -->
                  <!-- <li><a href="#sales-chart" data-toggle="tab">Donut</a></li> -->
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                </ul>
                <div class="tab-content no-padding">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                  <!-- <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div> -->
                </div>
              </div><!-- /.nav-tabs-custom -->

            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

              <!-- Map box -->
              <div class="box box-solid bg-light-blue-gradient">
                <div class="box-header">
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                    <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->

                  <i class="fa fa-map-marker"></i>
                  <h3 class="box-title">
                    Visitors
                  </h3>
                </div>
                <div class="box-body">
                  <div id="world-map" style="height: 250px; width: 100%;"></div>
                </div><!-- /.box-body-->
                <div class="box-footer no-border">
                  <div class="row">
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                      <div id="sparkline-1"></div>
                      <div class="knob-label">Visitors</div>
                    </div><!-- ./col -->
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                      <div id="sparkline-2"></div>
                      <div class="knob-label">Online</div>
                    </div><!-- ./col -->
                    <div class="col-xs-4 text-center">
                      <div id="sparkline-3"></div>
                      <div class="knob-label">Exists</div>
                    </div><!-- ./col -->
                  </div><!-- /.row -->
                </div>
              </div>
              <!-- /.box -->

            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
        <?php 
        } else {
        ?>
        <section class="content-header">
          <h1>
            Keranjang
          </h1>
        </section>
        <section class="content">
          <!-- Small boxes (Stat box) -->
            <?php 
            if (count($cart)>0){
            ?>
            <div class="row">
            <?php 
            function rupiah($angka){
	
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;
             
            }
            ?>
            
            
              <!-- Item -->
              <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">Keranjang Saya</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Satuan</th>
                            <th>Sub Total</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                        $total = 0;
                        $no=0;
                        foreach($cart as $data){
                            $res_produk = $this->db->get_where('tb_produk',array('id'=>$data->produk_id))->result();
                            $subtotal = $res_produk[0]->harga * $data->satuan;
                        ?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $res_produk[0]->nama_produk?></td>
                            <td><?= $data->satuan ?></td>
                            <td><?= rupiah($subtotal) ?></td>
                            <td><a href="<?= base_url('cart/edit?id='.$data->id.'&s=c') ?>" class="btn btn-block btn-primary btn-sm">Ubah</a></td>
                        </tr>
                        <?php 
                        $total += $subtotal;
                        } 
                        ?>
                        <tr style="background-color:#ecf0f4">
                            <td colspan="3"><b>Total</b></td>
                            <td colspan="2"><?= rupiah($total) ?></td>
                        </tr>
                    </tbody></table>
                    </div><!-- /.box-body -->
                </div>
              </div>
              <!-- End Item -->

              <div class="container">
                <div class="row">
                            <div class="col-md-6">
                                <a href="<?= base_url('cart/clear_cart') ?>" class="btn btn-block btn-primary">Hapus Semua Barang</a>
                            </div>
                            <div class="col-md-6">
                                <a href="<?= base_url('cart/act_invoice') ?>" class="btn btn-block btn-primary">Lanjut ke Pembayaran</a>
                            </div>
                </div>
              </div>
            </div>
            
            <?php } else {
              ?>
              <h4>Tidak ada barang dalam keranjang anda!</h4>
            <?php } ?>

        </section><!-- /.content -->

        <?php
        }
        ?>
      </div><!-- /.content-wrapper -->