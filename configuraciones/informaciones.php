<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Listado de informaciones</h1>
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
             
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <a href="<?php echo $URL ?>/configuraciones/create.php" class="btn btn-primary mb-3">Registrar nuevo</a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th class="text-center p-2">Nombre de la Empresa</th>
                      <th class="text-center p-2">Actividad</th>
                      <th class="text-center p-2">Sucursal</th>
                      <th class="text-center p-2">Domicilio</th>
                      <th class="text-center p-2">Zona</th>
                      <th class="text-center p-2">Telefono</th>
                      <th class="text-center p-2">Pais</th>
                      <th class="text-center p-2">Accion</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                    <?php
                  
                        $sql_configuraciones = "SELECT * FROM informaciones";
                        $query_configuraciones = $pdo->prepare($sql_configuraciones);
                        $query_configuraciones->execute();
                        $configuraciones_dato = $query_configuraciones->fetchAll(pdo::FETCH_ASSOC);
                        foreach ($configuraciones_dato as  $configuraciones) {
                
                      ?>
                      <tr>
                       
                        <td class="text-center p-2"><?php echo $configuraciones['nombre_empresa']; ?></td>
                        <td class="text-center p-2"><?php echo $configuraciones['actividad']; ?></td>
                        <td class="text-center p-2"><?php echo $configuraciones['sucursal']; ?></td>
                        <td class="text-center p-2"><?php echo $configuraciones['domicilio']; ?></td>
                        <td class="text-center p-2"><?php echo $configuraciones['zona']; ?></td>
                        <td class="text-center p-2"><?php echo $configuraciones['telefono']; ?></td>
                        <td class="text-center p-2"><?php echo $configuraciones['pais']; ?></td>
                        <td>
                            <a href="update.php?id=<?php echo $configuraciones['id_informacion']; ?>" class="btn btn-primary">Editar</a>
                            <a href="delete.php?id=<?php echo $configuraciones['id_informacion'];?>" class="btn btn-danger m-1 btn-sm"><i class="fa fa-trash"></i>Borrar</a>

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
      "info": "Mostrando_START_a _END_de_Total_usuarios",
      "infoEmpty":"Mostrando 0 a 0 de 0 Usuarios",
      "infoFiltered":"(Filtrado de _MAX_ total Usuarios)",
      "infoPostFix": "",
      "thousands":",",
      "lengthMenu": "Mostrar _MENU_usuarios",
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


