<!--Fuzail Shahzad 4-5-2024 IT202-006 Phase 4 Assignment uf7@njit.edu-->
<link rel="stylesheet" href="homepage.css" />
<?php
require_once('database_njit.php');
//$newemail = filter_input(INPUT_POST, 'newemail');
//$newpass = filter_input(INPUT_POST, 'newpass');
//$newfirstname = filter_input(INPUT_POST, 'newfirstname');
//$newlastname = filter_input(INPUT_POST, 'newlastname');
?>
<?php
function addQuirkTechManager($newemail, $newpass, $newfirstname, $newlastname) {
    $db = getDB();
    $hash = password_hash($newpass, PASSWORD_DEFAULT);
    $query = 'INSERT INTO QuirkTechManagers (emailAddress, password, firstName, lastName, dateCreated)
              VALUES (:newemail, :newpass, :newfirstname, :newlastname, NOW())';
    $statement = $db->prepare($query);
    $statement->bindValue(':newemail', $newemail);
    $statement->bindValue(':newpass', $hash);
    $statement->bindValue(':newfirstname', $newfirstname);
    $statement->bindValue(':newlastname', $newlastname);
    $statement->execute();
    $statement->closeCursor();
} 

addQuirkTechManager('fuzail@shahzad.com', 'password4', 'Fuzail', 'Shahzad');
addQuirkTechManager('kevin@john.com', 'password4', 'Kevin', 'John');
addQuirkTechManager('julia@smith.com', 'password4', 'Julia', 'Smith');
?>
<html>
    <body>
        <p>successful</p>
</body>
</html>