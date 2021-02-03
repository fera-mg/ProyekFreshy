<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>freshy</b>.com
        </div>
        <strong>Copyright &copy; 2021 <a href="http://almsaeedstudio.com">Proyek Fera Mega Haristina</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->
    
<!-- jQuery 2.1.3 -->
<script src="<?= base_url('assets/admin-lte/') ?>plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?= base_url('assets/admin-lte/') ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?= base_url('assets/admin-lte/') ?>plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?= base_url('assets/admin-lte/') ?>plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?= base_url('assets/admin-lte/') ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?= base_url('assets/admin-lte/') ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url('assets/admin-lte/') ?>plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('assets/admin-lte/') ?>plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?= base_url('assets/admin-lte/') ?>plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?= base_url('assets/admin-lte/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?= base_url('assets/admin-lte/') ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?= base_url('assets/admin-lte/') ?>plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?= base_url('assets/admin-lte/') ?>plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/admin-lte/') ?>dist/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url('assets/admin-lte/') ?>dist/js/pages/dashboard.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets/admin-lte/') ?>dist/js/demo.js" type="text/javascript"></script>
    <!-- htpdf -->
    <script src='<?= base_url('assets/admin-lte/') ?>plugins/html2pdf/dist/html2pdf.bundle.min.js'></script>
    
    
    <script>

    <?php if ($page == 'invoice'){?>
      var element = document.getElementById('tsprint');
      var btninvgen = document.getElementById('btngenpdfinv');
      btninvgen.onclick = function(){
        html2pdf(element);
      }

      <?php }?>

      var btnplus = document.getElementById("button-add1");
      var btnminus = document.getElementById("button-add2");
      var inpsatuanbarang = document.getElementById("id_set_val_satuan");

      var max = <?php 
      if (isset($product)){
        foreach ($product as $data){
          echo $data->stok;
        }
      } else {
        echo 0;
      }
      ?>;

      btnplus.onclick = function() {
        inpsatuanbarang.value = parseInt(inpsatuanbarang.value) + 1;
        if (parseInt(inpsatuanbarang.value) >= max){
          inpsatuanbarang.value = max;
        }
      }
      btnminus.onclick = function() {
        if(parseInt(inpsatuanbarang.value) <= 1){
          inpsatuanbarang.value = 1;
        } else {
          inpsatuanbarang.value = parseInt(inpsatuanbarang.value) - 1;
        }
      }

      inpsatuanbarang.onchange = function() {
        if(parseInt(inpsatuanbarang.value) == ""){
          inpsatuanbarang.value = 1;
        }
        if (parseInt(inpsatuanbarang.value) >= max){
          inpsatuanbarang.value = max;
        }
      }
    </script>
  </body>
</html>