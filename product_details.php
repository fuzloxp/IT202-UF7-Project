<!-- Fuzail Shahzad 4-19-2024 IT202-006 Phase 5 Assignment -->
<?php
    require_once('database_njit.php');

    $errorCheck = 'SELECT quirktechID FROM QuirkTech';
    $statementError = $db->prepare($errorCheck);
    $statementError->execute();
    $error = $statementError->fetchAll();
    $statementError->closeCursor();

    $product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);

    if ($product_id === NULL) {
        include("detail_error.php");
        exit();
    }

    $isValid = true;

    foreach ($error as $pid) {
        if ($pid['quirktechID'] === $product_id) {
            $isValid = true;

            $query = "SELECT * FROM QuirkTech WHERE quirktechID = :product_id";
            $statement = $db->prepare($query);
            $statement->bindValue(':product_id', $product_id);
            $statement->execute();
            $detail = $statement->fetch();
            $statement->closeCursor();

            $nameQuery = "SELECT * FROM QuirkTechCategories WHERE
                         quirktechCategoryID = " . $detail['quirktechCategoryID'];
            $statement2 = $db->prepare($nameQuery);
            $statement2->execute();
            $category = $statement2->fetch();
            $statement2->closeCursor();

            break;
        } else {
            $isValid = false;
        }
    }

    if ($isValid === false) {
        include("detail_error.php");
        exit();
    }

?>

<html>
    <head>
        <title>Product Details Page</title>
        <link rel="stylesheet" href="homepage.css"/>
    </head>
    <body>
        <?php include ('header.php')?>
        <div class="main content">
            <h2>Details</h2>
            <div class="product image">
                <img height="500px" src="<?php echo 'images/'.$product_id.'-baw.png'?>" alt="<?php echo $detail['quirktechName']." product";?>" />
            </div>
            <div class="product details">
                <p><?php echo $detail['quirktechName']?></p>
                <p>Category: <?php echo $category['quirktechCategoryID']?></p>
                <p>Code: <?php echo $detail['quirktechCode']?></p>
                <p>Description: <?php echo $detail['description']?></p>
                <p>Price: <?php echo $detail['price']?></p>
            </div>
        </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script>
        $(document).ready( () => {
            $("img").mouseover(function() {
                const image = $(this).attr('src');
                const new_image = image.replace('-baw.png', '.png');
                $(this).attr('src', new_image);
            })

            $("img").mouseout(function() {
                const image = $(this).attr('src');
                const new_image = image.replace('.png', '-baw.png');
                $(this).attr('src', new_image);
            })
        });
    </script>
</html>