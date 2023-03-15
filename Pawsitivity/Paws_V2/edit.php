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

        
    } else {
        echo 'Sorry, could not grab data from previous page <br/>';
        exit();
    }


    // edit dog function
    if (isset($_POST['edit_dog'])){

        $id = $_GET['id'];
        $dog_name = $_POST['dog_name'];
        $owner_first_name = $_POST['owner_first_name'];
        $owner_last_name = $_POST['owner_last_name'];
        $frequency_of_visits = $_POST['frequency_of_visits'];
        $appointment_date = $_POST['appointment_date'];

        $t2p = $manager->edit($id, $dog_name, $owner_first_name, $owner_last_name, $frequency_of_visits, $appointment_date);


?>
        
    <div class="alert alert-success my-2" role="alert">
        Dog was edited!
    </div>

<?php
    }
    
?>

    <form class="card my-2" method="post" action="">

        <div class="card-header">
            EDIT DOG
        </div>

        <div class="card-body">
        
            <div class="form-row">
                <div class="col form-group">
                    <label for="dog_name">Dog Name</label>
                    <input type="text" class="form-control form-control-lg" name="dog_name" required
                    <?php if(!empty($dog_name)){ echo "value='$dog_name'";} else {echo 'placeholder="dog_name"';} ?> >
                </div>
            </div>

            <div class="form-row">

                <div class="col form-group">
                    <label for="owner_first_name">Owner First Name</label>
                    <input type="text" class="form-control form-control-lg" name="owner_first_name" required
                    <?php if(!empty($owner_first_name)){ echo "value='$owner_first_name'";} else {echo 'placeholder="owner_name"';} ?> >
                </div>

                <div class="col form-group">
                    <label for="owner_last_name">Owner Last Name</label>
                    <input type="text" class="form-control form-control-lg" name="owner_last_name" required
                    <?php if(!empty($owner_last_name)){ echo "value='$owner_last_name'";} else {echo 'placeholder="owner_name"';} ?> >
                </div>

            </div>

            <div class="form-row">

                <div class="col form-group">
                    <label for="task_description">Frequency of Visits (in weeks)</label>
                    <select class="form-control form-control-lg" name="frequency_of_visits" required>
                        <option <?php if ($frequency_of_visits == "1") echo 'selected="selected"'?> >1</option>
                        <option <?php if ($frequency_of_visits == "2") echo 'selected="selected"'?>>2</option>
                        <option <?php if ($frequency_of_visits == "3") echo 'selected="selected"'?>>3</option>
                        <option <?php if ($frequency_of_visits == "4") echo 'selected="selected"'?>>4</option>
                        <option <?php if ($frequency_of_visits == "6") echo 'selected="selected"'?>>6</option>
                        <option <?php if ($frequency_of_visits == "8") echo 'selected="selected"'?>>8</option>
                        <option <?php if ($frequency_of_visits == "10") echo 'selected="selected"'?>>10</option>
                        <option <?php if ($frequency_of_visits == "12") echo 'selected="selected"'?>>12</option>
                        <option <?php if ($frequency_of_visits == "16") echo 'selected="selected"'?>>16</option>
                        <option <?php if ($frequency_of_visits == "20") echo 'selected="selected"'?>>20</option>
                        <option <?php if ($frequency_of_visits == "24") echo 'selected="selected"'?>>24</option>
                    </select>
                </div>

                <div class="col form-group">
                    <label for="task_description">Appointment Date</label>
                    <input type="date" class="form-control form-control-lg" name="appointment_date" required
                    <?php if(!empty($appointment_date)){ echo "value='$appointment_date'";} else {echo 'placeholder="appointment_date"';} ?> >
                </div>

            </div>

        </div>

        <div class="card-footer">
            <button type="submit" name="edit_dog" class="btn btn-outline-dark">CONFIRM EDIT OF DOG</button>
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