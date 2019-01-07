<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php section('title'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php url('/node_modules/admin-lte/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php url('/node_modules/admin-lte/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php url('/node_modules/admin-lte/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Data tables-->
  <link rel="stylesheet" href="<?php url('/node_modules/admin-lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php url('/node_modules/admin-lte/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. -->
  <link rel="stylesheet" href="<?php url('/node_modules/admin-lte/dist/css/skins/_all-skins.min.css'); ?>">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">


<!-- Main content -->
<section class="content">

<?php include '../views'.constant('CONTENT').'.php'; ?>


</section>
<!-- /.content -->

<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="<?php url('/node_modules/admin-lte/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php url('/node_modules/admin-lte/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- AdminLTE App -->

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. 
     <script src="url('/node_modules/admin-lte/dist/js/adminlte.min.js');"></script>
    
    -->


<!-- Select2 -->
<script src="<?php url('/node_modules/admin-lte/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<!-- InputMask -->
<script src="<?php url('/node_modules/admin-lte/plugins/input-mask/jquery.inputmask.js'); ?>"></script>
<script src="<?php url('/node_modules/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
<script src="<?php url('/node_modules/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>
<!-- date-range-picker -->
<script src="<?php url('/node_modules/admin-lte/bower_components/moment/min/moment.min.js'); ?>"></script>
<script src="<?php url('/node_modules/admin-lte/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php url('/node_modules/admin-lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<!-- bootstrap color picker -->
<script src="<?php url('/node_modules/admin-lte/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js'); ?>"></script>
<!-- bootstrap time picker -->
<script src="<?php url('/node_modules/admin-lte/plugins/timepicker/bootstrap-timepicker.min.js'); ?>"></script>
<!-- DataTables -->
<script src="<?php url('/node_modules/admin-lte/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php url('/node_modules/admin-lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
<!-- SlimScroll -->
<script src="<?php url('/node_modules/admin-lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php url('/node_modules/admin-lte/plugins/iCheck/icheck.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php url('/node_modules/admin-lte/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php url('/node_modules/admin-lte/dist/js/adminlte.min.js'); ?>"></script>
<!-- Page script -->

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
  
//sidebar activeUrl
$('.treeview-menu').find('li.active').parent().parent().addClass('menu-open active');

//datatables
$(document).ready(function() {
    $('#register-table').DataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando a página  _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Buscar",
            "paginate": {
            "previous": "Anterior",
            "next": "Próximo"
            }
        }
    } );
} );

//submit forms
$("#save").click(function(event){
  event.preventDefault();
  $("#save-form").submit();
});

$("#destroy").click(function(event){
  event.preventDefault();
  $("#destroy-form").submit();
});



</script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
