<?php
session_start();
$logged = $_SESSION['logged'];
$userss_id=$_SESSION['user_id'];
$users_name=$_SESSION['users_name'];
$curp=$_SESSION['curp'];
if(!$logged){
  echo "Ingreso no autorizado";
  die();
}
$conn = mysqli_connect("localhost","admin_maestria","Coruco99","admin_maestria");
$nombres="";
$apaterno="";
$amaterno="";
$curp="";
$ecivil="";
$tsangre="";
$nmovil="";
$user_id = $_SESSION['user_id'];
$users_id="";

if ($conn==false){
  echo "Hubo un problema al conectarse a María DB";
  die();
}

if( isset($_POST['id_to_delete']) && $_POST['id_to_delete']!="") {
  $id_to_delete = $_POST['id_to_delete'];
  $conn->query("DELETE FROM `admin_maestria`.`files` WHERE  `files_id`=$id_to_delete");
}
$users_id=$conn->query("SELECT `users_id` FROM `users` ");

if(isset($_POST['nombres'] )) {
  $nombres = strip_tags($_POST['nombres']);
  $apaterno = strip_tags($_POST['apaterno']);
  $amaterno = strip_tags($_POST['amaterno']);
  $curp= strip_tags($_POST['curp']);
  $ecivil = strip_tags($_POST['ecivil']);
  $tsangre= strip_tags($_POST['tsangre']);
  $nmovil=strip_tags($_POST['nmovil']);
  $result = $conn->query("SELECT * FROM `files` WHERE `files_curp` = '".$curp."' ");
  $users = $result->fetch_all(MYSQLI_ASSOC);
  //cuento cuantos elementos tiene $tabla,
  $count = count($users);
  //solo si no hay un usuario con mismo mail, procedemos a insertar fila con nuevo usuario
  if ($count == 0){
    $conn->query("INSERT INTO `files` (`files_nombres`, `files_apaterno`, `files_amaterno`,`files_curp`,`files_ecivil`,`files_tsangre`,`files_nmovil`) VALUES ('".$nombres."', '".$apaterno."', '".$amaterno."','".$curp."','".$ecivil."','".$tsangre."','".$nmovil."');");
    $msg.="DATOS AGREAGADOS CORRECTAMENTE";
  }else{
    $msg.="El CURP ingresado ya existe <br>";
  }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Universidad Tecnológica de Tlaxcala - División Posgrado</title>
  <meta name="description" content="INSCRIPCIÓN UTTLAXCALA POSGRADO" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <style>
  .hidden{
    display:none;
  }
  </style>
  <style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="assets/images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="assets/images/logo.png">

  <!-- style -->
  <link rel="stylesheet" href="assets/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="assets/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="assets/material-design-icons/material-design-icons.css" type="text/css" />

  <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
  <!-- build:css assets/styles/app.min.css -->
  <link rel="stylesheet" href="assets/styles/app.css" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="assets/styles/font.css" type="text/css" />
</head>
<body>
  <div class="app" id="app">

    <!-- ############ LAYOUT START-->

    <!-- BARRA IZQUIERDA -->
    <!-- aside -->
    <div id="aside" class="app-aside modal nav-dropdown">
      <!-- fluid app aside -->
      <div class="left navside dark dk" data-layout="column">
        <div class="navbar no-radius">
          <!-- brand -->
          <a class="navbar-brand">
            <!--<div ui-include="'assets/images/logo.svg'"></div>-->
            <img src="assets/images/logo.png" alt="." >
            <span class="hidden-folded inline">UTT</span>
          </a>
          <!-- / brand -->
        </div>
        <div class="hide-scroll" data-flex>
          <nav class="scroll nav-light">

            <ul class="nav" ui-nav>
              <li class="nav-header hidden-folded">
                <small class="text-muted">Main</small>
              </li>

              <li>
                <a href="dashboard.php" >
                  <span class="nav-icon">
                    <i class="fa fa-building-o"></i>
                  </span>
                  <span class="nav-text">Principal</span>
                </a>
              </li>

              <li>
                <a href="preins.php" >
                  <span class="nav-icon">
                    <i class="fa fa-cogs"></i>
                  </span>
                  <span class="nav-text">Pre-inscripción</span>
                </a>
              </li>
              <a href="logout.php" >
                <span class="nav-icon">
                  <i class="fa fa-power-off"></i>
                </span>
                <span class="nav-text">Salir</span>
              </a>
            </li>

          </ul>
        </nav>
      </div>
      <div flex-no-shrink="" class="b-t">
        <div class="b-t">
          <div class="nav-fold">
            <span class="block _500">
              <label>Bienvenido, <?php echo $_SESSION['users_name'] ?></label>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / -->
  <!-- content -->
  <div id="content" class="app-content box-shadow-z0" role="main">
    <div class="app-header white box-shadow">
      <div class="navbar navbar-toggleable-sm flex-row align-items-center">
        <!-- Open side - Naviation on mobile -->
        <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
          <i class="material-icons">&#xe5d2;</i>
        </a>
        <!-- / -->
        <!-- Page title - Bind to $state's title -->
        <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>
        <!-- BARRA DE LA DERECHA -->
        <ul class="nav navbar-nav ml-auto flex-row">
          <li class="nav-item dropdown pos-stc-xs">
            <a class="nav-link mr-2" href data-toggle="dropdown">
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link p-0 clear" href="#" data-toggle="dropdown">
              <span class="avatar w-32">

              </span>
            </a>
            <div ui-include="'views/blocks/dropdown.user.html'"></div>
          </li>
          <li class="nav-item hidden-md-up">
            <a class="nav-link pl-2" data-toggle="collapse" data-target="#collapse">
              <i class="material-icons">&#xe5d4;</i>
            </a>
          </li>
        </ul>
        <!-- / navbar right -->
      </div>
    </div>
    <!-- PIE DE PAGINA -->
    <div class="app-footer">
      <div class="p-2 text-xs">
        <div class="pull-right text-muted py-1">
          &copy; Copyright <strong>CREADO POR VICTOR MIGUEL TERRÓN MACIAS</strong> <span class="hidden-xs-down"></span>
          <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
        </div>
        <div class="nav">
          <a class="nav-link" href="aprivacidad.php">AVISO DE PRIVACIDAD</a>
        </div>
      </div>
    </div>
    <div ui-view class="app-body" id="view">
      <!-- SECCION CENTRAL -->
      <div class="padding" >
        <div >
          <div>
            <div class="box">
              <div class="box-header" >
                <h4 class="m-t-lg m-b-md">Arrastra o selecciona los archivos no los subas en ZIP, súbe uno por uno </h4>
                <p>Recuerda que los archivos que debe tener:</p>
                <ul>
                  <li>Acta de nacimiento</li>
                  <li>Certificado médico</li>
                  <li>CURP</li>
                  <li>Fotografía tamaño infantil</li>
                  <li>Certificado de licenciatura</li>
                  <li>Título de licenciatura o carta de aprobación de examen profesional</li>
                  <li>Cédula profesional</li>
                  <li>2 Cartas de recomendación (una académica y otra laboral)</li>
                  <li>Carta de exposición de motivos</li>
                </ul>
              </p>
            </div>
            <form action="upload.php" class="dropzone white dz-clickable" id="myDropzoneElementId">
              <div class="dz-message" ui-jp="dropzone" ui-options="{ url: 'html/api/dropzone.options' }">
                <span class="text-muted block m-b-lg">Todos los archivos en PDF NO RAR NI ZIP</span>
              </div>
            </form>
          </div>
        </div>
      </div>
          </div>
        </div>
        <!-- Fin tabla-->
      </div>
    </div>
  </div>
  <!-- ############ PAGE END-->
</div>
</div>
<!-- / -->
<!-- SELECTOR DE TEMAS -->
<div id="switcher">
  <div class="switcher box-color dark-white text-color" id="sw-theme">
    <a href ui-toggle-class="active" target="#sw-theme" class="box-color dark-white text-color sw-btn">
      <i class="fa fa-gear"></i>
    </a>
    <div class="box-header">
      <h2>Selector de tema: </h2>
    </div>
    <div class="box-divider"></div>
    <div class="box-body">
      <p class="hidden-md-down">
        <label class="md-check m-y-xs"  data-target="folded">
          <input type="checkbox">
          <i class="green"></i>
          <span class="hidden-folded">Comprimir barra lateral</span>
        </label>
      </p>
      <p>Temas:</p>
      <div data-target="bg" class="row no-gutter text-u-c text-center _600 clearfix">
        <label class="p-a col-sm-6 light pointer m-0">
          <input type="radio" name="theme" value="" hidden>
          Luminoso
        </label>
        <label class="p-a col-sm-6 grey pointer m-0">
          <input type="radio" name="theme" value="grey" hidden>
          Gris
        </label>
        <label class="p-a col-sm-6 dark pointer m-0">
          <input type="radio" name="theme" value="dark" hidden>
          Obscuro
        </label>
        <label class="p-a col-sm-6 black pointer m-0">
          <input type="radio" name="theme" value="black" hidden>
          Negro
        </label>
      </div>
    </div>
  </div>
</div>
<!-- build:js scripts/app.html.js -->
<!-- jQuery -->
<script src="libs/jquery/jquery/dist/jquery.js">
</script>
<!-- Bootstrap -->
<script src="libs/jquery/tether/dist/js/tether.min.js"></script>
<script src="libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
<script src="libs/jquery/underscore/underscore-min.js"></script>
<script src="libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
<script src="libs/jquery/PACE/pace.min.js"></script>
<script src="html/scripts/config.lazyload.js"></script>
<script src="html/scripts/palette.js"></script>
<script src="html/scripts/ui-load.js"></script>
<script src="html/scripts/ui-jp.js"></script>
<script src="html/scripts/ui-include.js"></script>
<script src="html/scripts/ui-device.js"></script>
<script src="html/scripts/ui-form.js"></script>
<script src="html/scripts/ui-nav.js"></script>
<script src="html/scripts/ui-screenfull.js"></script>
<script src="html/scripts/ui-scroll-to.js"></script>
<script src="html/scripts/ui-toggle-class.js"></script>
<script src="html/scripts/app.js"></script>
<!-- ajax -->
<script src="libs/jquery/jquery-pjax/jquery.pjax.js"></script>
<script src="html/scripts/ajax.js"></script>
<!-- endbuild -->
</body>
</html>
