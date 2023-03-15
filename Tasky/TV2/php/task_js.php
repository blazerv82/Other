<?php

    require_once('task_manager.php');
    $manager = new task_manager();
    
    if (isset($_POST['description'])){

        $task_input = $_POST['description'];
        $task_type = $_POST['type'];
        $task_priority = $_POST['priority'];

        $manager->create($task_input, $task_type, $task_priority);
        return $manager->read_all();
    }

    if (isset($_GET['search'])){
        return $manager->search($_GET['search']);
    }

    if (isset($_POST['id'])) {
        $manager->remove($_POST['id']);
        return $manager->read_all();
    }

    
?>