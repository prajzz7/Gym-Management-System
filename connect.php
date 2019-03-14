<?php
$username = $_POST['username'];
$password = $_POST['password'];
$sex = $_POST['Gender'];
$email_id = $_POST['email_id'];
$phone_number = $_POST['phone_number'];
$pincode = $_POST['PINCODE'];
$city = $_POST['city'];
if (!empty($username) || !empty($password) || !empty($sex) || !empty($email_id) ||
!empty($phone_number) || !empty($pincode) || !empty($city)  ) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "gym";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email_id From member Where email_id = ? Limit 1";
     $INSERT = "INSERT Into member (username, password, email_id, phone_number, city, pincode, sex) values(?, ?, ?, ?, ?, ?,?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email_id);
     $stmt->execute();
     $stmt->bind_result($email_id);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssisis", $username, $password, $email_id, $phone_number, $city, $pincode, $sex);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>