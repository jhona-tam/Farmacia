<?php
session_start();
if ($_SESSION['us_tipo']==3||$_SESSION['us_tipo']==1||$_SESSION['us_tipo']==2){
  include_once 'layouts/header.php';
?>
  <title>Adm | Gestion venta</title>

<?php
include_once 'layouts/nav.php';
?>
<!-- modal de -->
<div class="modal fade" id="vista_venta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Registro de venta</h3>
                <button data-dismiss="modal" aria-label="close" class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="codigo_venta">Codigo Venta: </label>                
                    <span id="codigo_venta"></span>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha: </label>                
                    <span id="fecha"></span>
                </div>
                <div class="form-group">
                    <label for="cliente">Cliente: </label>                
                    <span id="cliente"></span>
                </div>
                <div class="form-group">
                    <label for="dni">Dni: </label>                
                    <span id="dni"></span>
                </div>
                <div class="form-group">
                    <label for="vendedor">Vendedor: </label>                
                    <span id="vendedor"></span>
                </div>
                <table class="table table-hover text-nowrap">
                  <thead class="table-success">
                    <tr>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>Producto</th>
                      <th>Concentracion</th>
                      <th>Adicional</th>
                      <th>Laboratorio</th>
                      <th>Presentacion</th>
                      <th>Tipo</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody class="table-warning" id="registros">

                  </tbody>
                </table>
                <div class="float-right input-group-append">
                  <h5 class="m-3">Total:</h5>
                  <h5 class="m-3" id="total"></h5>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" data-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Close</button>                
            </div>
        </div>
    </div>
  </div>
</div>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gestion Ventas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="adm_catalogo.php">Home</a></li>
            <li class="breadcrumb-item active">Gestion Ventas</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!--seccion de los card contables-->
  <section>
      <div class="container-fluid">
          <div class="card card-success">
              <div class="card-header">
                  <h3 class="card-title">Consultas</h3>                        
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- card celeste -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3 id="venta_dia_vendedor">0</h3>

                        <p>Venta del dia por vendedor</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user"></i>
                      </div>
                      <a href="adm_mas_consultas.php" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- hasta aqui el card azul -->
                  <div class="col-lg-3 col-6">
                    <!-- card verde -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3 id="venta_diaria">0</h3>

                        <p>Venta diraria
                        </p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                      </div>
                      <a href="adm_mas_consultas.php" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- hasta aqui el card verde -->
                  <div class="col-lg-3 col-6">
                    <!-- card amarillo -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3 id="venta_mensual">0</h3>

                        <p>Venta mensual</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-calendar-alt"></i>
                      </div>
                      <a href="adm_mas_consultas.php" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- hasta aqui el card amarillo -->
                  <div class="col-lg-3 col-6">
                    <!-- card rojo -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3 id="venta_anual">0</h3>

                        <p>Venta anual</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-signal"></i>
                      </div>
                      <a href="adm_mas_consultas.php" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- hasta aqui el card rojo -->
                </div>                
              </div>
              <div class="card-footer">
              </div>
          </div>
      </div>
  </section>
  <!---seccion de datatable-->
  <section>
      <div class="container-fluid">
          <div class="card card-success">
              <div class="card-header">
                  <h3 class="card-title">Buscar Ventas</h3>                        
              </div>
              <!-- datatables formulario-->
              <div class="card-body">
                <table id="tabla_venta" class="display table table-hover text-nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Dni.</th>
                            <th>Total</th>
                            <th>Vendedor</th>
                            <th>Accion</th>                              
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>                    
                </table>
              </div>
              <div class="card-footer">
              </div>
          </div>
      </div>
  </section>
</div>
  <!-- /.content-wrapper -->
<?php
include_once 'layouts/footer.php';
}
else{
    header('Location: ../index.php');
}
?>
<script src="../js/datatables.js"></script>
<script src="../js/Venta.js"></script>
