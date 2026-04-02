<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b><a>Dev by OSTA </a></b> 
    </div>
    <strong>Copyright &copy; 2026 <a href="#">OSTA</a>.</strong> All rights
    reserved.
  </footer>


<!-- jQuery 3 -->
<!-- <script src="<?php echo base_url();?>bower_components/jquery/dist/jquery.min.js"></script> -->
<script src="<?php echo base_url();?>dist/js/jquery-3.3.1.js"></script>
 
  <!-- <script  src="<?php echo base_url();?>dist/js/jquery-3.3.1.min.js"></script> -->
  <script  src="<?php echo base_url();?>dist/js/jquery.dataTables.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- footer for front header -->



<!-- <script src="<?php echo base_url();?>front/js/jquery-3.3.1.min.js"></script> -->
  <script src="<?php echo base_url();?>front/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url();?>front/js/jquery-ui.js"></script>
  <script src="<?php echo base_url();?>front/js/popper.min.js"></script>
  <!-- <script src="<?php echo base_url();?>front/js/bootstrap.min.js"></script> -->
  <script src="<?php echo base_url();?>front/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>front/js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url();?>front/js/jquery.countdown.min.js"></script>
  <script src="<?php echo base_url();?>front/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url();?>front/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url();?>front/js/aos.js"></script>
  <script src="<?php echo base_url();?>front/js/rangeslider.min.js"></script>
  

<!-- end footer for front header -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url();?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>bower_components/morris.js/morris.min.js"></script>

<!-- <script type="text/javascript" src="<?php echo base_url();?>css/jquery-3.3.1.min.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo base_url();?>css/jquery-1.12.4.min.js"></script> -->

  <script type="text/javascript" src="<?php echo base_url();?>css/sweetalert.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>css/sweetalert-dev.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>dist/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>dist/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>dist/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>dist/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>dist/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>dist/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>dist/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>dist/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>dist/js/demo.js"></script>
<script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
 <script>
      CKEDITOR.replace( 'editor1' );
    </script>
<!-- Fix for missing CSS files - remove 404 errors -->
<style>
    body {
  display: grid;
  grid-template-rows: auto 1fr auto; /* header, content (grows), footer */
  min-height: 100vh;
}

header.main-header {
  grid-row: 1;
}

.content-wrapper { /* Your main content area */
  grid-row: 2;
}

footer.main-footer {
  grid-row: 3;
  /* Remove or adjust the min-height here */
  min-height: auto;
}
</style>
</body>
</html>