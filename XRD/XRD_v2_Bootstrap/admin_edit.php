<?php

// Session template
require_once('php_templates/session.php');

// Header templates
require_once('php_templates/header.php');
require_once('php_templates/connectvars.php');
require_once('php_templates/appvars.php');

// Check login status
require_once('php_templates/logincheck.php');

// DB class
require_once('php_templates/postDB.php');
$db = new postDB();

// Get Info
if (isset($_GET['id'])){
    
    $id = $_GET['id'];
    $item_type = $_GET['item_type'];
    $item_rarity = $_GET['item_rarity'];
    $item_material = $_GET['item_material'];
    $item_name = $_GET['item_name'];
    $item_description = $_GET['item_description'];
    $item_price = $_GET['item_price'];

    
} else {
    echo 'Sorry, could not grab data from previous page <br/>';
    exit();
}


if(isset($_POST['submit'])){
    
    $item_type = $_POST['item_type'];
    $item_rarity = $_POST['item_rarity'];
    $item_material = $_POST['item_material'];
    $item_name = $_POST['item_name'];
    $item_desc = $_POST['item_description'];
    $item_price = $_POST['item_price'];

    $db->setID($id);
    $db->setType($item_type);
    $db->setRarity($item_rarity);
    $db->setMaterial($item_material);
    $db->setName($item_name);
    $db->setDesc($item_desc);
    $db->setPrice($item_price);
   
    
    if(!empty($item_name) && !empty($item_desc) && !empty($item_price)) {

        $db->updateItem();
    
        unset($item_name, $item_desc, $item_price);
        
        ?>
            <div class="alert alert-dark" role="alert">
            <span class="fas fa-exclamation-circle"></i></span></span>&nbsp;<span class="alert-link">SUCCESS!</span><hr>
            Item has been edited successfully! <a class="alert-link" href="admin_list.php">Go back</a> to the list of items.
            </div> 
        <?php
        
        exit();
    }
    
    else {
        ?>
            <div class="alert alert-dark" role="alert">
            <span class="fas fa-exclamation-circle"></i></span></span>&nbsp;<span class="alert-link">WARNING!</span><hr>
            You forgot some things on the form. Please check everything, then submit again.
            </div> 
        <?php
    }
}

?>

<form class="card-group" method="post" action="">

<div class="card-header">
    <button type="submit" name="submit" class="btn btn-outline-dark">Submit</button><hr>
    <button type="reset" name="reset" class="btn btn-outline-dark">Reset</button>
</div>

<div class="card">

    <div class="card-header">
        <h2>Basics</h2>
    </div>

    <div class="card-body">
        <div class="form-group">
            <label for="item_type">Type</label>
            <select class="form-control form-control-lg" id="item_type" name="item_type">
                <option value="Armour" <?php if ($item_type == "Armour") echo 'selected="selected"'?> >Armour</option>
                <option value="Melee" <?php if ($item_type == "Melee") echo 'selected="selected"'?> >Melee</option>
                <option value="Ranged" <?php if ($item_type == "Ranged") echo 'selected="selected"'?> >Ranged</option>
                <option value="Magikal" <?php if ($item_type == "Magikal") echo 'selected="selected"'?> >Magikal</option>
                <option value="Vehicle" <?php if ($item_type == "Vehicle") echo 'selected="selected"'?> >Vehicle</option>
                <option value="Other" <?php if ($item_type == "Other") echo 'selected="selected"'?> >Other</option>
            </select>
        </div> 
        
        <div class="form-group">
            <label for="item_rarity">Rarity</label>
            <select class="form-control form-control-lg" id="item_rarity" name="item_rarity">
                <option value="Common" <?php if ($item_rarity == "Common") echo 'selected="selected"'?> >Common</option>
                <option value="Uncommon" <?php if ($item_rarity == "Uncommon") echo 'selected="selected"'?> >Uncommon</option>
                <option value="Rare" <?php if ($item_rarity == "Rare") echo 'selected="selected"'?> >Rare</option>
                <option value="Legendary" <?php if ($item_rarity == "Ledgendary") echo 'selected="selected"'?> >Legendary</option>
                <option value="Mythic" <?php if ($item_rarity == "Mythic") echo 'selected="selected"'?> >Mythic</option>
                <option value="Other" <?php if ($item_rarity == "Other") echo 'selected="selected"'?> >Other</option>
            </select>
        </div>  
    </div>
</div>

<div class="card">   
    
    <div class="card-header">
        <h2>Info</h2>
    </div>

    <div class="card-body">
        
        <div class="form-group">
            <label for="item_name">Name</label>
            <input type="text" class="form-control form-control-lg" name="item_name" id="item_name" required
                <?php if(!empty($item_name)){ echo "value='$item_name'";} else {echo 'placeholder="name"';} ?> >
        </div>
        
        <div class="form-group">
            <label for="item_material">Material</label>
            <input type="text" class="form-control form-control-lg" name="item_material" id="item_material" required
                <?php if(!empty($item_material)){ echo "value='$item_material'";} else {echo 'placeholder="material"';} ?> >
        </div>

        <div class="form-group">
            <label for="item_price">Price (G)</label>
            <input type="number" class="form-control form-control-lg" name="item_price" id="item_price" required
                <?php if(!empty($item_price)){ echo "value='$item_price'";} else {echo 'placeholder="price"';} ?> >
        </div>
    </div>
</div>

<div class="card">   
    
    <div class="card-header">
        <h2>Description</h2>
    </div>

    <div class="card-body">
        
        <div class="form-group">
            <label for="item_description">Description</label>
            <textarea class="form-control form-control-lg" name="item_description" id="item_description" required
                <?php if(!empty($item_description)){ echo ">" . $item_description . "</textarea>";} else {echo 'placeholder="description"></textarea>';} ?>
        </div>
    </div>
</div>
</form>