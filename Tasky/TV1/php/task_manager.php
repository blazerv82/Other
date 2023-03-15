<?php

    require_once('db.php');
    require_once('task.php');
    
    date_default_timezone_set("America/Chicago");

    class task_manager{

        private function outputTasks($taskList) {
            
            echo '<div id="all_tasks" class="row py-small">';

            foreach ($taskList as $task) {

                $id = $task->id;
                $priority = $task->priority;
                $type = $task->type;
                $description = $task->description;
                $time = $task->time_created;
                $color_priority;
                $color_type;
                $description_border;
                $editString = "?id={$id}&amp;priority={$priority}&amp;type={$type}&amp;description='{$description}'";
                
                if ($priority == 1) {
                    $priority = strtoupper("high");
                    $color_priority = "theme-warning";
                } elseif ($priority == 2) {
                    $priority = strtoupper("medium");
                    $color_priority = "theme-danger";
                } elseif ($priority == 3) {
                    $priority = strtoupper("low");
                    $color_priority = "theme-info";
                }

                if ($type == 1) {
                    $type = strtoupper("task");
                    $color_type = "bg-lightblue border-blue";
                    $description_border = "border-lightblue";
                } elseif ($type == 2) {
                    $type = strtoupper("reminder");
                    $color_type = "theme-success";
                    $description_border = "border-lightgreen";
                } elseif ($type == 3) {
                    $type = strtoupper("note");
                    $color_type = "bg-lightyellow border-yellow";
                    $description_border = "border-lightyellow";
                }

                // Outputs each task
                ?>
                <div class="vl-4 border-alert <?php echo $description_border ?> my-small px-medium">

                    <div class="row">
                        <div class="content-container vm-12">
                            <div class="header-container border-none font-24">
                                <?php echo $description ?>
                            </div>
                        </div>
                    </div>
                    <div class="row py-medium">
                        <div class="content-container">
                            <div class="d-inline-block border-alert-small <?php echo $color_type ?> py-small px-small">
                                <?php echo $type ?>
                            </div>
                            <div class="d-inline-block border-alert-small <?php echo $color_priority ?> py-small px-small">
                                <?php echo $priority ?>
                            </div>
                            <hr class="border-small <?php echo $description_border ?> ">
                            <div class="d-inline-block border-alert-small py-small px-small">
                                <?php echo $time ?>
                            </div>
                            <hr class="border-small <?php echo $description_border ?> ">
                            <div class="d-inline-block border-alert-small border-red py-small px-small">
                                <a href="remove.php?id=<?php echo $id ?>">REMOVE</a>
                            </div>
                            <div class="d-inline-block border-alert-small border-green py-small px-small">
                                <a href="edit.php<?php echo $editString ?>">EDIT</a>
                            </div>
                        </div>
                    </div>

                </div>
                <?php
            }

            echo '</div>';

        }

        public function create($task, $type, $priority) {

            $currentTime = date("Y.m.d h:i:sa");

            $db = new PDO("mysql:host=localhost;dbname=tasker", 'blazerv82', 'Pokemon-495');

            $sql = "INSERT INTO tasks(`description`, `type`, `priority`, `time_created`) 
                    VALUES (:task, :type, :priority, '$currentTime')";

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
				$query = $db->prepare($sql);
                $query->bindParam(':task', $task);
                $query->bindParam(':type', $type);
                $query->bindParam(':priority', $priority);
				$query->execute();
            }
            
			catch (Exception $ex) {
				echo "{$ex->getMessage()}<br/>";
			}
			
			//return $db->lastInsertId();
        }

        public function update($id, $description, $type, $priority) {

            $currentTime = date("Y.m.d h:i:sa");

            $db = new PDO("mysql:host=localhost;dbname=tasker", 'blazerv82', 'Pokemon-495');

            $sql = "UPDATE tasks set `description` = :description, `type` = :type, 
                    `priority` = :priority, `time_created` = '$currentTime' 
                    where `id`=:id";

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
				$query = $db->prepare($sql);
                $query->bindParam(':description', $description);
                $query->bindParam(':type', $type);
                $query->bindParam(':priority', $priority);
                $query->bindParam(':id', $id);
				$query->execute();
            }
            
			catch (Exception $ex) {
				echo "{$ex->getMessage()}<br/>";
			}
			
			//return $db->lastInsertId();
        }

        public function read_all() {

            $db = new PDO("mysql:host=localhost;dbname=tasker", "blazerv82", "Pokemon-495");

            $sql = "SELECT * FROM tasks ORDER BY id DESC";

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            try {
				$query = $db->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_CLASS, 'task');
            }
            
			catch (Exception $ex) {
				echo "{$ex->getMessage()}<br/>";
            }

            $this->outputTasks($results);

        }

        public function remove($id){

            $db = new PDO("mysql:host=localhost;dbname=tasker", "blazerv82", "Pokemon-495");

            $sql = "DELETE FROM tasks WHERE `id`=:id";

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try
			{
				$query = $db->prepare($sql);
				$query->bindParam(':id', $id);
                $query->execute();
            }

            catch (Exception $ex)
			{
				echo "{$ex->getMessage()}<br/>";
			}
			

        }

        public function search($term){

            $db = new PDO("mysql:host=localhost;dbname=tasker", "blazerv82", "Pokemon-495");

            $sql = "SELECT * FROM tasks WHERE `description` LIKE '%$term%'";

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try
			{
				$query = $db->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_CLASS, 'task');
            }

            catch (Exception $ex)
			{
				echo "{$ex->getMessage()}<br/>";
            }
            
            $this->outputTasks($results);

        }

        

    }

?>