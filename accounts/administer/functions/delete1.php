<?php

include ('../connection.php');

try {
    $sql = "DELETE FROM products WHERE prod_id='$_GET[id]'";
    $conn->exec($sql);
    header('location: ../stocksadmin.php');
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }


?>