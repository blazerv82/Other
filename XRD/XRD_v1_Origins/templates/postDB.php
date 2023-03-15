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
        
        $query = "insert into item (item_type, item_rarity, item_material, item_name, item_desc, item_price) " .
                "values ('$this->type', '$this->rarity', '$this->material', '$this->name', '$this->desc', '$this->price')";
        
        mysqli_query($dbc, $query) or die('Error querying database.');
                
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
    
    // Basic output DB for cart, does nothing special
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
    
    // Shows only sale items, allows limited items to show
    public function outputDBSale($how_many){
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Can not connect");
        
        $query = "select * from item where sale = 'YES' order by id desc limit $how_many ";
        
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
    
    // Shows entire DB but for editing, admin stuff
    public function outputDBEdit(){
        
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Can not connect");
        
        $query = 'select * from item order by id desc';
        
        $result = mysqli_query($dbc, $query) or die('Error querying database.');
    
        // Loops through DB, outputs each entry on new line
        while ($row = mysqli_fetch_array($result)){
            
            $type = $row['item_type'];
            $rarity = $row['item_rarity'];
            $material = $row['item_material'];
            $name = $row['item_name'];
            $desc = $row['item_desc'];
            $price = $row['item_price'];
            $sale = $row['sale'];
            $picture = $row['picture'];
            $edit_string = '?id=' . $row['id'] . '&amp;type=' . $type . '&amp;rarity=' . $rarity 
                            . '&amp;material=' . $material . '&amp;name=' . $name . '&amp;desc=' . $desc
                            . '&amp;price=' . $price;
            
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
                    '</b><br/>ON SALE: <b>' . $sale .
                    '</b><br/>TYPE: <b>' . $type . 
                    '</b><br/>RARITY: <b>' . $rarity . 
                    '</b><br/>MATERIAL: <b>' . $material . '</b></span></span>';
            echo '<span class="i_desc">' . $desc . '</span>';
            
            // Remove
            echo '<span class="i_name"><button class="adminButton"><a class="remove_link" href="remove.php?id=' . $row['id'] . '">DELETE ITEM FROM STORE</a></button>';
            
            // Edit
            echo '<button class="adminButton"><a class="remove_link" href="edit_item.php' . $edit_string . '">EDIT ITEM INFO</a></button>';
            
            // Sale
            echo '<button class="adminButton"><a class="remove_link" href="sale.php?id=' . $row['id'] . '&amp;sale=' . $sale . '">CHANGE TO SALE/REGULAR PRICE</a></button></span>';
            
            echo '</div>';
        }
    }
    
    // Shows only specific items, organized by type
    public function outputDBCurated($which_one){
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Can not connect");
        
        $query = "select * from item where item_type = '$which_one' order by id desc";
        
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
            
            $cart_string = '?id=' . $row['id'] . '&amp;type=' . $type . '&amp;rarity=' . $rarity 
                            . '&amp;material=' . $material . '&amp;name=' . $name . '&amp;desc=' . $desc
                            . '&amp;price=' . $price. '&amp;sale=' . $sale;
            
            echo '<span class="i_info">PRICE: <b>' . $price . '(G)' .
                    '</b><br/>TYPE: <b>' . $type . 
                    '</b><br/>RARITY: <b>' . $rarity . 
                    '</b><br/>MATERIAL: <b>' . $material . '</b></span></span>';
            echo '<span class="i_desc">' . $desc . '</span>';
            
            // Remove
            echo '<span class="i_name"><button class="adminButton"><a class="remove_link" href="add_cart.php' . $cart_string . '">ADD TO CART</a></button>';
            
            
            echo '</div>';

        }
    }
}