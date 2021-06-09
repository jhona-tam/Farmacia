<?php
session_start();
if ($_SESSION['us_tipo']==3){
  include_once 'layouts/header.php'
?>
  <title>Adm | Gestion lote</title>

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
            <h1>Gestion lote</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="adm_catalogo.php">Home</a></li>
              <li class="breadcrumb-item active">Gestion lote</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section>
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Buscar lotes</h3>
                    <div class="input-group">
                        <input type="text" id="buscar-lote" class="form-control float-left" placeholder="Ingrese nombre de producto">
                        <div class="input-group-append">
                        <button class="btn btn-default"><i class="fas fa-search"></i></button></div>
                    </div>    
                </div>
                <div class="card-body">
                    <div id="lotes" class="row d-flex aling-items-stretch">

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
<script src="../js/Lote.js"></script>