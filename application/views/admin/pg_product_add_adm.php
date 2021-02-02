<div class="content-wrapper">
        
        <section class="content-header">
          <h1>
            Product <small>Admin</small><a href="<?= base_url('product') ?>" style="margin-left: 20px;" class="btn btn-primary btn-sm">Kembali</a>
          </h1>
        </section>
        <section class="content">
          <!-- Small boxes (Stat box) -->
            <div class="row">
              <!-- Item -->
              <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                    <h3 class="box-title">Tambah Product</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    <form action="<?=base_url('product/act_add')?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama" required="">
                        </div>
                        <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control" required="">
                            <option value="1">Bunga Papan</option>
                            <option value="2">Handbouquet</option>
                            <option value="3">Krans Bunga</option>
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input type="number" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga" required="">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputFile">Gambar</label>
                        <input type="file" name="img" required="">
                        <!-- <p class="help-block">Example block-level help text here.</p> -->
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