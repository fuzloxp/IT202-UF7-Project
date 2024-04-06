<!--Fuzail Shahzad 4-5-2024 IT202-006 Phase 4 Assignment uf7@njit.edu-->
<?php
    require_once('database_njit.php');

    function is_valid_admin_login($email, $password) {
        $db = getDB();
        $query = 'SELECT password FROM QuirkTechManagers WHERE emailAddress = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();  
        if ($row === false) {
            return false;
        } else {
            $hash = $row['password'];
            return password_verify($password, $hash);
        }
    }
?>