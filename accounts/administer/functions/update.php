<?php

include ('../connection.php');


try {

    $sql = "UPDATE MyGuests SET prod_name='', prod_description='', prod_price='', prod_category='', prod_qunatity='', prod_manufacturer=''
    
    WHERE prod_id='$_GET[id]'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>