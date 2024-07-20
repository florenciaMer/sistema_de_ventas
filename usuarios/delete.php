<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include  '../app/controllers/usuarios/show_usuario.php'
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Eliminar un Usuario</h1>
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
           <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">¿Esta seguro que desea eliminar este usuario?</h3>

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
                    <form action='../app/controllers/usuarios/delete_usuario.php' method="post">
                        <!-- el id_usuario_get lo recupera del controlador show_usuario-->
                        <input type="text" value="<?php echo $id_usuario_get ?>" name="id_usuario" hidden>

                        <div class="class form-group">
                            <label for=''>Nombres</label>
                            <input type="text" name="nombres" value="<?php echo $nombres?>" disabled class="form-control">
                        </div>
                        <div class="class form-group">
                            <label for=''>Email</label>
                            <input type="email" name="email"value="<?php echo $email?>" disabled class="form-control">
                        </div>
                       
                        <div class="class form-group">
                            <label for=''>Rol del Usuario</label>
                            <input type="text" name="rol"value="<?php echo $rol?>" disabled class="form-control">
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
 
