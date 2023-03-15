<?php
    
    // Header template
    require_once('php_templates/header.php');

    // Check login status
    require_once('php_templates/logincheck.php');
    
    // Get Info
    if (isset($_GET['id'])){
        
        $id = $_GET['id'];
        $item_type = $_GET['type'];
        $item_rarity = $_GET['rarity'];
        $item_material = $_GET['material'];
        $item_name = $_GET['name'];
        $item_desc = $_GET['desc'];
        $item_price = $_GET['price'];
        $sale = $_GET['sale'];
        
        
    }
    
    else if (isset($_POST['id'])){
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
    $query = "insert into cart (item_type, item_rarity, item_material, item_name, item_desc, item_price, sale) " .
                "values ('$item_type', '$item_rarity', '$item_material', '$item_name', '$item_desc', '$item_price', '$sale')";
    
    
    mysqli_query($dbc, $query) or die("query info gone bad");
    mysqli_close($dbc);
    
    
    echo '<div class="message_header">Added to cart!<br/><br/>  <a class="link" href="cart_index.php">Check out the cart</a></div>';
            
    exit();
?>