<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';

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
            <h1 class="m-0">Listado de Compras</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       <!-- nuestro contenido -->
       <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-primary">
              <div class="card-header">
                 
                <h3 class="card-title">Compras registradas</h3>

                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  </div>
                  <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th class="text-center p-2">Nro</th>
                      <th class="text-center p-2">Nro de compra</th>
                      <th class="text-center p-2">Producto</th>
                      <th class="text-center p-2">Fecha de compra</th>
                      <th class="text-center p-2">Proveedor</th>
                      <th class="text-center p-2">Comprobante</th>
                      <th class="text-center p-2">Usuario</th>
                      <th class="text-center p-2">Precio de compra</th>
                      <th class="text-center p-2">Cantidad</th>
                      <th class="text-center p-2">Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $contador = 0;
                    foreach ($compras_datos as $dato) { 
                      $contador=$contador +1;
                      $id_compra = $dato['id_compra'];
                      ?>
                      <tr>
                        <td><?php  echo $contador=$contador +1;?></td>
                        <td><?php echo $dato['nro_compra']?></td>

                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#modal-producto<?php echo $id_compra;?>">
                            <?php echo $dato['nombre']?>
                        </td>

    <div class="modal fade" id="modal-producto<?php echo $id_compra;?>">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title">Datos del producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="row col-md-12">
                  <div class="col-md-2">
                      <div class="form-group">
                          <label for="codigo">Codigo</label>
                          <input type="text" class="form-control" value="<?php echo $dato['codigo']?>" disabled>
                      </div>
                  </div>
                
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="codigo">Categoria del producto</label>
                      <input type="text" class="form-control" value="<?php echo $dato['nombre_categoria']?>" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="codigo">Nombre del producto</label>
                      <input type="text" class="form-control" value="<?php echo $dato['nombre']?>" disabled>
                  </div>
                </div>
              <div class="col-md-8">
                <div class="form-group">
                    <label for="codigo">Descripcion del producto</label>
                    <input type="text" class="form-control" value="<?php echo $dato['descripcion']?>" disabled>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label for="codigo">Stock</label>
                    <input type="text" class="form-control" value="<?php echo $dato['stock']?>" disabled>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label for="codigo">Stock Minimo</label>
                    <input type="text" class="form-control" value="<?php echo $dato['stock_minimo']?>" disabled>
                </div>
              </div>
          
           
              <div class="col-md-3">
                <div class="form-group">
                    <label for="codigo">Stock Maximo</label>
                    <input type="text" class="form-control" value="<?php echo $dato['stock_maximo']?>" disabled>
                </div>
              </div>
           
              <div class="col-md-2">
                <div class="form-group">
                    <label for="codigo">Precio compra</label>
                    <input type="text" class="form-control" value="$<?php echo $dato['precio_compra']?>.-" disabled>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                    <label for="codigo">Precio venta</label>
                    <input type="text" class="form-control" value="$<?php echo $dato['precio_venta']?>.-" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="codigo">Fecha ingreso</label>
                    <input type="text" class="form-control" value="<?php echo $dato['fecha_ingreso']?>" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="codigo">Uuario</label>
                    <input type="text" class="form-control" value="<?php echo $dato['nombres']?>" disabled>
                
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="codigo">Proveedor</label>
                    <input type="text" class="form-control" value="<?php echo $dato['nombre_proveedor']?>" disabled>
                </div>
              </div>
                <div class="col-md-3">
                    <label for="imagen">Imagen</label>
                    <img src='<?php echo $URL."/almacen/productos_img/".$dato['imagen']?>' class="w-50" alt=''>
                </div>
            </div>
        </div> <!-- fin de la row-->
             
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-success" id="btn_update<?php echo $id_proveedor;?>">Guardar Cambios</button>
                  <div id='respuesta'>

              </div>
            </div>
        </div>
    </div>
                        <td><?php echo $dato['fecha_compra']?></td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#modal-proveedor<?php echo $id_compra;?>">
                            <?php echo $dato['nombre_proveedor']?>
                            </button>
                        </td>

    <div class="modal fade" id="modal-proveedor<?php echo $id_compra;?>">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title">Datos del Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="row col-md-12">
                  <div class="col-md-2">
                      <div class="form-group">
                          <label for="codigo">Nombre</label>
                          <input type="text" class="form-control" value="<?php echo $dato['nombre_proveedor']?>" disabled>
                      </div>
                  </div>
                
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="codigo">Celular</label>
                    <div class="form-group">
                     <a href="https://wa.me/54<?php echo $dato['celular']?>" target="_blank" class="btn btn-success">
                      <i class="fas fa-phone"></i><?php echo $dato['celular']?></a>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="codigo">Telefono</label>
                      <input type="text" class="form-control" value="<?php echo $dato['telefono']?>" disabled>
                  </div>
                </div>
              <div class="col-md-8">
                <div class="form-group">
                    <label for="codigo">Empresa</label>
                    <input type="text" class="form-control" value="<?php echo $dato['empresa']?>" disabled>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label for="codigo">Email</label>
                    <input type="text" class="form-control" value="<?php echo $dato['email']?>" disabled>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label for="codigo">Direccion</label>
                    <input type="text" class="form-control" value="<?php echo $dato['direccion']?>" disabled>
                </div>
              </div>
            </div>
        </div> <!-- fin de la row-->
             
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-success" id="btn_update_proveedor<?php echo $id_proveedor;?>">Guardar Cambios</button>
                  <div id='respuesta_proveedor'>

              </div>
            </div>
        </div>
    </div><!-- fin modal de proveedor-->
                    
                     
                       
                        <?php foreach ($comprobantes_datos as $value) {
                          if($value['id_comprobante'] == $dato['id_comprobante']){?>
                        
                          <td class="text-center p-2"><?php echo $value['nombre_comprobante']; ?></td>
                        <?php }
                       }?>
                        
                        <td><?php echo $dato['nombres']?></td>
                        <td>$<?php echo $dato['precio_compra']?>.-</td>
                        <td><?php echo $dato['cantidad']?></td>

                        <td class="text-center p-2">
                          <div class="btn-group">
                              <a href="show.php?id=<?php echo $id_compra;?>" class="btn btn-info m-1 btn-sm"><i class="fa fa-eye"></i>Ver</a>
                              <a href="update.php?id=<?php echo $id_compra;?>" class="btn btn-success m-1 btn-sm"><i class="fa fa-pencil-alt"></i>Editar</a>
                              <a href="delete.php?id=<?php echo $id_compra;?>" class="btn btn-danger m-1 btn-sm"><i class="fa fa-trash"></i>Borrar</a>
                          </div>
                        </td>
                      </tr>
                    <?php }
                    ?>             
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
  
  
  <!-- script para que cargue la datatable -->
  <!-- Page specific script -->
   <script src="../public/js/buscador.js"></script>
  <script>
  $(function () {
    $("#example1").DataTable({
      "pageLength": 5,
    "language":{
      "emptyTable": "No hay información",
      "info": "Mostrando_START_a _END_de_Total_compras",
      "infoEmpty":"Mostrando 0 a 0 de 0 compras",
      "infoFiltered":"(Filtrado de _MAX_ total compras)",
      "infoPostFix": "",
      "thousands":",",
      "lengthMenu": "Mostrar _MENU_compras",
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


