<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Freshy.com | Invoice</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?= base_url('assets/admin-lte/') ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?= base_url('assets/admin-lte/') ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print();">
    <?php
        function rupiah($angka){
	
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
         
        }
        $subtotal2= 0;
    ?>
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
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
              <?php
              $datauser = $this->db->get_where('tb_user',array('id'=> $invoice[0]->user_id))->result();
              ?>
              <address>
                <strong><?= $datauser[0]->nama ?></strong><br>
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
              <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
            </div>
          </div>
        </section><!-- /.content -->
    </div><!-- ./wrapper -->
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/admin-lte/') ?>dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>