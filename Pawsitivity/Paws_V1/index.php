<?php
    
    // Header
    require_once('php_templates/header.php');

?>

<div class="container">

    <div class="text-center my-2">
        <img class="img-fluid w-50 h-50" src="img/logo.webp" />
    </div>
    
    <div class="row">

        <div class="col-md-6 py-2">
            
            <div class="card bg-success">
                <div class="card-body">
                    <a class="text-white text-center" href="new.php">
                    <h1>NEW</h3>
                    </a>
                </div>
            </div>
                
        </div>

        <div class="col-md-6 py-2">
            
            <div class="card bg-warning">
                <div class="card-body">
                    <a class="text-white text-center" href="view.php">
                    <h1>VIEW / EDIT</h3>
                    </a>
                </div>
            </div>
                
        </div>

    </div>

    <div class="row">
        
        <div class="col-md-12 py-2">
            
            <div class="card bg-primary">
                <div class="card-body">
                    <a class="text-white text-center" href="appointments.php">
                    <h1>UPCOMING APPOINTMENTS</h3>
                    </a>
                </div>
            </div>
            
        </div>

        
    </div>

</div>


<?php

    // Footer
    require_once('php_templates/footer.php');

?>