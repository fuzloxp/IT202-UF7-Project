<?php
require_once('database_njit.php');
// Get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$availability = filter_input(INPUT_POST, 'availability');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$dateandtime = filter_input(INPUT_POST, 'dateandtime');

$query1 = 'SELECT quirktechCode FROM QuirkTech';
    $statement1 = $db->prepare($query1);
    $statement1->execute();
    $count = $statement1->fetchAll();
    $statement1->closeCursor();

if ($category_id == NULL || $category_id == FALSE || $code == NULL || 
        $name == NULL || $price == NULL || $price == FALSE) {
    $error = "Invalid product data. Check all fields and try again.";
    echo "$error <br>";
    // include('error.php');
}  
 foreach ($count as $codecount){
    if ($code === $codecount['quirktechCode']){
        $error = "Please input a different product code.";
        echo "$error <br>";
        
    }
} 
    $query = 'INSERT INTO QuirkTech
                 (quirktechCategoryID, quirktechCode, quirktechName, description, out_of_stock, price, dateCreated)
              VALUES
                 (:category_id, :code, :name, :description, :availability, :price, NOW())';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':availability', $availability);
    $statement->bindValue(':price', $price);
    $success = $statement->execute();
    $statement->closeCursor();
    echo "<p>Your insert statement status is $success</p>";


?>
<p><a href="product_list.php">View Product List</a></p>