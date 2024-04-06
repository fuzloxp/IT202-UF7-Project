<!--Fuzail Shahzad 4-5-2024 IT202-006 Phase 4 Assignment uf7@njit.edu-->
<?php

session_start();

$_SESSION = [];  // Clear all session data from memory

session_destroy();     // Clean up the session ID

$login_message = 'You have been logged out.';

include('login.php');

?>