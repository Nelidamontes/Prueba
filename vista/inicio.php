<?php
session_start();

require_once('../db/conexion.php');
if ($_SESSION['session'] !="true") { 
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Landing &mdash; Free One Page Bootstrap 4 Template by uicookies.com</title>
    <meta name="description" content="Free Bootstrap 4 Template by uicookies.com">
    <meta name="keywords" content="Free website templates, Free bootstrap themes, Free template, Free bootstrap, Free website template">
    
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600|Montserrat:200,300,400" rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../assets/fonts/law-icons/font/flaticon.css">

    <link rel="stylesheet" href="../assets/fonts/fontawesome/css/font-awesome.min.css">
    
    
    <link rel="stylesheet" href="../assets/css/slick.css">
    <link rel="stylesheet" href="../assets/css/slick-theme.css">

    <link rel="stylesheet" href="../assets/css/helpers.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/landing-2.css">
  </head>
  <body data-spy="scroll" data-target="#pb-navbar" data-offset="200">

    <nav class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light" id="pb-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html">Prueba Tecnica</a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#probootstrap-navbar" aria-controls="probootstrap-navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span><i class="ion-navicon"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="probootstrap-navbar">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link"  href="ConsultaFecha.php">Consulta</a></li>
            <li class="nav-item cta-btn ml-xl-2 ml-lg-2 ml-md-0 ml-sm-0 ml-0"><a class="nav-link" href="../controlador/Salir.php" target="_blank"><span class="pb_rounded-4 px-4">Salir</span></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

    <section class="pb_section pb_slant-light">
      <div class="container">
        <div class="row">
          
         
<div class="form-group col-md-2">
  <button class="btn btn-outline btn-success" data-toggle="modal" data-target="#addData"><i class='glyphicon glyphicon-plus'></i>Agregar</button><br><br>

</div>
<div class="x_panel">
  <div class="x_title">
   <div class="clearfix"></div><br>
 </div>
 <?php
 $datos = new Conexion();
 $mysql = $datos->conectar();

 ?>

 <table  class="table table-striped table-bordered table-list" id="myTable">
   <thead>
    <tr>  
     <th style="text-align: center;">Numero Proceso</th>
     <th style="text-align: center;">Descripcion</th>
     <th style="text-align: center;">Fecha Creacion</th>
     <th style="text-align: center;">Sede</th>
     <th style="text-align: center;">Presupuesto</th>
     <th style="text-align: center;">Accion</th>
   </tr>
 </thead>
 <tbody>
  <?php
  include ('../db/conexion1.php');
  $sql="SELECT idproceso,numProceso,descripcion,fechaCreacion,sede,presupuesto FROM proceso order by idproceso DESC";
  if(!$result= $db->query($sql)){ die ('Datos no encontrados!!! ['.$db->error.']'); }

  while($row= $result-> fetch_array())
  {     
    ?>
    <tr>   
      <td style="text-align: center;"><?php echo $row['numProceso']; ?></td> 
      <td style="text-align: center;"><?php echo $row['descripcion']; ?> </td>
      <td style="text-align: center;"><?php echo $row['fechaCreacion']; ?></td> 
      <td style="text-align: center;"><?php echo $row['sede']; ?></td> 
      <td style="text-align: center;"><?php echo $row['presupuesto']; ?> </td>
      <td style="text-align: center;">
        <button  class="btn btn-warning"  data-toggle="modal" data-target="#modProceso" data-id="<?php echo $row['idproceso']?>" data-num="<?php echo $row['numProceso']?>" data-desc="<?php echo $row['descripcion']?>"  data-sede="<?php echo $row['sede']?>" data-presupuesto="<?php echo $row['presupuesto']?>"><i class='glyphicon glyphicon-edit'></i>
        </button>
      </td>
    </tr>

    <?php
  }
  ?>  


  <?php include('../modal/agregarProceso.php');?>

</tbody>

<?php include('../modal/modificarProceso.php');?>

</table>

</div>
            
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

   

    <footer class="pb_footer bg-light" role="contentinfo">
      <div class="container">
        <div class="row text-center">
          <div class="col">
            <ul class="list-inline">
              <li class="list-inline-item"><a href="#" class="p-2"><i class="fa fa-facebook"></i></a></li>
              <li class="list-inline-item"><a href="#" class="p-2"><i class="fa fa-twitter"></i></a></li>
              <li class="list-inline-item"><a href="#" class="p-2"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <p class="pb_font-14">&copy; 2018 <a href="https://uicookies.com/">Prueba Tecnica</a> All Rights Reserved. <br>  </p>
            <p class="pb_font-14">Nelida Montes</p>
          </div>
        </div>
      </div>
    </footer>
    
    <!-- loader -->
    <div id="pb_loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#1d82ff"/></svg></div>

<script>

  $('#modProceso').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var idproceso = button.data('id')
      var numProceso = button.data('num') // Extraer la información de atributos de datos 
      var descripcion = button.data('desc') // Extraer la información de atributos de datos 
      var sede = button.data('sede') // Extraer la información de atributos de datos
      var presupuesto = button.data('presupuesto') // Extraer la información de atributos de datos


      var modal = $(this)
      modal.find('.modal-title').text('Modificar: ')
      modal.find('.modal-body #idproceso').val(idproceso)    
      modal.find('.modal-body #num').val(numProceso)
      modal.find('.modal-body #descripcion').val(descripcion)
      modal.find('.modal-body #sede').val(sede)
      modal.find('.modal-body #presupuesto').val(presupuesto)


      $('.alert').hide();//Oculto alert
    })
  </script>


  <script>
   $('#myTab').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  })  
</script>


    <script src="../assets/js/jquery.min.js"></script>
    
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/slick.min.js"></script>
    <script src="../assets/js/jquery.mb.YTPlayer.min.js"></script>

    <script src="../assets/js/jquery.waypoints.min.js"></script>
    <script src="../assets/js/jquery.easing.1.3.js"></script>

    <script src="../assets/js/main.js"></script>

  </body>
</html>