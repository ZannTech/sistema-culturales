<?php
if(isset($_SESSION)){
  require_once('../../config/core/controller/controller.sesions.method.php');
  $method = new methodsSessions;
  $method->verifyLogin();
}

