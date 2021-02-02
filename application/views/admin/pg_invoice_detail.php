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

            function rupiah($angka){
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                return $hasil_rupiah;
            }
            $subtotal2= 0;
        ?>
        <section class="content-header">
          
          <h1>
            Invoice <small>#00<?= $invoice[0]->id ?></small>
          </h1>

            
        </section>
        <section class="invoice" id="tsprint">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Freshy, Inc.
                <small class="pull-right">Date: <?= date('Y-m-d', strtotime($invoice[0]->tanggal)) ?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong>Admin, Inc.</strong><br>
                Jl. Jendral Sudirman, Block 2<br>
                Banyuwangi, Jawa Timur 68922<br>
                Phone: (804) 123-5432<br>
                Email: info@freshy.com
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong><?= $this->session->userdata('nama') ?></strong><br>
                Jl. Manstrip, Patrang<br>
                Jember, Jawa Timur 68922<br>
                Phone: (804) 123-5432<br>
                Email: feramega@freshy.com
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Invoice #00<?=$invoice[0]->id?></b><br>
              <br>
              <b>Order ID:</b> 4F3S8J<br>
              <b>Payment Due:</b> <?= date('Y-m-d', strtotime($invoice[0]->tanggal. ' + 2 days')) ?><br>
              <b>Account:</b> 968-34567
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Qty</th>
                    <th>Product</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                foreach($invoice_detail as $data){
                    $resp = $this->db->get_where('tb_produk',array('id'=>$data->produk_id))->result();
                    $subtotal = $resp[0]->harga * $data->satuan;
                ?>
                  <tr>
                    <td><?= $data->satuan ?></td>
                    <td><?= $resp[0]->nama_produk ?></td>
                    <td><?= rupiah($subtotal)?></td>
                  </tr>
                 <?php

                 $subtotal2 += $subtotal;
                }
                 ?>
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <p class="lead">Payment Methods:</p>
              <img src="<?= base_url('assets/admin-lte/') ?>dist/img/credit/visa.png" alt="Visa">
              <img src="<?= base_url('assets/admin-lte/') ?>dist/img/credit/mastercard.png" alt="Mastercard">
              <img src="<?= base_url('assets/admin-lte/') ?>dist/img/credit/american-express.png" alt="American Express">
              <img src="<?= base_url('assets/admin-lte/') ?>dist/img/credit/paypal2.png" alt="Paypal">
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
              </p>
            </div><!-- /.col -->
            <div class="col-xs-6">
              <p class="lead">Amount Due <?= date('Y-m-d', strtotime($invoice[0]->tanggal. ' + 2 days')) ?></p>
              <div class="table-responsive">
                  <?php 
                  $ppn = $subtotal2*0.1;
                  $ship = 10000;
                  $total = $subtotal2+$ppn+$ship;
                  ?>
                <table class="table">
                  <tbody><tr>
                    <th style="width:50%">Subtotal:</th>
                    <td><?= rupiah($subtotal2) ?></td>
                  </tr>
                  <tr>
                    <th>PPN (10%)</th>
                    <td><?= rupiah($ppn) ?></td>
                  </tr>
                  <tr>
                    <th>Shipping:</th>
                    <td><?= rupiah($ship) ?></td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td><?= rupiah($total) ?></td>
                  </tr>
                </tbody></table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="<?= base_url('cart/inv_print?id='.$invoice[0]->id) ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <a href="<?= base_url('cart/upload_bukti?id='.$invoice[0]->id)?>" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</a>
              <button class="btn btn-primary pull-right" id="btngenpdfinv" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
            </div>
          </div>
        </section>
        <div class="clearfix"></div>

        <?php
        }
        ?>
      </div><!-- /.content-wrapper -->