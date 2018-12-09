<?php

 include ('./connection.php');




if(isset($_POST['adminregister']))
{
try {


$username = $_POST['username'];
$password = $_POST['password'];    
    
    $sql = "INSERT INTO adminuser (username, password)
    VALUES ('$username', '$password')";

    $conn->exec($sql);
    echo "<script type='text/javascript'>alert('Registered Succesfully')</script>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}







if (isset($_POST['backtologin']))
{
    header('location: loginadmin.php');
}
         
?>













<html>
<head>

<link href="style.css" type="text/css" rel="stylesheet">

</head>

<body>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
  <div id="wrapper">
    <div id="loginadmin">
       <img id="lala" src="pics/logo.jpg">
        
       <div id="form">
           <center><h3>Register as Admin</h3></center>
         <div id="loginform">
           Username: <input id="i0" type="text" name="username">
           Password: <input id="i1" type="password" name="password">
           <input id="i2" type="submit" value="K" name="adminregister">
           <input id="i3" type="submit" value="back" name="backtologin">
          </div>
       </div>
    </div>
 </div>   
    </form>
</body>
</html>