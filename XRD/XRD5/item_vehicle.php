<?php

    // Header template
    require_once('php_templates/header.php');
    
    $db->outputDBCurated('Vehicle');
    
    // Footer template
    require_once('php_templates/footer.php');
?>

