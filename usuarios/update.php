<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include  '../app/controllers/usuarios/update_usuario.php';
include  '../app/controllers/roles/listado_de_roles.php';

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Actualizar datos de Usuario</h1>
            <?php  echo $rol_db; ?>

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
           <div class="card card-success">
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
                 <form action='../app/controllers/usuarios/update.php' method="post">
                    <input type='' id='' name='id_usuario' value="<?php echo $id_usuario_get; ?>" hidden> 

                        <div class="class form-group">
                            <label for=''>Nombres</label>
                            <input type="text" name="nombres" required value="<?php echo $nombres;?>" class="form-control" placeholder="Ingrese los nombres">
                        </div>
                        <div class="class form-group">
                            <label for=''>Email</label>
                            <input type="email" name="email"required value="<?php echo $email;?>" class="form-control" placeholder="Ingrese el correo">
                        </div>
                        <div class="class form-group">
                            <label for=''>Rol del Usuario</label>
                            <select name="id_rol" id="" class="form-control">
                              <?php 
                             
                                foreach($roles_datos as $rol_dato){ 
                                  $id_rol = $rol_dato['id_rol'];
                                  $rol_tabla = $rol_dato['nombre'];?>
                                  <option value="<?php echo $rol_dato['id_rol']; ?>"
                                    <?php if ($rol_tabla == $rol_db) {?> selected="selected"<?php } ?>>
                                    <?php echo $rol_dato['nombre'];?>
                                </option>

                               <?php } ?>
                            </select>
                             </div>
                             
                     
                        <div class="class form-group">
                            <label for=''>Password</label>
                            <input type="text" name="password_user" class="form-control" placeholder="Ingrese la password">
                        </div>
                        <div class="class form-group">
                            <label for=''>Repita la Password</label>
                            <input type="text" name="password_repeat" class="form-control" placeholder="Repita la password">
                        </div>
                        <hr>
                        <div class="class form-group">
                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" href="" class="btn btn-success">Actualizar</button>
                        </div>
                    </form>
                 </div>
               </div>
            </div>
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

  <?php include '../layout/mensajes.php';?>
  <?php include '../layout/parte2.php';?>
 
