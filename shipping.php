    <?php
        if (!isset($first_name)) { $first_name = ''; }
        if (!isset($last_name)) { $last_name = ''; }
        if (!isset($street_address)) { $street_address = ''; }
        if (!isset($city)) { $city = ''; }
        if (!isset($state_initials)) { $state_initials = ''; }
        if (!isset($zip_code)) { $zip_code = ''; }
        if (!isset($package_height)) { $package_height = ''; }
        if (!isset($package_width)) { $package_width = ''; }
        if (!isset($total_value)) { $total_value = ''; }
        if (!isset($order_number)) { $order_number = ''; }
        if (!isset($order_date)) { $order_date = ''; }
        if (!isset($error_message)) { $error_message = ''; }
    ?>
<html>
    <head>
        <title>Shipping</title>
        <link rel="stylesheet" href="homepage.css"/>
    </head>
    <body class="shippingpagebody">
        <?php include('header.php'); ?>
        <p class=errormessage><?php echo($error_message); ?></p>
        <form action ="shipping_label.php" method="post">
            <label>First Name:</label>
            <br>
            <input value="<?php echo htmlspecialchars($first_name); ?>" />
            <br>
            <label>Last Name:</label>
            <br>
            <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" />
            <br>
            <label>Street Address:</label>
            <br>
            <input type="text" name="street_address" value="<?php echo htmlspecialchars($street_address); ?>" />
            <br>
            <label>City:</label>
            <br>
            <input type="text" name="city" value="<?php echo htmlspecialchars($city); ?>" />
            <br>
            <label>State:</label>
            <br>
            <input type="text" name="state_initials" value="<?php echo htmlspecialchars($state_initials); ?>" />
            <br>
            <label>Zip Code:</label>
            <br>
            <input type="text" name="zip_code" value="<?php echo htmlspecialchars($zip_code); ?>" />
            <br>
            <label>Package Height(inches):</label>
            <br>
            <input type="text" name="package_height" value="<?php echo htmlspecialchars($package_height); ?>" />
            <br>
            <label>Package Width(inches):</label>
            <br>
            <input type="text" name="package_width" value="<?php echo htmlspecialchars($package_width); ?>" />
            <br>
            <label>Total Package Value:</label>
            <br>
            <input type="text" name="total_value" value="<?php echo htmlspecialchars($total_value); ?>" />
            <br>
            <label>Order Number:</label>
            <br>
            <input type="text" name="order_number" value="<?php echo htmlspecialchars($order_number); ?>" />
            <br>
            <label>Order Date:</label>
            <br>
            <input type="date" name="order_date" value="<?php echo htmlspecialchars($order_date); ?>" />
            <br>
            <input class="submitbutton" type="submit" value="Get Shipping Label" />
        </form>
        <?php include('footer.php'); ?>
    </body>
</html>