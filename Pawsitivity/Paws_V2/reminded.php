<?php

    // Client Manager Class
    require_once('client_manager.php');

    // Get Info
    if (isset($_GET['id']) && isset($_GET['reminded'])){
    
        $id = $_GET['id'];
        $reminded = $_GET['reminded'];
        
        if ($reminded == 0) {
            $reminded = 1;
        } 
        
        elseif ($reminded == 1) {
            $reminded = 0;
        }
        
    }

    else {
        echo 'Sorry, could not grab data';
        exit();
    }

    $db = new PDO("mysql:host=localhost;dbname=pawsitivity", "blazerv82", "Pokemon-495");

    $sql = "update dogs set reminded = '$reminded' where id = $id";

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try
    {
        $query = $db->prepare($sql);
        $query->bindParam(':date', $date);
        $query->execute();
    }

    catch (Exception $ex)
    {
        echo "{$ex->getMessage()}<br/>";
    }

    header('Location: appointments.php');

?>