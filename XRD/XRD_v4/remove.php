<?php
    
    // Session template
    require_once('php_templates/session.php');
    
    // Header template
    require_once('php_templates/header.php');
    
    // Connection and Constants
    require_once('php_templates/connectvars.php');
    require_once('php_templates/appvars.php');
    
    // Check login status
    require_once('php_templates/logincheck.php');

    
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
    
    
    ?>
        <div class="alert alert-dark" role="alert">
        <span class="fas fa-exclamation-circle"></span>&nbsp;<span class="alert-link">SUCCESS!</span><hr>
        Item has been removed successfully! <a class="alert-link" href="admin_list.php">Go back</a> to the list of items.
        </div> 
    <?php
        
        exit();
?>