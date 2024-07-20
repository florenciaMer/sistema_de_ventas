<?php
include 'app/config.php';
include 'layout/sesion.php';
include 'layout/parte1.php';
include 'app/controllers/usuarios/listado_de_usuarios.php';
include 'app/controllers/roles/listado_de_roles.php';
include 'app/controllers/categorias/listado_de_categorias.php';
include 'app/controllers/almacen/listado_de_productos.php';
include 'app/controllers/proveedores/listado_de_proveedores.php';
include 'app/controllers/compras/listado_de_compras.php';
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Bienvenido <?php echo $rolSesion ?></h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       <!-- nuestro contenido -->
       <div class="col-12">

      Contenido del sistema
   

<div class="class row">
  <div class="col-3">
    <div class="small-box bg-warning">
      <div class="inner">
        <?php 
        $contador_de_usuarios = 0;
        foreach ($usuarios_datos as $usuario) {
          $contador_de_usuarios = $contador_de_usuarios+1;

        }
        ?>
        <h3><?php echo $contador_de_usuarios ?></h3>
        <p>Usuarios Registrados</p>
      </div>
      <a href="<?php echo $URL;?>/usuarios/create.php"> <div class="icon">
          <i class="fas fa-user-plus"></i>
        </div>
      </a>  
      <a href="<?php echo $URL;?>/usuarios" class="small-box-footer">
      Mas detalle <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-3">
    <div class="small-box bg-info">
      <div class="inner">
        <?php 
        $contador_de_roles = 0;
        foreach ($roles_datos as $roles) {
          $contador_de_roles = $contador_de_roles+1;

        }
        ?>
        <h3><?php echo $contador_de_roles ?></h3>
        <p>Roles Registrados</p>
      </div>
      <a href="<?php echo $URL;?>/roles/create.php"> <div class="icon">
          <i class="fas fa-address-card"></i>
        </div>
      </a>  
      <a href="<?php echo $URL;?>/roles" class="small-box-footer">
      Mas detalle <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
 
<!-- categorias -->
  <div class="col-3">
    <div class="small-box bg-success">
      <div class="inner">
        <?php 
        $contador_de_categorias = 0;
        foreach ($categorias_datos as $usuario) {
          $contador_de_categorias = $contador_de_categorias+1;

        }
        ?>
        <h3><?php echo $contador_de_categorias ?></h3>
        <p>Categorias Registradas</p>
      </div>
      
        <div class="icon">
          <i class="fas fa-tags"></i>
      </div>
        
      <a href="<?php echo $URL;?>/categorias" class="small-box-footer">
      Mas detalle <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
    <!-- productos -->
  <div class="col-3">
    <div class="small-box bg-primary">
      <div class="inner">
        <?php 
        $contador_de_productos = 0;
        foreach ($productos_datos as $producto) {
          $contador_de_productos = $contador_de_productos+1;

        }
        ?>
        <h3><?php echo $contador_de_productos ?></h3>
        <p>Productos Registrados</p>
      </div>
      <a href="<?php echo $URL;?>/almacen/create.php"> 
        <div class="icon">
          <i class="fas fa-list"></i>
        </div>
      </a>  
      <a href="<?php echo $URL;?>/almacen" class="small-box-footer">
      Mas detalle <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
   </div> <!-- fin del col-3-->
  </div> <!-- fin row-->
    <!-- compras -->
  <div class="row">
    <div class="col-3">
      <div class="small-box bg-secondary">
        <div class="inner">
          <?php 
          $contador_de_compras = 0;
          foreach ($compras_datos as $producto) {
            $contador_de_compras = $contador_de_compras+1;

          }
          ?>
          <h3><?php echo $contador_de_compras ?></h3>
          <p>Compras Registrados</p>
        </div>
        <a href="<?php echo $URL;?>/compras/create.php"> 
          <div class="icon">
            <i class="fas fa-cart-plus"></i>
          </div>
        </a>  
        <a href="<?php echo $URL;?>/compras" class="small-box-footer">
        Mas detalle <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
  </div> <!-- fin col-3 -->
  <!-- compras registradas -->
<div class="col-3">
      <div class="small-box bg-danger">
        <div class="inner">
          <?php 
          $contador_de_proveedores = 0;
          foreach ($proveedores_datos as $producto) {
            $contador_de_proveedores = $contador_de_proveedores+1;

          }
          ?>
          <h3><?php echo $contador_de_proveedores ?></h3>
          <p>Proveedores Registrados</p>
        </div>
        <a href="<?php echo $URL;?>/proveedores/create.php"> 
          <div class="icon">
            <i class="fas fa-car"></i>
          </div>
        </a>  
        <a href="<?php echo $URL;?>/proveedores" class="small-box-footer">
        Mas detalle <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
</div> <!-- fin col-3 -->
<div class="col-3">
      <div class="small-box bg-secondary">
        <div class="inner">
          <?php 
          $contador_de_compras = 0;
          foreach ($compras_datos as $producto) {
            $contador_de_compras = $contador_de_compras+1;

          }
          ?>
          <h3><?php echo $contador_de_compras ?></h3>
          <p>Ventas Registradas</p>
        </div>
        <a href="<?php echo $URL;?>/compras/create.php"> 
          <div class="icon">
            <i class="fas fa-cart-plus"></i>
          </div>
        </a>  
        <a href="<?php echo $URL;?>/compras" class="small-box-footer">
        Mas detalle <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
  </div> <!-- fin col-3 -->

  </div> <!-- fin row  -->
  
  <!-- fin de nuestro contenido -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'layout/parte2.php';?>
 
