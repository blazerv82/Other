<?php

class postDB{
    
    private $type;
    private $rarity;
    private $material;
    private $name;
    private $desc;
    private $price;
    private $id;
    
    // Get
    public function getType(){
        return $this->type;
    }
    
    public function getRarity(){
        return $this->rarity;
    }
    
    public function getMaterial(){
        return $this->material;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getDesc(){
        return $this->desc;
    }
    
    public function getPrice(){
        return $this->price;
    }
    
    public function getID(){
        return $this->id;
    }
    
    // Set
    public function setType($type){
        $this->type = $type;
    }
    
    public function setRarity($rarity){
        $this->rarity = $rarity;
    }
    
    public function setMaterial($material){
        $this->material = $material;
    }
    
    public function setName($name){
        $this->name = $name;
    }
    
    public function setDesc($desc){
        $this->desc = $desc;
    }
    
    public function setPrice($price){
        $this->price = $price;
    }
    
    public function setID($id){
        $this->id = $id;
    }
    
    // Posts to DB
    public function postTo(){

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Can not connect");
        
        $query = "insert into item (item_type, item_rarity, item_material, item_name, item_desc, item_price, picture)
                values ('$this->type', '$this->rarity', '$this->material', '$this->name', '$this->desc', '$this->price', '')";        

        if (mysqli_query($dbc, $query)) { ?>
            <div class="alert alert-dark" role="alert">
            <span class="fas fa-exclamation-circle"></i></span></span>&nbsp;<span class="alert-link">SUCCESS!</span><br/>
            Item has been added sucessfully!
            </div> 
        <?php
        } else {
            echo "<hr>Error: " . $query . "<br>" . mysqli_error($dbc);
        }
                
        mysqli_close($dbc);
    }
    
    // Updates info to DB
    public function updateItem(){
        

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Can not connect");
                
        $query = "update item set item_type = '$this->type', item_rarity = '$this->rarity', item_material = '$this->material',"
                    . "item_name = '$this->name', item_desc = '$this->desc', item_price = '$this->price' where id='$this->id'";
                    
                    
        
        mysqli_query($dbc, $query) or die('Error querying database.');
                
        mysqli_close($dbc);
    }
    
    // Basic output DB, does nothing special
    public function outputDBAll(){
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Can not connect");
        
        $query = "select * from item order by id desc";
        
        $result = mysqli_query($dbc, $query) or die('Error querying database.');
    
        // Loops through DB, outputs each entry on new line
        while ($row = mysqli_fetch_array($result)){
            
            $type = $row['item_type'];
            $rarity = $row['item_rarity'];
            $material = $row['item_material'];
            $name = $row['item_name'];
            $desc = $row['item_desc'];
            $price = $row['item_price'];
            $picture = $row['picture'];
            $sale = $row['sale'];
            
            echo '<div class="i_container">';
            echo '<span class="i_name">' . $name . '<br/>';
            
            // Placeholder Picture
            if(empty($picture)){
                echo '<img class="placeholder_img" src="images/placeholder.png" />';
            }
            
            if($sale == 'YES') {
                
                $discount = $price * .5;
                $price = $price - $discount;
            }
            
            echo '<span class="i_info">PRICE: <b>' . $price . '(G)' .
                    '</b><br/>TYPE: <b>' . $type . 
                    '</b><br/>RARITY: <b>' . $rarity . 
                    '</b><br/>MATERIAL: <b>' . $material . '</b></span></span>';
            echo '<span class="i_desc">' . $desc . '</span>';
            echo '</div>';

        }
    }
    
    // Basic output DB for cart
    public function outputDBCart(){
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Can not connect");
        
        $query = "select * from cart order by id desc";
        
        $result = mysqli_query($dbc, $query) or die('Error querying database.');
    
        // Loops through DB, outputs each entry on new line
        while ($row = mysqli_fetch_array($result)){
            
            $type = $row['item_type'];
            $rarity = $row['item_rarity'];
            $material = $row['item_material'];
            $name = $row['item_name'];
            $desc = $row['item_desc'];
            $price = $row['item_price'];
            $picture = $row['picture'];
            $sale = $row['sale'];
            $final_cart_price += $price;
            
            echo '<div class="i_container">';
            echo '<span class="i_name">' . $name . '<br/>';
            
            // Placeholder Picture
            if(empty($picture)){
                echo '<img class="placeholder_img" src="images/placeholder.png" />';
            }
            
            
            echo '<span class="i_info">PRICE: <b>' . $price . '(G)' .
                    '</b><br/>TYPE: <b>' . $type . 
                    '</b><br/>RARITY: <b>' . $rarity . 
                    '</b><br/>MATERIAL: <b>' . $material . '</b></span></span>';
            echo '<span class="i_desc">' . $desc . '</span>';
            echo '</div>';

        }
        
        // TotAL Cost
        echo '<button class="adminButton">TOTAL COST: ' . $final_cart_price . '(G)</button>';
            
        // Sale
        echo '<button class="adminButton"><a class="remove_link" href="remove_cart.php">REMOVE ALL ITEMS FROM CART</a></button></span>';
        
        
        // Purchase 
        echo '<button class="adminButton"><a class="remove_link" href="purchase_cart.php">CONTINUE TO PURCHASE</a></button></span>';
        
    }
    
    // Limits how many entries to show
    public function outputDBLimit($how_many){
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Can not connect");
        
        $query = "select * from item order by id desc limit $how_many";
        
        $result = mysqli_query($dbc, $query) or die('Error querying database.');
    
        // Loops through DB, outputs each entry on new line
        echo '<div class="card-deck">';
        
        while ($row = mysqli_fetch_array($result)){
            
            $type = $row['item_type'];
            $rarity = $row['item_rarity'];
            $material = $row['item_material'];
            $name = $row['item_name'];
            $desc = $row['item_desc'];
            $price = $row['item_price'];
            $picture = $row['picture'];
            $sale = $row['sale'];

            echo '<div class="card bg-dark text-light">';

            // Placeholder Picture
            if(empty($picture)){
                echo '<img class="card-img" src="images/placeholder.png" />';
            }

            if($sale == 'YES') {
                
                $discount = $price * .5;
                $price = $price - $discount;
            }

            echo '<div class="card-img-overlay">';

            echo '<h1 class="card-title">' . $name . '</h1>
                <h5 class="text-muted">' . $price . '(G)' .'</h5>';
            
            echo '</div><div class="card-footer"><b>' . $desc . '</b></div></div>';

        }
        echo "</div>";
        
    }
    
    // Shows only sale items, allows limited items to show
    public function outputDBSale($how_many){
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Can not connect");
        
        $query = "select * from item where sale = 'YES' order by id desc limit $how_many ";
        
        $result = mysqli_query($dbc, $query) or die('Error querying database.');
    
        // Loops through DB, outputs each entry on new line
        
        echo '<div class="card-group">';
        
        while ($row = mysqli_fetch_array($result)){
            
            $type = $row['item_type'];
            $rarity = $row['item_rarity'];
            $material = $row['item_material'];
            $name = $row['item_name'];
            $desc = $row['item_desc'];
            $price = $row['item_price'];
            $picture = $row['picture'];
            $sale = $row['sale'];
            
            echo '<div class="card bg-dark text-light">';

            // Placeholder Picture
            if(empty($picture)){
                echo '<img class="card-img" src="images/placeholder.png" />';
            }

            if($sale == 'YES') {
                
                $discount = $price * .5;
                $price = $price - $discount;
            }

            echo '<div class="card-img-overlay">';

            echo '<h1 class="card-title">' . $name . '</h1>
                <h5 class="text-muted">' . $price . '(G)' .'</h5>';
            
            echo '</div><div class="card-footer"><b>' . $desc . '</b></div></div>';

        }
        echo "</div>";
        
    }
    
    // Shows entire DB but for editing, admin stuff
    public function outputDBEdit(){
        
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Can not connect");
        
        $query = 'select * from item order by id desc';
        
        $result = mysqli_query($dbc, $query) or die('Error querying database.');
    
        // Used to set max items per row
        $max_items_per_row = 0;

        echo '<div class="card-deck">';
        
        // Loops through each item, outputs all info to page
        while ($row = mysqli_fetch_array($result)){
            
            $type = $row['item_type'];
            $rarity = $row['item_rarity'];
            $material = $row['item_material'];
            $name = $row['item_name'];
            $desc = $row['item_desc'];
            $price = $row['item_price'];
            $picture = $row['picture'];
            $sale = $row['sale'];

            // Sale check, if yes, change pricing accordingly
            if($sale == 'YES') {
                
                $discount = $price * .5;
                $price = $price - $discount;
            }
            
            
            // Start of card, outputs name in header
            echo '<div class="card bg-dark text-light">';

            echo '<div class="card-header"><h1 class="card-title">' . $name . '</h1>
                <h6 class="text-muted">PRICE: ' . $price . '(G)' .'</h6>
                <h6 class="text-muted">RARITY: ' . $rarity . '</h6>
                <h6 class="text-muted">MATERIAL: ' . $material . '</h6>
                <h6 class="text-muted">TYPE: ' . $type . '</h6></div>';
            
            // Placeholder Picture
            if(empty($picture)){
                echo '<img class="card-img" src="images/placeholder.png" />';
            }
            
            
            // Create string to pass info to cart
            $cart_string = '?id=' . $row['id'] . '&amp;item_type=' . $type . '&amp;item_rarity=' . $rarity 
                . '&amp;item_material=' . $material . '&amp;item_name=' . $name . '&amp;item_description=' . $desc
                . '&amp;item_price=' . $price. '&amp;sale=' . $sale;
        
            echo '<div class="card-footer"><b>' . $desc . '</b><hr>
                <a href="remove.php?id=' . $row['id'] . '" class="link"><button class="btn btn-outline-light">REMOVE</button></a>
                <a href="admin_edit.php' . $cart_string . '" class="link"><button class="btn btn-outline-light">EDIT</button></a>
                <a href="sale.php?id=' .$row['id'] . '&amp;sale=' . $sale .'" class="link"><button class="btn btn-outline-light">SALE</button></a>
                </div></div>';

            $max_items_per_row++;
            if ($max_items_per_row == 3){

                echo '</div><hr><div class="card-deck">';
                $max_items_per_row = 0;
            }
        
            }
        echo "</div>";
    }
    
    // Shows only specific items, organized by type
    public function outputDBCurated($which_one){
        
        // Connect to DB
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Can not connect");
        
        // Selects everything from specific item type, orders by first to last
        $query = "select * from item where item_type = '$which_one' order by id desc";
        
        $result = mysqli_query($dbc, $query) or die('Error querying database.');
        
        // Used to set max items per row
        $max_items_per_row = 0;
        
        echo '<div class="card-deck">';
        
        // Loops through each item, outputs all info to page
        while ($row = mysqli_fetch_array($result)){
            
            $type = $row['item_type'];
            $rarity = $row['item_rarity'];
            $material = $row['item_material'];
            $name = $row['item_name'];
            $desc = $row['item_desc'];
            $price = $row['item_price'];
            $picture = $row['picture'];
            $sale = $row['sale'];
            
            // Start of card, outputs name in header
            echo '<div class="card bg-dark text-light">
                <div class="card-header">
                <h1 class="card-title">' . $name . '</h1>
                </div>';
            
            // Placeholder Picture
            if(empty($picture)){
                echo '<img class="card-img" src="images/placeholder.png" />';
            }

            // Sale check, if yes, change pricing accordingly
            if($sale == 'YES') {
                
                $discount = $price * .5;
                $price = $price - $discount;
            }
            
            echo '<div class="card-body">
                <h6 class="text-muted">' . $price . '(G)</h6>
                <h6 class="text-muted">' . $rarity . '</h6>
                <h6 class="text-muted">' . $material . '</h6>
                </div>';
            
            // Create string to pass info to cart
            $cart_string = '?id=' . $row['id'] . '&amp;type=' . $type . '&amp;rarity=' . $rarity 
                . '&amp;material=' . $material . '&amp;name=' . $name . '&amp;desc=' . $desc
                . '&amp;price=' . $price. '&amp;sale=' . $sale;
        
            echo '<div class="card-footer"><b>' . $desc . '</b><hr>
                <a href="cart_add.php" class="link"><button class="btn btn-outline-light">ADD TO CART</button></a>
                </div></div>';

            $max_items_per_row++;
            if ($max_items_per_row == 3){

                echo '</div><hr><div class="card-deck">';
                $max_items_per_row = 0;
            }
        
            }
        echo "</div>";
    }
}