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
                    <h1 class="m-0">Eliminacion de Empresa</h1>
                   

                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
     <div class="row ml24">

    
     <div class="row col-md-9">
     <?php foreach ($informaciones_datos as $info) {
        if ($info['id_informacion'] == $id_informacion_get) { ?>
           
         <div class="content">
             <div class="container-fluid">
                 <!-- nuestro contenido -->
                 <div class="class row">
                     <div class="class col-md-12">
                         <div class="card card-danger">
                             <div class="card-header">
                                 <h3 class="card-title">¿Esta seguro de eliminar la empresa:?</h3>
                             </div>
                         </div>
                     </div>
             <div class="col-md-3">
                <div class="form-group">
                    <label for="">Nombre de la Empresa <b>*</b></label>
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
            <hr>
            <div class="col-md-6 d-flex">
                <div class="col-md-6">
                    <div class="form-group">
                    <a href="informaciones.php" class="btn btn-secondary btn-block">
                    <i class="fas fa-solid fa-ban">Cancelar</i>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                    <button class="btn btn-danger btn-block" id="btn_eliminar">
                        <i class="fas fa-trash"> Eliminar </i>
                    </button>
                </div>
                </div>
            </div>
            <div id="respuesta_delete"></div>

            <script>
                $('#btn_eliminar').click(function () {
                    var id_informacion = '<?php echo $id_informacion_get; ?>';
                    
                    Swal.fire({
                        title: '¿Está seguro de eliminar la empresa?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si deseo eliminar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                eliminar(),
                                'Empresa eliminada',
                                'success'

                            )
                        }
                    });

                    function eliminar() {
                        var id_informacion = '<?php echo $id_informacion_get; ?>';
                        var url = "../app/controllers/configuraciones/delete.php";
                        $.get(url,{id_informacion:id_informacion},function (datos) {
                            $('#respuesta_delete').html(datos);
                        });
                    }
                });
            </script>
        </div>
    </div>
</div>
</div>
<?php }} ?>

         
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