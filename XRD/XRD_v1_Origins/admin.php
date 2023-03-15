<?php
    
    // Session template
    require_once('templates/session.php');
    
    // Header template
    require_once('templates/header.php');
    
    // Connection and Constants
    require_once('templates/connectvars.php');
    
    // Check login status
    require_once('templates/logincheck.php');
    
    // Nav Menu
    require_once('templates/navbar.php');

?>
<table>
    <tr><td colspan="2">ADMIN CONTROL PANEL</td></tr>
    <tr>
        <td><button class="adminButton"><a class="link" href="logout.php">LOGOUT</a></button></td>
        <td><button class="adminButton"><a class="link" href="index.php">HOME</a></button></td>
    </tr>
    <tr>
        <td><button class="adminButton"><a class="link" href="newItem.php">NEW ITEM</a></button></td>
        <td><button class="adminButton"><a class="link" href="edit.php">EDIT ITEMS</a></button></td>
    </tr>
</table>