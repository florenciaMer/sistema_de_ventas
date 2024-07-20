<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- plantilla de AdminLTE 3-->
  <title>Sistema de Ventas</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo $URL ?>/public/templates/admintemplate/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $URL ?>/public/templates/admintemplate/dist/css/adminlte.min.css">
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="<?php echo $URL ?>/public/templates/admintemplate/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/styles.css">
   
  <!-- jQuery -->
  <script src="<?php echo $URL ?>/public/templates/admintemplate/plugins/jquery/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <!-- DataTables -->
   <link rel="stylesheet" href="<?php echo $URL ?>/public/templates/admintemplate/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL ?>/public/templates/admintemplate/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL ?>/public/templates/admintemplate/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini">
 
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">SISTEMA DE VENTAS</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
     

      <!-- Messages Dropdown Menu -->
    
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $URL;?>" class="brand-link">
      <img src="<?php echo $URL;?>/public/img/carrito.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIS de Ventas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo $URL ?>/public/templates/admintemplate/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $nombresSesion?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL ?>/usuarios" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL ?>/usuarios/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creación de Usuarios</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Roles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL ?>/roles" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL ?>/roles/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creación de Roles</p>
                </a>
              </li>
            </ul>
          </li>

          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Categorías
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL ?>/categorias" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Categorías</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Almacen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL ?>/almacen" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Productos</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo $URL ?>/almacen/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creación de Productos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Compras
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL ?>/compras" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Compras</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo $URL ?>/compras/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creación de Compra</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-car"></i>
                <p>
                  Proveedores
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo $URL ?>/proveedores" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listado de Proveedores</p>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item">
            <a href="../ventas/" class="nav-link">
              <i class="nav-icon fas fa-shopping-basket"></i>
              <p>
                Ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL ?>/ventas/index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de Ventas</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo $URL ?>/ventas/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Creación de Venta</p>
                </a>
              </li>
            </ul>

            <li class="nav-item">
            <a href="../ventas/" class="nav-link">
            <i class="fas fa-solid fa-wrench"></i>
              <p>
                Configuraciones 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL ?>/configuraciones/informaciones.php" class="nav-link">
                <i class="fas fa-solid fa-wrench"></i>
                  <p>Información</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>   

            


          <li class="nav-item">
            <a href="<?php echo $URL;?>/app/controllers/login/cerrar_sesion.php" class="nav-link bg-danger">
              <i class="nav-icon fas fa-door-closed"></i>
              <p>
               Cerrar Sesión
                
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>