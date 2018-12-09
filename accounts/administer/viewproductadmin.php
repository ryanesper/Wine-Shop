<html>
<head>

<link href="basic.css" type="text/css" rel="stylesheet">

</head>

<body>

  <!--------------------------------------------------------------------------START WRAPPER-------------------------------------------------------------------------->
    <header id="header-container">

           <ul id="optionmenu">
               <li><a href="updateproductadmin.php?id=<?php echo "".$row['prod_id'].""; ?>">Edit/Update</a></li>
               <li><a id="hmenu" href="viewproductadmin.php">View</a></li>
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
  <div id="uwrapper">
    <!--------------------------------START HEADER CONTAINER--------------------------------->

	<!--------------------------------END HEADER CONTAINER--------------------------------->

	<!--------------------------------START BODY CONTAINER--------------------------------->
	<div id="vcontent-container">
        <div id="vprodbar">
            <h2>Full View</h2>
            <h3><a href="productsadmin.php">Back</a></h3>
        </div>
 
        
        
<?php
    
include ('connection.php');
        
$sql = "SELECT * FROM products where prod_id='$_GET[id]'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchALL(PDO::FETCH_ASSOC);
?>
<?php
        foreach($result as $row)
    {
?>
        <div id="vbox101">
            <div id="vpicture-container">
               <a><img src="product_images/<?php echo $row['image']?>" height="500"  width="350"></a>       
            </div>
            
            
            <div id="vinformation-container">
                <div id="vname">
                   <h1><?php echo $row['prod_name']; ?></h1>
                </div>
                <div id="vdescription">
                    <h5>Details</h5>
                    <p id="vcomment"><?php echo $row['prod_description']; ?></p>
                </div>
                <div id="vquantity">
                   <p>Availability: <?php echo $row['prod_quantity']; ?></p>
                </div>
                <div id="vmanufacturer">
                   <p>Manufactured by: <?php echo $row['prod_manufacturer']; ?></p>
                </div>
                <div id="vprice">
                   <p>Php<?php echo $row['prod_price']; ?></p>
                </div>
                
                <div id="btn-container">
                  <a id="clickbutton1" href="updateproductadmin.php?id=<?php echo "".$row['prod_id'].""; ?>">Edit/Update</a>
                  <a id="viewbutton" href="#" onclick="return confirm('Are You Sure')" >Delete</a>
                </div>
            </div>
        </div>
<?php
    }
?>        
        
	</div>
	<!--------------------------------END BODY CONTAINER--------------------------------->
	
	<!--------------------------------START FOOTER CONTAINER--------------------------------->

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