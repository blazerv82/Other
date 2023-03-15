<?php

    // Client Manager Class
    require_once('php/task_manager.php');
    $manager = new task_manager();

    // Get Info
    if (isset($_GET['id'])){
    
        $id = $_GET['id'];
    }

    else {
        echo 'Sorry, could not grab data';
        exit();
    }

    $manager->remove($id);

    header('Location: view.php');

?>