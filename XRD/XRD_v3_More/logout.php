<?php

  session_start();
  
  if (isset($_SESSION['id'])) {
    // Delete the session vars by clearing the $_SESSION array
    $_SESSION = array();

    // Delete the session cookie
    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 1);
    }

    // Destroy the session
    session_destroy();
  }

  // Delete the user ID and username cookies
  setcookie('id', '', time() - 1);
  setcookie('username', '', time() - 1);

  // Redirect to the home page
  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
  header('Location: ' . $home_url);
?>
