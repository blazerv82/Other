<?php

    require_once('session.php');
    require_once('connectvars.php');
    require_once('appvars.php');

    // DB Class
    require_once('postDB.php');
    $db = new postDB();

?>

<!DOCTYPE html>
<html lang='en'>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    
    <link rel="stylesheet" href="css/new_main.css" /> 
    
    <title>XRD 5.0</title>

</head>
<body>

<div class="jumbotron">

    <div class="container">
        <h1 class="display-4">XRD5</h1>
    </div>

</div>

<nav class="navbar navbar-expand-lg sticky-top">
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="fas fa-bars" title="icon name" aria-hidden="true"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="admin_index.php">ADMIN</a>
            <a class="nav-item nav-link" href="index.php">HOME</a>
            <a class="nav-item nav-link" href="item_armour.php">ARMOUR</a>
            <a class="nav-item nav-link" href="item_melee.php">MELEE</a>
            <a class="nav-item nav-link" href="item_ranged.php">RANGED</a>
            <a class="nav-item nav-link" href="item_magikal.php">MAGIKAL</a>
            <a class="nav-item nav-link" href="item_vehicle.php">VEHICLE</a>
            <a class="nav-item nav-link" href="item_other.php">OTHER</a>
            <a class="nav-item nav-link" href="cart_index.php">CART</a>
        </div>
    </div>
</nav>

<div class="container">