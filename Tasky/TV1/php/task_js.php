<?php

    require_once('task_manager.php');
    $manager = new task_manager();

    $returnVal = $manager->search($_GET['search']);

    echo $returnVal;
    
?>