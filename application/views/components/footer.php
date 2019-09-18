<div class="color-bg"></div>
<!-- Jquery Core Js -->

<script src="<?php echo base_url();?>assets/bundles/datatablescripts.bundle.js"></script><!-- Jquery DataTable Plugin Js -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudfl111are.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').dataTable( {
            "order": [],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
            // Your other options here...
        } );
    } );
</script>



<script src="<?php echo base_url();?>assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<script src="<?php echo base_url();?>assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script> <!-- Sparkline Plugin Js -->
<script src="<?php echo base_url();?>assets/plugins/chartjs/Chart.bundle.min.js"></script> <!-- Chart Plugins Js -->

<script src="<?php echo base_url();?>assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->

<script src="<?php echo base_url();?>assets/js/morphing.js"></script><!-- Custom Js -->
<script src="<?php echo base_url();?>assets/plugins/dropzone/dropzone.js"></script> <!-- Dropzone Plugin Js -->
<script src="<?php echo base_url();?>assets/js/pages/maps/jvectormap.js"></script>


<script src="<?php echo base_url();?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<script src="<?php echo base_url();?>assets/js/pages/charts/sparkline.min.js"></script>
<script src="<?php echo base_url();?>assets/js/pages/charts/chartjs.min.js"></script>
<script src="<?php echo base_url();?>assets/js/pages/index.js"></script>
<script src="<?php echo base_url();?>assets/js/pages/forms/basic-form-elements.js"></script>
<script src="<?php echo base_url();?>assets/js/pages/tables/jquery-datatable.js"></script>



</body>
</html>