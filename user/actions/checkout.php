<?php require('C:\\xampp\\htdocs\\www\\matjar\\user\\actions\\check-login.php');

require('../class/order.class.php');

$order=new Order();



// var_dump($_POST['formData'][0]['name']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you're using POST method

    if(isset($_POST['formData'])){
    // Personal Info
    $firstName = '';
    $lastName = '';
    $email = '';
    $mobile = '';
    $city = '';
    $street = '';
    $building = '';
    
    foreach ($_POST['formData'] as $index => $data) {
        $arr=$_POST['formData'];

        if($arr[$index]['name']=='first_name'){
          
            $firstName=$_POST['formData'][$index]['value'];
           
         }

         if($arr[$index]['name']=='last_name'){
           
            $lastName=$_POST['formData'][$index]['value'];
         }

         if($arr[$index]['name']=='mobile'){
           
            $mobile=$_POST['formData'][$index]['value'];
         }
         
         if($arr[$index]['name']=='email'){
           
            $email=$_POST['formData'][$index]['value'];
         }
         
         if($arr[$index]['name']=='city'){
           
            $city=$_POST['formData'][$index]['value'];
         }
         
         if($arr[$index]['name']=='street'){
           
            $street=$_POST['formData'][$index]['value'];
         }

         if($arr[$index]['name']=='building'){
           
            $building=$_POST['formData'][$index]['value'];
         }
         
         
         

    }

    
    }

    // Continue with your processing

    $orderTotal=(isset($_POST['nonForm']['orderInfo'])) ? $_POST['nonForm']['orderInfo']['orderTotal']:'';

    $userID=(isset($_POST['nonForm']['userID'])) ? $_POST['nonForm']['userID']:'';

    $items=(isset($_POST['nonForm']['individItems'])) ? $_POST['nonForm']['individItems']:[];
}




$order_ID=$order->insertOrder($userID,$firstName,$lastName,$mobile,$email,$city,$street,$building,$orderTotal);




if($order_ID!=null){
foreach($items as $k=>$v)
{
$quantity=$v['quantity'];
$price=$v['price'];
$order->product_order($order_ID,'122',$price,$order_ID);
}
}

$response = array(
   "status" => "ok",
   "message"=>"Order Made Successfully"
);

$_SESSION['cart']=[];
header('Content-Type: application/json');
echo json_encode($response);







?>

