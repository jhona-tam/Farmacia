<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/css/all.min.css" rel="stylesheet" type="text/css" />
    <title>login</title>
</head>
<?php
session_start();
if(!empty($_SESSION['us_tipo'])){
    header('Location: controlador/LoginController.php');
}
else{
session_destroy();
?>
<body>
    <img class="users1" src="img/medi.svg" alt="">
    <div class="contenedor">
        <div class="img">
        </div>
        <div class="contenido-login">
            <form action="controlador/LoginController.php" method="post">
            <img src="img/user.svg" alt="">
            <h2>Farmacia</h2>
            <div class="input-div dni">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5>DNI</h5>
                    <input type="text" name="user" class="input" maxlength="8">
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Contraseña</h5>
                    <input type="password" name="pass" class="input">
                </div>
            </div>
            <a href="">created warpiece</a>
            <input type="submit" class="btn" value="Iniciar Sesion">
            </form>
        </div>
    </div>
</body>
<script src="js/login.js"></script>
</html>
<?php
}
?>