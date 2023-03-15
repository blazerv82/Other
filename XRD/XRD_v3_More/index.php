<?php
    
    // Session template
    require_once('php_templates/session.php');
    
    // Connection and Constants
    require_once('php_templates/connectvars.php');
    
    // Header template
    require_once('php_templates/header.php');
    
    
    // DBC Class
    require_once('php_templates/postDB.php');
    $db = new postDB();
    
    echo '<div class="alert alert-dark" role="alert">HOT NEW ITEMS!</div>'; 
    
    $db->outputDBLimit(3);
    
    
    echo '<hr><div class="alert alert-dark" role="alert">ITEMS ON SALE</div>'; 
    
    //$db->outputDBSale(8);
    
    
    // Footer template
    require_once('php_templates/footer.php');
?>

