<?php
	session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION["correo"])){ //Si no ha iniciado sesión redirecciona a index.php
		header("Location: index.php");
	}
	
	$correo = $_SESSION['correo'];
	
	$sql = "SELECT nombre,correo FROM usuarios WHERE correo = '$correo'";
	$result = $mysqli->query($sql) or die($mysqli->error);
	$row = $result->fetch_assoc();

   include('conexion.php'); 
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>MrSabor | Menus</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="css/ionicons.min.css">
      <!-- Theme style -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
      <link href="css/carrusel_b.css" rel="stylesheet" type="text/css" />
      <script src="js/carrusel_b.js"></script>
      <script>
         function principal() { // onload body
           new CarruselB({
             id: "carrusel_b",
             waiting: false, // milliseconds (false per desactivar)
           });
         }
      </script>
      <link rel="stylesheet" href="css/AdminLTE.css">
      <link rel="apple-touch-icon" sizes="194x194" href="img/icon.png" type="image/png">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   </head>
   <body class="hold-transition login-page" style="
      background: url(img/fondoopcion333.jpg);
      background-size:300%; background-attachment: fixed; background-position:center; 
      ">     
      <div class="login-box">
         <div class="login-logo">
            <a href="menus.php"><img src="img/logo.png " style="
               width: 250px; background-position:center"></a>      
         </div>
         <div class="box-body">
            <div class="box box-danger box-solid" style="border: 1px solid #12111173;width: 318px;">
               <div class="box-header with-border" style="background-color: #001f3f;">
                  <h3 class="box-title" style="text-align: center;display:block;">Perfil del Usuario</h3>
               </div>
               <div class="box-body">
                  <p style="text-align: center;"><?php echo ''.utf8_decode($row['nombre']); ?></p>
                  <p style="text-align: center;"><?php echo ''.utf8_decode($row['correo']); ?></p>
                  <a href ="logout.php" class="btn btn-block btn-danger">Cerrar Sesión</a>
               </div>
               <!-- /.box-body -->
            </div>
         <div id="carrusel_b">
            <ul class="photos_b">
               <li><img id="foto1" src="imgs/menuexpress.jpg" width="315" height="200"/></li>
               <li><img id="foto2" src="imgs/foto2.jpg" width="315" height="200"/></li>
               <li><img id="foto3" src="imgs/foto3.jpg" width="315" height="200"/></li>
            </ul>
            <ul class="links_b">
               <li><a href="#foto1">Promo 1</a></li>
               <li><a href="#foto2">Promo 2</a></li>
               <li><a href="#foto3">Promo 3</a></li>
            </ul>
         </div>
         &nbsp;
         <!-- /.login-logo -->
         <!-- /.login-box-body -->
         <div class="container">
            
            <body class="hold-transition skin-blue sidebar-mini">
               <div class="wrapper">
                  <!-- START ACCORDION & CAROUSEL-->
                  <div class="row" style=" width: 700px; background-position:center;">
                     <div class="col-md-5"  style="width: 320px; background-position:center;">
                        <div class="box box-solid">
                           <div class="box-header black-border">
                              <h3 class="box-title" style="font-size: 25px;line-height: 1;font-weight: 900;">Tipos de Menus</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                           </div>
                              <div class="box-group" id="accordion">
                                 <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                 <div class="panel box box-primary">
                                    <div class="box-header with-border">
                                       <h4 class="box-title">
                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                          Comun
                                          </a>
                                       </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                       <div class="box-body">
                                       <?php 

                                       $sql1 = "SELECT * from productos where tipo = 1;";
                                       $result1=$mysqli->query($sql1);
                                       
                                       while ($row1=mysqli_fetch_array($result1)) { 
                        
                                       ?> 
                                       <div class="box box-danger box-solid" style="border: 1px solid #12111173">
                                          <div class="box-header with-border" style="background-color: #5089ba;">
                                             <h3 class="box-title"><?php echo $row1['nombre']?></h3>
                                          </div>
                                          <div class="box-body">
                                             <p><?php echo $row1['descripcion'] ?></p>
                                             <img src="data:image/jpg;base64,<?php echo base64_encode($row1['foto']); ?>"/ style="width: 246px;">
                                             <div class="box-title" style="color: #000; font-weight: 600;">Precio $<?php echo $row1['precio'] ?></div>
                                             <a href ="ticket.html" class="btn btn-block btn-success" style="margin-top: 15px;background-color: black;border-color: black;">Reservar</a>
                                          </div>
                                        <?php           
                                       } 
                                    ?>
                                    </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="panel box box-danger">
                              <div class="box-header with-border">
                                 <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    Carnes
                                    </a>
                                 </h4>
                              </div>
                              <div id="collapseTwo" class="panel-collapse collapse">
                                 <div class="box-body">
                                     <?php 

                                       $sql2 = "SELECT * from productos where tipo = 2;";
                                       $result2=$mysqli->query($sql2);
                                       
                                       while ($row2=mysqli_fetch_array($result2)) { 
                        
                                       ?> 
                                       <div class="box box-danger box-solid" style="border: 1px solid #12111173">
                                          <div class="box-header with-border" style="background-color: #e4170f;">096f03
                                             <h3 class="box-title"><?php echo $row2['nombre']?></h3>
                                          </div>
                                          <div class="box-body">
                                             <p><?php echo $row2['descripcion'] ?></p>
                                             <img src="data:image/jpg;base64,<?php echo base64_encode($row2['foto']); ?>"/ style="width: 246px;">
                                             <div class="box-title" style="color: #000; font-weight: 600;">Precio $<?php echo $row2['precio'] ?></div>
                                             <a href ="ticket.html" class="btn btn-block btn-success" style="margin-top: 15px;background-color: black;border-color: black;">Reservar</a>
                                          </div>
                                           <?php           
                                             } 
                                          ?>  
                                    </div>                                
                                 </div>
                              </div>
                              <div class="panel box box-success">
                                 <div class="box-header with-border">
                                    <h4 class="box-title">
                                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                       Vegetales
                                       </a>
                                    </h4>
                                 </div>
                                 <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="box-body">
                                       <?php 

                                       $sql3 = "SELECT * from productos where tipo = 3;";
                                       $result3=$mysqli->query($sql3);
                                       
                                       while ($row3=mysqli_fetch_array($result3)) { 
                        
                                       ?> 
                                       <div class="box box-danger box-solid" style="border: 1px solid #12111173">
                                          <div class="box-header with-border" style="background-color: #096f03;">
                                             <h3 class="box-title"><?php echo $row3['nombre']?></h3>
                                          </div>
                                          <div class="box-body">
                                             <p><?php echo $row3['descripcion'] ?></p>
                                             <img src="data:image/jpg;base64,<?php echo base64_encode($row3['foto']); ?>"/ style="width: 246px;">
                                             <div class="box-title" style="color: #000; font-weight: 600;">Precio $<?php echo $row3['precio'] ?></div>
                                             <a href ="ticket.html" class="btn btn-block btn-success" style="margin-top: 15px;background-color: black;border-color: black;">Reservar</a>
                                          </div>
                                           <?php           
                                             } 
                                          ?>  
                                    </div>    
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.box-body -->
         </div>
         <!-- /.box -->
      </div>
      <!-- /.col -->
      </div>
      </div>
      </aside>
      </div>        
      <!-- jQuery 3 -->
      <script src="js/jquery.min.js"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="js/bootstrap.min.js"></script>
      <script> principal(); </script>
      <!-- iCheck -->
   </body>
</html>


















































