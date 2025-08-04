<?php

session_start();

if (!isset($_SESSION['nome'])) 
{
    header('Location: ./src/View/UserLogin.php');
    exit();
}
else
{
    header('Location: ./src/View/UserHome.php');
    exit();
}

?>