<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/roles/listado_de_roles.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Registro de Informacion de la empresa</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       <!-- nuestro contenido -->
        <div class="class row">
           <div class="class col-md-6">
           <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Completa los campos</h3>

                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
               <div class="class row">
                 <div class="class col-md-12">
                   <!-- <form action='../app/controllers/configuraciones/create.php' method="post"> -->
                        <div class="class form-group">
                            <label for=''>Nombre de la empresa</label>
                            <input type="text" name="nombre_empresa" id="nombre_empresa" required class="form-control" placeholder="Ingrese el nombre">
                        </div>
                        <div class="class form-group">
                            <label for=''>Actividad</label>
                            <input type="text" name="actividad" id="actividad" required class="form-control" placeholder="Ingrese el nombre de la empresa">
                        </div>
                        <div class="class form-group">
                            <label for=''>Sucursal</label>
                            <input type="text" name="sucursal" id="sucursal" required class="form-control" placeholder="Ingrese la sucursal de la empresa">
                         </div>
                         <div class="class form-group">
                            <label for=''>Domicilio</label>
                            <input type="text" name="domicilio" id="domicilio" required class="form-control" placeholder="Ingrese el domicilio de la empresa">
                         </div>
                         <div class="class form-group">
                            <label for=''>Zona</label>
                            <input type="text" name="zona" id="zona" required class="form-control" placeholder="Ingrese la zona de la empresa">
                         </div>
                         <div class="class form-group">
                            <label for=''>Telefono</label>
                            <input type="text" name="telefono" id="telefono" required class="form-control" placeholder="Ingrese el o los telefonos de la empresa">
                         </div>
                         <div class="class form-group">
                            <label for=''>Pais</label>
                            <input type="text" name="pais" id="pais" required class="form-control" placeholder="Ingrese el pais de la empresa">
                         </div>
                        
                        <hr>
                        <div class="class form-group">
                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" id="btn-guardar" href="" class="btn btn-primary">Guardar</button>
                        </div>
                        <div id="respuesta_create_informacion"></div>
                    <!--</form>-->
                    <script>
                        $('#btn-guardar').click(function() {
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
                                  var url = "../app/controllers/configuraciones/create.php";
                                $.get(url, {
                                    nombre_empresa:nombre_empresa, 
                                    actividad:actividad,
                                    sucursal:sucursal,
                                    domicilio:domicilio, 
                                    zona:zona, 
                                    telefono:telefono,
                                    pais:pais, 
                               
                                }, function(datos){
                                    $('#respuesta_create_informacion').html(datos);
                                });
                                }
                              }
                        );
                    </script>
 
                 </div>
               </div>
            </div>
            <script>

            </script>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
           </div> 
        </div>

       <!-- fin de nuestro contenido -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include '../layout/parte2.php';?>
 
