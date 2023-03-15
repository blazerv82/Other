<?php

    // Task Manager
    require_once('php/task_manager.php');
    require_once('php/header.php');

    $manager = new task_manager();

?>


<div class="row">
    <div class="content-container py-large px-large">

        <form class="row" action="" method="post" autocomplete="off">
            <div class="content-container vm-6">
                <input type="text" name="task_input" id="task_input" placeholder="description" 
                    class="form-input px-small w-auto h-auto" />
            </div>
            <div class="content-container form-option vm-2">
                <select name="task_type" id="task_type" class="px-small">
                    <option value="1">Task</option>
                    <option value="2">Reminder</option>
                    <option value="3">Note</option>
                </select>
            </div>
            <div class="content-container form-option vm-2">
                <select name="task_priority" id="task_priority" class="px-small">
                    <option value="3">Low</option>
                    <option value="2">Medium</option>
                    <option value="1">High</option>
                </select>
            </div>
            <div class="content-container vm-auto">
                <button name="new_task" class="btn w-auto h-auto px-small">Add</button>
            </div>
        </form>

        <div id="task_name" class="py-small font-24"></div>
        
        <?php

            // New task function
            if (isset($_POST['new_task'])){

                $task_input = $_POST['task_input'];
                $task_type = $_POST['task_type'];
                $task_priority = $_POST['task_priority'];

                if (empty($task_input)) { 
                    echo '<div id="alert" class="alert-container theme-warning py-small font-24">Nothing was entered, please try again!</div>';
                } else {
                    $manager->create($task_input, $task_type, $task_priority);
                    echo '<div id="alert" class="alert-container theme-success py-small font-24">Task entered!</div>';
                }
            }

        ?>
    </div>
</div>

<script src="js/index.js"></script>
</body>
</html>