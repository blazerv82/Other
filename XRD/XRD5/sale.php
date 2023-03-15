<?php
    
    // Header templates
    require_once('php_templates/header.php');

    // Check login status
    require_once('php_templates/logincheck.php');
    
    
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
    
    
    ?>
    
    <div class="alert alert-dark" role="alert">
        <span class="fas fa-exclamation-circle"></span>&nbsp;<span class="alert-link">SUCCESS!</span><br/>
        Item sale status changed!
        <hr>
        Back to <a class="alert-link" href="admin_list.php">edit</a> page
    </div>