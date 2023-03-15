<?php
  require_once('templates/connectvars.php');

  // Start the session
  session_start();
  
  $error_msg = "";

  // Check to see if logged in
  if (!isset($_SESSION['id'])) {
    if (isset($_POST['submit'])) {
      
      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("oops, try again, no DB");

      // Grab the user-entered log-in data
      $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
      
      if (!empty($username) && !empty($password)) {
        // Look up the username and password in the database
        $query = "select id, username from user where username='$username' and password='$password'";
        
        $data = mysqli_query($dbc, $query) or die("oops, try again, no QUERY");

        // If credentials are good, actually log in
        if (mysqli_num_rows($data) == 1) {
          
          $row = mysqli_fetch_array($data);
          $_SESSION['id'] = $row['id'];
          $_SESSION['username'] = $row['username'];
          setcookie('id', $row['id'], time() + (60 * 60 * 24 * 30));
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
          header('Location: ' . $home_url);
        }
        else {
          // The username/password are incorrect so set an error message
          $error_msg = 'Sorry, you must enter a valid username and password to log in.';
        }
      }
      else {
        // The username/password weren't entered so set an error message
        $error_msg = 'Sorry, you must enter your username and password to log in.';
      }
    }
  }

  // Insert the page header
  require_once('templates/header.php');

  // Show error
  if (empty($_SESSION['id'])) {
    echo '<p class="error">' . $error_msg . '</p>';
?>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table>
    <tr colspan="2">
      <td>LOGIN</td>
    </tr>
    <tr>
      <td><label for="username">Username:</label></td>
      <td><input type="text" name="username" value="<?php if (!empty($username)) echo $username; ?>" /></td>
    </tr>
    <tr>
      <td><label for="password">Password:</label></td>
      <td><input type="password" name="password" /></td>
    </tr>
    <tr>
      <td><input type="submit" value="Log In" name="submit" /></td>
    </tr>
  </table>
  </form>

<?php
  }
  else {
    // Confirm the successful log-in
    echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
  }
?>