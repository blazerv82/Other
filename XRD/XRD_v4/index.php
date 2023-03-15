<?php
    
    // Header
    require_once('php_templates/header.php');
    
?>
    
    <div class="alert alert-dark" role="alert">
        NEWEST ITEMS
    </div>

<?php

    $db->outputDBLimit(5);
?> 
    
    <hr>
    <div class="alert alert-dark" role="alert">
        ITEMS ON SALE
    </div>

<?php
    
    // $db->outputDBSale(8);
    
    
    // Footer template
    require_once('php_templates/footer.php');
?>

