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
    .shadow-custom {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    html,
    body {
        height: 100%;
        text-align: center;
        padding-top: 100px;
    }
    .btn-custom-1 {
        width: 400px;
    }
    </style>
</head>
<body class="text-center">
<div class="container">

<h5>Pendaftaran berhasil</h5><br>
<a class="btn btn-lg btn-primary btn-custom-1" href="<?=base_url('welcome/login')?>">Masuk</a>
<a class="btn btn-lg btn-outline-primary btn-custom-1" href="<?=base_url()?>">Beranda</a>

</div>
<script src="<?= base_url() ?>assets/masonry/js/vendor/jquery-1.10.2.min.js"></script>
<script src="<?= base_url() ?>assets/new/bootstrap.min.js"></script>
</body>
</html>