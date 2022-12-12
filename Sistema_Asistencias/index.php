<?php
require_once('../config/core/controller/controller.sesions.method.php');
$sessionMethod = new methodsSessions;
session_start();
$sessionMethod->verifySessionAsistencias();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content=""/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="../Assets/css/private/login.css">
<link rel="shortcut icon" href="../Assets/images/cb.png">
<title>Iniciar sesión</title>
</head>
<body>
<form class="login-form" id="login-assi" method="POST">
  <p class="login-text">
    <span class="fa-stack fa-lg">
      <i class="fa fa-circle fa-stack-2x"></i>
      <i class="fa fa-lock fa-stack-1x"></i>
    </span>
  </p>
  <input type="text" class="login-username" autofocus="true" placeholder="Usuario" id="email" name="email"/>
  <input type="password" class="login-password" placeholder="Contraseña" id="password" name="password"/>
  <input type="submit" name="Login" value="Iniciar sesión" class="login-submit"/>
</form>
<div class="underlay-photo"></div>
<div class="underlay-black"></div> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="../config/core/ajax.controller/ajax.controller.asistencias.js"></script>
</body>
</html>