</div>
        <!-- /Contenido -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Systema de registro para Estudiantes<a href="https://colorlib.com"> Mas Informacion</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
 
    <!-- NProgress -->
    <script src="css/vendors/nprogress/nprogress.js"></script>
    <!-- ECharts -->
    <script src="css/vendors/echarts/dist/echarts.min.js"></script>
    <script src="css/vendors/echarts/map/js/world.js"></script>

    <!-- jQuery -->
    <script src="css/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="css/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="css/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="css/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="css/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="css/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="css/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="css/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="css/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="css/vendors/Flot/jquery.flot.js"></script>
    <script src="css/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="css/vendors/Flot/jquery.flot.time.js"></script>
    <script src="css/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="css/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="css/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="css/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="css/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="css/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="css/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="css/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="css/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="css/vendors/moment/min/moment.min.js"></script>
    <script src="css/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="css/build/js/custom.min.js"></script>
    <!-- validator -->
    <script src="css/vendors/validator/validator.js"></script>
    <!-- Datatables -->
    <script src="css/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="css/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="css/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="css/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="css/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="css/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="css/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="css/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="css/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="css/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="css/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="css/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="css/vendors/jszip/dist/jszip.min.js"></script>
    <script src="css/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="css/vendors/pdfmake/build/vfs_fonts.js"></script>
    
    
    <!-- bootstrap-datetimepicker -->    
    <script src="css/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="css/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="css/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="css/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="css/vendors/jquery-knob/dist/jquery.knob.min.js"></script>
   

       <!-- Initialize datetimepicker -->
<script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>
  </body>
</html>