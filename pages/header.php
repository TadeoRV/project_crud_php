<?php ob_start(); #esto evita los errores de envios de headers
set_error_handler("var_dump");
include 'connection.php';
session_start(); #inicializamos variables de sesion
#si esta logueado lo dejo trabajar y sino lo mando al login de nuevo 
if (isset($_SESSION['user']) != 'Admin') {
    header("location:login.php");
    die();
} ?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/23b3a40123.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/index_admin.css">
    <link rel="stylesheet" href="../css/edit.css">
    <title>Portfolio</title>
</head>

<body>
