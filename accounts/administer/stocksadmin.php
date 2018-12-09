<?php

session_start();
include ('connection.php');


if(isset($_SESSION['user']) == false )
{
 header("Location: loginadmin.php");
}

?>



<html>
<head>

<link href="basic.css" type="text/css" rel="stylesheet">

</head>

<body>

  <!--------------------------------------------------------------------------START WRAPPER-------------------------------------------------------------------------->
    <header id="header-container">
        
      <div id="adminprofile">
          <img id="spic" src="pics/hehe.jpg"><h3>Ryan Esper</h3>

          <div id="adminprofileform">
             <div id="adminprofileformt">
                <center>
                    <img id="lpic" src="pics/new.jpg" height="120"  width="120">
                
                    <h4>Ryan E. Esper</h4>
                    <p>BSIT 4th Year</p>
                    <p>(NORMI)</p>
                </center>
             </div>
             <div id="adminprofileformb">
                <a href="profileadmin.php">Profile</a>
                
                <a href="logout.php?logout">Sign Out</a>
             </div>
         </div>
       </div>
		
	</header>
  <div id="wrapper">
    <!--------------------------------START HEADER CONTAINER--------------------------------->

	<!--------------------------------END HEADER CONTAINER--------------------------------->

	<!--------------------------------START BODY CONTAINER--------------------------------->
	<div id="content-container">
        <div id="prodbar">
            <h2>STOCKS</h2>
        </div>


        
    <ul id="prodstocks0">
        <li id="attrib1">Product ID</li>
        <li id="attrib2">Image</li>
        <li id="attrib3">Name</li>
        <li id="attrib4">Price</li>
        <li id="attrib5">Category</li>
        <li id="attrib6">Quantity</li>
        <li id="attrib7">Manufacturer</li>
        <li id="attrib8">Delete</li>
    </ul>        
  
        
        
<?php
    
include ('connection.php');
        
$sql = "SELECT * FROM products";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchALL(PDO::FETCH_ASSOC);
?>

<?php
    foreach($result as $row)
    {
?>       
    <ul id="prodstocks">
        <li id="attrib11"><?php echo $row['prod_id']; ?></li>
        <li id="attrib21"><img src="product_images/<?php echo $row['image']?>" height="100"  width="90"></li>
        <li id="attrib31"><?php echo $row['prod_name']; ?></li>
        <li id="attrib41">Php<?php echo $row['prod_price']; ?></li>
        <li id="attrib51"><?php echo $row['prod_category']; ?></li>
        <li id="attrib61"><?php echo $row['prod_quantity']; ?></li>
        <li id="attrib71"><?php echo $row['prod_manufacturer']; ?></li>
        <li id="attrib81"><a href="functions/delete1.php?id=<?php echo "".$row['prod_id'].""; ?>" onclick="return confirm('Are You Sure')" >Delete</a></li>
    </ul>
<?php
    }
?>          

        
        
        
        
        
        
	</div>
	<!--------------------------------END BODY CONTAINER--------------------------------->
	
	<!--------------------------------START FOOTER CONTAINER--------------------------------->
	<footer id="footer-container">

	</footer>
	<!--------------------------------END FOOTER CONTAINER--------------------------------->
	
	
  </div>
  <!--------------------------------------------------------------------------END WRAPPER-------------------------------------------------------------------------->
    <div id="side">
        
      <img src="pics/logo.jpg">
        
        
       <ul>
           <li><a href="homeadmin.php">Home</a></li>
           <li><a href="productsadmin.php">Products</a></li>
           <li><a href="ordersadmin.php">Orders</a></li>
           <li><a id="hover" href="stocksadmin.php">Stocks</a></li>
           <li><a href="customer.php">Customers</a></li>
       </ul>    
    </div>
</body>
</html>