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
$productId = "AAA11";
$totalSale = "23";
$saleQuantity = "2";
$id="1";
*/
$productId = $_POST['productIdNumber1'];
$totalSale = $_POST['totalPrice1'];
$saleQuantity = $_POST['saleQuatityValue1'];
$id = $_POST['id1'];
if(empty($productId)||empty($totalSale)||empty($saleQuantity)){
?>
<script type="text/javascript">
alert("You have empty field!!");
</script>
<?php
}else{

    $sql = "INSERT INTO saleT (productId, totalSale, saleQuantity,id) VALUES ('$productId', '$totalSale','$saleQuantity','$id')";
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