<?php
    
    // Session template
    require_once('templates/session.php');
    
    // Header template
    require_once('templates/header.php');
    
    // Connection and Constants
    require_once('templates/connectvars.php');
    require_once('templates/appvars.php');
    
    // Check login status
    require_once('templates/logincheck.php');
    
    // Nav Menu
    require_once('templates/navbar.php');
    
    // Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("database connection gone bad");
    
    // Delete
    $query = "truncate table cart";

    mysqli_query($dbc, $query) or die("query info gone bad");
    mysqli_close($dbc);
    
    
    echo '<div class="message_header">All items removed from cart<br/><br/>  <a class="link" href="index.php">Back to homepage</a></div>';
            
    exit();
?>