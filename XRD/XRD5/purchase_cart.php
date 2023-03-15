<?php
    // Header templates
    require_once('php_templates/header.php');

    // Check login status
    require_once('php_templates/logincheck.php');
    
    
    if(isset($_POST['submit'])){
        
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $credit_card = $_POST['credit_card'];
        $ccv = $_POST['ccv'];
        
        
        if(!empty($name) && !empty($phone) && !empty($email) && !empty($credit_card) && !empty($ccv)) {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("database connection gone bad");
    
            // Delete
            $query = "truncate table cart";

            mysqli_query($dbc, $query) or die("query info gone bad");
            mysqli_close($dbc);
    
            echo '<div class="message_header">Item(s) Purchased!<br/>The order will be sent through shortly<br/>  <a class="link" href="index.php">Go back</a></div>';
            
            exit();
        }
        
        else {
            echo "<div class='message_header'>You forgot some things, try again</div>";
        }
    }
    
?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    
    <table>
        <tr>
            <td><label for="">Name</label></td>
            <td><input type="text" name="name" class="search" <?php if(!empty($name)){ echo "value='$name'";} else {echo 'placeholder="name"';} ?> /></td>
        </tr>
            <tr>
            <td><label for="">Phone</label></td>
            <td><input type="number" name="phone" class="search" <?php if(!empty($phone)){ echo "value='$phone'";} else {echo 'placeholder="phone"';} ?> /></td>
        </tr>
        <tr>
            <td><label for="">Email</label></td>
            <td><input type="email" name="email" class="search" <?php if(!empty($email)){ echo "value='$email'";} else {echo 'placeholder="email"';} ?> /></td>
        </tr>
        <tr>
            <td><label for="">Card Number</label></td>
            <td><input type="number" name="credit_card" class="search" <?php if(!empty($credit_card)){ echo "value='$credit_card'";} else {echo 'placeholder="credit card"';} ?> /></td>
        </tr>
        <tr>
            <td><label for="">CCV</label></td>
            <td><input type="number" name="ccv" class="search" <?php if(!empty($ccv)){ echo "value='$ccv'";} else {echo 'placeholder="ccv"';} ?> /></td>
        </tr>
        <tr>
            <td><input type="submit" class="submit_form_button" value="Finalize Purchase" name="submit" />
                <input type="reset" class="submit_form_button" value="Reset Form">
            </td>
        </tr>
    </table>
    </form>