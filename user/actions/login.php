<?php

session_start();



require('../class/user.class.php');





$user=new User();   


if (isset($_POST)) {
   
 
    $email = $_POST['l-email'];
 $password = $_POST['l-password'];
    

   
if(count($user->checkEmail($email,$password))>0) {
   
    $id=$user->checkEmail($email,$password)[0]['userID'];
    $response = array(
        'status' => 'user',
'id'=>$id
    );

 
}

elseif(count($user->checkAdminUsername($email,$password))>0) {
        $id=$user->checkAdminUsername($email,$password)[0]['adminID'];
    $response = array(
        'status' => 'admin',
        'id'=>$id
    );

    

}
 


else{
    $response = array(
        'status' => 'error',
      
    );
    header('Content-Type: application/json');

    echo json_encode($response);
    exit;
 
}



    // Set the Content-Type header


    $username=$user->getUserDataById($id);
   

    

    $_SESSION['user-type'] = $response['status'];

    $_SESSION['user-name'] = $username;

    $_SESSION['login'] = true;

    $_SESSION['userID']= $id;

  // Output the JSON response

  header('Content-Type: application/json');


  echo json_encode($response);


}
// Check if the form is submitted


?>




