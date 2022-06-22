<html>
<!DOCTYPE html>
<html class="has-background-grey-lighter">
<style>
ul {list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;}

li {float: left;}

li a {display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;}

.clase {float: right}

li a:hover {background-color: #111;}
</style>
<head>
  <title>Grupo 41 - 70 // BDD entrega 3</title>
  
</head>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parallax - Free Bulma template</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/15181efa86.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/hello-parallax.css">
</head>
    <body align=center>
    <nav class="navbar" role="navigation" aria-label="main navigation" >
      <div class="navbar-brand">
        <a class="navbar-item" href="https://dcc.ing.puc.cl/">
          <img id="logo" src="https://postgradosdcc.ing.puc.cl/hosted/images/db/2a63921bc04365b0724de5715d4807/OG-DCC.jpg" width="112" height="60">
        </a>
    
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>
    <?php if (isset($_SESSION['user_name'])) { ?>
      <h2 class="title is-1"> Hola <?php echo $_SESSION['user_name'] ?>>
        <form class="buttons" action="/~grupo41/logout.php">
          <input class="button" type="submit" value="Cerrar Session">
        </form>
    <?php } else { ?>
      <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="/~grupo41/login.php">
            Iniciar Sesion
          </a>

          <a class="navbar-item" href="/~grupo41/funcionalidades/importar_usuarios.php">
            Importar Usuarios
          </a>
        </div>
      </div>
    <?php } ?>
    </nav>
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
