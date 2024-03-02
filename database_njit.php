<!--Fuzail Shahzad 3-1-2024 IT202-006 Phase 2 Assignment: Read SQL Data using PHP uf7@njit.edu-->
<?php
    $dsn= 'mysql:host=sql1.njit.edu;port=3306;dbname=uf7';
    $username='uf7';
    $password= 'Password#123';
    try {
        $db = new PDO($dsn, $username, $password);
        echo '<p>You are connected to the NJIT database!</p>';
    } catch (PDOException $ex) {
        $error_message = $ex->getMessage();
        include('database_error.php');
        exit();
    }
?>