<?php

    // Header templates
    require_once('php_templates/header.php');

    // Check login status
    require_once('php_templates/logincheck.php');
    
    
?>

    
<!-- Begin 3.0 Form -->
    
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <div class="card-group"> 
        <div class="card bg-light text-dark">

            <div class="card-header">
                <h2>Basics</h2>
            </div>

            <div class="card-body">

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="item_type">Type</label>
                    </div>
                    <select class="form-control form-control-lg" id="item_type" name="item_type">
                        <option value="Armour">Armour</option>
                        <option value="Melee">Melee</option>
                        <option value="Ranged">Ranged</option>
                        <option value="Magikal">Magikal</option>
                        <option value="Vehicle">Vehicle</option>
                        <option value="Other">Other</option>
                    </select>
                </div> 
            
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="item_rarity">Rarity</label>
                    </div>
                    <select class="form-control form-control-lg" id="item_rarity" name="item_rarity">
                        <option value="Common">Common</option>
                        <option value="Uncommon">Uncommon</option>
                        <option value="Rare">Rare</option>
                        <option value="Legendary">Legendary</option>
                        <option value="Mythic">Mythic</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <label class="custom-file-label" for="customFile"></label>
                        <input type="file" class="custom-file-input" id="customFile">
                    </div>
                </div> 
            </div>
        </div>

        <div class="card bg-light text-dark">   
        
            <div class="card-header">
                <h2>Info</h2>
            </div>

            <div class="card-body">

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="item_name_label">Name</span>
                    </div>
                    <input type="text" class="form-control form-control-lg" name="item_name" id="item_name" aria-label="item_name" aria-describedby="item name" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="item_material_label">Material</span>
                    </div>
                    <input type="text" class="form-control form-control-lg" name="item_material" id="item_material" aria-label="item_material" aria-describedby="item_material" required> 
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="item_price_label">Price (G)</span>
                    </div>
                    <input type="number" class="form-control form-control-lg" name="item_price" id="item_price" aria-label="item_price" aria-describedby="item_price" required>
                </div>
            </div>
        </div>

        <div class="card bg-light text-dark">   
        
            <div class="card-header">
                <h2>Description</h2>
            </div>

            <div class="card-body">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Description</span>
                    </div>
                    <textarea class="form-control form-control-lg" name="item_descripton" id="item_descripton" aria-label="With textarea" required></textarea>
                </div>        
            </div>
        </div>
    </div>

    <div class="card bg-dark">
        <div class="card-body">
            <button type="submit" name="submit" class="btn btn-outline-light">Submit</button>
            <button type="reset" name="reset" class="btn btn-outline-light">Reset</button>
        </div>
    </div>


</form>
    
<?php

if(isset($_POST['submit'])){

    // Form info from POST
    $item_type = $_POST['item_type'];
    $item_rarity = $_POST['item_rarity'];
    $item_material = $_POST['item_material'];
    $item_name = $_POST['item_name'];
    $item_desc = $_POST['item_descripton'];
    $item_price = $_POST['item_price'];

    if(!empty($item_name) && !empty($item_desc) && !empty($item_price)) {
        $db->setType($item_type);
        $db->setRarity($item_rarity);
        $db->setMaterial($item_material);
        $db->setName($item_name);
        $db->setDesc($item_desc);
        $db->setPrice($item_price);
        $db->postTo();
    
        unset($item_name, $item_desc, $item_price);
    }
    
    else {
        echo "<div class='message_header'>You forgot some things, try again</div>";
    }
}

    // Footer template
    require_once('php_templates/footer.php');
    
?>