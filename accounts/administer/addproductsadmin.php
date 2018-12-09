<?php

include ('connection.php');

session_start();

if(isset($_SESSION['user']) == false )
{
 header("Location: loginadmin.php");
}


if(isset($_POST['submit']))
{
try 
  {
    
   $image= $_FILES['prod_image'];
   $prod_name= $_POST['prodname'];
   $prod_description= $_POST['proddescription'];
   $prod_price= $_POST['prodprice'];
   $prod_category= $_POST['prodcategory'];
   $prod_quantity= $_POST['prodquantity'];
   $prod_manufacturer= $_POST['prodmanufacturer'];
    
    
   $tempname=$_FILES["prod_image"]["tmp_name"];
   $orignalname=$_FILES["prod_image"]["name"];
   $size=($_FILES["prod_image"]["size"]/ 5242880) . "MB<br>";
   $type=$_FILES["prod_image"]["type"];
   $image=$_FILES["prod_image"]["name"];
   move_uploaded_file($tempname,"product_images/".$image);  
    
    
    $sql = "INSERT INTO products(image, prod_name, prod_description, prod_price, prod_category, prod_quantity, prod_manufacturer) values ( '$image', '$prod_name', '$prod_description', '$prod_price', '$prod_category', '$prod_quantity', '$prod_manufacturer')";
    if ($conn->exec($sql))
       {
          echo "<script language='javasxript' type='text/javascript'>
          alert('Product Added');
          </script>";
       }
    else
       {
          echo "<script language='javasxript' type='text/javascript'>
          alert('Failed to Add');
          </script>";
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
               <li><a>Edit/Update</a></li>
               <li><a>View</a></li>
               <li><a id="hmenu" href="addproductsadmin.php">Add Products</a></li>
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
                
                <a href="#">Sign Out</a>
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
           <h2>ADD PRODUCTS</h2>
            <h3 id="addback"><a href="productsadmin.php">Back</a></h3>
        </div>
        
        <div id="addform">
            
            <div>
                <p>Upload Image:</p>
                <input type="file" name="prod_image" required>
            </div>
            
            <div>
                <p>Name:</p>
                <input type="text" name="prodname" required>
            </div>
            
            <div>
                <p>Description:</p>
                <textarea id="description" name="proddescription" placeholder="type some info here..." required></textarea>
            </div>

            <div>
                <p>Price:</p>
                <input type="text" name="prodprice" required>
            </div>
            
            <div>
                <p>Category:</p>
                <select id="selectcategory" name="prodcategory">
			       <option selected="selected">--</option>
                   <option >Wine</option>
				   <option >Red Wine</option>
				   <option >Sake</option>
			       <option >White Wine</option>
                   <option >Dessert</option>
                   <option >Sherry</option>
				</select>
            </div>
            
            <div>
                <p>Quantity:</p>
                <input type="text" name="prodquantity" required>
            </div>
            <div>
                <p>Manufacturer:</p>
                <input type="text" name="prodmanufacturer" required>
            </div>
            
            <input id="asubmit" type="submit" value="Add" name="submit">

        </div>
		
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
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
    </form>
</body>
</html>