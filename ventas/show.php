<?php
$id_venta_get = $_GET['id'];
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/ventas/cargar_venta.php';
include '../app/controllers/almacen/listado_de_productos.php';
include '../app/controllers/clientes/listado_de_clientes.php';

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Ventas </h1>

                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-shopping-bag"></i> Venta nro <?php echo $id_venta_get; ?></h3>
                       
                        <input type="text" value="<?php echo $id_venta_get?>" disabled style="text-align: center;">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                        value="<?php echo $nombre_cliente ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nit_CI del Cliente</label>
                                        <input type="text" class="form-control" id="nit_ci_cliente" name="nit_ci_cliente"
                                        value="<?php echo $nit_ci_cliente ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Celular del Cliente</label>
                                        <input type="text" class="form-control" id="celular_cliente" name="celular_cliente"
                                        value="<?php echo $celular_cliente ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Correo del Cliente</label>
                                        <input type="text" class="form-control" id="correo_cliente" name="correo_cliente"
                                        value="<?php echo $correo_cliente ?>" disabled>
                                    </div>
                                </div>
                            </div>
                     <?php   } }?>
                         
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-shopping-bag"></i> Registro de Venta </h3>
                        </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Monto a cancelar</label>
                            <input type="text" class="form-control" style="background-color: yellow; text-align:center"
                            value="<?php echo $subtotal ?>" 
                            id="total_a_cancelar" name="total_a_cancelar" readonly>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total pagado</label>
                                    <input type="text" class="form-control" 
                                    id="total_pagado" name="total_pagado">
                                </div> 
                            </div>
                            <script>
                            $('#total_pagado').keyup(function(){
                               
                                var total_a_cancelar = $('#total_a_cancelar').val();
                               
                                var total_pagado =  $('#total_pagado').val();
                                var cambio = parseFloat(total_pagado) - parseFloat(total_a_cancelar);
                                
                                
                                $('#cambio').val(cambio);
                            })

                        </script>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="">Cambio</label>
                                    <input type="text" class="form-control" disabled
                                    id="cambio" name="cambio" >
                                </div> 
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary m-2" id="btn_guardar_venta">Guardar venta</button>
                    <div id="respuesta_venta"></div>
                    <div id="respuesta_ventaActualizarStock"></div>
                    <script>
                           $('#btn_guardar_venta').click(function(){
                            var nro_venta = "<?php echo $id_venta_get?>"
                            var id_cliente = $('#id_cliente').val();
                            var total_a_cancelar = $('#total_a_cancelar').val();
                            if(id_cliente == ""){
                                alert("Debe seleccionar un cliente");
                            }else{
                               
                               actualizar_stock();
                               guardar_venta();

                            }
                            function actualizar_stock(){
                                var stock ='';
                                var n = <?php echo $contador_carrito?>;
                              
                                for(var i =1;i<=n;i++){
                                    var a= ('#stock_de_inventario'+i);
                                    var stock_de_inventario = $(a).val();
                                    var b = '#cantidad_carrito'+i;
                                    var cantidad_carrito = $(b).html();  
                                    var stock_calculado = parseFloat(stock_de_inventario) - parseFloat(cantidad_carrito);

                                    var c = '#id_producto'+i;
                                    var id_producto = $(c).val();  

                                    var url2 = "../app/controllers/ventas/actualizar_stock.php";
                                    $.get(url2, {
                                        id_producto:id_producto, 
                                        stock_calculado:stock_calculado,
                                        
                                        }, function(datos){
                                            $('#respuesta_ventaActualizarStock').html(datos);
                                        });  
                                    //alert(id_producto  + ' - '+ cantidad_carrito + ' - '+ stock_calculado)

                                }
                            }
                            function guardar_venta(){
                                var url = "../app/controllers/ventas/registro_ventas.php";
                                    $.get(url, {
                                        nro_venta:nro_venta, 
                                        id_cliente:id_cliente,
                                        total_pagado:total_a_cancelar,
                                        }, function(datos){
                                            $('#respuesta_venta').html(datos);
                                        });  
                            }
                            
                           }) 
                    </script>
                </div>
            </div>
            </div>
        </div>
        
        
    </div>
</div>
                </div>   
            </div>
        </div>
        
    </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  
     
            </div>   
        </div>
    </div>
</div>                         
                        
      
           

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

<script>
  $(function () {
    $("#example3").DataTable({
      "pageLength": 5,
    "language":{
      "emptyTable": "No hay información",
      "info": "Mostrando_START_a _END_de_Total_clientes",
      "infoEmpty":"Mostrando 0 a 0 de 0 clientes",
      "infoFiltered":"(Filtrado de _MAX_ total clientes)",
      "infoPostFix": "",
      "thousands":",",
      "lengthMenu": "Mostrar _MENU_clientes",
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