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
  <meta charset="utf-8" />
  <title>Universidad Tecnológica de Tlaxcala - División Posgrado</title>
  <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

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
  <link rel="stylesheet" href="assets/styles/app.css" type="text/css" />
  <link rel="stylesheet" href="assets/styles/font.css" type="text/css" />
</head>
<body>
  <div class="app" id="app">
    <div id="aside" class="app-aside modal nav-dropdown">
      <div class="left navside dark dk" data-layout="column">
        <div class="navbar no-radius">
          <a class="navbar-brand">
            <img src="assets/images/logo.png" alt="." >
            <span class="hidden-folded inline">UTT</span>
          </a>
        </div>
        <div class="hide-scroll" data-flex>
          <nav class="scroll nav-light">
            <ul class="nav" ui-nav>
              <li class="nav-header hidden-folded">
                <small class="text-muted">Menú</small>
              </li>
              <li>
                <a href="dashboard.php" >
                  <span class="nav-icon">
                    <i class="fa fa-building-o"></i>
                  </span>
                  <span class="nav-text">AVISOS</span>
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
              <li>
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
    <div id="content" class="app-content box-shadow-z0" role="main">
      <div class="app-header white box-shadow">
        <div class="navbar navbar-toggleable-sm flex-row align-items-center">
          <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
            <i class="material-icons">&#xe5d2;</i>
          </a>
          <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>
        </div>
      </div>
      <div class="app-footer">
        <div class="p-2 text-xs">
          <div class="pull-right text-muted py-1">
            &copy; Creado por <strong>Victor Miguel Terrón Macias</strong> <span class="hidden-xs-down"> - UNIVERSIDAD TECNOLÓGICA DE TLAXCALA</span>
            <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
          </div>
          <div class="nav">
            <a class="nav-link" href="aprivacidad.php">Aviso de privacidad</a>
          </div>
        </div>
      </div>
      <div ui-view class="app-body" id="view">
        <div class="padding">
          <div class="row">

            <div class="col-xs-8 col-sm-6">
              <h1>AVISOS IMPORTANTES</h1>
              <div class="box p-a">
                <p>Recuerda que el plazo para subir tu información y documentación es hasta el 1 de Noviembre si tienes problemas con tu documentación (por documentación faltante) puedes subir los documentos con los que cuentes y posteriormente integrar la documentación faltante. </p>
                <div class="pull-left m-r">
                  <span class="w-48 rounded primary">
                    <i class="fa fa-desktop"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-xs-8 col-sm-6">
              <h1>...</h1>
              <div class="box p-a">
                <p>Para iniciar el proceso de pre-inscripción es necesario que des click en la barra lateral izquierda y click en donde dice pre inscripción. </p>
                <div class="pull-left m-r">
                  <span class="w-48 rounded primary">
                    <i class="fa fa-warning"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-1">
          </div>
          <div >
            <h1>TOEFL Y CERTIFICADO MÉDICO</h1>
            <div class="box p-a">
              <p>En la convocatoria se menciona que el certificado médico tiene que ser expedido por aprte de una organización oficial del sector salud (IMSS, ISSSTE, SSA o Servicios de Salud  de las Fuerzas Armadas). El certificado de inglés por normativa del CONACyT exige un mínimo de 400 puntos en el examen TOEFL (nivel de inglés adquirido hasta el fin de la educación superior). Las razones por las que se exige éste examen: <br><ul>
                <strong><li>1. El certificado tiene una vigencia de 2 años</li></strong>
              <strong>  <li>2. Es Inglés americano, no inglés británico</li></strong>
              <strong>En caso de que no dispongas del certificado de inglés en éste momento podrás realizarlo en la Universidad, por ello no tendrás problema.</strong>
              </ul> </p>
              <div class="pull-left m-r">
                <span class="w-48 rounded primary">
                  <i class="fa fa-warning"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
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
          <h2>Selector de temas</h2>
        </div>
        <div class="box-divider"></div>
        <div class="box-body">
          <p class="hidden-md-down">
            <label class="md-check m-y-xs"  data-target="folded">
              <input type="checkbox">
              <i class="green"></i>
              <span class="hidden-folded">Contraer barra lateral</span>
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
</div>
</div>
</div>
<!-- / -->

<!-- ############ LAYOUT END-->

</div>
<!-- build:js scripts/app.html.js -->
<!-- jQuery -->
<script src="libs/jquery/jquery/dist/jquery.js"></script>
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

<script type="text/javascript">



<!-- endbuild -->
</body>
</html>
