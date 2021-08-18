<!-- Google Font: Source Sans Pro -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--- libreria animate css-->
<link rel="icon" href="../img/farmacia.png" type="image/png">
<link rel="stylesheet" href="../css/animate.min.css">
<!--anima hasta aqui-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="../css/datatables.css">
<link rel="stylesheet" href="../css/compra.css">
<link rel="stylesheet" href="../css/main.css">  
 <!-- select2 -->
<link rel="stylesheet" href="../css/select2.css"> 
<!-- sweetalert2 -->
<link rel="stylesheet" href="../css/sweetalert2.css"> 
<!-- Font Awesome -->
<link rel="stylesheet" href="../css/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../css/adminlte.min.css">
  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
      <li class="nav-item dropdown" id="cat-carrito" style="display:none">
          <img src="../img/carrito.png" class="imagen-carrito nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
            <span id="contador" class="contador badge rounded-pill bg-danger"></span>
          </img>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <table class="carro table table-hover text-nowrap p-0">
              <thead class="table success">
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Concentracion</th>
                  <th>Adicional</th>
                  <th>Precio</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody id="lista">

              </tbody>
            </table>
            <a href="#" id="procesar-pedido" class="btn btn-primary btn-block">Procesar compra</a>
            <a href="#" id="vaciar-carrito" class="btn btn-danger btn-block">Vaciar carrito</a>
          </div>
        </li> 
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <a href="../controlador/Logout.php">Cerrar Sesion</a>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../vista/adm_catalogo.php" class="brand-link">
      <img src="../img/farmacia.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Farmacia</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img id="avatar4" src="../img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?php
              echo $_SESSION['nombre_us'];
            ?>
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- menu de Usuario y datos personales -->
          <li class="nav-header">USUARIO</li>
          <li class="nav-item">
            <a href="editar_datos_personales.php" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Datos personales
              </p>
            </a>
          </li>
          <!-- menu de gestion usuario -->
          <li id="gestion_usuario" class="nav-item">
            <a href="adm_usuario.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Gestion usuario
              </p>
            </a>
          </li>
          <!--menu de Ventas -->
          <li class="nav-header">VENTAS</li>
          <li class="nav-item">
            <a href="adm_venta.php" class="nav-link">
              <i class="nav-icon fas fa-notes-medical"></i>
              <p>
                Listar ventas
              </p>
            </a>
          </li>
          <!-- menu de Almacen y gestion producto -->
          <li class="nav-header">ALMACEN</li>
          <li id="gestion_producto" class="nav-item">
            <a href="adm_producto.php" class="nav-link">
              <i class="nav-icon fas fa-pills"></i>
              <p>
                Gestion producto
              </p>
            </a>
          </li>
          <!-- menu de atributo -->
          <li id="gestion_atributo" class="nav-item">
            <a href="adm_atributo.php" class="nav-link">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Gestion atributo
              </p>
            </a>
          </li>
          <!-- menu de gestion lote -->
          <li id="gestion_lote" class="nav-item">
            <a href="adm_lote.php" class="nav-link">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Gestion lote
              </p>
            </a>
          </li>
          <!-- menu de Compra y proveedor -->
          <li class="nav-header">COMPRA</li>
          <li id="gestion_proveedor" class="nav-item">
            <a href="adm_proveedor.php" class="nav-link">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Gestion proveedor
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>