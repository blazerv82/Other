<?php
    
    // Session template
    require_once('templates/session.php');
    
    // Connection and Constants
    require_once('templates/connectvars.php');
    
    // Header template
    require_once('templates/header.php');
    
    // Nav Menu
    require_once('templates/navbar.php');
    
    // DBC Class
    require_once('templates/postDB.php');
    $db = new postDB();
    
    echo "<div class='item_web_header'>HOT NEW ITEMS</div>";
    $db->outputDBLimit(4);
    
    echo "<div class='item_web_header'>ITEMS ON SALE</div>";
    $db->outputDBSale(8);
?>

