<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../layout/parte2.php';
include '../app/controllers/ventas/listado_de_ventas.php';
include '../app/controllers/clientes/listado_de_clientes.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Ventas</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

<table class="table m-2">
  <thead class="thead-light">
    <tr>
      <th scope="col">Nro de venta</th>
      <th scope="col">Cliente</th>
      <th scope="col">Total pagado</th>
      <th scope="col">Productos</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php $contador_venta = 0;?>
    <?php foreach ($ventas_datos as $venta) {
           $contador_venta = $contador_venta+1;
        ?>
        <tr>
            <td><?php echo $venta['nro_venta']; ?></td>
            <td>
            <button type="button" class="btn btn-primary" id="btn_carrito_<?php echo $id_cliente; ?>" data-toggle="modal" data-target="#datos_cliente">
            <?php echo $venta['nombre_cliente']; ?>
          </button>
            </td>
            

            <?php $id_cliente =  $venta['id_cliente']?>
            <td>$<?php echo $venta['total_pagado']; ?></td>
            <td>
                <input type="text" id="nro_venta" value="<?php echo $venta['nro_venta']; ?>" hidden>
            
            <button type="button" class="btn btn-primary" id="btn_carrito_<?php echo $contador_venta; ?>" data-toggle="modal" data-target="#exampleModal">
                Productos del carrito
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle carrito</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_carrito_<?php echo $contador_venta; ?>">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
            <tbody id="respuesta_carrito"></tbody>
        </thead>
        <tbody> 
        </thead>
        <tbody> 
    <script> 
        var url = "../app/controllers/ventas/detalle_carrito.php";
        $('#btn_carrito_<?php echo $contador_venta; ?>').click(function(){
       // var nro_venta = $('#nro_venta').val();
       var nro_venta = <?php echo $venta['nro_venta']; ?>;
        // Variables
        var data = {nro_venta:nro_venta};
        // AJAX
        $.get(url, data, function (response) {
            console.log(JSON.parse(response));
            res = JSON.parse(response);
              //  $("#respuesta_carrito").val(res);
          
            var total = 0;
             var html = '';
              for (let i = 0; i < res.length; i++) {
                html +='<tr><td>'+res[i].nombre;+'</td>'
                html +='<td>$'+res[i].precio_venta;+'</td>'
                html +='<td>'+res[i].cantidad_carrito;'</td>'
                html +='<td>$'+res[i].cantidad_carrito * res[i].precio_venta;'</td>'
                total = total + res[i].cantidad_carrito * res[i].precio_venta;
               '</tr>'
            }
                html+='<tr><td colspan="5" class="text-right">Total $'+total;'</td></tr>'
            $("#respuesta_carrito").html(html)
            // Acá harás lo que quieras con la respuesta
        },);
       
    });

                    </script>
                </tbody>
            </table> 
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
  
</div>

        </td>
        <td>
            <div class="btn-group">
                <a href="show.php?id=<?php echo $venta['id_venta'];?>" class="btn btn-info m-1 btn-sm"><i class="fa fa-eye"></i >Ver</a>
                <a href="delete.php?id=<?php echo $venta['nro_venta'];?>&id_cliente=<?php echo $id_cliente;?>" class="btn btn-danger m-1 btn-sm"><i class="fa fa-trash"></i> Borrar</a>
                <a href="factura.php?nro_venta=<?php echo $venta['nro_venta'];?>&id_cliente=<?php echo $id_cliente;?>" class="btn btn-success m-1 btn-sm"><i class="fa fa-print"></i> Imprimir</a>
               
            </div>
        </td>
    <?php }?>
    </tr>
</tbody>
</table>
<hr>
<!-- modal buscar cliente-->
<div class="modal fade" id="datos_cliente">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                
                <div class="modal-body">
                    <table id="example3" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center p-2">Nro</th>
                                <th class="text-center p-2">Nombre cliente</th>
                                <th class="text-center p-2">Nit ci cliente</th>
                                <th class="text-center p-2">Celular cliente</th>
                                <th class="text-center p-2">Correo cliente</th>
                            </tr>
                        </thead>
                            <tbody>
                            <?php $contador_clientes = 0;
                            foreach ($clientes_datos as $cliente) {
                              if ($cliente['id_cliente'] == $venta['id_cliente']) {
                               
                                $contador_clientes = $contador_clientes + 1;
                                $id_cliente = $cliente['id_cliente'];
                                $nombre_cliente = $cliente['nombre_cliente'];

                            ?>
                            <tr>
                                <td class="text-center p-2"><?php echo $contador_clientes; ?></td>                                
                                <td class="text-center p-2"><?php echo $cliente['nombre_cliente']; ?></td>
                                <td class="text-center p-2"><?php echo $cliente['nit_ci_cliente']; ?></td>
                                <td class="text-center p-2"><?php echo $cliente['celular_cliente']; ?></td>
                                <td class="text-center p-2"><?php echo $cliente['correo_cliente']; ?></td>
                            </tr> 
                            <?php }  ?>
                            <?php }
                            ?>
                            </tbody>
                    </table>
                    
                </div>
                    <!-- fin modal buscar -->

<?php include '../layout/mensajes.php'; ?>
<?php include '../layout/parte2.php'; ?>

 <!-- Modal -->





           </div>
    </table>

    