<html>
<!DOCTYPE html>
<html class="has-background-grey-lighter">

<head>
  <title>Grupo 41 - 70 // BDD entrega 32</title>
</head>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/hello-parallax.css">
</head>


<body align=center>

    <nav class="navbar" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a class="navbar-item">
          <img id="logo" src="https://postgradosdcc.ing.puc.cl/hosted/images/db/2a63921bc04365b0724de5715d4807/OG-DCC.jpg" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
        <!-- Inicio de la navbar -->
        </div>

        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              <a class="button is-primary" href="/~grupo41/login.php">
                <strong>Iniciar Sesión</strong>
              </a>
              <a class="button is-light" href="/funcionalidades/importar_usuarios.php">
                Importar Usuarios
              </a>
            </div>
          </div>
        </div>
      </nav>

    <?php if (isset($_SESSION['user_name'])) { ?>
      <h2 class="title is-1"> Hola <?php echo $_SESSION['user_name'] ?>>
        <form class="buttons" action="/~grupo41/logout.php">
          <input class="button" type="submit" value="Cerrar Session">
        </form>
    <?php } else { ?>


    <?php } ?>





    <section class="hero is-medium">
      <div class="hero-body">
        <div class="container">
          <h1 class="title is-1 ">Entrega 3 BDD</h1>
          <h2 class="subtitle">Aqui podras encontrar informacion sobre vuelos, aerolineas, aeropuertos, y mucho mas. <br> Haz despegar tu imaginacion. </h2>
        </div>
        <center>
      </div>
    </section>
    <section id="parallax-1" class="hero is-large ">
      <div class="hero-body">
        <div class="container">
          <div class="columns">
            <div>
              <h1 class="title is-1 ">Otro Titulo</h1>
              <hr class="content-divider">
              <h2 class="subtitle"> Mas Informacion </h2>
               
            </div>
          </div>
        </div>
      </div>
    </section>
    
  </body>
  <img id="logo" src="https://postgradosdcc.ing.puc.cl/hosted/images/db/2a63921bc04365b0724de5715d4807/OG-DCC.jpg" width="112" height="60">