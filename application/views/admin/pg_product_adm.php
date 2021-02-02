<div class="content-wrapper">
        
        <section class="content-header">
          <h1>
            Product <small>Admin</small><a href="<?= base_url('product/add') ?>" style="margin-left: 20px;" class="btn btn-primary btn-sm">Tambah</a>
          </h1>
        </section>
        <section class="content">
          <!-- Small boxes (Stat box) -->
            <?php 
            if (count($produk)>0){
            ?>
            <div class="row">
              <!-- Item -->
              <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">Daftar Product</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                        function rupiah($angka){
                            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                            return $hasil_rupiah;
                        }
                        foreach($produk as $data){
                        ?>
                        <tr>
                            <td><?= $data->id ?></td>
                            <td><?= $data->nama_produk ?></td>
                            <td><?= rupiah($data->harga) ?></td>
                            <td>
                                <a href="<?= base_url('product/edit?id='.$data->id) ?>" class="btn btn-primary btn-sm">Ubah</a>
                                <a href="<?= base_url('product/delete?id='.$data->id) ?>" class="btn btn-danger btn-sm">Hapus</a>
                                <!-- <a href="<?= base_url('cart/act_valid_adm?id='.$data->id.'&s=2&u=adm') ?>" class="btn btn-primary btn-sm">Tidak Valid</a> -->
                                
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