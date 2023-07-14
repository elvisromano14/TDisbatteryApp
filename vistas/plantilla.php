<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>DisbatteryApp - Sistema de Gestion</title>
    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="vistas/img/icono.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="vistas/img/icono.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="vistas/img/icono.png"/>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vistas/deskapp/vendors/styles/core.css"/>
    <link rel="stylesheet" type="text/css" href="vistas/deskapp/vendors/styles/icon-font.css"/>
    <link rel="stylesheet" type="text/css" href="vistas/deskapp/src/plugins/datatables/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="vistas/deskapp/src/plugins/datatables/css/responsive.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="vistas/deskapp/vendors/styles/style.css" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="vistas/deskapp/src/plugins/sweetalert2/sweetalert2.css" />
  </head>
  <body class="sidebar-light header-white">
    <?php
      if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
        // include "modulos/preloader.php"; 
        include "modulos/encabezado.php"; 
        include "modulos/menu.php";
        if(isset($_GET["ruta"])){
          if($_GET["ruta"] == "productos" ||
             $_GET["ruta"] == "conteos" ||
             $_GET["ruta"] == "crear-productos" ||
             $_GET["ruta"] == "crear-conteos" ||
             $_GET["ruta"] == "comparativo" ||
             $_GET["ruta"] == "salir"){
            include "modulos/".$_GET["ruta"].".php";
          }else{
            include "modulos/404.php";
          }
        }else{
        include "modulos/inicio.php";
      }
    }else{
      include "modulos/login.php";
    }
    ?>
    <!-- js -->
    <script src="vistas/deskapp/vendors/scripts/core.js"></script>
    <script src="vistas/deskapp/vendors/scripts/script.js"></script>
    <script src="vistas/deskapp/vendors/scripts/process.js"></script>
    <script src="vistas/deskapp/vendors/scripts/layout-settings.js"></script>
    <!-- Datatable -->
    <script src="vistas/deskapp/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
    <!-- buttons for Export datatable -->
    <script src="vistas/deskapp/src/plugins/datatables/js/dataTables.buttons.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/buttons.print.min.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/buttons.html5.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/jszip.min.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/buttons.flash.min.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/pdfmake.min.js"></script>
    <script src="vistas/deskapp/src/plugins/datatables/js/vfs_fonts.js"></script>
    <!-- Datatable Setting js -->
    <script src="vistas/deskapp/vendors/scripts/datatable-setting.js"></script>
    <script src="vistas/deskapp/vendors/scripts/dashboard3.js"></script>
    <!-- QR code -->
    <script src="vistas/deskapp/vendors/scripts/qrcode/qrcode.js"></script>
    <script src="vistas/deskapp/vendors/scripts/qrcode/instascan.min.js"></script>
    <script src="vistas/deskapp/src/plugins/sweetalert2/sweetalert2.all.js"></script>
    <script src="vistas/deskapp/src/plugins/sweetalert2/sweet-alert.init.js"></script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Jquery Add -->
    <script src="vistas/js/plantilla.js"></script>
    <script src="vistas/js/productos.js"></script>
    <script src="vistas/js/conteos.js"></script>
  </body>
</html>