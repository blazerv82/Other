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
        $owner_first = $_POST['owner_first'];
        $owner_last = $_POST['owner_last'];
        $frequency_of_visits = $_POST['frequency_of_visits'];
        $appointment_date = $_POST['appointment_date'];

        $t2p = $manager->create($dog_name, $owner_first, $owner_last, $frequency_of_visits, $appointment_date);

        echo '<div class="alert-container bg-lightgreen my-2">Dog was added!</div>';
    }
    
?>

    <form class="row my-2" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <div class="header-container">NEW</div>

        <div class="row py-large px-large">

            <div class="content-container vm-4 py-large">
                Dog Name
                <hr class="border-small border-black">
                <input type="text" name="dog_name" placeholder="dog name"
                class="form-input px-small w-auto" required>
            </div>

            <div class="content-container vm-4 py-large">
                Owner First Name
                <hr class="border-small border-black">
                <input type="text" name="owner_first" placeholder="owner first name"
                class="form-input px-small w-auto" required>
            </div>

            <div class="content-container vm-4 py-large">
                Owner Last Name
                <hr class="border-small border-black">
                <input type="text" name="owner_last" placeholder="owner last name"
                class="form-input px-small w-auto" required>
            </div>

            <div class="content-container vm-4 py-large">
                Frequency of Visits (in Weeks)
                <hr class="border-small border-black">
                <div class="form-option">
                    <select name="frequency_of_visits" required>
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
            </div>

            <div class="content-container vm-4 py-large"">
                Last Appointment Date
                <hr class="border-small border-black">
                <div class="form-option">
                <input type="date" class="form-input border-select px-small w-auto" 
                name="appointment_date" required>
                </div>
            </div>
                
        </div>

        <div class="header-container">
            <button type="submit" name="new_dog" class="btn border-green">ADD DOG</button>
            <button type="reset" name="reset" class="btn border-orange">RESET FORM</button>
            <a href='index.php'><button class="btn ">HOMEPAGE</button></a>
        </div>
        
    </form>



</div>

<?php

    // Footer
    require_once('php_templates/footer.php');

?>