<?php
    session_start();
    if(!$_SESSION['session'])
    {
        header('Location: index.php');
    }
    if(isset($_GET['search']))
    {
        $query="select id,username,password,email,phonenumber from usuarios where username='".$_GET['search']."'";
    }
    else{
        $query="SELECT id,username,password,email,phonenumber FROM usuarios";
    }
    echo '<div class="alert alert-success" role="alert">'.$query.'            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js" ></script>
</head>
<body>
    <div class="container">
        <h1>BIENVENIDO, </h1>
        <div class="panel panel-primary">
            <div class="panel-heading">Usuarios Registrados</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <td>ID</td>
                        <td>Usuario</td>
                        <td>Contraseña</td>
                        <td>Correro Electronico</td>
                        <td>Telefono</td>
                    </thead>
                    <?php
                    /**
                     * Created by PhpStorm.
                     * User: kevin
                     * Date: 16/09/15
                     * Time: 09:40 PM
                     */
                        include('conexion.php');
                        $db = new Conexion();
                        $consulta = $db->consulta($query);
                        if($db->num_rows($consulta)>0)
                        {
                            while($resultado = $db->fetch_array($consulta))
                            {
                                echo "<tr>";
                                echo "<td>".$resultado[0]."</td><td>".$resultado[1]."</td><td>".$resultado[2]."</td><td>".$resultado[3]."</td><td>".$resultado[4]."</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </table>
                <form class="form-horizontal" role="form" method="get">
                    <div class="form-group">
                        <label for="search" class="col-lg-2 control-label">Buscar por usuario</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="search">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-default">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">
                <button class="btn btn-success" onclick="window.location.href = 'panel.php'">Lista Completa</button>
                <button class="btn btn-danger" onclick="window.location.href = 'logout.php'">Salir</button>
            </div>
        </div>
    </div>

</body>
</html>
