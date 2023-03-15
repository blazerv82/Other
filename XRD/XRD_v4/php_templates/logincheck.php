<?php
    
    // Session template
    require_once('php_templates/session.php');
    
    // Header template
    require_once('php_templates/header.php');
    
    // Connection and Constants
    require_once('php_templates/connectvars.php');
    require_once('php_templates/appvars.php');
    
    // Make sure the user is logged in before going any further.
    if (!isset($_SESSION['id'])) {
        ?>
        <div class="alert alert-primary" role="alert">
            <span class="fas fa-exclamation-circle"></i></span></span>&nbsp;<span class="alert-link">WARNING!</span><br/>
            You must be <a class="alert-link" href="login.php">logged in</a> to access this page
            <hr>
            If you can not log in, or got here by mistake, please go back to our <a class="alert-link" href="index.php">homepage</a>
        </div>
        <?php
        exit();
    }
    
?>