<html>
    <head>
    	  <script src="querymy.js"></script>
	<title>
		Create user page
	</title>
	<script src="querymy.js"></script>
	<style>
	.templete{width:960px; background:white; color:black; margin:0 auto;}
    .clear{overflow:hidden;}
   
	.firstPart{background-color: black;
		color:#F5B041;
		font-size:40px;
		text-align:center;
		border-bottom:6px solid #F5B041;
		border-left:2px solid black;
		border-right:2px solid black;
		}
	.secondPart{
        background-color:#E4DBBF;
        border-bottom:6px solid #F5B041;
        border-left:2px solid #F5B041;
        border-right:2px solid #F5B041;
    }
	.lastPart{
	    height:100px;
	    background:black;
	    border-left:2px solid black;
		border-right:2px solid black;
	    color:gold;
	    font-size:20px;
	}
	.formDesign{
		background-color:#F5B041;
		
		border:solid black 3px;
		padding:20px;
		text-align:left;
		font-size:25px;
		width:800px;
	}

	
	.subHead{
		background-color:black;
		color:white;
		font-size:30px;
		padding:10px;
		border:solid #F5B041 4px;
	}	
	.middleLoginPart{
		margin-left:80px;
		border:2px solid white;
		width:800px;
		height:400px;
		background-color:#D4A017;
	}
	.formDe{
		padding-left:200px;
	}
	.backB{
		background-color:blue;
		width:150px;
		height:60px;
		color:white;
		font-size:25px;
		margin-left:10px;
		border:2px solid white;
	}
	.saleB{
		background-color:blue;
		width:150px;
		height:60px;
		color:white;
		font-size:25px;
		margin-left:5px;
		border:2px solid white;
	}
	</style>
	</head>

	<body>
	    
	    
	    
	    
	    
	    
	    <?php
//First step: connect to the database
//set the variables ...
$servername = "localhost";
$username = "id3624451_cloud";
$password = "cloud7416";
$dbname = "id3624451_cloud";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//create the SQL statement
$sql = "SELECT id, productId,productName,size,price, sum(quantity) as quantity FROM productT group by productId, size";

//query the databae

?>
<div class="firstPart templete clear">
		<h1 class="header">Style & Heaven Corp.</h1>
</div>
<div class="secondPart templete clear">

	<br><br>
	<div class="middleLoginPart">
		<br><br><br>
		<center>
<b class="subHead"> Sale Information</b><br><br>
</center>
   	<hr>
 <form class="formDe">
    
<?php 
$rs = mysqli_query($conn,$sql);
?>
&nbsp;&nbsp;&nbsp;Product ID:<select id="productId" name="porductId" style="font-size:18pt;height:30px;width:280px;">
<?php
while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)) { 
    // If you want to display the results one by one
echo $row['']; 
?>
<option value='<?php echo $row['productId'].",".$row['productName'].",".$row['size'].",".$row['price'].",".$row['quantity'].",".$row['id']; ?>'><?php echo $row['productId']; ?></option>
<?php
}?>
</select>


<?php 
mysqli_close($conn);
?>
<script type="text/javascript">
var saleProductId,saleProductName,saleSize,price,saleQuantity,id;
function getProductDetail(){
    var productDetail=document.getElementById("productId").value;
    saleProductId=productDetail.split(",")[0];
    document.getElementById('proId').value = saleProductId;
    saleProductName=productDetail.split(",")[1];
    document.getElementById('name').value = saleProductName;
    saleSize=productDetail.split(",")[2];
    document.getElementById('size').value = saleSize;
    price=productDetail.split(",")[3];
    document.getElementById('price').value = price;
    saleQuantity=productDetail.split(",")[4];
   id=productDetail.split(",")[5];
  
}
</script>

       <br><br>
      &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID: <input type="text" id="proId" name="proId" style="font-size:18pt;height:30px;width:280px;" readonly><br><br> 
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name: <input type="text" id="name" name="name" style="font-size:18pt;height:30px;width:140px;" readonly>  
       Size: <input type="text" id="size" name="size" style="font-size:18pt;height:30px;width:100px;" readonly><br><br>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Price: <input type="text" id="price" name="price" style="font-size:18pt;height:30px;width:100px;" readonly>
       &nbsp;&nbsp;&nbsp;&nbsp;Quantity: <input type="text" id="saleQuantity" name="saleQuantity" style="font-size:18pt;height:30px;width:100px;" ><br><br>
       <input id ="submit" class="backB" type="button" onclick="location.href='managerPage.html';" value="Go Back">
        <input id ="submit" class="saleB" type="button" onclick="getProductDetail();" value="Get Details">
        <input id ="submit" class="saleB" type="button" onclick="saleTheItem();" value="Sale Product">
    </form>
<script type="text/javascript">
function saleTheItem(){
    var productId2=document.getElementById("proId").value;
    var saleQuantity2=document.getElementById("saleQuantity").value;
    var price2=document.getElementById("price").value;
     var dataString= 'productId1='+productId2+'&saleQuantity1='+saleQuantity2+'&price1='+price2+'&id1='+id;
if (productId2 == '' || saleQuantity2 == '' || price2 == '') {
alert("Please Fill All Fields");

} else {
  // AJAX code to submit form.
$.ajax({
type: "POST",
url: "send_sale_info.php",
data: dataString,
cache: false,
success: function(html) {
alert("The product has been sold!!!");

 }
});
document.form.reset();
}
return false;
}
</script>

 </div>
<br><br><br>

</div>
<div class="lastPart templete clear">
    <b>Styel & Heaven Corp.<br></b>
    Narsingdi, Bangladesh
</div>

</body>
</html>