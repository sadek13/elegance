<?php



require('../class/user.class.php');





$user=new User();   


if ($_POST) {

   
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $city;
    if(isset($_POST['city']))
    $city=$_POST['city'];
else
$city= '';


    $user->validate('post');

    $user->validatePhoneNumber($mobile);
    

   
if(count($user->checkEmailForReg($email))>0) {
    $response = array(
        'status' => 'error',
        'message' => 'email taken'
    );

}
else{
$result=$user->insertUser($first_name, $last_name, $email, $password, $city,$mobile);
    
  
    if ($result) {
        $response = array(
            'status' => 'ok',
            'message' => 'Account Registered'
        );
    } 

    // Set the Content-Type header
}

header('Content-Type: application/json');

echo json_encode($response); // Output the JSON response

}// Check if the form is submitted


?>




