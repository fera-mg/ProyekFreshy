<div class="content-wrapper">
        
        <section class="content-header">
          <h1>
            User <small>Admin</small><a href="<?= base_url('user/add') ?>" style="margin-left: 20px;" class="btn btn-primary btn-sm">Tambah</a>
          </h1>
        </section>
        <section class="content">
          <!-- Small boxes (Stat box) -->
            <?php 
            if (count($user)>0){
            ?>
            <div class="row">
              <!-- Item -->
              <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">Daftar User</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>Nama User</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                        foreach($user as $data){
                        ?>
                        <tr>
                            <td><?= $data->nama ?></td>
                            <td>
                                <?php
                                switch($data->role_id){
                                    case 0:
                                        echo "Admin";
                                        break;
                                    case 1:
                                        echo "User";
                                        break;
                                }
                                ?>
                            </td>
                            <td>
                                <!-- <a href="#" class="btn btn-primary btn-sm">Ubah</a> -->
                                <a href="<?= base_url('user/delete?id='.$data->id) ?>" class="btn btn-danger btn-sm">Hapus</a>                                
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