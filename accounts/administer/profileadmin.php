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

        
      <div id="adminprofile" style="background-color: #1F1C19">
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
            <h2>Administrator</h2>
            <h3><a href="logout.php?logout">Sign Out</a></h3>
        </div>
 
        
        
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
           <li><a href="productsadmin.php">Products</a></li>
           <li><a href="ordersadmin.php">Orders</a></li>
           <li><a href="stocksadmin.php">Stocks</a></li>
           <li><a href="customer.php">Customers</a></li>
       </ul>    
    </div>
</body>
</html>