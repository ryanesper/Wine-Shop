<?php


session_start();


if(isset($_SESSION['user']) == false )
{
 header("Location: loginadmin.php");
}

include ('connection.php');

if(isset($_POST['save']))
{
   try
   { 
       
       
      if (isset($_POST['uname']) && !empty($_POST['uname']))
      {
      
         $uname = $_POST['uname'];  
         $sql = "UPDATE products SET prod_name='$uname'   
         WHERE prod_id='$_GET[id]'";        
         $stmt = $conn->prepare($sql);
         $stmt->execute();  
      } 
       
      if (isset($_POST['udescription']) && !empty($_POST['udescription']))
      {
      
         $udescription = $_POST['udescription'];  
         $sql = "UPDATE products SET prod_description='$udescription'   
         WHERE prod_id='$_GET[id]'";    
         $stmt = $conn->prepare($sql);
         $stmt->execute();   
      }
       
      if (isset($_POST['uprice']) && !empty($_POST['uprice']))
      {
      
         $uprice = $_POST['uprice'];  
         $sql = "UPDATE products SET prod_price='$uprice'   
         WHERE prod_id='$_GET[id]'";    
         $stmt = $conn->prepare($sql);
         $stmt->execute();   
      }
       
      if (isset($_POST['ucategory']) && !empty($_POST['ucategory']))
      {
      
         $ucategory = $_POST['ucategory'];  
         $sql = "UPDATE products SET prod_category='$ucategory'   
         WHERE prod_id='$_GET[id]'";    
         $stmt = $conn->prepare($sql);
         $stmt->execute();   
      }
       
      if (isset($_POST['uquantity']) && !empty($_POST['uquantity']))
      {
      
         $uquantity = $_POST['uquantity'];  
         $sql = "UPDATE products SET prod_quantity='$uquantity'   
         WHERE prod_id='$_GET[id]'";    
         $stmt = $conn->prepare($sql);
         $stmt->execute();   
      }
       
      if (isset($_POST['umanufacturer']) && !empty($_POST['umanufacturer']))
      {
      
         $umanufacturer = $_POST['umanufacturer'];  
         $sql = "UPDATE products SET prod_manufacturer='$umanufacturer'   
         WHERE prod_id='$_GET[id]'";    
         $stmt = $conn->prepare($sql);
         $stmt->execute();   
      }
   
      if (isset($_FILES['uimage']) && !empty($_FILES['uimage']) )
      {
          
         $tempname=$_FILES["uimage"]["tmp_name"];
         $orignalname=$_FILES["uimage"]["name"];
         $size=($_FILES["uimage"]["size"]/ 5242880) . "MB<br>";
         $type=$_FILES["uimage"]["type"];
         $image=$_FILES["uimage"]["name"];
         move_uploaded_file($tempname,"product_images/".$image);             
          
         $sql = "UPDATE products SET image='$image'   
         WHERE prod_id='$_GET[id]'"; 
          
         $stmt = $conn->prepare($sql);
         //$stmt->bindParam(':image', $_FILES['uimage'], PDO::PARAM_STR);
         $stmt->execute(); 
         //$row=$stmt->fetch(PDO::FETCH_ASSOC);

    
      }
       
       
      if ($stmt->rowCount($sql))
         {
            echo "<script language='javasxript' type='text/javascript'>alert('Product Updated');</script>";
         }
         else
         {
            echo "<script language='javasxript' type='text/javascript'>alert('Failed to Update');</script>";
         }
       
   }
   catch(PDOException $e)
   {
      echo $sql . "<br>" . $e->getMessage();
   }


    
  
$conn = null;
}
?>




<html>
<head>

<link href="basic.css" type="text/css" rel="stylesheet">

</head>

<body>
<form method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
  <!--------------------------------------------------------------------------START WRAPPER-------------------------------------------------------------------------->
    <header id="header-container">

           <ul id="optionmenu">
               <li><a id="hmenu" href="updateproductadmin.php?id=<?php echo "".$row['prod_id'].""; ?>">Edit/Update</a></li>
               <li><a href="viewproductadmin.php">View</a></li>
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
            <h2>Edit/Update</h2>
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
                <input id="uimage" type="file" name="uimage" style="z-index: 2">
               <a><img src="product_images/<?php echo $row['image']?>" height="500"  width="350" style="opacity: 0.5"></a>   
            </div>
            
            
            <div id="vinformation-container">
                <div id="vname">
                   <input type="text" name="uname" placeholder="<?php echo $row['prod_name']; ?>">
                </div>
                <div id="udescription">
                    <h5>Details</h5>
                    <textarea type="text" name="udescription" placeholder="<?php echo $row['prod_description']; ?>"></textarea>
                </div>
                <div id="vquantity">
                   <input type="text" name="uquantity" placeholder="Availability: <?php echo $row['prod_quantity']; ?>">
                </div>
                <div id="uumanufacturer">
                   <input id="umanufacturer" type="text" name="umanufacturer" placeholder="Manufactured by: <?php echo $row['prod_manufacturer']; ?>">
                </div>
                <div id="vprice">
                   <input type="text" name="uprice" placeholder="Php<?php echo $row['prod_price']; ?>">
                </div>

                
                
                <div id="ubtn-container">
                  <input type="submit" id="uclickbutton1" value="Save" name="save">
              
                  <a id="uviewbutton" href="viewproductadmin.php?id=<?php echo "".$row['prod_id'].""; ?>" >Cancel</a>
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
    </form>
</body>
</html>