<?php
    
    // Session template
    require_once('php_templates/session.php');
    
    // Header template
    require_once('php_templates/header.php');
    
    // Connection and Constants
    require_once('php_templates/connectvars.php');
    
    // DBC Class
    require_once('php_templates/postDB.php');
    $pdb = new postDB();
    
    $pdb->outputDBEdit();
?>