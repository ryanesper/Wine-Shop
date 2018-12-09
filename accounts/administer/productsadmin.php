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

           <ul id="optionmenu">
               <li><a>Edit/Update</a></li>
               <li><a>View</a></li>
               <li><a href="addproductsadmin.php">Add Products</a></li>
           </ul>

        
        
        
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
        <div id="box101">
           <div id="product-container">
               <a id="picture-container"><img src="product_images/<?php echo $row['image']?>" height="293"  width="210"></a>
               <div id="product-info">
                  <h5><?php echo $row['prod_name']; ?></h5>
                  <p id="comment"><?php echo $row['prod_description']; ?></p>
                  <p id="price">Php<?php echo $row['prod_price']; ?></p>
                  <a id="clickbutton" href="viewproductadmin.php?id=<?php echo "".$row['prod_id'].""; ?>">View</a>
                  <a id="clickbutton1" href="updateproductadmin.php?id=<?php echo "".$row['prod_id'].""; ?>">Edit/Update</a>
                  <a id="viewbutton" href="functions/delete.php?id=<?php echo "".$row['prod_id'].""; ?>" onclick="return confirm('Are You Sure')" >Delete</a>
               </div>
               
           </div>
        </div>
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
           <li><a id="hover" href="productsadmin.php">Products</a></li>
           <li><a href="ordersadmin.php">Orders</a></li>
           <li><a href="stocksadmin.php">Stocks</a></li>
           <li><a href="customer.php">Customers</a></li>
       </ul>    
    </div>
</body>
</html>