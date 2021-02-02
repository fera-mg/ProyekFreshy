<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Aplikasi Penjualan Bunga</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="<?= base_url() ?>assets/masonry/css/normalize.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/masonry/css/font-awesome.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/masonry/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/masonry/css/templatemo-style.css">
        <script src="<?= base_url() ?>assets/masonry/js/vendor/modernizr-2.6.2.min.js"></script>
        <!-- 
        Masonry Template 
        http://www.templatemo.com/preview/templatemo_434_masonry
        -->
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <div id="loader-wrapper">
            <div id="loader"></div>
        </div>

        <div class="content-bg"></div>
        <div class="bg-overlay"></div>

        <!-- SITE TOP -->
        <div class="site-top">
            <div class="site-header clearfix">
                <div class="container">
                    <a href="#" class="site-brand pull-left"><strong>FRESHY</strong>.COM</a>
                    <div class="social-icons pull-right">
                        <ul>
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-behance"></a></li>
                            <li><a href="#" class="fa fa-dribbble"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- .site-header -->
            <div class="site-banner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8 text-center">
                            <h2>Tambah Produk</h2>
                        </div>
                    </div>
                    <div class="row">
                        <form action="#" method="post" class="subscribe-form">
                            <fieldset class="col-md-offset-4 col-md-3 col-sm-8">
                                <input type="email" id="subscribe-email" placeholder="Masukkan Produk Baru...">
                            </fieldset>
                            <fieldset class="col-md-5 col-sm-4">
                                <input type="submit" id="subscribe-submit" class="button white" value="Tambah">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div> <!-- .site-banner -->
        </div> <!-- .site-top -->
        
        <!-- MAIN POSTS -->
        <div class="main-posts">
            <div class="container">
                <div class="row">
                    <div class="blog-masonry masonry-true">
                        <?php foreach ($produk as $data) {?>
                        <div class="post-masonry col-md-4 col-sm-6">
                            <div class="post-thumb">
                                <img src="<?= base_url() ?>assets/masonry/images/1.jpg" alt="">
                                <div class="title-over">
                                    <h4><a href="#"><?=$data->nama_produk?></a></h4>
                                </div>
                                <div class="post-hover text-center">
                                    <div class="inside">
                                        <i class="fa fa-plus"></i>
                                        <span class="date"><?=$data->kategori?></span>
                                        <h4><a href="#"><?=$data->nama_produk?></a></h4>
                                        <p>Rp. <?=$data->harga?></p>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.post-masonry -->
                      <?php }?>
                    </div>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="social-icons">
                            <ul>
                                <li><a href="#" class="fa fa-facebook"></a></li>
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-behance"></a></li>
                                <li><a href="#" class="fa fa-dribbble"></a></li>
                                <li><a href="#" class="fa fa-google-plus"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="copyright-text">Copyright &copy; 2084 Company Name
                        | Photos by <a rel="nofollow" href="http://unsplash.com">Unsplash</a></p>
                    </div>
                </div>
            </div>
        </footer>

        <script src="<?= base_url() ?>assets/masonry/js/vendor/jquery-1.10.2.min.js"></script>
        <script src="<?= base_url() ?>assets/masonry/js/min/plugins.min.js"></script>
        <script src="<?= base_url() ?>assets/masonry/js/min/main.min.js"></script>

        <!-- Preloader -->
        <script type="text/javascript">
            //<![CDATA[
            $(window).load(function() { // makes sure the whole site is loaded
                $('#loader').fadeOut(); // will first fade out the loading animation
                    $('#loader-wrapper').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
                $('body').delay(350).css({'overflow-y':'visible'});
            })
            //]]>
        </script>
  <!-- templatemo 434 masonry -->
    </body>
</html>