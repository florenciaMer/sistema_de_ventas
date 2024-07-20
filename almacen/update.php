<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/categorias/listado_de_categorias.php';
include '../app/controllers/almacen/cargar_producto.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Actualizar Producto</h1>
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
           <div class="class col-md-12">
           <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Completa los campos</h3>

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
                    <form action='../app/controllers/almacen/update.php' method="post" enctype="multipart/form-data">
                       <div class="row">
                            <div class="col-md-4">
                              <input type="text" name="id_producto" value="<?php echo $id_producto_get ;?>"hidden >

                                <div class="class form-group">
                                    <label for="">Codigo:</label>
                                    
                                    <input type="text" name="codigo" class="form-control" value="<?php echo $codigo;?>" >
                                </div>
                            </div>
                           
                                <div class="col-md-4">
                                    <div class="class form-group">
                                        <label for="id_categoria">Categoria:</label>
                                        <div class="d-flex">
                                            <select name="id_categoria" class="form-control">

                                            <?php 
                                          
                                              foreach($categorias_datos as $categoria_dato){ 
                                                $id_categoria = $categoria_dato['id_categoria'];
                                                $nombre_categoria_tabla = $categoria_dato['nombre_categoria'];?>
                                                <option value="<?php echo $id_categoria; ?>"
                                                  <?php if ($nombre_categoria_tabla == $nombre_categoria) {?> selected="selected"<?php } ?>>
                                                  <?php echo $nombre_categoria_tabla;?>
                                              </option>

                                            <?php } ?>
                                            </select>
                                        <a href="<?php echo $URL;?>/categorias" class="btn btn-primary"><i class="fa fa-plus"></i></a>             
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-4">
                                <div class="class form-group">
                                    <label for="nombre">Nombre del producto:</label>
                                    <input type="text" name="nombre" value="<?php echo $nombre?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <input type="file" name="imagen" class="form-control" id="file">
                                  <input type="text" value="<?php echo $imagen ;?>" name="image_text" hidden>
                                  <output id="list">
                                      <img src="<?php echo $URL. "/almacen/productos_img/". $imagen?>" class="w-25"/>
                                  </output>
                                </div>
                            </div>
                        </div> <!-- final del row con los primeros datos -->


                        <div class="row"> <!-- usuario y descripcion -->
                          <div class="col-md-3">
                                  <div class="class form-group">
                                      <label for="usuario">Usuario:</label>
                                      <input type="text" name="id_usuario" value="<?php echo $usuario;?>"class="form-control">
                                  </div>
                            </div>
                            <div class="col-md-3">
                                <div class="class form-group">
                                    <label for="usuario">Email:</label>
                                    <input type="email" name="email"  
                                          value="<?php echo $emailSesion;?>"class="form-control" >
                                    <input type="text" value="<?php echo $id_usuarioSesion ?>" hidden>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="class form-group">
                                    <label for="descripcion">Descripcion:</label>
                                    <textarea name="descripcion" value="<?php echo $descripcion; ?>" class="form-control">
                                    </textarea>
                                </div>
                            </div>
                         </div><!-- fin div usuario y descripcion -->
                         <div class="row">
                            <div class="col-md-2">
                                <div class="class form-group">
                                    <label for="stock">Stock:</label>
                                    <input type="number" name="stock" class="form-control"value="<?php echo $stock?>" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="class form-group">
                                    <label for="stock_minimo">Stock Minimo:</label>
                                    <input type="number" name="stock_minimo" class="form-control" value="<?php echo $stock_minimo?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="class form-group">
                                    <label for="stock_maximo">Stock maximo:</label>
                                    <input type="number" name="stock_maximo" class="form-control" value="<?php echo $stock_maximo?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="class form-group">
                                    <label for="precio_compra">Precio compra:</label>
                                    <input type="text" name="precio_compra" class="form-control" value="<?php echo $precio_compra?>" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="class form-group">
                                    <label for="precio_venta">Precio venta:</label>
                                    <input type="text" name="precio_venta" class="form-control" value="<?php echo $precio_venta?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="class form-group">
                                    <label for="fecha_ingreso">Fecha de ingreso:</label>
                                    <input type="date" name="fecha_ingreso" class="form-control" required value="<?php echo $fecha_ingreso?>">
                                </div>
                            </div>
                          </div>  <!-- fin div stocks fecha ingreso -->
    <script>
    function archivo(evt) {
        var files = evt.target.files;
        var output = document.getElementById('list');
        output.innerHTML = ''; // Limpiar la previsualización antes de agregar nuevas imágenes

        for (var i = 0, f; f = files[i]; i++) {
            if (!f.type.match('image.*')) {
                continue;
            }

            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                    // Insertar la imagen dentro de la etiqueta <img>
                    var img = document.createElement('img');
                    img.className = 'thumb thumbnail w-25';
                    img.src = e.target.result;
                    output.appendChild(img);
                };
            })(f);

            reader.readAsDataURL(f);
        }
    }

    document.getElementById('file').addEventListener('change', archivo, false);
</script>
                        <hr>
                        <div class="class form-group">
                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" href="" class="btn btn-primary">Guardar</button>
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

       <!-- fin de nuestro contenido -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include '../layout/mensajes.php';?>
  <?php include '../layout/parte2.php';?>
 
