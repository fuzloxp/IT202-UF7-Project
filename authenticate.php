<!--Fuzail Shahzad 4-5-2024 IT202-006 Phase 4 Assignment uf7@njit.edu-->
<?php
    require_once('admin_db.php');
    session_start();
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    if (is_valid_admin_login($email, $password)) {
      $_SESSION['is_valid_admin'] = true;
      echo "<p>You have successfully logged in.</p>";    
    } else {
     if ($email == NULL && $password == NULL) {
      $login_message ='You must login to view this page.';
     } else {
      $login_message = 'Invalid credentials.';
     }
      include('login.php');
    }
?>