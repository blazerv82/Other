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
    
    // Get Info
    if (isset($_GET['id']) && isset($_GET['sale'])){
        
        $id = $_GET['id'];
        $sale = $_GET['sale'];
        
        if ($sale == 'NO') {
        $sale = 'YES';
        } 
        
        elseif ($sale == 'YES') {
        $sale = 'NO';
        }
        
    }
    
    else if (isset($_POST['id']) && isset($_POST['sale'])){
        $id = $_POST['id'];
        $sale = $_POST['sale'];
        
    }

    else {
        echo 'Sorry, could not grab data';
        exit();
    }
    
    
    
    
    
    
    // Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("database connection gone bad");
    
    // Delete
    $query = "update item set sale = '$sale' where id = $id";
    mysqli_query($dbc, $query) or die("query info gone bad");
    mysqli_close($dbc);
    
    
    echo '<div class="message_header">Sale Status Changed<br/><br/>  <a class="link" href="edit.php">Go back</a></div>';
            
    exit();
?>