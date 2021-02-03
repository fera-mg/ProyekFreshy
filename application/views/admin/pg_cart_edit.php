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
            <?php if($this->session->firstlogin == 1){?>
            <div class="row">
              <div class="box box-solid bg-aqua">
                <div class="box-header">
                  <h3 class="box-title">Selamat datang di FRESHY.COM!</h3>
                </div>
                <div class="box-body">
                  Box class: <code>.box.box-solid.bg-aqua</code>
                  <p>
                    amber, microbrewery abbey hydrometer, brewpub ale lauter tun saccharification oxidized barrel.
                    berliner weisse wort chiller adjunct hydrometer alcohol aau!
                    sour/acidic sour/acidic chocolate malt ipa ipa hydrometer.
                  </p>
                </div><!-- /.box-body -->
              </div>
            </div><!-- /.row -->
            <?php
            }
            $this->session->firstlogin = 0;
            ?>

            <div class="row">
            <?php 
            function rupiah($angka){
	
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;
             
            }
            
            foreach ($product as $data) {?>
              <!-- Item -->
              <div class="col-md-12">
                <div class="box box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Edit Barang</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body text-center">
                    <div class="row">
                        <div class="col-md-6">
                        <h3><?=$data->nama_produk?></h3>
                        <img src="<?= base_url('uploads/product/'.$data->gambar) ?>">
                        <h4>Harga Satuan: <?=rupiah($data->harga)?></h4>
                        <p>Stok <?php if($data->stok < 5){
                          echo "< 5";
                        } elseif ($data->stok == 0 ){
                          echo "Habis";
                        } else {
                          echo  $data->stok;
                        }?></p>
                        </div>
                        <div class="col-md-4 col-xs-8">
                        <form action="<?=base_url('cart/act_edit')?>" method="post">
                        <input type="hidden" name="s" value="<?=$this->input->get('s')?>">
                        <input type="hidden" name="id" value="<?=$cart[0]->id?>">
                        <input type="hidden" name="idbarang" value="<?=$data->id?>">
                            <div class="form-group">
                                <label for="">Jumlah Satuan: </label>
                                <input id="id_set_val_satuan" class="form-control" name="jml" type="text" required="" autofocus="" placeholder="Masukkan Jumlah Satuan" value="<?=$cart[0]->satuan?>">
                            </div>
                            <button class="btn btn-block btn-primary btn-sm" type="submit">Ubah</button>
                        </form>
                        <a href="<?= $this->input->get('s') == 'c'? base_url('cart') : base_url(); ?>" class="btn btn-block btn-default btn-sm" style="margin-top: 10px; margin-bottom: 10px;">Kembali</a>
                        </div>
                        <div class="col-md-1 col-xs-4">
                            <div class="btn-group-vertical">
                                <button type="button" id="button-add1" class="btn btn-default"><i class="fa fa-plus"></i></button>
                                <button type="button" id="button-add2" class="btn btn-default"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- <h5>h5. Bootstrap heading</h5>
                    <h6>h6. Bootstrap heading</h6> -->
                  </div><!-- /.box-body -->
                </div>
              </div>
              <!-- End Item -->
            <?php }?>
            </div>
          

        </section><!-- /.content -->

        <?php
        }
        ?>
      </div><!-- /.content-wrapper -->