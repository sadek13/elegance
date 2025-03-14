<?php require('C:\\xampp\\htdocs\\www\\matjar\\user\\actions\\check-login.php');

require('../class/order.class.php');
// load merchant configuration

// set merchant configuration one time




error_reporting(E_ALL);
ini_set('display_errors', '1');


$order = new Order();








// $order_ID = $order->insertOrder($userID, $firstName, $lastName, $mobile, $email, $city, $street, $building, $orderTotal);




// if ($order_ID != null) {
//    foreach ($items as $k => $v) {
//       $quantity = $v['quantity'];
//       $price = $v['price'];
//       $order->product_order($order_ID, '122', $price, $order_ID);
//    }
// }

$response = array(
   "status" => "ok",
   "message" => "Order Made Successfully"
);

$_SESSION['cart'] = [];
header('Content-Type: application/json');
echo json_encode($response);
   