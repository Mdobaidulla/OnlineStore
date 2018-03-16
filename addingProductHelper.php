<html>
<?php

//set up connection credentials

$servername = "localhost";
$username = "id3624451_cloud";
$password = "cloud7416";
$dbname = "id3624451_cloud";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//gather the data from the form

$productId = $_POST["productId1"];
$productName = $_POST["productName1"];
$size = $_POST["size1"];
$price = $_POST["price1"];
$quantity=$_POST["quantity1"];


/*
$productId = "PPP66";
$productName = "Shirt";
$size = "M";
$price = "40";
$quantity="5";
*/
if(empty($productId)||empty($productName)||empty($size)||empty($price)||empty($quantity)){
?>
<script type="text/javascript">
if (window.confirm("You have empty field!! Please enter all the value!!")) { 
  window.open("index.html");
}
</script>
<?php
}else{
  
    $sql = "INSERT INTO productT (productId, productName, size, price, quantity) VALUES ('$productId', '$productName', '$size','$price','$quantity')";
    if (mysqli_query($conn, $sql)) {
    echo "Success!!";
    ?>
    <body>
   </br></br> <a href="addProduct.html">Add Another Product<a>
    </body>
    <?php
     header("Location:readAllProduct.php");
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  } 


?>
</html>