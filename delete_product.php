<?php
    require_once('database_njit.php');

    $quirktech_ID = filter_input(INPUT_POST,'quirktech_ID', FILTER_VALIDATE_INT);
    $quirktechCategory_ID = filter_input(INPUT_POST,'quirktechCategory_ID', FILTER_VALIDATE_INT);

        $query = 'DELETE FROM QuirkTech WHERE quirktechID = :quirktech_ID';
        $statement = $db->prepare($query);
        $statement->bindValue(':quirktech_ID', $quirktech_ID);
        $success = $statement->execute();
        $statement->closeCursor();
        echo "<p>Your delete statement status is $success</p>";
    
?>