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
?>

<html>
    <head>
        <title>Your All Products</title>
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
        border-left:2px solid #E4DBBF;
        border-right:2px solid #E4DBBF;
        
    }
	.lastPart{
	    height:100px;
	    background:black;
	    border-left:2px solid black;
		border-right:2px solid black;
	    color:gold;
	    font-size:20px;
	}
    .wholeTable{
            border:1px solid green;
        }
    .outputTable{
         border-collapse: collapse;
        }
    .outputTable tr td{
            border-left:1px solid white;
             width: 172px;
             padding:10px;
             text-align:center;
        }
    .outputTable tr th{
            border-left:1px solid white;
            color:white;
            font-size:25px;
            font-weight:bold;
            background-color:#0000FF;
            width: 172px;
            height:50px;
             padding:10px;
             text-align:center;
        }
    .rowColor{
            background:#87CEFA;
        }
    .rowColor1{
            background:#F5F5F5;
        }
    .rowColorInventory{
            background:#FFD700;
        }
    .mainPageButton1{
         background-color:green;
         width:185px;
         height:65px;
         font-size:30px;
         margin-bottom:10px;
     }
    .searchBox{
        background-color:#FCFFFF;
         width:185px;
         height:65px;
         font-size:30px;
         margin-bottom:10px; 
    }

        </style>
    </head>
  <body class="body">
<div class="firstPart templete clear">
<h1 class="heade">Style & Heaven Corp.</h1>
</div>
<div class="secondPart templete clear">
<br>
<center>
    <form>
<input type="button" class="mainPageButton1" onclick="location.href='readAllBasedOnId.php';" value="New Search" />
<input type="button" class="mainPageButton1" onclick="location.href='readAllProduct.php';" value="All Products" />
<input type="button" class="mainPageButton1" onclick="location.href='#.html';" value="Out Of Stock" />
<input type="button" class="mainPageButton1" onclick="location.href='managerPage.html';" value="Go Back" />
</form>
</center>
</div>
<?php
//create the SQL statement
$sql = "SELECT id, productId,productName,size,price, sum(quantity) as quantity FROM productT group by productId, size";

//query the databae
$rs = mysqli_query($conn,$sql);

$count=1;
?>
<center>
 <table class="outputTable">
     <tr>
         <th>Product ID</th>
         <th>Product Name</th>
         <th>Size</th>
         <th>Price</th>
         <th>Quantity</th>
    </tr>
</table>
</center>
 <?php
while($row = mysqli_fetch_array($rs,MYSQLI_ASSOC)) { 
    // If you want to display the results one by one
echo $row['']; ?>
<center>
    <?php
$quantity=$row['quantity'];
if($quantity<12){
//}else{
if($count%2==0){  
   ?>
<table class="outputTable">
<tr class="rowColor">
<td><?php echo $row['productId']; ?></td>
<td><?php echo $row['productName']; ?></td>  
<td><?php echo $row['size']; ?></td>
<td><?php echo $row['price']; ?></td>
<td><?php echo $row['quantity']; ?></td>

<?php

?>
</tr>
<?php
$count++; 
?>
</table>
<?php
}else{
?>
<table class="outputTable">
<tr class="rowColor1">
<td><?php echo $row['productId']; ?></td>
<td><?php echo $row['productName']; ?></td>  
<td><?php echo $row['size']; ?></td>
<td><?php echo $row['price']; ?></td>
<td><?php echo $row['quantity']; ?></td>
</tr>

<?php
$count++; 
?>
</table>
</div>

<?php

}?>
</center>
<?php

}
}

mysqli_close($conn);
?>
<script type="text/javascript">
</script>
<div class="lastPart templete clear">
<b></b>Styel & Heaven Corp.<br></b>
Narsingdi, Bangladesh
</div>
</body>
</html>