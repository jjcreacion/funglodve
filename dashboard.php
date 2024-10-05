<!-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="lib/css/Styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  </head>
  <body>
  <div class='dashboard'>
        <div class="dashboard-nav">
            <header>
            <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
            <a href="#" class="brand-logo"><i class="fas fa-anchor"></i> </a>
            <img src="lib/img/logovertical.png" width="130" height="120">
           </header>
            <nav class="dashboard-nav-list">
              
              <a href="#" class="dashboard-nav-item">
              <i class="fa-solid fa-medal"></i>
               Glorias
              </a>
              <a href="#" class="dashboard-nav-item active">
              <i class="fas fa-sitemap"></i>
                Subsedes
              </a>
              <a href="#" class="dashboard-nav-item">
               <i class="fas fa-hotel"></i>
                Instituciones 
               </a>
               <a href="#" class="dashboard-nav-item">
               <i class="fas fa-chart-bar"></i>
                Proyectos
              </a>
              <a href="#" class="dashboard-nav-item">
              <i class="fas fa-chart-pie"></i>
                Reportes
              </a>
              <a href="#" class="dashboard-nav-item"><i class="fas fa-file-invoice"></i>
                Nominas 
               </a>
               <a href="#" class="dashboard-nav-item"><i class="fas fa-user-tie"></i>
                Usuarios 
               </a>
            <div class="nav-item-divider"></div>
            </nav>
        </div>
        <div class='dashboard-app'>
            <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a></header>
            <header class='dashboard-toolbar'>
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
                <span><h2 class="tituloDashboar">Fundación Glorias Deportivas de Venezuela</h2></span>
                <a href="#!" class="menu-toggle"><i class="fas fa-sign-out-alt"></i></a>
            </header>

            
        </div>
    </div>

  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="lib/js/principal.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

  </body>
</html>
-->
<?php
// index.php

// Incluir el archivo del enrutador
require 'router.php';

// Crear una instancia del enrutador
$router = new Router();

// Definir las rutas
$router->define([
    '/' => 'controllers/HomeController.php',
    '/about' => 'controllers/AboutController.php',
    // Agrega más rutas aquí
]);

// Dirigir la solicitud
$uri = trim($_SERVER['REQUEST_URI'], '/');
require $router->direct($uri);
