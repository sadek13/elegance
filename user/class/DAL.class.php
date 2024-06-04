    <?php 
class DAL
{
  public $servername = "localhost";
  public $username = "root";
  public $password = "";
  public $dbname = "matjar";

  public function validatePhoneNumber($phone) {
    $phone = preg_replace('/[\/ ]/', '', $phone);
    $pattern = '/^(?:\+?\d{1,3})?[ -]?\(?\d{3}\)?[ -]?[0-9]{3}[ -]?[0-9]{4}$/';
    $pattern2 = '/^\+?[1-9][0-9]{7,14}$/';
    if (preg_match($pattern, $phone) || preg_match($pattern2, $phone)) {
    return $phone;
    } else {
      header('Content-Type: text/json');
    echo json_encode(array(
        'status' => 'error',
        'message' => "Invalid input. Wrong Phone Numebr Fomrat.",
    ));
     exit();
    
    }
   }

   public function have_script($value){
    $patterns = array(
    '/<script>/i',
    '/<script src="">/i',
    '/<\/script>/i',
    '/<\?php/i',
    '/<\?/i',
    '/exec\(/i',
    '/system\(/i',
    '/passthru\(/i'
    // Add more patterns as needed
    );
    foreach ($patterns as $pattern) {
    if (preg_match($pattern, $value, $matches)) {
    return $matches[0]; // Return the matched script type
    }
    }
    ;
   }

   public function  validate($method){
    if($method == "post"){

    foreach($_POST as $k => $v){
    if(gettype($_POST["$k"]) == "array"){

    foreach($_POST["$k"] as $k1 => $v1){
      
    $scriptType = $this->have_script($v1);
    if($scriptType) {
      
    $_POST["$k"]["$k1"] = " ";  
    header('Content-Type: text/json');
    echo json_encode(array(
    'status' => 'error',
    'message' => "Invalid input. Detected unsupported formats in input;"
    ));
    exit(); // Stop further execution
    }
    }
    } else {
    $scriptType = $this->have_script($v);
    if($scriptType) {
    
    $_POST["$k"] = " ";
    header('Content-Type: text/json');
    echo json_encode(array(
    'status' => 'error',
    'message' => "Invalid input. Detected unsupported formats in input."
    ));
    exit(); // Stop further execution
    }
    }
    }
    } else if($method == "get") {
    foreach($_GET as $k => $v){
    if(gettype($_GET["$k"]) == "array"){
    foreach($_GET["$k"] as $k1 => $v1){
    $scriptType = $this->have_script($v1);
    if($scriptType) {
    $_GET["$k"]["$k1"] = " ";
    header('Content-Type: text/json');
    echo json_encode(array(
    'status' => 'error',
    'message' => "Invalid input. Detected unsupported formats in input."
    ));
    exit(); // Stop further execution
    }
    }
    } else {
    $scriptType = $this->have_script($v);
    if($scriptType) {
    $_GET["$k"] = " ";
    header('Content-Type: text/json');
    echo json_encode(array(
    'status' => 'error',
    'message' => "Invalid input. Detected unsupported formats in input;"
    ));
    exit(); // Stop further execution
    }
    }
    }
    }
   }

  public function getdata($sql)
  {
    $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    if ($conn->connect_error) {
      throw new Exception($conn->connect_error);
      // die("Connection failed: " . $conn->connect_error);
    } else {
      $result = $conn->query($sql);
      if (!$result) {
        throw new Exception($conn->error);
      } else {
        $result = $conn->query($sql);
        $results = $result->fetch_all(MYSQLI_ASSOC);
        return $results;

      }
    }
}

// public function insertData($sql)
// {
//   $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
//   if ($conn->connect_error) {
//     throw new Exception($conn->connect_error);
//     // die("Connection failed: " . $conn->connect_error);
//   } else {

//     if(!$result = $conn->query($sql)){
//       //throw new Exception($conn->connect_error);
//     }

 
   
   
    



// }
  


  public function ConnectionDatabase(){
    return new mysqli($this->servername, $this->username, $this->password, $this->dbname);
  }



public function execute($sql)
  {
    $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    if ($conn->connect_error) {
      throw new Exception($conn->connect_error);
    } else {

      $result = $conn->query($sql);
      if (!$result) {
        throw new Exception($conn->error);
        exit;
      } else {
        return  $conn->insert_id;
        // var_dump($results);exit;
      }
    }
  }

  public function data($sql, $params = array())
  {
      $conn = $this->ConnectionDatabase();
  
      // Check if there are parameters
      if (!empty($params)) {
          $stmt = $conn->prepare($sql);
  
          if ($stmt === false) {
              throw new Exception($conn->error);
          }
  
          $types = str_repeat('s', count($params));
          $stmt->bind_param($types, ...$params);
  
          $result = $stmt->execute();
  
          if ($result === false) {
              throw new Exception($stmt->error);
          }
  
          $resultSet = $stmt->get_result();
          $results = $resultSet->fetch_all(MYSQLI_ASSOC);
  
          $stmt->close();
      } else {
          // If there are no parameters, execute the query directly
          $result = $conn->query($sql);
  
          if ($result === false) {
              throw new Exception($conn->error);
          }
  
          $results = $result->fetch_all(MYSQLI_ASSOC);
      }
  
      $conn->close();
  
      return $results;
  }
  
}

?>