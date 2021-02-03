<div class="content-wrapper">
        
        <section class="content-header">
          <h1>
            Invoice <small>Admin</small>
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
                            <th>ID</th>
                            <th>Nama User</th>
                            <th>Tanggal</th>
                            <th>Bukti Pembayaran</th>
                            <th>Status Bayar</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                        $total = 0;
                        foreach($invoice as $data){
                            $resusr = $this->db->get_where('tb_user',array('id'=>$data->user_id))->result();
                            
                            // $subtotal = $res_produk[0]->harga * $data->satuan;
                        ?>
                        <tr>
                            <td><?= $data->id ?></td>
                            <td><?= $resusr[0]->nama ?></td>
                            <td><?= date('Y-m-d', strtotime($data->tanggal)) ?></td>
                            <td><?= $data->bukti == null ? '<span class="label label-warning">Belum</span>': '<span class="label label-success">Sudah</span><a class="btn btn-info btn-sm" style="margin-left: 10px;" href="'.base_url("uploads/product/".$data->bukti).'" target="_blank" rel="noopener noreferrer">Lihat disini</a>' ?></td>
                            <td><?php
                            if ($data->status_bayar == 0 ){
                              if ($data->bukti == null){
                                echo "Belum dibayar";
                              } else {
                                echo "Proses Validasi Admin";
                              }
                            } elseif($data->status_bayar == 1 ) { 
                              echo 'Pembayaran Valid, <a target="_blank" class="btn btn-primary btn-sm" href="'.base_url('cart/cetak_resi?id='.$data->id).'">Cetak RESI</a>'; 
                            } elseif($data->status_bayar == 2 ) { 
                              echo "Pembayaran Tidak Valid, Silahkan Hubungi Admin!"; 
                              }?></td>
                            <td>
                                <?php 
                                if ($data->bukti != null){
                                  if($data->status_bayar == 1 ) { 
                                ?>
                                <a href="<?= base_url('cart/act_valid_adm?id='.$data->id.'&s=1&u=adm') ?>" class="btn btn-primary btn-sm">Valid</a>
                                <?php
                                  } elseif($data->status_bayar == 2 ) { 
                                ?>
                                <a href="<?= base_url('cart/act_valid_adm?id='.$data->id.'&s=2&u=adm') ?>" class="btn btn-warning btn-sm">Tidak Valid</a>
                                <?php
                                  } else { 
                                ?>
                                <a href="<?= base_url('cart/act_valid_adm?id='.$data->id.'&s=1&u=adm') ?>" class="btn btn-primary btn-sm">Valid</a>
                                <a href="<?= base_url('cart/act_valid_adm?id='.$data->id.'&s=2&u=adm') ?>" class="btn btn-warning btn-sm">Tidak Valid</a>
                                <?php
                                  }
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