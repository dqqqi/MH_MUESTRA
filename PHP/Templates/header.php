<?php
    include '../private/checkLoggedIn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--fuentes e iconos-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="http://fonts.cdnfonts.com/css/gotham" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!--Estilos-->
    <link href="../../CSS/header.css" rel="stylesheet">
    <link href="../../CSS/footer.css" rel="stylesheet">
    <link href="../../CSS/snackbar.css" rel="stylesheet">
    <?php
      //Carga estilos adicionales
      if(isset($styles)){
        foreach ($styles as $value) {?>
      <link href="../../CSS/<?php echo $value ?>" rel="stylesheet">
    <?php
      }}
    ?>

    <!--Icono-->
    <link href="../../Resources/imgs/logo.svg" rel="icon">
    <title>MANN+HUMMEL</title>
</head>
<body>
    
    <script src="../../JS/snackbar.js"></script>
    <script src="../../JS/logout.js"></script>

   <!--NAVBAR-->

  <div class="logoMann" id="navbar"><a href="Inicio.php"><img src="../../Resources/imgs/logo.svg" alt="logoPlaceholder" class="logo"></a></div>
    <ul class="navbar">
      <li><div class="nav-item"><a href="Inicio.php"><div class="navtxt">inicio</div></a></div></li>
      <li><div class="nav-item"><a href="Formularios.php"><div class="navtxt">presentar reclamos</div></a></div></li>
      <li><div class="nav-item"><a href="Reclamos.php"><div class="navtxt">ver reclamos</div></a></div></li>
      <li><div class="nav-item"><a href="FAQ.php"><div class="navtxt">faq</div></a></div></li>
      <li><div class="nav-item"><a href="DOC.php"><div class="navtxt">doc</div></a></div></li>   
      <li class="logoutbutton">
        <button class="btnlogoutUser" id="logOutBtn"><br>cerrar sesión <i class='bx bx-log-in-circle'></i></button>
      </li>
    </ul>
<?php 

date_default_timezone_set('America/Argentina/Buenos_Aires');

?>
