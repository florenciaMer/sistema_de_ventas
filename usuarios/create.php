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
            <h1 class="m-0">Registro de Usuario</h1>
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
                    <form action='../app/controllers/usuarios/create.php' method="post">
                        <div class="class form-group">
                            <label for=''>Nombres</label>
                            <input type="text" name="nombres" required class="form-control" placeholder="Ingrese los nombres">
                        </div>
                        <div class="class form-group">
                            <label for=''>Email</label>
                            <input type="email" name="email" required class="form-control" placeholder="Ingrese el correo">
                        </div>
                        <div class="class form-group">
                            <label for=''>Rol del Usuario</label>
                            <select name="rol" id="" class="form-control">
                              <?php 
                                foreach($roles_datos as $rol_dato){ ?>
                                  <option value="<?php echo $rol_dato['id_rol'];?>"><?php echo $rol_dato['nombre'];?></option>

                               <?php } ?>
                            </select>
                         </div>
                        <div class="class form-group">
                            <label for=''>Password</label>
                            <input type="text" name="password_user" required class="form-control" placeholder="Ingrese la password">
                        </div>
                        <div class="class form-group">
                            <label for=''>Repita la Password</label>
                            <input type="text" name="password_repeat" required class="form-control" placeholder="Repita la password">
                        </div>
                        <hr>
                        <div class="class form-group">
                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                          
                              <button class="btn btn-primary" id="btn-guardar">
                                  Guardar
                              </button>
                            
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

  <?php include '../layout/parte2.php';?>
 
