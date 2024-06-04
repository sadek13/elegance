<?php require_once('DAL.class.php');



class User extends DAL{



    public function getallUsers(){
        $sql='select * from users';
        return $this->getdata($sql);
    }
 

   



    public function insertUser($first_name, $last_name, $email, $password,$city,$mobile){

        $sql = "INSERT INTO users (first_name, last_name, email, password,city, mobile)
        VALUES ('$first_name', '$last_name', '$email', '$password', '$city','$mobile')";

    
// $stmt = $conn->prepare($sql);

// if ($stmt) {
//     // Bind parameters
//     $stmt->bind_param("ssssss", $first_name, $last_name, $username, $email, $password, $mobile_number);

//     // Execute the statement
//     if ($stmt->execute()) {
//         echo "New record created successfully";
//     } else {
//         echo "Error executing statement: " . $stmt->error;
//     }

//     // Close the statement
//     $stmt->close();
// } else {
//     echo "Error preparing statement: " . $conn->error;
// }

        return $this->execute($sql);
      
    }

    public function checkEmailForReg($email){
        $sql= "select email from users where email = '$email'";
        return $this->getdata($sql);
    }
    public function checkEmail($email,$password){
        $sql= "select id from users where email = ? and password = ? ";
        return $this->data($sql,[$email,$password]);
    }

    public function checkAdminUsername($username,$password){
        $sql= "select id from admin where username = ? and password = ? ";
        return $this->data($sql,[$username,$password]);
    }

    public function getUserDataByID($id){
        $sql= "select * from users where id = $id";
        return  $this->getdata($sql);
}
}
?>

