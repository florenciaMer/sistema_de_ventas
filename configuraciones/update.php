<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include('../app/controllers/configuraciones/listado_de_configuraciones.php');

$id_informacion_get = $_GET['id'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar una Informacion de la empresa</h1>
                  
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <div class="row ml24">

    
        <div class="row col-md-9">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Nombre de la Empresa <b>*</b></label>
               <?php foreach ($informaciones_datos as $info) {
                   if ($info['id_informacion'] == $id_informacion_get) {?>
                 
                    <input  id="id_informacion" type="text" class="form-control"  value="<?php echo $info['id_informacion']?>">
                    <input  id="nombre_empresa" type="text" class="form-control"  value="<?php echo $info['nombre_empresa']?>">
                    <small style="color: red; display:none"  id='lbl_nombre'>* Este campo es requerido</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Actividad <b>*</b></label>
                    <input  id="actividad" type="text" class="form-control"  value="<?php echo $info['actividad']?>">
                    <small style="color: red; display:none"  id='lbl_actividad'>* Este campo es requerido</small>
                </div>
            </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="">Sucursal <b>*</b></label>
                    <input  id="sucursal" type="text" class="form-control"  value="<?php echo $info['sucursal']?>">
                    <small style="color: red; display:none"  id='lbl_sucursal'>* Este campo es requerido</small>
                  </div>
                </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Domicilio <b>*</b></label>
                    <input  id="domicilio" type="text" class="form-control"  value="<?php echo $info['domicilio']?>">
                    <small style="color: red; display:none"  id='lbl_nombre_domicilio'>* Este campo es requerido</small>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Zona <b>*</b></label>
                    <input  id="zona" type="text" class="form-control"  value="<?php echo $info['zona']?>">
                    <small style="color: red; display:none"  id='lbl_zona'>* Este campo es requerido</small>
                </div>
            </div>
                <div class="col-md-2">
                  <div class="form-group">
                      <label for="">Telefono <b>*</b></label>
                      <input  id="telefono" type="text" class="form-control"  value="<?php echo $info['telefono']?>">
                      <small style="color: red; display:none"  id='lbl_telefono'>* Este campo es requerido</small>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                      <label for="">Pais <b>*</b></label>
                      <input  id="pais" type="text" class="form-control"  value="<?php echo $info['pais']?>">
                      <small style="color: red; display:none"  id='lbl_pais'>* Este campo es requerido</small>
                  </div>
                </div>
            </div>
        </div>
                <div class="class form-group ml-4">
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" id="btn-actualizar" href="" class="btn btn-primary ml-2">Guardar</button>
                </div>
                <div id="respuesta_actualizar"></div>
                    <!--</form>-->
                    <script>
                        $('#btn-actualizar').click(function() {
                                var id_informacion = $('#id_informacion').val();
                                $('#id_informacion').val(id_informacion);

                                var nombre_empresa = $('#nombre_empresa').val();
                                $('#nombre_empresa').val(nombre_empresa);
                              
                                var actividad = $('#actividad').val();
                                $('#actividad').val(actividad);

                                var sucursal = $('#sucursal').val();
                                $('#sucursal').val(sucursal);

                                var domicilio = $('#domicilio').val();
                                $('#domicilio').val(domicilio);

                                var zona = $('#zona').val();
                                $('#zona').val(zona);

                                var telefono = $('#telefono').val();
                                $('#telefono').val(telefono);

                                var pais = $('#pais').val();
                                $('#pais').val(pais);  
                                
                                if(nombre_empresa == ''){
                                  alert('Ingrese el nombre de la empresa');
                                  $('#nombre_empresa').focus();

                                }else if(actividad == ''){
                                  alert('Ingrese la actividad de la empresa');
                                  $('#actividad').focus();

                                }else if(sucursal == ''){
                                  alert('Ingrese la sucursal de la empresa');
                                  $('#sucursal').focus();

                                }else if(domicilio == ''){
                                  alert('Ingrese el domicilio de la empresa');
                                  $('#domicilio').focus();

                                }else if(zona == ''){
                                  alert('Ingrese la zona de la empresa');
                                  $('#zona').focus();

                                }else if(telefono == ''){
                                  alert('Ingrese el telefono de la empresa');
                                  $('#telefono').focus();

                                }else if(pais == ''){
                                  alert('Ingrese el pais de la empresa');
                                  $('#pais').focus();

                                }else{
                                  var url = "../app/controllers/configuraciones/update.php";
                                $.get(url, {
                                    id_informacion:id_informacion,
                                    nombre_empresa:nombre_empresa, 
                                    actividad:actividad,
                                    sucursal:sucursal,
                                    domicilio:domicilio, 
                                    zona:zona, 
                                    telefono:telefono,
                                    pais:pais, 
                               
                                }, function(datos){
                                    $('#respuesta_actualizar').html(datos);
                                });
                                }
                              }
                        );
                    </script>
            </div>
        </div>
    </div>
   <?php } } ?>
</div>
    
             
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