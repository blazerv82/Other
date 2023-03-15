<?php
    
    // Header
    require_once('php_templates/header.php');

    // Client Manager Class
    require_once('client_manager.php');

    $manager = new client_manager();

    
?>

<div class="container">

<?php 

    // New dog function
    if (isset($_POST['new_dog'])){

        $dog_name = $_POST['dog_name'];
        $owner_first_name = $_POST['owner_first_name'];
        $owner_last_name = $_POST['owner_last_name'];
        $frequency_of_visits = $_POST['frequency_of_visits'];
        $appointment_date = $_POST['appointment_date'];

        $t2p = $manager->create($dog_name, $owner_first_name, $owner_last_name, $frequency_of_visits, $appointment_date);

?>
        
    <div class="alert alert-success my-2" role="alert">
        Dog was added!
    </div>

<?php
    }
    
?>

    <form class="card my-2" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <div class="card-header">
            NEW DOG
        </div>

        <div class="card-body">

            <div class="form-row">

                <div class="col form-group ">
                    <label for="task_description">Dog Name</label>
                    <input type="text" class="form-control form-control-lg" name="dog_name" required>
                </div>
                
            </div>

            <div class="form-row">

                <div class="col form-group">
                    <label for="owner_first_name">Owner First Name</label>
                    <input type="text" class="form-control form-control-lg" name="owner_first_name" required>
                </div>

                <div class="col form-group">
                    <label for="owner_last_name">Owner Last Name</label>
                    <input type="text" class="form-control form-control-lg" name="owner_last_name" required>
                </div>
            
            </div>

            <div class="form-row">

                <div class="col form-group">
                    <label for="task_description">Frequency of Visits (in weeks)</label>
                    <select class="form-control form-control-lg" name="frequency_of_visits" required>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>6</option>
                        <option>8</option>
                        <option>10</option>
                        <option>12</option>
                        <option>16</option>
                        <option>20</option>
                        <option>24</option>
                    </select>
                </div>

                <div class="col form-group">
                    <label for="task_description">Appointment Date</label>
                    <input type="date" class="form-control form-control-lg" name="appointment_date" required>
                </div>

            </div>

        </div>

        <div class="card-footer">
            <button type="submit" name="new_dog" class="btn btn-outline-dark">ADD DOG</button>
            <button type="reset" name="reset" class="btn btn-outline-dark">RESET FORM</button>
        </div>
        
    </form>
    <hr>

    <a href='index.php'><button class="btn btn-outline-dark">HOMEPAGE</button></a>



</div>

<?php

    // Footer
    require_once('php_templates/footer.php');

?>