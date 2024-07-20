<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/almacen/listado_de_productos.php';
include '../app/controllers/categorias/listado_de_categorias.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Registro un un nuevo Producto</h1>
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
           <div class="card card-primary">
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
                    <form action='../app/controllers/almacen/create.php' method="post" enctype="multipart/form-data">
                       
                            <div class="col-md-4">
                                <div class="class form-group">
                                    <label for="">Codigo:</label>
                                    <?php
                                    function ceros($numero){
                                        $len=0;
                                        $cantidad_ceros=5;
                                        $aux=$numero;
                                        $pos=strlen($numero);
                                        $len=$cantidad_ceros-$pos;
                                        for ($i=0; $i < $len ; $i++) { 
                                            $aux="0".$aux;
                                        }
                                        return $aux;
                                    }
                                    $contador_de_id_productos = 1;
                                    foreach ($productos_datos as $producto) {
                                        $contador_de_id_productos =  $contador_de_id_productos+1;
                                    }
                                    ?>
                                    <input type="text" name="codigo" class="form-control" value="<?php echo 'p-'.ceros($contador_de_id_productos);?>" >
                                </div>
                            </div>
                           
                            <div class="col-md-4">
                                <div class="class form-group">
                                    <label for="id_categoria">Categoria:</label>
                                    <div class="d-flex">
                                        <select name="id_categoria" class="form-control">

                                            <?php 
                                            foreach ($categorias_datos as $categoria) {
                                                ?>
                                                <option value="<?php echo $categoria['id_categoria'];?>">
                                                <?php echo $categoria['nombre_categoria'];?>
                                                </option>
                                            
                                            <?php
                                                }
                                                ?>
                                        </select>
                                    <a href="<?php echo $URL;?>/categorias" class="btn btn-primary"><i class="fa fa-plus"></i></a>             
                                </div>
                            </div>
                                
                            </div>
                            <div class="col-md-4">
                                <div class="class form-group">
                                    <label for="nombre">Nombre del producto:</label>
                                    <input type="text" name="nombre" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="class form-group">
                                    <label for="descripcion">Descripcion:</label>
                                    <input type="text" name="descripcion" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="class form-group">
                                    <label for="stock">Stock:</label>
                                    <input type="number" name="stock" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="class form-group">
                                    <label for="stock_minimo">Stock Minimo:</label>
                                    <input type="number" name="stock_minimo" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="class form-group">
                                    <label for="stock_maximo">Stock maximo:</label>
                                    <input type="number" name="stock_maximo" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="class form-group">
                                    <label for="precio_compra">Precio compra:</label>
                                    <input type="text" name="precio_compra" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="class form-group">
                                    <label for="precio_venta">Precio venta:</label>
                                    <input type="text" name="precio_venta" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="class form-group">
                                    <label for="fecha_ingreso">Fecha de ingreso:</label>
                                    <input type="date" name="fecha_ingreso" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Seleccione la Imagen del producto</label>
                                    <input type="file" id="file" name="imagen">
                                    <output id="list"></output>
                                </div>
                            </div>
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
                                    </div>
                                    
                                </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="class form-group">
                                    <label for="usuario">Usuario:</label>
                                    <input type="text" name="id_usuario" value="<?php echo $id_usuarioSesion;?>"class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="class form-group">
                                    <label for="usuario">Email:</label>
                                    <input type="text" name="email" disabled 
                                          value="<?php echo $emailSesion;?>"class="form-control" >
                                    <input type="text" value="<?php echo $id_usuarioSesion ?>" hidden>
                                </div>
                            </div>
                            
                         </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                        </div>
                        
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
 
