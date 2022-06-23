<?php

$request_method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
if ($request_method == 'POST') {

   $_SESSION['user_name'] = $user_name;
   $_SESSION['user_id'] = $user_id;
   $_SESSION['user_password'] = $user_password;

   go_home();
}  elseif ($request_method == 'GET') {

  ?>
  <head>
    <title>Iniciar Sesion</title>
    
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
  <form method="post" action="index.html">
      <br>
      <br>
      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Username" name="Username" required>
      </div>
      <div class="container">
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Password" name="password" required>
      </div>
      <div class="container"><button type="submit">Login</button>
      </div>
  </form>
<?php } ?>