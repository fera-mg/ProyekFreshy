<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome in freshy</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/new/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <style>
    .fl-header {
        background-image: url("<?php echo base_url('assets');?>/img1/intro.jpg");
        background-size: cover;
    }
    .shadow-custom {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .bg-kat-bp {
        /* background-image: url("<?php echo base_url('assets');?>/imgkategori/bunga-wedding.jpeg"); */
        background-size: cover;
    }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-custom">
  <a class="navbar-brand" href="#">FRESHY<strong>.COM</strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url() ?>">Beranda
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Tentang Kami</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('welcome/login') ?>">Masuk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('welcome/daftar') ?>">Daftar</a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Separated link</a>
        </div>
      </li> -->
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


<!-- Heading -->

<div class="jumbotron fl-header shadow-custom">
  <h1 class="display-3">Fresh Flower!</h1>
  <p class="lead">Semua bunga yang dipesan adalah bunga yang sangat segar dan baru dipetik dari pohonnya, sangat cocok untuk diri anda yang ingin memberikan sebuah kesan untuk pasangan anda sebagai hadiah ulang tahun dan lain lain. Kami jamin kesegaran bunganya akan membuat anda bahagia dengan aromatik yang alami.</p>
  <hr class="my-4">
  <p>Mendaftar untuk melakukan pembelian bunga melalui tombol berikut.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="<?= base_url('welcome/daftar') ?>" role="button">Daftar Sekarang</a>
  </p>
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Product</h1>
      <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
</div>

    <div class="container">
      <div class="card-deck mb-3 text-center">
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Bunga Papan</h4>
          </div>
          <div class="card-body bg-kat-bp">
            <ul class="list-unstyled mt-3 mb-4">
              <li><strong>Papan bunga terdiri dari bunga-bunga segar dan wangi.</strong></li>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-primary">Lihat Papan Bunga</button>
          </div>
        </div>
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Handbouquet</h4>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mt-3 mb-4">
              <li><strong>Bunga-bunga segar dan wangi menjadi pilihan untuk merangkai hand bouquet. </strong></li>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-primary">Lihat Handbouquet</button>
          </div>
        </div>
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Krans Bunga</h4>
          </div>
          <div class="card-body">
            <!-- <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1> -->
            <ul class="list-unstyled mt-3 mb-4">
              <li><strong>Segar dan wangi menjadi pilihan untuk dekorasi ruangan. </strong></li>
            </ul>
            <button type="button" class="btn btn-lg btn-block btn-primary">Lihat Krans Bunga</button>
          </div>
        </div>
      </div>

      <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <small class="d-block mb-3 text-muted">© 2021</small>
          </div>
          <div class="col-6 col-md">
            <h5>Features</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Cool stuff</a></li>
              <li><a class="text-muted" href="#">Random feature</a></li>
              <li><a class="text-muted" href="#">Team feature</a></li>
              <li><a class="text-muted" href="#">Stuff for developers</a></li>
              <li><a class="text-muted" href="#">Another one</a></li>
              <li><a class="text-muted" href="#">Last time</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>Resources</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Resource</a></li>
              <li><a class="text-muted" href="#">Resource name</a></li>
              <li><a class="text-muted" href="#">Another resource</a></li>
              <li><a class="text-muted" href="#">Final resource</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Team</a></li>
              <li><a class="text-muted" href="#">Locations</a></li>
              <li><a class="text-muted" href="#">Privacy</a></li>
              <li><a class="text-muted" href="#">Terms</a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
<div>

</div>

<script src="<?= base_url() ?>assets/masonry/js/vendor/jquery-1.10.2.min.js"></script>
<script src="<?= base_url() ?>assets/new/bootstrap.min.js"></script>
</body>
</html>