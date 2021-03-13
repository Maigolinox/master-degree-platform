<?php
session_start();
$logged = $_SESSION['logged'];
$userss_id=$_SESSION['user_id'];
$users_names=$_SESSION['user_name'];
if(!$logged){
  echo "Ingreso no autorizado";
  die();
}
$conn = mysqli_connect("localhost","admin_maestria","Coruco99","admin_maestria");
$nombre=$_SESSION['user_name'];
print($nombre);
echo $nombre;
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Universidad Tecnológica de Tlaxcala - División Posgrado</title>
    <meta name="description" content="INSCRIPCIÓN UTTLAXCALA POSGRADO" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  </head>
  <link href="../dropzone/dropzone/dist/dropzone.css" type="text/css" rel="stylesheet" />
    <!-- 2 -->
    <script src="../dropzone/dropzone/dist/min/dropzone.min.js"></script>>
  <body>
    <!-- 3 -->
<form action="uploads.php" class="dropzone"></form>
  </body>
</html>
