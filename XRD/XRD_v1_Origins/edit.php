<?php
    
    // Session template
    require_once('templates/session.php');
    
    // Header template
    require_once('templates/header.php');
    
    // Connection and Constants
    require_once('templates/connectvars.php');
    
    // Nav Menu
    require_once('templates/navbar.php');
    
    // DBC Class
    require_once('templates/postDB.php');
    $pdb = new postDB();
    
    $pdb->outputDBEdit();
?>