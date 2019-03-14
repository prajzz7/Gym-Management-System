<?php 

$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) || !empty($password) ){
	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "gym";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error())
    {
    	 die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } 	

    else
    {
    	 $query = "SELECT * FROM member WHERE username='$username' AND password='$password'";
    	 $result = $conn->query($query);
    	 if($result->num_rows > 0){
    	 	echo "You have succesfully logged in\n";
    	 	echo "ENJOY YOUR TIME IN THE GYM";
    	 } else {
    	 	echo "You have entered wrong USERNAME or PASSWORD";
    	 }

  //   	$SELECT = "SELECT username AND password FROM member WHERE username='$username' and password='$password';";
		// $stmt = $conn->prepare($SELECT);
		// $stmt->execute();
		// $rnum = $stmt->num_rows;
		// if($rnum==0)
		//  {  
		//  	print($stmt);
  //       	echo "You have entered wrong USERNAME or PASSWORD";
		 	
		// }
  //       else if($rnum>=1)
  //       {   
  //       	$stmt -> close();
		//  	echo "You have succesfully logged in    ";
		//  	echo "ENJOY YOUR TIME IN THE GYM";
           
		// 

		
     $conn->close();

    }
}




// $row =  mysql_fetch_array($sql);
// if($row['username'] == $username && $row['password'] == $password){
// 	echo "LOGIN SUCCESSFULL!!!";
// 	echo "WELCOME".$row['username'];
// 	echo "ENJOY YOUR TIME IN THE GYM";
// }
// else{
// 	echo "failed to login!";
// }

 ?>

