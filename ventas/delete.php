<?php
$id_venta_get = $_GET['id'];
$id_cliente = $_GET['id_cliente'];

include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../layout/mensajes.php';
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/compras/cargar_compra.php');
include('../app/controllers/clientes/listado_de_clientes.php');
include('../app/controllers/ventas/cargar_venta.php');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Eliminacion de la Venta</h1>
                 
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
                         <div class="card card-danger">
                             <div class="card-header">
                                 <h3 class="card-title">¿Esta seguro de eliminar la venta Nro <?php echo $id_venta_get ?>?</h3>

                                 <div class="card-tools">
                                     <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                     </button>
                                 </div>
                                 <!-- /.card-tools -->
                             </div>
                             <!-- /.card-header -->
                             
 
             <hr>
             <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-cart-plus"></i> Carrito </h3>
                        
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover table-sm" id="tabla_productos" >
                                <thead>
                                    <tr>
                                        <th style="background-color: #e7e7e7; text-align:center">Nro</th>
                                        <th style="background-color: #e7e7e7; text-align:center">Producto</th>
                                        <th style="background-color: #e7e7e7; text-align:center">Detalle</th>
                                        <th style="background-color: #e7e7e7; text-align:center">Cantidad</th>
                                        <th style="background-color: #e7e7e7; text-align:center">Precio unitario</th>
                                        <th style="background-color: #e7e7e7; text-align:center">Precio Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align: center;">
                                        <?php 
                                        $contador_carrito = 0;
                                        $sql_carrito = "SELECT * FROM carrito 
                                        INNER JOIN almacen on almacen.id_producto = carrito.id_producto
                                        WHERE nro_venta = '$id_venta_get'
                                        ";
                                        $queryy_carrito = $pdo->prepare($sql_carrito);
                                        $queryy_carrito->execute();
                                        $carrito_dato = $queryy_carrito->fetchAll(pdo::FETCH_ASSOC);
                                        foreach ($carrito_dato as  $carrito) {
                                            $id_carrito = $carrito['id_carrito'];

                                            $contador_carrito = $contador_carrito+1;?>
                                            <tr style="text-align:center;">
                                                <td><?php echo $contador_carrito; ?></td>
                                                <input type="text" id="id_producto<?php echo $contador_carrito?>" value="<?php echo $carrito['id_producto']?>" hidden>
                                                <td><?php echo $carrito['nombre']; ?></td>
                                                <td><?php echo $carrito['descripcion']; ?></td>
                                                <td><span id="cantidad_carrito<?php echo $contador_carrito?>"><?php echo $carrito['cantidad_carrito']; ?></span>
                                                    <input type="text" value="<?php echo $carrito['stock']; ?>" id="stock_de_inventario<?php echo $contador_carrito?>" hidden>
                                                 </td>
                                                <td><?php echo '$'.$carrito['precio_venta']; ?></td>
                                                <td><?php echo '$'.$carrito['precio_venta']* $carrito['cantidad_carrito']; ?></td>
                                            </tr>
                                       <?php }
                                        ?>

                                    </tr>
                                    <tr>
                                        <th colspan="3" style="background-color: #e7e7e7; text-align:right">Total</th>
                                        <th style="background-color: #e7e7e7; text-align:center">
                                            <?php 
                                                $total_cantidad = 0;
                                                foreach ($carrito_dato as $value) {
                                                   $total_cantidad = $value['cantidad_carrito']+ $total_cantidad;
                                                }
                                                echo $total_cantidad;
                                            ?>
                                        </th>
                                        <th style="background-color: #e7e7e7; text-align:center">
                                            <?php 
                                                $precio_total = 0;
                                                foreach ($carrito_dato as $value) {
                                                   $precio_total = $value['precio_venta']+ $precio_total;
                                                }
                                                echo '$'.$precio_total;
                                            ?>
                                        </th>
                                        <th style="background-color:yellow; text-align:center">
                                            <?php 
                                                $subtotal = 0;
                                                
                                                foreach ($carrito_dato as $carrito_value) {
                                                   $subtotal = $carrito_value['precio_venta']*$carrito_value['cantidad_carrito'] + $subtotal;
                                                  
                                                }
                                                echo '$' .$subtotal.'.-';
                                            ?>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-user-check"></i> Datos del cliente </h3>
                        
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <br>
                        <?php foreach ($clientes_datos as $cliente) {
                            if ($cliente['id_cliente'] == $id_cliente) {?>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nombre del Cliente</label>
                                        <input type="text" hidden class="form-control" id="id_cliente" name="id_cliente">
                                        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente"
                                        value="<?php echo $cliente['nombre_cliente'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nit_CI del Cliente</label>
                                        <input type="text" class="form-control" id="nit_ci_cliente" name="nit_ci_cliente"
                                        value="<?php echo $cliente['nit_ci_cliente'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Celular del Cliente</label>
                                        <input type="text" class="form-control" id="celular_cliente" name="celular_cliente"
                                        value="<?php echo $cliente['celular_cliente'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Correo del Cliente</label>
                                        <input type="text" class="form-control" id="correo_cliente" name="correo_cliente"
                                        value="<?php echo $cliente['correo_cliente'] ?>" disabled>
                                    </div>
                                </div>
                            </div>
                     <?php   } }?>
                         
                        </div>
                    </div>
                </div>
                
            <hr>
            <div class="col-md-4 align-items-center">
                <div class="form-group">
                    <button class="btn btn-danger btn-block" id="btn_eliminar">
                        <i class="fas fa-trash"> Eliminar </i>
                    </button>
                </div>
            </div>
            
            <div id="respuesta_delete"></div>

            <script>
                $('#btn_eliminar').click(function () {
                    
                    Swal.fire({
                        title: '¿Está seguro de eliminar la venta?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si deseo eliminar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                eliminar(),
                                window.location.href = "<?php echo $URL; ?>/ventas" 
                               // location.href = "<?php echo $URL; ?>/ventas"  
                            )
                        }
                    });

                    function eliminar() {
                        var nro_venta = '<?php echo $id_venta_get; ?>';
                        var id_cliente = $('#id_cliente').val();;
                        var url = "../app/controllers/ventas/delete.php";
                        $.get(url,{nro_venta:nro_venta, id_cliente:id_cliente},function (datos) {
                            $('#respuesta_delete').html(datos);
                        });
                    }
                });
            </script>

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