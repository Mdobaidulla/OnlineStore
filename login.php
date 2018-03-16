<?php
//if(isset($_POST['username']) && isset($_POST['password'])){
$username1=$_POST['username'];
$password1=$_POST['password'];
$position1=$_POST['position'];
//$position=$_POST['position'];
	//info of the webpage that we are going to connect
	$servername = "localhost";
	$username = "id3624451_cloud";
	$password = "cloud7416";
	$dbname = "id3624451_cloud";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
 	 die("Connection failed: ".mysqli_connect_error());
	}
	$data=mysqli_query($conn, "SELECT * from userT where username='{$username1}' AND password='{$password1}' AND position='{$position1}'");
	$row_cnt = mysqli_num_rows($data);
	if($row_cnt == 1){
	   $row = mysqli_fetch_array($data);
		$userId = $row['userId'];
	  // $ession_start();
		//$_SESSION['user_id'] = $userId;
		echo "success";
	}else{
		echo "failed";
	}

//}

?>