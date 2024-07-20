<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include  '../app/controllers/almacen/show_productos.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Datos del Producto</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       <!-- nuestro contenido -->
        <div class="class row">
        
           <div class="class col-md-6">
           <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Está seguro de eliminar el producto?</h3>

                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
               <div class="class row">
                 <div class="class col-md-12">
                    <form action='../app/controllers/almacen/delete.php' method="post">
                        <input type="text" name="id_producto" value="<?php echo $id_producto_get;?>" hidden >

                            <div class="class form-group">
                                <label for=''>Codigo</label>
                                <input type="text" name="codigo" value="<?php echo $codigo?>" disabled class="form-control">
                            </div>
                            <div class="class form-group">
                                <label for=''>Nombre</label>
                                <input type="text" name="nombre"value="<?php echo $nombre?>" disabled class="form-control">
                            </div>
                            <div class="class form-group">
                                <label for=''>Descripcion</label>
                                <input type="text" name="descripcion"value="<?php echo $descripcion?>" disabled class="form-control">
                            </div>
                            <div class="class form-group">
                                <label for=''>Stock</label>
                                <input type="text" name="stock"value="<?php echo $stock?>" disabled class="form-control">
                            </div>
                            <div class="class form-group">
                                <label for=''>Stock minimo</label>
                                <input type="text" name="stock_minimo"value="<?php echo $stock_minimo?>" disabled class="form-control">
                            </div>
                            <div class="class form-group">
                                <label for=''>Stock maximo</label>
                                <input type="text" name="stock_maximo"value="<?php echo $stock_maximo?>" disabled class="form-control">
                            </div>
                            <div class="class form-group">
                                <label for=''>Precio de compra</label>
                                <input type="text" name="precio_compra"value="<?php echo $precio_compra?>" disabled class="form-control">
                            </div>
                            <div class="class form-group">
                                <label for=''>Precio de venta</label>
                                <input type="text" name="precio_venta"value="<?php echo $precio_venta?>" disabled class="form-control">
                            </div>
                            <div class="class form-group">
                                <label for=''>Fecha de ingreso</label>
                                <input type="text" name="fecha_ingreso"value="<?php echo $fecha_ingreso?>" disabled class="form-control">
                            </div>
                            <div class="class form-group">
                                <label for='' >Imagen</label>
                                <img src="<?php echo $URL. "/almacen/productos_img/". $imagen?>" class="w-25"/>
                            </div>
                            <div class="class form-group">
                                <label for=''>Email del usuario</label>
                                <input type="text" name="email"value="<?php echo $email?>" disabled class="form-control">
                            </div>
                            <hr>
                            <div class="class form-group">
                                <button class="btn btn-danger"><i class="fa fa-trash"></i>Borrar producto</button>
                                <a href="index.php" class="btn btn-secondary">Volver</a>
                                
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
            </div> 
            </div>
        </form>
       <!-- fin de nuestro contenido -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include '../layout/mensajes.php';?>
  <?php include '../layout/parte2.php';?>
 
