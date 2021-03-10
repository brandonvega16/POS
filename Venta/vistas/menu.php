<?php
//session_start();
require_once "../clases/consultas.php";
if (isset($_SESSION['usuario']) || $_SESSION['usuario'] == "Admin") {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../librerias/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/menu.css">
  </head>

  <body>
    <!-- Menu Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <?php while ($ver = mysqli_fetch_row($result3)) : ?>
          <?php
          $imgVer = explode("/", $ver[1]);
          $imgRuta = $imgVer[1] . "/" . $imgVer[2] . "/" . $imgVer[3];
          ?>
          <img class="logo" src="<?php echo $imgRuta ?>" alt="Logo Empresa">
        <?php endwhile; ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="inicio.php"><i class="fas fa-home"></i> Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-box"></i> Almacen
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="categoria.php"><i class="far fa-bookmark"></i> Categorias</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="articulos.php"><i class="far fa-clipboard"></i> Articulos</a></li>
              </ul>
            </li>

            <?php if ($_SESSION['nivel'] == "Admin") : ?>
              <li class="nav-item">
                <a class="nav-link" href="usuarios.php"><i class="far fa-user"></i> Usuarios</a>
              </li>
            <?php endif; ?>


            <li class="nav-item">
              <a class="nav-link" href="clientes.php"><i class="far fa-user"></i> Clientes</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="caja.php"><i class="fas fa-shopping-cart"></i> Caja</a>
            </li>

            <?php if ($_SESSION['nivel'] == "Admin") : ?>
              <li class="nav-item">
                <a class="nav-link" href="reportes.php"><i class="far fa-file-alt"></i> Reportes</a>
              </li>
            <?php endif; ?>

          </ul>

          <div class="d-flex">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="far fa-user"></i> <?php echo $_SESSION['usuario'] ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#"> <i class="fas fa-lock"></i> Cambiar Contraseña </a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="../procesos/salir.php"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
                </ul>
              </li>
            </ul>

          </div>
        </div>
      </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="../librerias/fontawesome/js/all.js"></script>
  </body>

  </html>
<?php
} else {
  header("../index.php");
}
?>