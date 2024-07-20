
<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';

include('../app/controllers/proveedores/listado_de_proveedores.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Listado de Proveedores
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-create">
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
        <div class="col-md-12">
          <div class="card card-outline card-primary">
              <div class="card-header">
                  <h3 class="card-title">Proveedores registrados</h3>

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
                      <th class="text-center p-2">Nombre del Proveedor</th>
                      <th class="text-center p-2">Celular</th>
                      <th class="text-center p-2">Telefono</th>
                      <th class="text-center p-2">Nombre de la empresa</th>
                      <th class="text-center p-2">Email</th>
                      <th class="text-center p-2">Direccion</th>
                      <th class="text-center p-2">Acciones</th>
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
                        <td class="text-center p-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#modal-update<?php echo $id_proveedor;?>">
                              <i class="fa fa-pencil-alt m-2"></i>Editar
                            </button>
                       </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal-delete<?php echo $id_proveedor;?>">
                              <i class="fa fa-trash m-2"></i>Borrar
                            </button>
                       </div>
                        <div id="respuesta_update<?php echo $id_proveedor;?>">
<!-- modal update para delete proveedor -->
<div class="modal fade" id="modal-delete<?php echo $id_proveedor;?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h4 class="modal-title">¿Esta seguro de eliminar al Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nombre del Proveedor <b>*</b></label>
                        <input id="nombre_proveedor<?php echo $id_proveedor;?>" type="text" value="<?php echo $nombre_proveedor?>"class="form-control" disabled>
                        <small style="color: red; display:none"  id='lbl_nombre<?php echo $id_proveedor;?>'>* Este campo es requerido</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Celular <b>*</b></label>
                        <input id="celular<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $celular?>" disabled>
                        <small style="color: red; display:none"  id='lbl_celular<?php echo $id_proveedor;?>'>* Este campo es requerido</small>
                     </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Telefono <b>*</b></label>
                    <input id="telefono<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $telefono?>" disabled>
                    <small style="color: red; display:none"   id='lbl_telefono<?php echo $id_proveedor;?>'>* Este campo es requerido</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="">Nombre Empresa <b>*</b></label>
                      <input id="nombre_empresa<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $nombre_empresa?>" disabled>
                      <small style="color: red; display:none"  id='lbl_nombre_empresa<?php echo $id_proveedor;?>'>* Este campo es requerido</small>
                  </div>
                </div>
              </div><!-- fin de la row-->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="">Direccion <b>*</b></label>
                      <input id="direccion<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $direccion?>" disabled>
                      <small style="color: red; display:none"  id='lbl_direccion<?php echo $id_proveedor;?>'>* Este campo es requerido</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="">Email <b>*</b></label>
                      <input id="email<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $email?>" disabled>
                      <small style="color: red; display:none"  id='lbl_email<?php echo $id_proveedor;?>' >* Este campo es requerido</small>
                  </div>
                </div>
              </div><!-- fin de la row-->
             
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-danger" id="btn_delete<?php echo $id_proveedor;?>">Borrar</button>
                  
                </div>
                <div id='respuesta_delete<?php echo $id_proveedor;?>'>
              </div>
            </div>
            </div>
           
        
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal delete -->
<!-- script de borrar -->
<script>
$('#btn_delete<?php echo $id_proveedor;?>').click(function(){
  
  let id_proveedor = <?php echo $id_proveedor;?>;
  
    let url = "../app/controllers/proveedores/delete_proveedores.php";
         $.get(url, {id_proveedor:id_proveedor}, function(datos){
          $('#respuesta_delete<?php echo $id_proveedor;?>').html(datos);
         });
  });
  
</script>
<!-- /.modal update -->
<!-- modal update para editar proveedor -->

<div class="modal fade" id="modal-update<?php echo $id_proveedor;?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title">Actualización del Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nombre del Proveedor <b>*</b></label>
                        <input id="nombre_proveedor<?php echo $id_proveedor;?>" type="text" value="<?php echo $nombre_proveedor?>"class="form-control">
                        <small style="color: red; display:none"  id='lbl_nombre<?php echo $id_proveedor;?>'>* Este campo es requerido</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Celular <b>*</b></label>
                        <input id="celular<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $celular?>">
                        <small style="color: red; display:none"  id='lbl_celular<?php echo $id_proveedor;?>'>* Este campo es requerido</small>
                     </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Telefono <b>*</b></label>
                    <input id="telefono<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $telefono?>">
                    <small style="color: red; display:none"   id='lbl_telefono<?php echo $id_proveedor;?>'>* Este campo es requerido</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="">Nombre Empresa <b>*</b></label>
                      <input id="nombre_empresa<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $nombre_empresa?>">
                      <small style="color: red; display:none"  id='lbl_nombre_empresa<?php echo $id_proveedor;?>'>* Este campo es requerido</small>
                  </div>
                </div>
              </div><!-- fin de la row-->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="">Direccion <b>*</b></label>
                      <input id="direccion<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $direccion?>">
                      <small style="color: red; display:none"  id='lbl_direccion<?php echo $id_proveedor;?>'>* Este campo es requerido</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="">Email <b>*</b></label>
                      <input id="email<?php echo $id_proveedor;?>" type="text" class="form-control" value="<?php echo $email?>">
                      <small style="color: red; display:none"  id='lbl_email<?php echo $id_proveedor;?>' >* Este campo es requerido</small>
                  </div>
                </div>
              </div><!-- fin de la row-->
             
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary" id="btn_update<?php echo $id_proveedor;?>">Guardar Cambios Update</button>
                  <div id='respuesta'>

                </div>
              </div>
            </div>
            </div>
           
        
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal update -->
<script>
$('#btn_update<?php echo $id_proveedor;?>').click(function(){
  let id_proveedor = <?php echo $id_proveedor;?>;
  let nombre_proveedor =  $('#nombre_proveedor<?php echo $id_proveedor;?>').val();
  let celular =  $('#celular<?php echo $id_proveedor;?>').val();
  let telefono =  $('#telefono<?php echo $id_proveedor;?>').val();
  let nombre_empresa =  $('#nombre_empresa<?php echo $id_proveedor;?>').val();
  let direccion =  $('#direccion<?php echo $id_proveedor;?>').val();
  let email =  $('#email<?php echo $id_proveedor;?>').val();
  
  if(nombre_proveedor == "" ){
          $('#nombre_proveedor<?php echo $id_proveedor;?>').focus();
         // document.getElementById('lbl_create').style.display = 'block';
         $('#lbl_nombre<?php echo $id_proveedor;?>').css('display', 'block');
       }else if(celular == "" ){
          $('#celular<?php echo $id_proveedor;?>').focus();
         $('#lbl_celular<?php echo $id_proveedor;?>').css('display', 'block');
       }else if(telefono == "" ){
          $('#telefono<?php echo $id_proveedor;?>').focus();
         $('#lbl_telefono<?php echo $id_proveedor;?>').css('display', 'block');
       }else if(nombre_empresa == "" ){
          $('#nombre_empresa<?php echo $id_proveedor;?>').focus();
         $('#<?php echo $id_proveedor;?>').css('display', 'block');
       }else if(email == "" ){
          $('#email<?php echo $id_proveedor;?>').focus();
         $('#lbl_email<?php echo $id_proveedor;?>').css('display', 'block');
       }else if(direccion == "" ){
          $('#direccion<?php echo $id_proveedor;?>').focus();
         $('#lbl_direccion<?php echo $id_proveedor;?>').css('display', 'block');
       
  }else{
    let url = "../app/controllers/proveedores/update_de_proveedores.php";
         $.get(url, {id_proveedor:id_proveedor, nombre_proveedor:nombre_proveedor, celular:celular, telefono:telefono, 
          nombre_empresa:nombre_empresa,direccion:direccion,email:email }, function(datos){
          $('#respuesta_update<?php echo $id_proveedor;?>').html(datos);
         });
    };
  });
  
</script>
<!-- /.modal update -->


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

<!-- modal create para registrar proveedores -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title">Creación de un nuevo Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nombre del Proveedor <b>*</b></label>
                        <input id="nombre_proveedor" type="text" class="form-control">
                        <small style="color: red; display:none"  id='lbl_nombre'>* Este campo es requerido</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Celular <b>*</b></label>
                        <input id="celular" type="text" class="form-control">
                        <small style="color: red; display:none"  id='lbl_celular'>* Este campo es requerido</small>
                     </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Telefono <b>*</b></label>
                    <input id="telefono" type="text" class="form-control">
                    <small style="color: red; display:none"  id='lbl_telefono'>* Este campo es requerido</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="">Nombre Empresa <b>*</b></label>
                      <input id="nombre_empresa" type="text" class="form-control">
                      <small style="color: red; display:none"  id='lbl_nombre_empresa'>* Este campo es requerido</small>
                  </div>
                </div>
              </div><!-- fin de la row-->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="">Direccion <b>*</b></label>
                      <input id="direccion" type="text" class="form-control">
                      <small style="color: red; display:none"  id='lbl_direccion'>* Este campo es requerido</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="">Email <b>*</b></label>
                      <input id="email" type="text" class="form-control">
                      <small style="color: red; display:none"  id='lbl_email'>* Este campo es requerido</small>
                  </div>
                </div>
              </div><!-- fin de la row-->
             
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
       var nombre_proveedor =  $('#nombre_proveedor').val();
       var celular =  $('#celular').val();
       var telefono =  $('#telefono').val();
       var nombre_empresa =  $('#nombre_empresa').val();
       var email =  $('#email').val();
       var direccion =  $('#direccion').val();

       if(nombre_proveedor == "" ){
          $('#nombre_proveedor').focus();
         // document.getElementById('lbl_create').style.display = 'block';
         $('#lbl_nombre').css('display', 'block');
       }else if(celular == "" ){
          $('#celular').focus();
         $('#lbl_celular').css('display', 'block');
       }else if(telefono == "" ){
          $('#telefono').focus();
         $('#lbl_telefono').css('display', 'block');
       }else if(nombre_empresa == "" ){
          $('#nombre_empresa').focus();
         $('#lbl_nombre_empresa').css('display', 'block');
       }else if(email == "" ){
          $('#email').focus();
         $('#lbl_email').css('display', 'block');
       }else if(direccion == "" ){
          $('#direccion').focus();
         $('#lbl_direccion').css('display', 'block');
       }
        else{
       var url = "../app/controllers/proveedores/create.php";
       $.get(url, {nombre_proveedor:nombre_proveedor, celular:celular,telefono:telefono,
        nombre_empresa:nombre_empresa, email:email, direccion:direccion}, function(datos){
        $('#respuesta').html(datos);
       });
       }
    });
</script>

