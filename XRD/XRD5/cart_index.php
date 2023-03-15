<?php
    
    // Header template
    require_once('php_templates/header.php');

?>

<div class="alert alert-primary" role="alert">
<span class="fas fa-shopping-cart"></i></span></span>&nbsp;<span class="alert-link">CART</span><br/>
</div>

<?php  $db->outputDBCart(); ?>

