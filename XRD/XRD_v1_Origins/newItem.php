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
    
    // Form info from POST
    $item_type = $_POST['i_type'];
    $item_rarity = $_POST['r_type'];
    $item_material = $_POST['m_type'];
    $item_name = $_POST['item_name'];
    $item_desc = $_POST['item_desc'];
    $item_price = $_POST['item_price'];
    
    if(isset($_POST['submit'])){
        if(!empty($item_name) && !empty($item_desc) && !empty($item_price)) {
            $db->setType($item_type);
            $db->setRarity($item_rarity);
            $db->setMaterial($item_material);
            $db->setName($item_name);
            $db->setDesc($item_desc);
            $db->setPrice($item_price);
            $db->postTo();
        
            unset($item_name, $item_desc, $item_price);
            
            echo "<div class='message_header'>Item added!</div>";
        }
        
        else {
            echo "<div class='message_header'>You forgot some things, try again</div>";
        }
    }
    
?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    
    <table>
        <tr>
            <td><label for="i_type">Item Type</label></td>
            <td>
                <select class="search" id="i_type" name="i_type">
                <option value="ARMOUR" <?php if ($item_type == 'ARM') echo 'selected = "selected"'?> >Armour</option>
                <option value="MELEE" <?php if ($item_type == 'MEL') echo 'selected = "selected"'?> >Melee</option>
                <option value="RANGED" <?php if ($item_type == 'RAN') echo 'selected = "selected"'?> >Ranged</option>
                <option value="MAGIKAL" <?php if ($item_type == 'MAG') echo 'selected = "selected"'?> >Magikal</option>
                <option value="VEHICLE" <?php if ($item_type == 'VEH') echo 'selected = "selected"'?> >Vehicle</option>
                <option value="OBJECT" <?php if ($item_type == 'OBJ') echo 'selected = "selected"'?> >Object</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="r_type">Item Rarity</label></td>
            <td>
                <select class="search" id="r_type" name="r_type">
                <option value="COMMON" <?php if ($item_rarity == 'COM') echo 'selected = "selected"'?> >Common</option>
                <option value="UNCOMMON" <?php if ($item_rarity == 'UNC') echo 'selected = "selected"'?> >Uncommon</option>
                <option value="RARE" <?php if ($item_rarity == 'RARE') echo 'selected = "selected"'?> >Rare</option>
                <option value="LEGENDARY" <?php if ($item_rarity == 'LEG') echo 'selected = "selected"'?> >Legendary</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="m_type">Item Material</label></td>
            <td>
                <select class="search" id="m_type" name="m_type">
                <option value="OTHER" <?php if ($item_material == 'OTH') echo 'selected = "selected"'?> >Other</option>
                <option value="WOOD" <?php if ($item_material == 'WOOD') echo 'selected = "selected"'?> >Wood</option>
                <option value="LEATHER" <?php if ($item_material == 'LEA') echo 'selected = "selected"'?> >Leather</option>
                <option value="METAL" <?php if ($item_material == 'MET') echo 'selected = "selected"'?> >Metal</option>
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
            <td><input type="submit" class="submit_form_button" value="Add New" name="submit" />
                <input type="reset" class="submit_form_button" value="Reset Form">
            </td>
        </tr>
    </table>
    </form>