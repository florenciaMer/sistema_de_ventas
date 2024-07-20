<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/roles/update_roles.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Registro de Roles</h1>
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
                <h3 class="card-title">Edición de Roles</h3>

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
                    <form action='../app/controllers/roles/update.php' method="post">
                        <input type='text' name='id_rol' value="<?php echo $id_rol_get; ?>" hidden>
                        

                        <div class="class form-group">
                            <label for=''>Nombre del Rol</label>
                            <input type="text" name="rol" required class="form-control" value="<?php echo $rol?>" placeholder="Ingrese el nuevo rol" REQUIRED>
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
 
