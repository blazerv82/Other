<?php
    
    // Header
    require_once('php_templates/header.php');

    // Client Manager Class
    require_once('client_manager.php');

    $manager = new client_manager();

    
?>

<div class="container">

<?php 

    // Get Info
    if (isset($_GET['id'])){
        
        $id = $_GET['id'];
        $dog_name = $_GET['dog_name'];
        $owner_first_name = $_GET['owner_first_name'];
        $owner_last_name = $_GET['owner_last_name'];
        $appointment_date = $_GET['appointment_date'];
        $frequency_of_visits = $_GET['frequency_of_visits'];

        $owner_full_name = $owner_first_name . ' ' . $owner_last_name;

        
    } else {
        echo 'Sorry, could not grab data from previous page <br/>';
        exit();
    }


    // edit dog function
    if (isset($_POST['remove_dog'])){

        $id = $_GET['id'];

        $t2p = $manager->remove($id);
        

?>
        
    <div class="alert alert-success my-2" role="alert">
        Dog was removed!
    </div>

<?php

        
    }
    
?>

    <form class="card bg-danger my-2" method="post" action="">

        <div class="card-header">
            REMOVE DOG
        </div>

        <div class="card-body">

            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Dog Name</th>
                        <th>Owner Name</th>
                        <th>Inital Appointment</th>
                        <th>Frequency (Weeks)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $dog_name; ?></a></td>
                        <td><?php echo $owner_full_name; ?></td>
                        <td><?php echo $appointment_date; ?></td>
                        <td><?php echo $frequency_of_visits; ?></td>
                    </tr>
                </tbody>
            </table>

            <hr>

            Are you sure about this? This process can not be undone!
        </div>

        <div class="card-footer">
            <button type="submit" name="remove_dog" class="btn btn-outline-dark">REMOVE DOG</button>
        </div>

    </form>
    <hr>

    <a href='index.php'><button class="btn btn-outline-dark">HOMEPAGE</button></a>
    <a href='view.php'><button class="btn btn-outline-dark">VIEW ALL DOGS</button></a>



</div>

<?php

    // Footer
    require_once('php_templates/footer.php');

?>