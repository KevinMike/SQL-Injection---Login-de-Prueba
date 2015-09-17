<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 16/09/15
 * Time: 10:49 PM
 */
    session_start();
    $_SESSION['session']=false;
    header('Location: index.php');

?>