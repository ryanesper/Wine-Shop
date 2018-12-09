<?php

include ('connection.php');
include('image_class.php');

$obj_image=new Image();

if(isset($_POST['submit']))
{
       $obj_image->prod_id=str_replace("'","'", $_POST['prodid']);
       $obj_image->image=str_replace("'","'", $_POST['txt_image']);
       $obj_image->prod_name=str_replace("'","'", $_POST['prodname']);
       $obj_image->prod_price=str_replace("'","'", $_POST['prodprice']);
       $obj_image->prod_category=str_replace("'","'", $_POST['prodcategory']);
       $obj_image->prod_quantity=str_replace("'","'", $_POST['prodquantity']);
    
       $obj_image->insert_into_image();
        
        $data_image=$obj_image->get_all_image_list();
        $row=mysql_num_rows($data_image);
}
?>









<html>
<head>

<link href="basic.css" type="text/css" rel="stylesheet">

</head>

<body>
<form method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
  <!--------------------------------------------------------------------------START WRAPPER-------------------------------------------------------------------------->
  <div id="wrapper">
    <!--------------------------------START HEADER CONTAINER--------------------------------->
    <header id="header-container">
	    <!-----START Top Nav Bar----->
	    <ul id="nav-bar">
	      <li><a id="nocolor" href="adminhome.php">Home</a></li>
	      <li><a id="homecolor" href="adminproducts.php">Products</a></li>
	      <li><a id="nocolor" href="adminorders.php">Orders</a></li>
	      <li><a id="nocolor" href="adminstocks.php">Stocks</a></li>
	    </ul>
        <!-----END Top Nav Bar----->
		
		<!------START My Logo----->
        <a id="logo" href="#"><img src="pics/logo.jpg"></a>	
        <!-----END My Logo----->
		
		<!-----START Search----->
        <div id="search">
	      <input id="search-box" type="text" name="productname">
	      <input id="search-button" type="submit" value="Search" name="search">
	    </div>
		<!-----END Search----->
	 
	    <!-----START Your Account----->
	    <h4 id="youraccount">Administrator</h4>
	    <!-----END Your Account----->
		
		<!-----START Menu Bar----->

	    <!-----END Menu Bar----->
	
		
	</header>
	<!--------------------------------END HEADER CONTAINER--------------------------------->
	
	<!--------------------------------START BODY CONTAINER--------------------------------->
	<div id="content-container">
       <div id="products1">
		  <h2>PRODUCTS</h2>          
	   </div>
       <div id="products2">
		  <div>
             Product Id:
              <br/>
             <input type="text" name="prodid">
          </div>
           <div>
             Product Name:
               <br/>
             <input type="text" name="prodname">
          </div>
           <div>
             Image:
               <br/>
             <input type="file" name="txt_image">
          </div>
	   </div>	
       <div id="products3">
		  <div>
             Price:
              <br/>
             <input type="text" name="prodprice">
          </div>
           <div>
             Category:
               <br/>
             <input type="text" name="prodcategory">
          </div>
           <div>
             Quantity:
               <br/>
             <input type="text" name="prodquantity">
          </div>
          <input id="ssubmit" type="submit" value="add" name="submit">
	   </div>		
	</div>
	<!--------------------------------END BODY CONTAINER--------------------------------->
	
	<!--------------------------------START FOOTER CONTAINER--------------------------------->
	<footer id="footer-container">
	   <div id="footbox">
	      <h4 id="foothead">Information</h4>
		  <ul id="footlist">
		     <li>Our stores</li>
			 <li>Contact us</li>
			 <li>Delivery</li>
			 <li>Legal Notice</li>
			 <li>About us</li>
			 <li>Secure payment</li>
		  </ul>
	   </div>
	   
	   <div id="footbox">
	      <h4 id="foothead">Our offers</h4>
		  <ul id="footlist">
		     <li>Specials</li>
			 <li>New products</li>
			 <li>Top sellers</li>
			 <li>Manufacturers</li>
			 <li>Suppliers</li>
			 <li>Sitemap</li>
		  </ul>
	   </div>
	   
	   <div id="footbox">
	      <h4 id="foothead">My account</h4>
		  <ul id="footlist">
		     <li>My orders</li>
			 <li>My credit slips</li>
			 <li>My addresses</li>
			 <li>My personal info</li>
			 <li>My vouchers</li>
			 <li>My favorite products</li>
		  </ul>
	   </div>
	   
	   <div id="footbox">
	      <h4 id="foothead">Follow us</h4>
		  <img id="ftr" src="pics/sprite_pict_social_block.png" height="110px">
		  <ul id="ftrfootlist" >
		     <li>Facebook</li>
			 <li>Twitter</li>
			 <li>RSS</li>

		  </ul>		  
	   </div>
	   
	   <div id="footbox">
	      <h4 id="foothead">Contact us</h4>
		  <ul id="footlist">
		     <li>Wine</li>
			 <li>8901 Marmora Road, </li>
			 <li>Glasgow, D04 89GR</li>
		  </ul>		  
		  <h1 id="adminnumber">1(234) 567-8901</h1>
	   </div>
	   
	   <div id="footercredit">
	     <p class="row-footer"> 2016 Powered by NaYrZ. All rights reserved</p>
	   </div>
	</footer>
	<!--------------------------------END FOOTER CONTAINER--------------------------------->
	
	
  </div>
  <!--------------------------------------------------------------------------END WRAPPER-------------------------------------------------------------------------->
</body>
</html>
