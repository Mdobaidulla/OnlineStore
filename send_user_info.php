<html>
<body>
<?php
$servername = "localhost";
$username = "id3624451_cloud";
$password = "cloud7416";
$dbname = "id3624451_cloud";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Fetching Values From URL
/*
$firstName = "Md";
$lastName = "Obaidulla";
$email = "mitulsunny8@gmail.com";
$username = "mitulsunny";
$password = "mitul7416";
$position = "Manager";
*/
$firstName = $_POST['firstName1'];
$lastName = $_POST['lastName1'];
$email = $_POST['email1'];
$username = $_POST['username1'];
$password = $_POST['password1'];
$position = $_POST['position1'];


if(empty($firstName)||empty($lastName)||empty($email)||empty($username)||empty($username)||empty($password)||empty($position)){
?>
<script type="text/javascript">
alert("You have empty field!!");
</script>
<?php
}else{
    $sql = "INSERT INTO userT (firstName, lastName, email, username, password, position) VALUES ('$firstName', '$lastName','$email','$username','$password','$position')";
    if (mysqli_query($conn, $sql)) {
    echo "success!!";
    ?>
    <body>
   </br></br> <a href="index.html">Go To Main Page<a>
    </body>
    <?php
     header("Location:readAllProduct.php");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  } 
?>
</html>