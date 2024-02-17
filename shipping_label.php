<link rel="stylesheet" href="homepage.css" />
<?php
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$street_address = filter_input(INPUT_POST, 'street_address');
$city = filter_input(INPUT_POST, 'city');
$state_initials = filter_input(INPUT_POST, 'state_initials');
$zip_code = filter_input(INPUT_POST, 'zip_code');
$package_height = filter_input(INPUT_POST, 'package_height', FILTER_VALIDATE_FLOAT);
$package_width = filter_input(INPUT_POST, 'package_width', FILTER_VALIDATE_FLOAT);
$order_date = filter_input(INPUT_POST, 'order_date');
$order_number = filter_input(INPUT_POST, 'order_number');
$total_value = filter_input(INPUT_POST, 'total_value', FILTER_VALIDATE_FLOAT);

$error_message = '';

if ($package_height > 36) {
    $error_message .= 'Dimension must be under 36 inches <br>';
}

if ($package_width > 36) {
    $error_message .= 'Dimension must be under 36 inches <br>';
}

if ($total_value > 1000) {
    $error_message .= 'Value must be under $1,000 <br>';
}
if (strlen($zip_code) > 5) {
    $error_message .= 'Zip Code must be under 5 digits <br>';
}
if ($error_message != '') {
  include('shipping.php');
  exit();
}
?>
<html>
  <body class="label">
    <div class="flex">
      <p id="bigp"class="topright">UPS</p>
      <p id="toptext"class="topright">Package Height: <?php echo $package_height?><br>Package Width: <?php echo $package_width?><br>Package Value: <?php echo $total_value?><br>Tacking Number: 020202020202</p>
    </div>
    <h1 class=pri>PRIORITY MAIL 2-DAY</h1>
    <div class="fromaddy">
      <p class="from">FROM: </p>
      <p class="sender">Fuzail Shahzad<br>323 Dr Martin Luther King Jr Blvd<br>Newark, NJ 07102</p>
    </div>
    <div class="toaddy">
      <p class="shipto">SHIP TO: </p>
      <p class="reciever"><?php echo $first_name;?> <?php echo $last_name;?><br><?php echo $street_address?><br><?php echo $city?>, <?php echo $state_initials?><br><?php echo $zip_code?></p>
    </div>
    <div class="shippingdate">
      <p class="shipd">Ship Date: </p>
      <p class="date"><?php echo $order_date?></p>
    </div>
    <img class="trackinglabel" src="images/tracking_label.png">
    <h3 class="ordernumber">Order Number: <?php echo $order_number?></h3>
  <body
</html> 