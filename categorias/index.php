
<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';

include('../app/controllers/categorias/listado_de_categorias.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Listado de Categorías
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                 data-target="#modal-create">
                    <i class="fa fa-plus m-2"></i>Nuevo
                </button>
            </h1>
            

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
                  <h3 class="card-title">Categorías registradas</h3>

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
                      <th class="text-center p-2">Nombre de la Categoría</th>
                      <th class="text-center p-2">Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                    <?php
                    $contador = 0;
                    foreach ($categorias_datos as $dato) { 
                      $contador=$contador +1;
                      
                      $id_categoria = $dato['id_categoria'];
                     
                      $nombre_categoria = $dato['nombre_categoria'];
                     
                      ?>
                    
                      <tr>
                        <td class="text-center p-2"><?php echo $contador; ?></td>
                        <td class="text-center p-2"><?php echo $dato['nombre_categoria']; ?></td>
                        <td class="text-center p-2">
                          <div class="btn-group">
                          <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                           data-target="#modal-update<?php echo $id_categoria;?>">
                            <i class="fa fa-pencil-alt m-2"></i>Editar
                        </button>
                        
                        <div id="respuesta_update<?php echo $id_categoria;?>">
                        <!-- modal update para editar categorias -->
<div class="modal fade" id="modal-update<?php echo $id_categoria;?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title">Actualización de la Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="class row">
                    <div class="class col-12">
                        <div class="form-group">
                            <label for="">Nombre de la categoria</label>
                            <input id="nombre_categoria<?php echo $id_categoria;?>"value="<?php echo $nombre_categoria;?>" type="text" class="form-control">
                            <small style="color: red; display:none"  id='lbl_update<?php echo $id_categoria?>'>* Este campo es requerido</small>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="btn_update<?php echo $id_categoria;?>">Actualizar</button>
                <div id='respuesta_update<?php echo $id_categoria;?>'>

                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal update -->
<script>
$('#btn_update<?php echo $id_categoria;?>').click(function(){
 
  let nombre_categoria =  $('#nombre_categoria<?php echo $id_categoria;?>').val();
  
  let id_categoria =  <?php echo $id_categoria; ?>;
  if (nombre_categoria == "") {
    $('#nombre_categoria<?php echo $id_categoria;?>').focus();
         // document.getElementById('lbl_create').style.display = 'block';
         $('#lbl_update<?php echo $id_categoria?>').css('display', 'block');
  }else{
    let url = "../app/controllers/categorias/update_de_categorias.php";
         $.get(url, {nombre_categoria:nombre_categoria, id_categoria:id_categoria}, function(datos){
          $('#respuesta_update<?php echo $id_categoria;?>').html(datos);
         });
    }
  });
</script>

</div>
                        </td>
                      </tr>
                      
                    <?php }
                    ?>
                        
                  </tbody>
                  <tfoot>
                  <tr>
                      <th class="text-center p-2">Nro</th>
                      <th class="text-center p-2">Nombre de la categoría</th>
                      <th class="text-center p-2">Acciones</th>

                  </tr>
                  </tfoot>
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
      "info": "Mostrando_START_a _END_de_Total_categorías",
      "infoEmpty":"Mostrando 0 a 0 de 0 categorías",
      "infoFiltered":"(Filtrado de _MAX_ total categorías)",
      "infoPostFix": "",
      "thousands":",",
      "lengthMenu": "Mostrar _MENU_categorías",
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

<!-- modal create para registrar categorias -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title">Creación de una nueva Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="class row">
                    <div class="class col-12">
                        <div class="form-group">
                            <label for="">Nombre de la categoria <b>*</b></label>
                            <input id="nombre_categoria" type="text" class="form-control">
                            <small style="color: red; display:none"  id='lbl_create<?php echo $id_categoria?>'>* Este campo es requerido</small>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_create">Guardar Cambios</button>
                <div id='respuesta'>

                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script>
    $('#btn_create').click(function(){
       // alert('guardar!!');
       var nombre_categoria =  $('#nombre_categoria').val();
       if(nombre_categoria == ""){
          $('#nombre_categoria').focus();
         // document.getElementById('lbl_create').style.display = 'block';
         $('#lbl_create').css('display', 'block');
       }else{
       var url = "../app/controllers/categorias/registro_de_categorias.php";
       $.get(url, {nombre_categoria:nombre_categoria}, function(datos){
        $('#respuesta').html(datos);
       });
       }
    });
</script>

