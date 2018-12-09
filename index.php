<html>
<head>

<link href="Index.css" type="text/css" rel="stylesheet">

</head>

<body>

  <!--------------------------------------------------------------------------START WRAPPER-------------------------------------------------------------------------->
  <div id="wrapper">
    <!--------------------------------START HEADER CONTAINER--------------------------------->
    <header id="header-container">
	    <!-----START Top Nav Bar----->
	    <ul id="nav-bar">
	      <li><a id="homecolor" href="index.php">Home</a></li>
	      <li><a id="nocolor" href="#">Specials</a></li>
	      <li><a id="nocolor" href="#">New Products</a></li>
	      <li><a id="nocolor" href="accounts/login.php">Your Account</a></li>
          <li><a id="nocolor" href="#">Contact</a></li>
          <li><a id="nocolor" href="#">Sitemap</a></li>
	    </ul>
        <!-----END Top Nav Bar----->
		
		<!------START My Logo----->
        <a id="logo" href="index.php"><img src="pics/logo.jpg"></a>	
        <!-----END My Logo----->
		
		<!-----START Search----->
        <div id="search">
	      <input id="search-box" type="text" name="productname">
	      <input id="search-button" type="submit" value="Search" name="search">
	    </div>
		<!-----END Search----->
	 
	    <!-----START Your Account----->
	    <a id="youraccount" href="accounts/login.php">Your Account</a>
	    <!-----END Your Account----->
		
		<!-----START Menu Bar----->
	    <div id="product-nav-bar">
	     <ul id="product-menu">
	       <li><a href="#">Wine</a></li>
	       <li><a href="#">Red Wine</a></li>
	       <li><a href="#">Sake</a></li>
	       <li><a href="#">White Wine</a></li>
	       <li><a href="#">Dessert</a></li>
	       <li><a href="#">Sherry</a></li>
	     </ul>
	    </div>
	    <!-----END Menu Bar----->
        <div id="slider">
		   <img src="pics/banner_1.jpg">
		</div>	 
		
        <div id="banner">
		  <div id="pic1">
		    <a id="button1" href="#"><img src="pics/slide0.jpg"></a>
		  </div>
		  
		  <div id="pic2">
		    <a id="button2" href="#"><img src="pics/slide1.jpg"></a>		  
		  </div>
		  
        <div id="pic3">
		    <a id="button3" href="#"><img src="pics/slide2.jpg"></a>		  
		  </div>
		</div>		
		
	</header>
	<!--------------------------------END HEADER CONTAINER--------------------------------->
	
	<!--------------------------------START BODY CONTAINER--------------------------------->
	<div id="content-container">
	
	    <!-----START Feature Products----->
	    <div id="fp">
		   <p id="fptext">Featured Products</p>
		</div>  
		<!-----END Feature Products----->
		
		<!-----START Products Display----->
		<div id="products">
            
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
       <div id="hbox">     
  		      <div id="product-container">
                 <a id="picture-container" href="view/wine5.php"><img src="accounts/administer/product_images/<?php echo $row['image']?>" height="293" width="210"></a>
				 <div id="product-info">
                    <h5><?php echo $row['prod_name']; ?></h5>
					<p id="comment"><?php echo $row['prod_description']; ?></p>
					<p id="price">Php <?php echo $row['prod_price']; ?></p>	
					<a id="clickbutton" href="#">Add to cart</a>
					<a id="viewbutton" href="view/wine5.php">View</a>					
				 </div>
		      </div>
       </div>
<?php
    }
?>            
            
		</div>
		<!-----END Products Display----->
	</div>
	<!--------------------------------END BODY CONTAINER--------------------------------->
	
	<!--------------------------------START FOOTER CONTAINER--------------------------------->
	<footer id="footer-container">
	   <div id="footbox">
	      <h4 id="foothead">Information</h4>
		  <ul id="footlist">
		     <li><a href="#">Our stores</a></li>
			 <li><a href="#">Contact us</a></li>
			 <li><a href="links/delivery.php">Delivery</a></li>
			 <li><a href="links/legalnotice.php">Legal Notice</a></li>
			 <li><a href="links/aboutus.php">About us</a></li>
			 <li><a href="links/securepayment.php">Secure payment</a></li>
		  </ul>
	   </div>
	   
	   <div id="footbox">
	      <h4 id="foothead">Our offers</h4>
		  <ul id="footlist">
		     <li><a href="#">Specials</a></li>
			 <li><a href="#">New products</a></li>
			 <li><a href="#">Top sellers</a></li>
			 <li><a href="#">Manufacturers</a></li>
			 <li><a href="#">Suppliers</a></li>
			 <li><a href="#">Sitemap</a></li>
		  </ul>
	   </div>
	   
	   <div id="footbox">
	      <h4 id="foothead">My account</h4>
		  <ul id="footlist">
		     <li><a href="#">My orders</a></li>
			 <li><a href="#">My credit slips</a></li>
			 <li><a href="#">My addresses</a></li>
			 <li><a href="#">My personal info</a></li>
			 <li><a href="#">My vouchers</a></li>
			 <li><a href="#">My favorite products</a></li>
		  </ul>
	   </div>
	   
	   <div id="footbox">
	      <h4 id="foothead">Follow us</h4>
		  <img id="ftr" src="pics/sprite_pict_social_block.png" height="110px">
		  <ul id="ftrfootlist" >
		     <li><a href="facebook.com">Facebook</a></li>
			 <li><a href="twitter.com">Twitter</a></li>
			 <li><a href="twitter.com">RSS</a></li>

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