<?php

    require_once('php_templates/client.php');

    class client_manager{

        
        // Creates a new Dog within the DB
        public function create($dog_name, $owner_first_name, $owner_last_name, $frequency_of_visits, $appointment_date){

            $db = new PDO("mysql:host=localhost;dbname=pawsitivity", "blazerv82", "Pokemon-495");

            $sql = "INSERT INTO dogs(`dog_name`, `owner_first_name`, `owner_last_name`, `frequency_of_visits`, `appointment_date`) 
                    VALUES (:dog_name, :owner_first_name, :owner_last_name, :frequency_of_visits, :appointment_date)";

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
				$query = $db->prepare($sql);
                $query->bindParam(':dog_name', $dog_name);
                $query->bindParam(':owner_first_name', $owner_first_name);
                $query->bindParam(':owner_last_name', $owner_last_name);
                $query->bindParam(':frequency_of_visits', $frequency_of_visits);
                $query->bindParam(':appointment_date', $appointment_date);
				$query->execute();
            }
            
			catch (Exception $ex) {
				echo "{$ex->getMessage()}<br/>";
			}
			
			return $db->lastInsertId();

        }

        // Reads all dogs in DB
        public function read_all(){

            $db = new PDO("mysql:host=localhost;dbname=pawsitivity", "blazerv82", "Pokemon-495");

            $sql = "SELECT * FROM dogs";

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            try {
				$query = $db->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_CLASS, 'client');
            }
            
			catch (Exception $ex) {
				echo "{$ex->getMessage()}<br/>";
            }
            
?>
            <table class="table table-striped table-dark my-2">
                <thead class="thead-dark">
                    <tr>
                        <th>Dog Name</th>
                        <th>Owner Name</th>
                        <th>Last Appointment</th>
                        <th>Frequency (Weeks)</th>
                        <th>Remove From Database</th>
                    </tr>
                </thead>
                <tbody>
<?php
			
			foreach($results as $dog)
			{

                $id = $dog->id;
                $dog_name = $dog->dog_name;
                $owner_first_name = $dog->owner_first_name;
                $owner_last_name = $dog->owner_last_name;

                $appointment_date = $dog->appointment_date;
                $frequency_of_visits = $dog->frequency_of_visits;

                $edit_string = '?id=' . $id . '&amp;dog_name=' . $dog_name . '&amp;owner_first_name=' . $owner_first_name 
                        . '&amp;owner_last_name=' . $owner_last_name . '&amp;appointment_date=' 
                        . $appointment_date . '&amp;frequency_of_visits=' . $frequency_of_visits;

?>
                    <tr>
                        <td><a href="edit.php<?php echo $edit_string ?>"><?php echo $dog_name; ?></a></td>
                        <td><?php echo $owner_first_name . ' ' . $owner_last_name; ?></td>
                        <td><?php echo $appointment_date; ?></td>
                        <td><?php echo $frequency_of_visits; ?></td>
                        <td>
                            <a href="remove.php<?php echo $edit_string ?>">
                            <button class="btn btn-outline-light btn-sm">REMOVE</button>
                            </a>
                        </td>
                    </tr>
<?php
            }
?>
                </tbody>
            </table>
<?php
        }

        // Creates a new Dog within the DB
        public function edit($id, $dog_name, $owner_first_name, $owner_last_name, $frequency_of_visits, $appointment_date){

            $db = new PDO("mysql:host=localhost;dbname=pawsitivity", "blazerv82", "Pokemon-495");

            $sql = "UPDATE dogs SET `dog_name`=:dog_name, `owner_first_name`=:owner_first_name, `owner_last_name`=:owner_last_name,
                    `frequency_of_visits`=:frequency_of_visits, `appointment_date`=:appointment_date WHERE `id`=:id";

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
                $query = $db->prepare($sql);
                $query->bindParam(':id', $id);
                $query->bindParam(':dog_name', $dog_name);
                $query->bindParam(':owner_first_name', $owner_first_name);
                $query->bindParam(':owner_last_name', $owner_last_name);
                $query->bindParam(':frequency_of_visits', $frequency_of_visits);
                $query->bindParam(':appointment_date', $appointment_date);
				$query->execute();
            }
            
			catch (Exception $ex) {
				echo "{$ex->getMessage()}<br/>";
			}
			
			return $db->lastInsertId();

        }

        // Deletes a dog given an ID
        public function remove($id){

            $db = new PDO("mysql:host=localhost;dbname=pawsitivity", "blazerv82", "Pokemon-495");

            $sql = "DELETE FROM dogs WHERE `id`=:id";

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try
			{
				$query = $db->prepare($sql);
				$query->bindParam(':id', $id);
                $query->execute();
				$rows_affected = $query->rowCount();
            }

            catch (Exception $ex)
			{
				echo "{$ex->getMessage()}<br/>";
			}
			

        }

        public function search() {

            $db = new PDO("mysql:host=localhost;dbname=pawsitivity", "blazerv82", "Pokemon-495");

            $sql = "SELECT * from dogs";

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try
			{
				$query = $db->prepare($sql);
				$query->bindParam(':date', $date);
                $query->execute();
				$results = $query->fetchAll(PDO::FETCH_CLASS, 'client');
            }

            catch (Exception $ex)
			{
				echo "{$ex->getMessage()}<br/>";
            }
            
?>
            <table class="table table-striped table-dark my-2">
                <thead class="thead-dark">
                    <tr>
                        <th>Dog Name</th>
                        <th>Owner Name</th>
                        <th>Last Appointment</th>
                        <th>Days Since Appointment</th>
                        <th>Frequency of Appointments</th>
                        <th>Appointment Reminder Sent?</th>
                    </tr>
                </thead>
                <tbody>
<?php
			
			foreach($results as $dog) {                
                $id = $dog->id;
                $dog_name = $dog->dog_name;
                $owner_name = $dog->owner_first_name . ' ' . $dog->owner_last_name;
                $appointment_date = $dog->appointment_date;
                $frequency_of_visits = $dog->frequency_of_visits;
                $reminded = $dog->reminded;

                $todays_date = idate('z');
                $inital_appointment = strtotime($appointment_date);

                $days_since = $todays_date - date('z', $inital_appointment);

                if ($days_since >= ($frequency_of_visits * 7)) {
?>                    
                    <tr>
                        <td><?php echo $dog_name; ?></a></td>
                        <td><?php echo $owner_name; ?></td>
                        <td><?php echo $appointment_date; ?></td>
                        <td><?php echo $days_since; ?></td>
                        <td><?php echo $frequency_of_visits; ?> week(s)</td>
                        
                        <?php

                            if ($reminded == 1) {
                                echo '<td class="bg-success">Yes
                                        <a href="reminded.php?id=' . $id . '&amp;reminded=' . $reminded .'"
                                        <button class="btn btn-outline-dark btn-sm float-right">Set to NO</button></a></td>';
                            }

                            else {
                                echo '<td class="bg-danger">No
                                        <a href="reminded.php?id=' . $id . '&amp;reminded=' . $reminded .'"
                                        <button class="btn btn-outline-dark btn-sm float-right">Set to YES</button></a></td>';
                            }

                        ?>
                        
                    </tr>
<?php
                
                }
                
            }
?>
                </tbody>
            </table>
<?php

        }
    }
?>