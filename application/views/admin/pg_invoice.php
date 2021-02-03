<div class="content-wrapper">
        
        <section class="content-header">
          <h1>
            Invoice
          </h1>
        </section>
        <section class="content">
          <!-- Small boxes (Stat box) -->
            <?php 
            if (count($invoice)>0){
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
                    <h3 class="box-title">Daftar Invoice</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Tanggal</th>
                            <th>Upload Bukti</th>
                            <th>Status Bayar</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                        $total = 0;
                        $today = date("Y-m-d");
                        $no=0 ;
                        foreach($invoice as $data){
                            $resdtail = $this->db->get_where('tb_d_invoice',array('invoice_id'=>$data->id));
                            $namas = "";
                            $t = $resdtail->num_rows();

                            foreach($resdtail->result() as $dts){
                              $res_produk = $this->db->get_where('tb_produk',array('id'=>$dts->produk_id))->result();
                              $namas .= strval($res_produk[0]->nama_produk);

                              $t--;
                              if ($t >=1 ){
                                $namas .= ", ";
                              }
                            }
                            // cek jatuh tempo
                            $date2 = strtotime($data->tanggal. ' + 2 days');
                            $date_diff=($date2-strtotime($today)) / 86400;
                        ?>
                        <tr style="<?php
                            if ($date_diff < 0 && $data->bukti == null){
                              echo 'background-color: #fbd4d4;';
                            } elseif($data->status_bayar == 1 ) { 
                              echo 'background-color: #d4fbdb;';
                            } elseif($data->status_bayar == 2 ) { 
                              echo 'background-color: #fbefd3;';
                              }
                            ?>">
                            <td><?= ++$no ?></td>
                            <td><?= $namas == "" ? "EXPIRED PAYMENT" : $namas ?></td>
                            <td><?= date('Y-m-d', strtotime($data->tanggal)) ?></td>
                            <td><?= $data->bukti == null ? '<span class="label label-warning">Belum</span>': '<span class="label label-success">Sudah</span><a class="btn btn-info btn-sm" style="margin-left: 10px;" href="'.base_url("uploads/product/".$data->bukti).'" target="_blank" rel="noopener noreferrer">Lihat disini</a>' ?></td>
                            <td><?php
                            if ($data->status_bayar == 0 ){
                              if ($data->bukti == null){
                                if ($date_diff < 0){
                                  echo "Invoice expired";
                                } else {
                                  echo "Belum dibayar";
                                }
                              } else {
                                echo "Proses Validasi Admin";
                              }
                            } elseif($data->status_bayar == 1 ) { 
                              echo "Pembayaran Valid, Proses Pengiriman barang ke tujuan"; 
                            } elseif($data->status_bayar == 2 ) { 
                              echo "Pembayaran Tidak Valid, Silahkan Hubungi Admin!"; 
                              }?></td>
                            <td>
                            <?php
                            if ($date_diff < 0 && $data->bukti == null){
                            ?>
                            <a href="<?= base_url('cart/act_inv_del?id='.$data->id) ?>" class="btn btn-block btn-danger btn-sm">Hapus</a>
                            <?php
                            } else {
                            ?>
                            <a href="<?= base_url('cart/inv_detail?id='.$data->id) ?>" class="btn btn-block btn-primary btn-sm">Lihat</a>
                            <?php
                            }
                            ?>
                            
                            </td>
                        </tr>
                        <?php 
                        
                        } 
                        ?>
                    </tbody></table>
                    </div><!-- /.box-body -->
                </div>
              </div>
              <!-- End Item -->

              <!-- <div class="container">
                <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-block btn-primary">Hapus Semua Barang</button>
                            </div>
                            <div class="col-md-6">
                                <a href="<?= base_url('cart/act_invoice') ?>" class="btn btn-block btn-primary">Lanjut ke Pembayaran</a>
                            </div>
                </div>
              </div> -->
            </div>
            
            <?php } else {
              ?>
              <h4>Tidak ada data invoice!</h4>
            <?php } ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->