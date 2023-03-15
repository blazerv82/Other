<?php

    // Task Manager
    require_once('php/task_manager.php');
    $manager = new task_manager();

    require_once('php/header.php');


?>

<div class="row">
    <div class="content-container py-large px-large">

    <form class="row" action="" method="get" autocomplete="off">
        <!-- <div class="content-container vm-auto">
            <button name="new_task" class="btn w-auto h-auto px-small">Add task</button>
        </div> -->
        <div class="content-container vm-12">
            <input type="text" name="task_term" id="task_term" placeholder="filter" 
                class="form-input px-small w-auto h-auto" />
        </div>
        <hr class="border-small border-black w-auto">
    </form>

    <div id="search_results"></div>

    <?php $manager->read_all(); ?>

    <script src="js/view.js"></script>

</body>
</html>