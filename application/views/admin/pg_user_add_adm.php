<div class="content-wrapper">
        
        <section class="content-header">
          <h1>
            User <small>Admin</small><a href="<?= base_url('product') ?>" style="margin-left: 20px;" class="btn btn-primary btn-sm">Kembali</a>
          </h1>
        </section>
        <section class="content">
          <!-- Small boxes (Stat box) -->
            <div class="row">
              <!-- Item -->
              <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">Tambah User</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    <form action="<?=base_url('user/act_add')?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama" required="">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Username" required="">
                        </div>
                        <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control" required="">
                            <option value="0">Admin</option>
                            <option value="1">Pelanggan</option>
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
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
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->