<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
include('../app/controllers/compras/cargar_compra.php');
include('../app/controllers/comprobantes/listado_de_comprobantes.php');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Detalle de la venta</h1>
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
                                         <input type="text" name="codigo" id="codigo" disabled class="form-control" value="<?php echo $codigo?>">
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="class form-group">
                                         <label for=''>Nombre</label>
                                         <input type="text" name="nombre" id="nombre" disabled class="form-control"value="<?php echo $nombre?>">
                                     </div>
                                 </div>
                                 <div class="col-md-5">
                                     <div class="class form-group">
                                         <label for=''>Descripcion</label>
                                         <input type="text" name="descripcion" id="descripcion" disabled class="form-control" value="<?php echo $descripcion?>">
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="class form-group">
                                         <label for=''>Stock</label>
                                         <input type="text" name="stock" id="stock" style="background-color:gold;" class="form-control" value="<?php echo $stock?>">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-9 d-flex">
                                 <div class="col-md-3">
                                     <div class="class form-group">
                                         <label for=''>Stock Minimo</label>
                                         <input type="text" name="stock_minimo" id="stock_minimo" disabled class="form-control" value="<?php echo $stock_minimo?>">
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="class form-group">
                                         <label for=''>Stock Maximo</label>
                                         <input type="text" name="stock_maximo" id="stock_maximo" disabled class="form-control" value="<?php echo $stock_maximo?>">
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="class form-group">
                                         <label for=''>Precio compra</label>
                                         <input type="text" name="precio_compra" id="precio_compra" disabled class="form-control" value="<?php echo $precio_compra?>">
                                     </div>
                                 </div>
                                 <div class="col-md-3">
                                     <div class="class form-group">
                                         <label for=''>Precio de venta</label>
                                         <input type="text" name="precio_venta" id="precio_venta" disabled class="form-control" value="<?php echo $precio_venta?>">
                                     </div>
                                 </div>
                                 <div class="col-md-4">
                                     <div class="class form-group">
                                         <label for=''>Fecha Ingreso</label>
                                         <input type="date" name="fecha_ingreso" id="fecha_ingreso" disabled class="form-control" value="<?php echo $fecha_ingreso?>">
                                     </div>
                                 </div>
                             </div>
 
 
                         </div> <!-- fin row-->
                     </form>
                 </div>
 
              
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
                    <input disabled id="nombre_proveedor" type="text" class="form-control" value="<?php echo $nombre_proveedor?>">
                    <small style="color: red; display:none"  id='lbl_nombre'>* Este campo es requerido</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Celular <b>*</b></label>
                    <input disabled id="celular" type="text" class="form-control" value="<?php echo $celular?>">
                    <small style="color: red; display:none"  id='lbl_celular'>* Este campo es requerido</small>
                    </div>
            </div>
              
              
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Telefono <b>*</b></label>
                    <input disabled id="telefono" type="text" class="form-control" value="<?php echo $telefono?>">
                    <small style="color: red; display:none"  id='lbl_telefono'>* Este campo es requerido</small>
                  </div>
                </div>
            </div>
                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="">Nombre Empresa <b>*</b></label>
                      <input disabled id="empresa" type="text" class="form-control" value="<?php echo $empresa?>">
                      <small style="color: red; display:none"  id='lbl_nombre_empresa'>* Este campo es requerido</small>
                  </div>
              </div>
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="">Direccion <b>*</b></label>
                      <input disabled id="direccion" type="text" class="form-control" value="<?php echo $direccion?>">
                      <small style="color: red; display:none"  id='lbl_direccion'>* Este campo es requerido</small>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                      <label for="">Email <b>*</b></label>
                      <input disabled id="email" type="text" class="form-control" value="<?php echo $email?>">
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
                        <input type="text" class="form-control"  name="" disabled value="<?php  echo $nro_compra;?>" disabled>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Fecha de compra</label>
                        <input type="date" class="form-control" id="fecha_compra" name="fecha" value="<?php echo $fecha_compra;?>">
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
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Cantidad</label>
                            <input type="number" id="cantidad_compra" value="<?php echo $cantidad;?>"class="form-control"name="cantidad">
                        </div>                 
                      
                         <div class="col-md-12">
                    <div class="form-group">
                        <label>Precio total </label>
                        <input type="string" class="form-control" id="total_compra"value="<?php echo $total_compra;?>" name="total_compra">
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
                    <button class="btn btn-primary block" id="btn_guardar_compra">Guardar</button>
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