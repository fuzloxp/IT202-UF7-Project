<!--Fuzail Shahzad 4-5-2024 IT202-006 Phase 4 Assignment uf7@njit.edu-->
<?php
require_once('database_njit.php');
$query = 'SELECT *
          FROM QuirkTechCategories
          ORDER BY quirktechCategoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Add Products</title>
    <link rel="stylesheet" href="homepage.css" />
</head>

<!-- the body section -->
<body>
    <header><h1>Product Manager</h1></header>
    <?php include('header.php'); ?>
    <main>
        <h1>Add Product</h1>
        <form action="add_product.php" method="post"
              id="add_product_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['quirktechCategoryID']; ?>">
                    <?php echo $category['quirktechCategoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
            <label>Code:</label>
            <input type="text" name="code"><br>

            <label>Name:</label>
            <input type="text" name="name"><br>

            <label>Description:</label>
            <input type="text" name="description"><br>

            <label>Availability:</label>
            <input type="text" name="availability"><br>

            <label>List Price:</label>
            <input type="text" name="price"><br>

            <input type="submit" value="Add Product"><br>
        </form>
        <p><a href="product_list.php">View Product List</a></p>
    </main>

    <footer>
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>