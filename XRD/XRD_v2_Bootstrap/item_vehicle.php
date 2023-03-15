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
    
    $db->outputDBCurated('Vehicle');
    
    // Footer template
    require_once('php_templates/footer.php');
?>

