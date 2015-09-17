<?php
  /**
   * Created by PhpStorm.
   * User: kevin
   * Date: 16/09/15
   * Time: 09:40 PM
   */
  if(isset($_POST["username"]) and isset($_POST["password"]))
  {
    session_start();
    include('conexion.php');
    $db = new Conexion();
    $query = "select * from usuarios where username='".$_POST["username"]."' and password='".$_POST["password"]."'";
    $consulta = $db->consulta($query);
    if($db->num_rows($consulta)>0)
    {
      $_SESSION['session'] = true;
      $_SESSION['username'] =
      header('Location: panel.php');
    }
    else
    {
      $alert =  "<div class='alert alert-danger' role='alert'>Usuario o Password Incorrecto</div>";
    }
  }

?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>SQL INJECTION</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>

<!-- Form Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Práctica de SQL INJECTION</h1>
</div>
<div>

</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Click Aqui</div>
  </div>
  <div class="form" >
    <h2>Ingresa con tu cuenta</h2>
    <?php
    if(isset($alert))
    {
      echo $alert;
    }
    ?>
    <form method="post">
      <input type="text" placeholder="Username" name="username"/>
      <input type="text" placeholder="Password" name="password"/>
      <button>Login</button>
    </form>
  </div>
  <div class="form">
    <h2>Crear una nueva cuenta</h2>
    <form method="post">
      <input type="text" placeholder="Username" required "/>
      <input type="password" placeholder="Password" required/>
      <input type="email" placeholder="Email Address"/>
      <input type="tel" placeholder="Phone Number"/>
      <button type="submit">Registrar</button>
    </form>
  </div>
  <div class="cta"><a href="#">¿Olvido su contraseña?</a></div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>

    
    
    
  </body>
</html>
