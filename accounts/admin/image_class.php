<?php
    include('db.php');



    class Image
    {
        var
            $prod_id,
            $prod_name,
            $image,
            $prod_price,
            $category,
            $quantity;
    
        function insert_into_image()
        {
            if($_FILES["txt_image"])
            {
            $tempname=$_FILES["txt_image"]["tmp_name"];
            $orignalname=$_FILES["txt_image"]["name"];
            $size=($_FILES["txt_image"]["size"]/ 5242880) . "MB<br>";
            $type=$_FILES["txt_image"]["type"];
            $image=$_FILES["txt_image"]["name"];
            move_uploaded_file($_FILES["txt_image"]["tmp_name"],"images/".$_FILES["txt_image"]["name"]);
            }
        
            $query="insert into products(prod_id, image, prod_name, prod_price, prod_category, prod_quantity) values ( '$this->prod_id', '$image', '$this->prod_name', '$this->prod_price', '$this->prod_category', '$this->prod_quantity')";
                    if (mysql_query($query)) 
                    {
                      echo "<script language='javasxript' type='text/javascript'>
                       alert('Image Upload');
                       </script>";
                    }
                    else
                    {
                       echo "<script language='javasxript' type='text/javascript'>
                       alert('Image not Upload');
                       </script>";
                    }
       }
    
       function get_all_image_list()
       {
           $query="SELECT * FROM products";
           $result=mysql_query($query);
           return $result;
       }
    }

?>