<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';

include('../app/controllers/almacen/listado_de_productos.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Listado de Productos</h1>
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
                 
                <h3 class="card-title">Productos registrados</h3>

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
                      <th class="text-center p-2">Email de usuario</th>
                      <th class="text-center p-2">Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $contador = 0;
                    foreach ($productos_datos as $dato) { 
                      $contador=$contador +1;
                      $id_producto = $dato['id_producto'];
                      ?>
                      <tr>
                        <td class="text-center p-2 articulos"><?php echo $contador; ?></td>
                        <td class="text-center p-2 articulos"><?php echo $dato['codigo']; ?></td>
                        <td class="text-center p-2 articulos"><?php echo $dato['nombre']; ?></td>
                        <td class="text-center p-2 articulos"><?php echo $dato['descripcion']; ?></td>
                        <?php 
                        $stock_actual = $dato['stock'];
                        $stock_maximo = $dato['stock_maximo'];
                        $stock_minimo = $dato['stock_minimo'];

                        if ($stock_actual < $stock_minimo) {?>
                          <td class="text-center p-2 articulos bg-danger"><?php echo $dato['stock']; ?></td>
                          <?php 
                        }else if( $stock_actual > $stock_maximo){ ?>
                          <td class="text-center p-2 articulos bg-success"><?php echo $dato['stock']; ?></td>
                          <?php }else{?>
                            <td class="text-center p-2 articulos"><?php echo $dato['stock']; ?></td>
                          <?php }?>

                         

                        <td class="text-center p-2 articulos"><?php echo $dato['stock_minimo']; ?></td>
                        <td class="text-center p-2 articulos"><?php echo $dato['stock_maximo']; ?></td>
                        <td class="text-center p-2 articulos"><?php echo $dato['precio_compra']; ?></td>
                        <td class="text-center p-2 articulos"><?php echo $dato['precio_venta']; ?></td>
                        <td class="text-center p-2 articulos"><?php echo $dato['fecha_ingreso']; ?></td>
                        <td class="text-center p-2 articulos">
                            <img src="<?php echo $URL."/almacen/productos_img/". $dato['imagen']; ?>" width='40%' alt='img coca cola'>
                        </td>
                        <td class="text-center p-2"><?php echo $dato['email']; ?></td>
                        <td class="text-center p-2">
                          <div class="btn-group">
                              <a href="show.php?id=<?php echo $id_producto;?>" class="btn btn-info m-1 btn-sm"><i class="fa fa-eye"></i>Ver</a>
                              <a href="update.php?id=<?php echo $id_producto;?>" class="btn btn-success m-1 btn-sm"><i class="fa fa-pencil-alt"></i>Editar</a>
                              <a href="delete.php?id=<?php echo $id_producto;?>" class="btn btn-danger m-1 btn-sm"><i class="fa fa-trash"></i>Borrar</a>
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
      "info": "Mostrando_START_a _END_de_Total_productos",
      "infoEmpty":"Mostrando 0 a 0 de 0 productos",
      "infoFiltered":"(Filtrado de _MAX_ total productos)",
      "infoPostFix": "",
      "thousands":",",
      "lengthMenu": "Mostrar _MENU_productos",
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


