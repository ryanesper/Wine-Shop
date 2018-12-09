<?php

 include "connection.php";
 
error_reporting(0);

if(isset($_POST['login']))
{
 if(isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password']))
  try{
     $sql="SELECT * FROM customerusers WHERE username = :username AND password = :password";
     
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
      $stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
      $stmt->execute();
      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      if ($row['username'] == $_POST['username'] && $row['password'] == $_POST['password'])
        {

          //Start your session
          session_start();
          //Store the name in the session
          $_SESSION['userlogin'] = $row['username'];
          
          echo "<script type='text/javascript'>alert('Welcome Admin')</script>";
          header('location: customer/homeuser.php');
        }
      else
        {
          echo "<script type='text/javascript'>alert('Invalid User')</script>";  
        }
     }catch(PDOException $err)
        {
          $err->getMessage();
        }
 
else
   {
     echo "<script type='text/javascript'>alert('Dont leave the Fields Empty')</script>";
   }
}


$email = $_POST['createemailinput'];
$username = $_POST['createusernameinput'];
$password = $_POST['createpasswordinput'];


if(isset($_POST['createaccountbutton']))
{
try {
    $conn = new PDO('mysql:host = '.$hostname.'; dbname='.$dbname, $user,$pw);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO customerusers (email, username, password)
    VALUES ('$email', '$username', '$password')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script type='text/javascript'>alert('Succesfully Registered')</script>"; 
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

<link href="login1.css" type="text/css" rel="stylesheet">

</head>

<body>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
  <!--------------------------------------------------------------------------START WRAPPER-------------------------------------------------------------------------->
  <div id="wrapper">
    <!--------------------------------START HEADER CONTAINER--------------------------------->
    <header id="header-container">
	    <!-----START Top Nav Bar----->
	    <ul id="nav-bar">
	      <li><a id="nocolor" href="../index.php">Home</a></li>
	      <li><a id="nocolor" href="#">Specials</a></li>
	      <li><a id="nocolor" href="#">New Products</a></li>
	      <li><a id="nocolor" href="login.php">Your Account</a></li>
          <li><a id="nocolor" href="#">Contact</a></li>
          <li><a id="nocolor" href="#">Sitemap</a></li>
	    </ul>
        <!-----END Top Nav Bar----->
		
		<!------START My Logo----->
        <a id="logo" href="../index.php"><img src="../pics/logo.jpg"></a>	
        <!-----END My Logo----->
		
		<!-----START Search----->
        <div id="search">
	      <input id="search-box" type="text" name="productname">
	      <input id="search-button" type="submit" value="Search" name="search">
	    </div>
		<!-----END Search----->
	 
	    <!-----START Your Account----->
	    <a id="youraccount" href="login.php">Your Account</a>
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
	
		
	</header>
	<!--------------------------------END HEADER CONTAINER--------------------------------->
	
	<!--------------------------------START BODY CONTAINER--------------------------------->
	<div id="content-container">
	
	   <ul id="loginmenu">
	      <li><a id="loginnocolor" href="../index.php">Home</a></li>
		  <li><a id="logincolor" href="#">Login</a></li>
	   </ul>
	   
	   <h1 id="logintext">
	      Log In
	   </h1>
	   
	   <div id="sign-in-up">
	      <div id="sign-up">
		     <h3 id="createaccount">
			    CREATE YOUR ACCOUNT
			 </h3>			 
			 <p id="formtext">E-mail address</p>			 
			 <input id="createemailinput" type="text" name="createemailinput">		
              <p id="formtext">Username</p>			 
			 <input id="createemailinput" type="text" name="createusernameinput">
              <p id="formtext">Password</p>			 
			 <input id="createemailinput" type="text" name="createpasswordinput">
			 <input id="createemailbutton" type="submit" value="Create your account" name="createaccountbutton">
		  </div>
		  
		  <div id="sign-in">
		     <h3 id="loginaccount">
			    ALREADY REGISTERED?
			 </h3>	  			 
			 <p id="formtext">Username</p>			 
			 <input id="loginemailinput" type="text" name="username">			 
			 <p id="formtext">Password</p>			 
			 <input id="loginpasswordinput" type="password" name="password">			 
			 <input id="loginaccountbutton" type="submit" value="Log in" name="login">
		  </div>
		  
	   </div>
		
	   <div id="rigthcolumn">
	      <div id="rightcolumnbox">
		     <p id="specialtext"><a id="specialtextlink" href="#">Specials</a></p>
			 
		     <div id="specialcontainer">
		        <div id="specialsmallpicture">
				   <a href="../view/wine8.php"><img src="../pics/pic8small.jpg"></a>
				</div>
				
				<div id="specialinfo">
				   <h5>Lorem ipsum dolor sit amet consectetur cing elit</h5>
				   
				   <h3>You have to try on our wine because you can..</h3>
				   
				   <h4>$1,504.18 (-8%)</h4>
				   <p>$1,383.85</p>
				</div>
				
				<a id="allspecial" href="#">All specials</a>
		     </div>
		  </div>
		  
		  <div id="rightcolumnbox2">
		     <p id="specialtext"><a id="specialtextlink" href="#">Top sellers</a></p>

             <div id="topsellercontainer">
                <div>
				  
				   <a href="../view/wine1.php"><img src="../pics/pic1small.jpg"></a>
				   <div>
				      <h5>Lorem ipsum dolor sit...</h5>		
				      <h3>You have to try on our..</h3>					  
				   </div>
				</div>
				
				<div>
				   <a href="../view/wine3.php"><img src="../pics/pic3small.jpg"></a>	
				   <div>
				      <h5>Lorem ipsum dolor sit...</h5>	
   				      <h3>You have to try on our..</h3>					  
				   </div>				   
				</div>
				
				<div>
				   <a href="../view/wine5.php"><img src="../pics/pic5small.jpg"></a>			
				   <div>
				      <h5>Lorem ipsum dolor sit...</h5>	
				      <h3>You have to try on our..</h3>					  
				   </div>				   
				</div>
				
				<div>
				   <a href="../view/wine8.php"><img src="../pics/pic8small.jpg"></a>		
				   <div>
				      <h5>Lorem ipsum dolor sit...</h5>		
				      <h3>You have to try on our..</h3>					  
				   </div>				   
				</div>
				<a id="allbestseller" href="#">All best sellers</a>
			 </div>		     
		  </div>
		  
		  
		  
	      <div id="rightcolumnbox3">
		     <p id="specialtext"><a id="specialtextlink" href="#">Manufacturers</a></p>
			 
			 <div>
				      <h5><a href="#">Aliquam diam</a></h5>	
				      <h5><a href="#">Convallis ornare</a></h5>	
				      <h5><a href="#">Nec volutpat</a></h5>	
				      <h5><a href="#">Orci magna</a></h5>	
				      <h5><a href="#">Sapien quam</a></h5>							  
			 </div>
		  </div>		  
		  
	   </div>
		
	</div>
	<!--------------------------------END BODY CONTAINER--------------------------------->
	
	<!--------------------------------START FOOTER CONTAINER--------------------------------->
	<footer id="footer-container">
	   <div id="footbox">
	      <h4 id="foothead">Information</h4>
		  <ul id="footlist">
		     <li><a href="#">Our stores</a></li>
			 <li><a href="#">Contact us</a></li>
			 <li><a href="../links/delivery.php">Delivery</a></li>
			 <li><a href="../links/legalnotice.php">Legal Notice</a></li>
			 <li><a href="../links/aboutus.php">About us</a></li>
			 <li><a href="../links/securepayment.php">Secure payment</a></li>
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
		  <img id="ftr" src="../pics/sprite_pict_social_block.png" height="110px">
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
    </form>
</body>
</html>




