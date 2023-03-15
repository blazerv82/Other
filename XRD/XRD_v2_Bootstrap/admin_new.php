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
    
?>

    
    <!-- Begin 2.0 Form -->
    
    <form class="card-group" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    
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
                    <option value="Armour">Armour</option>
                    <option value="Melee">Melee</option>
                    <option value="Ranged">Ranged</option>
                    <option value="Magikal">Magikal</option>
                    <option value="Vehicle">Vehicle</option>
                    <option value="Other">Other</option>
                </select>
            </div> 
            
            <div class="form-group">
                <label for="item_rarity">Rarity</label>
                <select class="form-control form-control-lg" id="item_rarity" name="item_rarity">
                    <option value="Common">Common</option>
                    <option value="Uncommon">Uncommon</option>
                    <option value="Rare">Rare</option>
                    <option value="Legendary">Legendary</option>
                    <option value="Mythic">Mythic</option>
                    <option value="Other">Other</option>
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
                <input type="text" class="form-control form-control-lg" name="item_name" id="item_name" placeholder="name" required>
            </div>
            
            <div class="form-group">
                <label for="item_material">Material</label>
                <input type="text" class="form-control form-control-lg" name="item_material" id="item_material" placeholder="material" required>
            </div>

            <div class="form-group">
                <label for="item_price">Price (G)</label>
                <input type="number" class="form-control form-control-lg" name="item_price" id="item_price" placeholder="price" required>
            </div>
        </div>
    </div>

    <div class="card">   
        
        <div class="card-header">
            <h2>Description</h2>
        </div>

        <div class="card-body">
        
            <div class="form-group">
                <label for="item_descripton">Description</label>
                <textarea class="form-control form-control-lg" name="item_descripton" id="item_descripton" placeholder="description" required></textarea>
            </div>

            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Image</label>
                </div>
            </div>           
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