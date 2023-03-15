<?php

    // Header template
    require_once('php_templates/header.php');
    
    // Check login status
    require_once('php_templates/logincheck.php');
    

?>
<div class="card bg-light text-dark">
    <div class="card-body">
        <h5 class="card-title">ADMIN CONTROL PANEL</h5>
        <a class="link" href="logout.php"><button class="btn btn-outline-dark">LOGOUT</button></a>
        <a class="link" href="index.php"><button class="btn btn-outline-dark">HOME</button></a>
        <a class="link" href="admin_new.php"><button class="btn btn-outline-dark">NEW</button></a>
        <a class="link" href="admin_list.php"><button class="btn btn-outline-dark">EDIT</button></a>
    </div>
</div>

