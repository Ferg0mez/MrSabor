<?php
	require('conexion.php');
	
	session_start();
	
	if(isset($_SESSION["nombre"])){
		header("Location: admin.php");
	}
	
	if(!empty($_POST))
	{
		$nombre = mysqli_real_escape_string($mysqli,$_POST['nombre']);
		$clave = mysqli_real_escape_string($mysqli,$_POST['clave']);
		$error = '';
		
		
		$sql = "SELECT nombre FROM administrador WHERE nombre = '$nombre' AND clave = '$clave'";
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;

		if (!$result) {
			trigger_error('Invalid query: ' . $mysqli->error);
		}
		
		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['nombre'] = $row['nombre'];
            header("location: admin.php");
			} else {
			$error = "El nombre o contraseña son incorrectos";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MrSabor | Iniciar Sesión</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.css">
  <link rel="apple-touch-icon" sizes="194x194" href="img/icon.png" type="image/png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <SCRIPT  language=JavaScript> 
  function go(){
    if (document.form.password.value=='admin' && document.form.login.value=='admin'){ 
        document.form.submit(); 
    } 
    else{ 
         alert("Porfavor ingrese, nombre de usuario y contraseña correctos."); 
    } 
  } 
  </SCRIPT> 
</head>
<body class="hold-transition login-page" style="background: url(img/fondoadmin.jpg);background-size:300%; background-attachment: fixed;background-position: center;">   

<div class="login-box">
  <div class="login-logo">
    <a href="admin.php"><img src="img/logo.png " style="
      width:320px;"></a>
  </div>
  <div class="login-page">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingresa las credenciales de Administrador </p>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="form-group has-feedback">
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Usuario" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña"  required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-6">
          <BUTTON type=submit class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<!--script>validarPassword();</script>
</body>
</html>
