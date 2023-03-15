<?php
    
    // Session template
    require_once('templates/session.php');
    
    // Header template
    require_once('templates/header.php');
    
    // Connection and Constants
    require_once('templates/connectvars.php');
    require_once('templates/appvars.php');
    
    // Make sure the user is logged in before going any further.
    if (!isset($_SESSION['id'])) {
        echo 'Please <a href="login.php">log in</a> to access this page <br/>';
        echo 'Alternatively, please go back to our <a href="index.php">homepage</a>';
        exit();
    }
    
    // Nav Menu
    require_once('templates/navbar.php');
    
?>