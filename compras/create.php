<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
include('../app/controllers/compras/listado_de_compras.php');
include('../app/controllers/comprobantes/listado_de_comprobantes.php');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Registro un una nueva Compra</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <div class="row ml24">

    
     <div class="row col-md-9">
     
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
                                 <div class="d-flex">
                                     <h5>Datos del producto</h5>
                                     <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#modal-buscar-producto">
                                         <i class="fas fa-search"></i>
                                         Buscar producto
                                     </button>
 
 
                                     <!-- inicio modal buscar -->
                                     <div class="modal fade" id="modal-buscar-producto">
                                         <div class="modal-dialog modal-xl">
                                             <div class="modal-content">
                                                 <div class="modal-header bg-success text-white">
                                                     <h4 class="modal-title">Busqueda del Producto</h4>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                         <span aria-hidden="true">&times;</span>
                                                     </button>
                                                 </div>
                                                 <div class="modal-body">
 
                                                     <table id="example1" class="table table-bordered table-striped">
                                                         <thead>
                                                             <tr>
                                                                 <th class="text-center p-2">Nro</th>
                                                                 <th class="text-center p-2">Seleccionar</th>
                                                                 <th class="text-center p-2">Codigo</th>
                                                                 <th class="text-center p-2">Nombre del producto</th>
                                                                 <th class="text-center p-2">Descripcion</th>
                                                                 <th class="text-center p-2">Stock</th>
                                                                 <th class="text-center p-2">Stock minimo</th>
                                                                 <th class="text-center p-2">Stock maximo</th>
                                                                 <th class="text-center p-2">Precio de compra</th>
                                                                 <th class="text-center p-2">Precio de venta</th>
                                                                 <th class="text-center p-2">Fecha de ingreso</th>
                                                                 <th class="text-center p-2">Imagen</th>
                                                             </tr>
                                                         </thead>
                                                         <tbody>
                                                             <?php
                                                             $contador = 0;
                                                             foreach ($productos_datos as $dato) {
                                                                 $contador = $contador + 1;
                                                                 $id_producto = $dato['id_producto'];
                                                             ?>
                                                                 <tr>
                                                                     <td class="text-center p-2 articulos"><?php echo $contador; ?></td>
                                                                     <td>
                                                                         <button class="btn btn-info" id="btn-seleccionar<?php echo $id_producto ?>">
                                                                             Seleccionar</button>
                                                                     </td>
                                                                     <script>
                                                                         $('#btn-seleccionar<?php echo $id_producto ?>').click(function() {
                                                                                 var id_producto = "<?php echo $dato['id_producto'] ?>";
                                                                                 $('#id_producto').val(id_producto);

                                                                                 var codigo = "<?php echo $dato['codigo'] ?>";
                                                                                 $('#codigo').val(codigo);
 
                                                                                 var nombre_producto = "<?php echo $dato['nombre'] ?>";
                                                                                 $('#nombre').val(nombre_producto);
 
                                                                                 var descripcion = "<?php echo $dato['descripcion'] ?>";
                                                                                 $('#descripcion').val(descripcion);
 
                                                                                 var stock = "<?php echo $dato['stock'] ?>";
                                                                                 $('#stock').val(stock);
 
                                                                                 $('#stock_actual').val(stock);
 
                                                                                 var stock_minimo = "<?php echo $dato['stock_minimo'] ?>";
                                                                                 $('#stock_minimo').val(stock_minimo);
 
                                                                                 var stock_maximo = "<?php echo $dato['stock_maximo'] ?>";
                                                                                 $('#stock_maximo').val(stock_maximo);
 
                                                                                 var precio_compra = "<?php echo $dato['precio_compra'] ?>";
                                                                                 $('#precio_compra').val(precio_compra);
 
                                                                                 var precio_venta = "<?php echo $dato['precio_venta'] ?>";
                                                                                 $('#precio_venta').val(precio_venta);
 
                                                                                 var fecha_ingreso = "<?php echo $dato['fecha_ingreso'] ?>";
                                                                                 $('#fecha_ingreso').val(fecha_ingreso);
 
                                                                                 var img_ruta = "<?php echo $URL . '/almacen/productos_img/' . $dato['imagen'] ?>";
 
                                                                                 $('#img_producto').attr({
                                                                                     src: img_ruta
                                                                                 });
 
 
                                                                                 $('#modal-buscar-producto').modal('toggle');
 
                                                                             }
 
                                                                         );
                                                                     </script>
 
                                                                     <td class="text-center p-2 articulos"><?php echo $dato['codigo']; ?></td>
                                                                     <td class="text-center p-2 articulos"><?php echo $dato['nombre']; ?></td>
                                                                     <td class="text-center p-2 articulos"><?php echo $dato['descripcion']; ?></td>
                                                                     <td class="text-center p-2 articulos"><?php echo $dato['stock']; ?></td>
                                                                     <td class="text-center p-2 articulos"><?php echo $dato['stock_minimo']; ?></td>
                                                                     <td class="text-center p-2 articulos"><?php echo $dato['stock_maximo']; ?></td>
                                                                     <td class="text-center p-2 articulos"><?php echo $dato['precio_compra']; ?></td>
                                                                     <td class="text-center p-2 articulos"><?php echo $dato['precio_venta']; ?></td>
                                                                     <td class="text-center p-2 articulos"><?php echo $dato['fecha_ingreso']; ?></td>
                                                                     <td class="text-center p-2 articulos">
                                                                         <img id='imagen' src="<?php echo $URL . "/almacen/productos_img/" . $dato['imagen']; ?>" width='40%' alt='img coca cola'>
                                                                     </td>
 
 
                                                                 </tr>
                                                             <?php }
                                                             ?>
 
                                                         </tbody>
                                                     </table>
 
                                                     <!-- fin modal buscar -->
                                                     <hr>
 
                                                 </div><!-- fin modal buscar -->
                                                 <div class="modal-footer justify-content-between">
                                                     <button type="button" class="btn btn-success" id="btn_update_proveedor<?php echo $id_proveedor; ?>">Guardar Cambios</button>
                                                     <div id='respuesta_proveedor'>
 
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div> <!-- cierro div flex que contiene form buscar-->
 
 
                                 </div>
                             </div>
                             <!-- /.card-body -->
                         </div>
                         <!-- /.card -->
                     </div>
                 </div>
             </div>
      
     
             <hr>
             <div class="row">
                 <div class="class col-md-9">
                     <form action='../app/controllers/almacen/create.php' method="post">
                         <div class="row">
                             <div class="col-md-9 d-flex">
                                 <div class="col-md-3">
                                     <div class="class form-group">
                                         <label for=''>Codigo</label>
                                         <input type="text" id="id_producto" hidden>
                                         <input type="text" name="codigo" id="codigo" disabled class="form-control">
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="class form-group">
                                         <label for=''>Nombre</label>
                                         <input type="text" name="nombre" id="nombre" disabled class="form-control">
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="class form-group">
                                         <label for=''>Descripcion</label>
                                         <input type="text" name="descripcion" id="descripcion" disabled class="form-control">
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="class form-group">
                                         <label for=''>Stock</label>
                                         <input type="text" name="stock" id="stock" style="background-color:gold;" class="form-control">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-9 d-flex">
                                 <div class="col-md-3">
                                     <div class="class form-group">
                                         <label for=''>Stock Minimo</label>
                                         <input type="text" name="stock_minimo" id="stock_minimo" disabled class="form-control">
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="class form-group">
                                         <label for=''>Stock Maximo</label>
                                         <input type="text" name="stock_maximo" id="stock_maximo" disabled class="form-control">
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="class form-group">
                                         <label for=''>Precio compra</label>
                                         <input type="text" name="precio_compra" id="precio_compra" disabled class="form-control">
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="class form-group">
                                         <label for=''>Precio de venta</label>
                                         <input type="text" name="precio_venta" id="precio_venta" disabled class="form-control">
                                     </div>
                                 </div>
                                 <div class="col-md-4">
                                     <div class="class form-group">
                                         <label for=''>Fecha Ingreso</label>
                                         <input type="date" name="fecha_ingreso" id="fecha_ingreso" disabled class="form-control">
                                     </div>
                                 </div>
                             </div>
 
 
                         </div> <!-- fin row-->
                     </form>
                 </div>
 
             <div class="d-flex">
                 <h5>Datos del proveedor</h5>
                 <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#modal-buscar-proveedor">
                     <i class="fas fa-search"></i>
                     Buscar proveedor
                 </button>
             </div>
             <!-- modal buscar proveedor-->
             <div class="modal fade" id="modal-buscar-proveedor">
                 <div class="modal-dialog modal-xl">
                     <div class="modal-content">
                         <div class="modal-header bg-success text-white">
                             <h4 class="modal-title">Busqueda del Proveedor</h4>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
 
                     <table id="example2" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                         <th class="text-center p-2">Nro</th>
                         <th class="text-center p-2">Seleccionar</th>
                         <th class="text-center p-2">Nombre del Proveedor</th>
                         <th class="text-center p-2">Celular</th>
                         <th class="text-center p-2">Telefono</th>
                         <th class="text-center p-2">Nombre de la empresa</th>
                         <th class="text-center p-2">Email</th>
                         <th class="text-center p-2">Direccion</th>
                         
                     </tr>
                     </thead>
                     <tbody>
                     
                         <?php
                         $contador = 0;
                         foreach ($proveedores_datos as $dato) { 
                         $contador=$contador +1;
                 
                         $id_proveedor = $dato['id_proveedor'];
                         $nombre_proveedor = $dato['nombre_proveedor'];
                         $celular = $dato['celular'];
                         $telefono = $dato['telefono'];
                         $nombre_empresa = $dato['empresa'];
                         $email = $dato['email'];
                         $direccion = $dato['direccion'];
                         
                         ?>
                         
                         <tr>
                             <td class="text-center p-2"><?php echo $contador; ?></td>
                             <td>
                                 <button class="btn btn-info" id="btn-seleccionar_proveedor<?php echo $id_proveedor;?>">
                                     Seleccionar
                                 </button>
                             </td>
                             <script>
                                 $('#btn-seleccionar_proveedor<?php echo $id_proveedor;?>').click(function(){
                                     
                                     var id_proveedor = "<?php echo $dato['id_proveedor'] ?>";
                                     $('#id_proveedor').val(id_proveedor);

                                     var nombre_proveedor = "<?php echo $dato['nombre_proveedor'] ?>";
                                     $('#nombre_proveedor').val(nombre_proveedor);
 
                                     var celular = "<?php echo $dato['celular'] ?>";
                                     $('#celular').val(celular);
 
                                     var telefono = "<?php echo $dato['telefono'] ?>";
                                     $('#telefono').val(telefono);
 
                                     var empresa = "<?php echo $dato['empresa'] ?>";
                                     $('#empresa').val(empresa);
 
                                     var email = "<?php echo $dato['email'] ?>";
                                     $('#email').val(email);
 
                                     var direccion = "<?php echo $dato['direccion'] ?>";
                                     $('#direccion').val(direccion);
 
                                     $('#modal-buscar-proveedor').modal('toggle');
                                 })
                             </script>
             
                             <td class="text-center p-2"><?php echo $dato['nombre_proveedor']; ?></td>
                             <td>
                             <a href="https://wa.me/54<?php echo $dato['celular']; ?>" target="_blank" 
                             class="btn btn-success">
                                 <i class="fas fa-phone"></i><?php echo $dato['celular']; ?>
                             </a>
                             </td>
                             <td class="text-center p-2"><?php echo $dato['telefono']; ?></td>
                             <td class="text-center p-2"><?php echo $dato['empresa']; ?></td>
                             <td class="text-center p-2"><?php echo $dato['email']; ?></td>
                             <td class="text-center p-2"><?php echo $dato['direccion']; ?></td>
                             
                         
                             <div id="respuesta_update<?php echo $id_proveedor;?>">
                                 <?php }?>
                                 
                                 <!-- fin modal buscar -->
                                 <hr>
                                 
                             </div><!-- fin modal buscar -->
                             <div class="modal-footer justify-content-between">
                                 <button type="button" class="btn btn-success" id="btn_update_proveedor<?php echo $id_proveedor; ?>">Guardar Cambios</button>
                                 <div id='respuesta_proveedor'>
                                 </div>
                             </div>
                         </div>
                             </tr>
                         </tbody>
                     </table>
                     
                     </form>
                     <!-- fin de nuestro contenido -->
                 </div><!-- /.container-fluid -->
             </div>
         </div>
     </div>
     
        <!-- /.content -->
        <hr> 
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Nombre del Proveedor <b>*</b></label>
               
                    <input hidden id="id_proveedor" type="text" class="form-control">
                    <input disabled id="nombre_proveedor" type="text" class="form-control">
                    <small style="color: red; display:none"  id='lbl_nombre'>* Este campo es requerido</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Celular <b>*</b></label>
                    <input disabled id="celular" type="text" class="form-control">
                    <small style="color: red; display:none"  id='lbl_celular'>* Este campo es requerido</small>
                    </div>
            </div>
              
              
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Telefono <b>*</b></label>
                    <input disabled id="telefono" type="text" class="form-control">
                    <small style="color: red; display:none"  id='lbl_telefono'>* Este campo es requerido</small>
                  </div>
                </div>
            </div>
                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="">Nombre Empresa <b>*</b></label>
                      <input disabled id="empresa" type="text" class="form-control">
                      <small style="color: red; display:none"  id='lbl_nombre_empresa'>* Este campo es requerido</small>
                  </div>
              </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="">Direccion <b>*</b></label>
                      <input disabled id="direccion" type="text" class="form-control">
                      <small style="color: red; display:none"  id='lbl_direccion'>* Este campo es requerido</small>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label for="">Email <b>*</b></label>
                      <input disabled id="email" type="text" class="form-control">
                      <small style="color: red; display:none"  id='lbl_email'>* Este campo es requerido</small>
                  </div>
                </div>
            </div>
        </div>
    </div>
   
</div>
    <div class="row col-md-3">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Detalle de compra</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>
            <div class="card-body">
                <?php $contador_compras =1;
                foreach ($compras_datos as $dato) {
                    $contador_compras = $contador_compras+1;
                }
                ?>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Numero de compra</label>
                        <input type="text" class="form-control"  name="" disabled value="<?php  echo $contador_compras;?>" disabled>
                        <input type="text" class="form-control" id="numero_compra" name="" hidden value="<?php  echo $contador_compras;?>">

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Fecha de compra</label>
                        <input type="date" class="form-control" id="fecha_compra" name="fecha" value="<?php echo $fechahora;?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="class form-group">
                        <label for="id_comprobante">Comprobante:</label>
                        <div class="d-flex">
                            <select name="id_comprobante" id="id_comprobante" class="form-control">
                                
                                <?php 
                                foreach ($comprobantes_datos as $comprobante) {
                                    ?>
                                    <option value="<?php echo $comprobante['id_comprobante'];?>">
                                    <?php echo $comprobante['nombre_comprobante'];?>
                                    </option>
                                
                                <?php
                                    }
                                    ?>
                            </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stock actual</label>
                            <input type="text" disabled id="stock_actual" class="form-control"name="stock_actual">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stock Total</label>
                            <input type="text" id="stock_total" class="form-control"name="stock_total" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Cantidad</label>
                            <input type="number" id="cantidad_compra" class="form-control"name="cantidad">
                        </div>
                        <script>
                            $('#cantidad_compra').keyup(function(){
                                sumarCantidades();
                            })
                            function sumarCantidades(){
                                var stock_actual = $('#stock_actual').val();
                                var cantidad_compra = $('#cantidad_compra').val();
                                var cant_total = parseInt(stock_actual)+ parseInt(cantidad_compra);
                                $('#stock_total').val(cant_total);

                                var precio_producto_venta =  $('#precio_venta').val();
                                var venta_total = parseInt(cantidad_compra)* parseInt(precio_producto_venta);
                                $('#total_compra').val(venta_total);
                            }
                        </script>                 
                      
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Precio total </label>
                        <input type="string" class="form-control" id="total_compra" name="total_compra">
                    </div>
                </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text"value="<?php echo $emailSesion?>" class="form-control" id="fecha_compra" name="">
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-md-12">
                <div class="form-group">
                    <button class="btn btn-primary block" id="btn_guardar_compra">Guardar compra</button>
                </div>
            </div>
            <div id="respuesta_compra"></div>
          
            <script>
                $('#btn_guardar_compra').click(function(){
                    var id_producto = $('#id_producto').val();
                    var numero_compra = $('#numero_compra').val();
                    var fecha_compra = $('#fecha_compra').val();
                    var id_proveedor = $('#id_proveedor').val();
                    var id_comprobante = $('#id_comprobante').val();
                    var total_compra = $('#total_compra').val();
                    var cantidad = $('#cantidad_compra').val();
                    var stock_total = $('#stock_total').val();
                    var id_usuario = <?php echo $id_usuarioSesion;?>;

                  
                    if (id_producto == "") {
                        $('#id_producto').focus();
                        alert("Debe ingresar un producto");

                    } else if (fecha_compra == "") {
                        $('#fecha_compra').focus();
                        alert("Debe ingresar una fecha de compra");

                    } else if (id_proveedor == "") {
                        $('#id_proveedor').focus();
                        alert("Debe seleccionar un proveedor");

                    } else if (id_comprobante == "") {
                        $('#id_comprobante').focus();
                        alert("Debe seleccionar un comprobante");

                    } else if (cantidad == "") {
                        $('#cantidad_compra').focus();
                        alert("Debe ingresar una cantidad");
                    
                    } else if (precio_compra == "") {
                        $('#total_compra').focus();
                        alert("Debe ingresar un precio de compra");

                    }else{ 
                        
                        var url = "../app/controllers/compras/create.php";
                        $.get(url, {
                            id_producto:id_producto, 
                            fecha_compra:fecha_compra,
                            id_proveedor:id_proveedor,
                            id_usuario:id_usuario, 
                            id_comprobante:id_comprobante, 
                            total_compra:total_compra,
                            numero_compra:numero_compra, 
                            cantidad:cantidad,
                            stock_total:stock_total
                        }, function(datos){
                            $('#respuesta_compra').html(datos);
                        });
                    }
                })
            </script>
        </div>
    </div>
</div>
</div>

         
    <!-- /.content-wrapper -->

    <?php include '../layout/mensajes.php'; ?>
    <?php include '../layout/parte2.php'; ?>

    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "pageLength": 5,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando_START_a _END_de_Total_productos",
                    "infoEmpty": "Mostrando 0 a 0 de 0 productos",
                    "infoFiltered": "(Filtrado de _MAX_ total productos)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_productos",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando",
                    "search": "Buscador",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,


            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>

<script>
  $(function () {
    $("#example2").DataTable({
      "pageLength": 5,
    "language":{
      "emptyTable": "No hay información",
      "info": "Mostrando_START_a _END_de_Total_proveedores",
      "infoEmpty":"Mostrando 0 a 0 de 0 proveedores",
      "infoFiltered":"(Filtrado de _MAX_ total proveedores)",
      "infoPostFix": "",
      "thousands":",",
      "lengthMenu": "Mostrar _MENU_proveedores",
      "loadingRecords": "Cargando...",
      "processing":"Procesando",
      "search": "Buscador",
      "zeroRecords": "Sin resultados encontrados",
      "paginate":{
        "first":"Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Anterior"
        }
      },
      "responsive": true, "lengthChange": false, "autoWidth": false,
      buttons:[{
      extend:'collection',
      text: 'Reportes',
      orientation: 'landscape',
      buttons:[{
        text: 'Copiar',
        extend: 'copy',
      },{
        extend: 'pdf',
      },
      {
        extend: 'csv',
      },
      {
        extend: 'excel',
      },{
        text: 'Imprimir',
        extend: 'print',
      }]
    },
      {
        extend: 'colvis',
        text: 'Visor de columnas',
        collectionLayout: 'fixed three-column'
      }
    ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });

  
</script>