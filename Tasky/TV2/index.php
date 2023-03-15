<?php

    // Task Manager
    require_once('php/task_manager.php');
    $manager = new task_manager();

    require_once('php/header.php');

?>

<div class="row">
    <div class="content-container py-large px-large">

    <div class="row">
        <div class="content-container vm-2">
            <button name="add_task" id="add_task" class="btn w-auto px-small">Add Task</button>
        </div>
        <form class="vm-10" action="" method="get" autocomplete="off">
            <div class="content-container">
                <input type="text" name="task_term" id="task_term" placeholder="filter" 
                    class="form-input px-small w-auto h-auto" />
            </div>
        </form>
        <hr class="border-small border-black w-auto">
    </div>

    <div id="add_new_form">
        <div class="vl-12 border-large border-round">
            
            <div class="row my-small">
                <div class="content-container vm-12 py-small">
                    <input type="text" name="task_input" id="task_input" placeholder="description" 
                        class="form-input px-small w-auto h-auto" />
                </div>
                <div class="content-container form-option vm-6 py-small">
                    <select name="task_type" id="task_type" class="px-small">
                        <option value="1">Task</option>
                        <option value="2">Reminder</option>
                        <option value="3">Note</option>
                    </select>
                </div>
                <div class="content-container form-option vm-4 py-small">
                    <select name="task_priority" id="task_priority" class="px-small">
                        <option value="3">Low</option>
                        <option value="2">Medium</option>
                        <option value="1">High</option>
                    </select>
                </div>
                <div class="content-container vm-auto py-small">
                    <button name="task" id="new_task" class="btn border-green w-auto px-small">Add</button>
                </div>
            </div>
            
        </div>
    </div>
    <div id="search_results" class="row py-small px-small"></div>

    <div id="all_tasks" class="row py-small px-small">
        <?php $manager->read_all(); ?>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/view.js"></script>

</body>
</html>