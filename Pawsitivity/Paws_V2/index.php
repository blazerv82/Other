<?php
    
    // Header
    require_once('php_templates/header.php');

?>

<div class="container">
<div class="row">

    <div class="image-container vl-3">
        <img src="img/logo.webp" />
    </div>
    
    <div class="row vl-9">

        <div class="content-container vm-12 px-large">
            <div class="alert-container bg-lightgreen">
                <a href="new.php" class="d-inline-block w-auto">NEW</a>
            </div>
        </div>

        <div class="content-container vm-12 px-large">
            <div class="alert-container bg-lightyellow">
                <a href="view.php" class="d-inline-block w-auto">VIEW/EDIT</a>
            </div>
        </div>

        <div class="content-container vm-12 px-large">
            <div class="alert-container bg-lightblue">
                <a href="appointments.php" class="d-inline-block w-auto">UPCOMING</a>
            </div>
        </div>
        
    </div>

</div>
</div>


<?php

    // Footer
    require_once('php_templates/footer.php');

?>