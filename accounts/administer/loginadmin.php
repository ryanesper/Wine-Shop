<?php

 include ('./connection.php');

session_start();

if(isset($_SESSION['user'])!="")
{
 header("Location: homeadmin.php");
}

if(isset($_POST['adminlogin']))
{
 if(isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password']))
  try{
     $sql="SELECT * FROM adminuser WHERE username = :username AND password = :password";
     
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
      $stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
      $stmt->execute();
      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      if ($row['username'] == $_POST['username'] && $row['password'] == $_POST['password'])
        {
          echo "<script type='text/javascript'>alert('Welcome Admin')</script>";
          $_SESSION['user'] = $row['username'];

          header('location: homeadmin.php');
        }
      else
        {
          echo "<script type='text/javascript'>alert('Invalid User')</script>";  
        }
     }
  catch(PDOException $err)
        {
          $err->getMessage();
        }
 
else
   {
     echo "<script type='text/javascript'>alert('Dont leave the Fields Empty')</script>";
   }
}

if(isset($_POST['adminregister']))
{
   header("location: registeradmin.php");
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
           <center><h3>Administrator</h3></center>
         <div id="loginform">
           Username: <input id="i0" type="text" name="username">
           Password: <input id="i1" type="password" name="password">
           <input id="i2" type="submit" value="K" name="adminlogin">
           <input id="i3" type="submit" value="No account?" name="adminregister">  
          </div>
       </div>
    </div>
 </div>   
    </form>
</body>
</html>