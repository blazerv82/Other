<?php

    // Session template
    require_once('templates/session.php');

    // Header templates
    require_once('templates/header.php');
    require_once('templates/connectvars.php');
    require_once('templates/appvars.php');
    
    // Check login status
    require_once('templates/logincheck.php');
    
    // Nav Menu
    require_once('templates/navbar.php');
    
    // DB class
    require_once('templates/postDB.php');
    $db = new postDB();
    

    
        // Get Info
    if (isset($_GET['id'])){
        
        $id = $_GET['id'];
        $item_type = $_GET['type'];
        $item_rarity = $_GET['rarity'];
        $item_material = $_GET['material'];
        $item_name = $_GET['name'];
        $item_desc = $_GET['desc'];
        $item_price = $_GET['price'];
        
    }
    
    else if (isset($_POST['id'])){
        
        $id = $_POST['id'];
        $item_type = $_POST['type'];
        $item_rarity = $_POST['rarity'];
        $item_material = $_POST['material'];
        $item_name = $_POST['name'];
        $item_desc = $_POST['desc'];
        $item_price = $_POST['price'];
        
        echo 'Gotten from post <br/>';
        
    }

    else {
        echo 'Sorry, could not grab data from previous page <br/>';
        exit();
    }
    
    
    if(isset($_POST['submit'])){
        
        $item_type = $_POST['i_type'];
        $item_rarity = $_POST['r_type'];
        $item_material = $_POST['m_type'];
        $item_name = $_POST['item_name'];
        $item_desc = $_POST['item_desc'];
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
            
            echo '<div class="message_header">Item Updated<br/><br/>  <a class="link" href="edit.php">Go back</a></div>';
            
            exit();
        }
        
        else {
            echo "<div class='message_header'>You forgot some things, try again</div>";
        }
    }
    
?>

    <form method="post" action="">
    
    <table>
        <tr>
            <td><label for="i_type">Item Type</label></td>
            <td>
                <select class="search" id="i_type" name="i_type">
                <option value="ARMOUR" <?php if ($item_type == 'ARMOUR') echo 'selected = "selected"'?> >Armour</option>
                <option value="MELEE" <?php if ($item_type == 'MELEE') echo 'selected = "selected"'?> >Melee</option>
                <option value="RANGED" <?php if ($item_type == 'RANGED') echo 'selected = "selected"'?> >Ranged</option>
                <option value="MAGIKAL" <?php if ($item_type == 'MAGIKAL') echo 'selected = "selected"'?> >Magikal</option>
                <option value="VEHICLE" <?php if ($item_type == 'VEHICLE') echo 'selected = "selected"'?> >Vehicle</option>
                <option value="OBJECT" <?php if ($item_type == 'OBJECT') echo 'selected = "selected"'?> >Object</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="r_type">Item Rarity</label></td>
            <td>
                <select class="search" id="r_type" name="r_type">
                <option value="COMMON" <?php if ($item_rarity == 'COMMON') echo 'selected = "selected"'?> >Common</option>
                <option value="UNCOMMON" <?php if ($item_rarity == 'UNCOMMON') echo 'selected = "selected"'?> >Uncommon</option>
                <option value="RARE" <?php if ($item_rarity == 'RARE') echo 'selected = "selected"'?> >Rare</option>
                <option value="LEGENDARY" <?php if ($item_rarity == 'LEGENDARY') echo 'selected = "selected"'?> >Legendary</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="m_type">Item Material</label></td>
            <td>
                <select class="search" id="m_type" name="m_type">
                <option value="OTHER" <?php if ($item_material == 'OTHER') echo 'selected = "selected"'?> >Other</option>
                <option value="WOOD" <?php if ($item_material == 'WOOD') echo 'selected = "selected"'?> >Wood</option>
                <option value="LEATHER" <?php if ($item_material == 'LEATHER') echo 'selected = "selected"'?> >Leather</option>
                <option value="METAL" <?php if ($item_material == 'METAL') echo 'selected = "selected"'?> >Metal</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="">Item Name</label></td>
            <td><input type="text" name="item_name" class="search" <?php if(!empty($item_name)){ echo "value='$item_name'";} else {echo 'placeholder="name"';} ?> /></td>
        </tr>
            <tr>
            <td><label for="">Item Price (G)</label></td>
            <td><input type="number" name="item_price" class="search" <?php if(!empty($item_price)){ echo "value='$item_price'";} else {echo 'placeholder="price"';} ?> /></td>
        </tr>
        <tr>
            <td><label for="">Item Description</label></td>
            <td><input type="text" name="item_desc" class="search" <?php if(!empty($item_desc)){ echo "value='$item_desc'";} else {echo 'placeholder="description"';} ?> /></td>
        </tr>
        <tr>
            <td><input type="submit" class="submit_form_button" value="Finalize Edit" name="submit" />
                <input type="reset" class="submit_form_button" value="Reset Form">
            </td>
        </tr>
    </table>
    </form>