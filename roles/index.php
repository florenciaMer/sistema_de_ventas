<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';

include('../app/controllers/roles/listado_de_roles.php');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Listado de Roles</h1>
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
        <div class="col-md-6">
          <div class="card card-outline card-primary">
              <div class="card-header">
                  <h3 class="card-title">Roles registrados</h3>

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
                      <th class="text-center p-2">Nombre del rol</th>
                      <th class="text-center p-2">Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                    <?php
                    $contador = 0;
                    foreach ($roles_datos as $dato) { 
                      $contador=$contador +1;
                      $id_rol = $dato['id_rol'];
                      ?>
                      <tr>
                        <td class="text-center p-2"><?php echo $contador; ?></td>
                        <td class="text-center p-2"><?php echo $dato['nombre']; ?></td>
                        <td class="text-center p-2">
                          <div class="btn-group">
                            <a href="update.php?id=<?php echo $id_rol;?>" class="btn btn-success m-1"><i class="fa fa-pencil-alt"></i>Editar</a>
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
  <script>
  $(function () {
    $("#example1").DataTable({
      "pageLength": 5,
    "language":{
      "emptyTable": "No hay información",
      "info": "Mostrando_START_a _END_de_Total_roles",
      "infoEmpty":"Mostrando 0 a 0 de 0 roles",
      "infoFiltered":"(Filtrado de _MAX_ total roles)",
      "infoPostFix": "",
      "thousands":",",
      "lengthMenu": "Mostrar _MENU_roles",
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


