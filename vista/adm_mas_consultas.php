<?php
session_start();
if ($_SESSION['us_tipo']==3||$_SESSION['us_tipo']==1){
  include_once 'layouts/header.php'
?>
  <title>Adm | Mas consultas</title>
<?php
include_once 'layouts/nav.php'
?>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Mas consultas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="adm_catalogo.php">Home</a></li>
            <li class="breadcrumb-item active">Mas consultas</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!---seccion de datatable-->
  <section>
      <div class="container-fluid">
          <div class="card card-success">
              <div class="card-header">
                  <h3 class="card-title">Consultas generales</h3>                        
              </div>
              <!-- muestreo de ventas con cart js-->
              <div class="card-body">  
                <div class="row">
                    <div class="col-md-12">
                        <h2>Ventas por mes del año actual</h2>
                        <div class="chart-resposive">
                            <canvas id="Grafico1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h2>Top vendedor de mes</h2>
                        <div class="chart-resposive">
                            <canvas id="Grafico2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>                            
                        </div>
                    </div>
                </div>          
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
<script src="../js/Chart.min.js"></script>
<script src="../js/Mas_consultas.js"></script>
