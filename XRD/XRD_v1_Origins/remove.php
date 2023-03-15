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
    
    // Get ID
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }
    
    else if (isset($_POST['id'])){
        $id = $_POST['id'];
    }

    else {
        echo 'Sorry, could not grab data';
        exit();
    }
    
    // Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("database connection gone bad");
    
    // Delete
    $query = "DELETE FROM item WHERE id = $id LIMIT 1";
    mysqli_query($dbc, $query) or die("query info gone bad");
    mysqli_close($dbc);
    
    
    echo 'Removed item!<br/> <a class="link" href="edit.php">Go back</a>';
?>