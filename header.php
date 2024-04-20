<!--Fuzail Shahzad 2-16-2024 IT202-006 Phase 1 Assignment: HTML5 and PHP Form uf7@njit.edu-->
<header>
    <img src="images/company_logo.png" />
    <h1>QuirkTech</h1>
    <?php include('menu.php');?>
    <nav>
            <li><a href="http://localhost/uf7/git/IT202-UF7-Project/homepage.php">Home</a></li>
            <?php if(isset($_SESSION['is_valid_admin'])) {?>
            <li><a href="http://localhost/uf7/git/IT202-UF7-Project/shipping.php">Shipping</a></li>
            <?php } ?>
            <li><a href="http://localhost/uf7/git/IT202-UF7-Project/product_list.php">Product List</a></li>
            <?php if(isset($_SESSION['is_valid_admin'])) {?>
            <li><a href="http://localhost/uf7/git/IT202-UF7-Project/add_product_form.php">Create Product</a></li>
            <?php } ?>
            
            <nav>
</header>