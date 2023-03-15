<?php
    
    // Header
    require_once('php_templates/header.php');

    // Client Manager Class
    require_once('client_manager.php');

    $manager = new client_manager();

?>

<div class="container">

<?php $manager->search(); ?>

    <hr>
    <a href='index.php'><button class="btn btn-outline-dark">HOMEPAGE</button></a>

</div>

<?php

    // Footer
    require_once('php_templates/footer.php');

?>