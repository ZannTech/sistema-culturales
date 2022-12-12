<?php
  class methodsSessions{
      function verifyLoggedUser(){
       if(isset($_SESSION['tipo-rol']) && isset($_SESSION['user']) && isset($_SESSION['user-logged'])){
        if($_SESSION['tipo-rol'] != "" && $_SESSION['user'] !="" && $_SESSION['user-logged'] !=""){
          header('location: Home/');
        }
       }
      }
      function verifyLogin(){
        if($_SESSION['tipo-rol'] == "" && $_SESSION['user'] =="" && $_SESSION['user-logged']==""){
          header('location: ../');
        }
      }
      function verifyAdmin(){
        if($_SESSION['tipo-rol'] == "Administrador"){
          return 1;
        }
        else{
          return 0;
        }
      }
      function verifyEncargado(){
        if($_SESSION['tipo-rol'] =="Encargado"){
          return 1;
        }else{
          return 0;
        }
      }
      function verifyAlumno(){
        if($_SESSION['tipo-rol'] =="Alumno"){
          return 1;
        }else{
          return 0;
        }
      }
      function verifySessionAsistencias(){
        if(isset($_SESSION['id-session-as']) && $_SESSION['id-session-as'] !=""){
          header('location: Home/');
        }
      }
      function verifyLoggedAsistencia(){
        if($_SESSION['id-session-as']=="" || !(isset($_SESSION['id-session-as']))){
          header('location: ../');
        }
      }
      function verifyAdminAsistencia(){
        if($_SESSION['taller']=="ADMIN"){

        }else{
          header('location: ./');
        }
      }
  }
?>