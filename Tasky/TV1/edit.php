<?php

    // Task Manager
    require_once('php/task_manager.php');
    require_once('php/header.php');

    $manager = new task_manager();

    if (!isset($_GET['id'])) {
        echo 'Sorry, could not grab data from previous page <br/>';
        exit();
    }

    // New task function
    if (isset($_POST['new_task'])){

        $task_input = $_POST['task_input'];
        $task_type = $_POST['task_type'];
        $task_priority = $_POST['task_priority'];

        if (empty($task_input)) { 
            echo '<div id="alert" class="alert-container theme-warning py-small font-24">Nothing was entered, please try again!</div>';
        } else {
            $manager->update($_GET['id'], $task_input, $task_type, $task_priority);
            header("Location: view.php");
        }
    }
    
?>


<div class="row">
    <div class="content-container py-large px-large">

    <div id="" class="alert-container theme-danger py-small font-24">EDIT MODE</div>

        <form class="row" action="" method="post" autocomplete="off">
            <div class="content-container vm-6">
                <input type="text" name="task_input" id="task_input" placeholder="description" 
                    class="form-input px-small w-auto h-auto" 
                    <?php echo "value={$_GET['description']}" ?> />
            </div>
            <div class="content-container form-option vm-2">
                <select name="task_type" id="task_type" class="px-small">
                    <option value="1" <?php if ($_GET['type'] == "1") echo 'selected="selected"' ?> >Task</option>
                    <option value="2" <?php if ($_GET['type'] == "2") echo 'selected="selected"' ?> >Reminder</option>
                    <option value="3" <?php if ($_GET['type'] == "3") echo 'selected="selected"' ?> >Note</option>
                </select>
            </div>
            <div class="content-container form-option vm-2">
                <select name="task_priority" id="task_priority" class="px-small">
                    <option value="3" <?php if ($_GET['priority'] == "3") echo 'selected="selected"' ?> >Low</option>
                    <option value="2" <?php if ($_GET['priority'] == "2") echo 'selected="selected"' ?> >Medium</option>
                    <option value="1" <?php if ($_GET['priority'] == "1") echo 'selected="selected"' ?> >High</option>
                </select>
            </div>
            <div class="content-container vm-auto">
                <button name="new_task" class="btn w-auto h-auto px-small">Update</button>
            </div>
        </form>

        <div id="task_name" class="py-small font-24"></div>
        
    </div>
</div>

<script src="js/index.js"></script>
</body>
</html>