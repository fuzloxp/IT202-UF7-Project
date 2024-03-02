<!--Fuzail Shahzad 3-1-2024 IT202-006 Phase 2 Assignment: Read SQL Data using PHP uf7@njit.edu-->
<?php
require_once('database_njit.php');

$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
  $category_id = 1;
}

$queryCategory = 'SELECT * FROM QuirkTechCategories
          WHERE quirktechCategoryID = :category_id';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['quirktechCategoryName'];
$statement1->closeCursor();

$queryAllCategories = 'SELECT * FROM QuirkTechCategories
             ORDER BY quirktechCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

$queryProducts = 'SELECT * FROM QuirkTech
          WHERE quirktechCategoryID = :category_id
          ORDER BY quirktechID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();
?>
<!DOCTYPE html>
<html>
<head>
  <title>My QuirkTech Shop</title>
  <link rel="stylesheet" href=product_list.css />
  <link rel="stylesheet" href="homepage.css" />
</head>

<body class="productpagebody">
<main>
<?php include('header.php'); ?>
  <h1>Product List</h1>
  <aside>
    <h2 style="font-family: Monospace">Categories</h2>
    <nav style="font-family: Monospace">
    <ul>
      <?php foreach ($categories as $category) : ?>
      <li>
        <a href="?category_id=<?php 
            echo $category['quirktechCategoryID']; 
            ?>">
          <?php echo $category['quirktechCategoryName']; ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
    </nav>       
  </aside>

  <section>
    <h2 style="font-family: Monospace"><?php echo $category_name; ?></h2>
    <table class="producttablebruv">
      <tr style="font-family: Monospace">
        <th>Category</th>
        <th>Code</th>
        <th>Name</th>
        <th>Description</th>
        <th>Availability</th>
        <th>Price</th>
      </tr>

      <?php foreach ($products as $product) : ?>
      <tr style="font-family: Monospace">
        <td>
        <?php foreach ($categories as $category) : ?>
            <?php if ($product['quirktechCategoryID']===$category['quirktechCategoryID']) 
                echo $category['quirktechCategoryName']  
            ?>
        <?php endforeach; ?>
        </td>
        <td><?php echo $product['quirktechCode']; ?></td>
        <td><?php echo $product['quirktechName']; ?></td>
        <td><?php echo $product['description']; ?></td>
        <td><?php echo $product['out_of_stock']; ?></td>
        <td><?php echo $product['price']; ?></td>
        <td>
        </td>
      </tr>
      <?php endforeach; ?>      
    </table>
  </section>
</main>  
<footer>
<?php include('footer.php'); ?>
</footer>
</body>
</html>