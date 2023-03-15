<?php
    // Header templates
    require_once('php_templates/header.php');

    // Check login status
    require_once('php_templates/logincheck.php');
    
    
    // Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("database connection gone bad");
    
    // Delete
    $query = "truncate table cart";

    mysqli_query($dbc, $query) or die("query info gone bad");
    mysqli_close($dbc);
    
    
    echo '<div class="message_header">All items removed from cart<br/><br/>  <a class="link" href="index.php">Back to homepage</a></div>';
            
    exit();
?>