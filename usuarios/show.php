<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include  '../app/controllers/usuarios/show_usuario.php';
include '../app/controllers/usuarios/show_usuario.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Datos del Usuario</h1>
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
                            <input type="text" name="nombres" value="<?php echo $nombres?>" disabled class="form-control">
                        </div>
                        <div class="class form-group">
                            <label for=''>Email</label>
                            <input type="email" name="email"value="<?php echo $email?>" disabled class="form-control">
                        </div>
                        <div class="class form-group">
                            <label for=''>Rol</label>
                            <input type="rol" name="rol"value="<?php echo $rol?>" disabled class="form-control">
                        </div>
                       
                        <hr>
                        <div class="class form-group">
                            <a href="index.php" class="btn btn-secondary">Volver</a>
                            <button type="submit" href="" class="btn btn-danger">Eliminar</button>
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
 
