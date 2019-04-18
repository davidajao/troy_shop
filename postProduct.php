<?php 
    include('session.php');

    if(isset($_POST['upload'])){

        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $sellerID = $sessionID;

        $timestamp = time();
        $time = gmdate("Y-m-d\TH:i:s\Z", $timestamp);
        $sold = 0; 

        //GET LAST PRODUCT ID and increment
        $query = "SELECT productID FROM products ORDER BY productID DESC LIMIT 1";
            $dbresult = $db->query($query);
            $row = mysqli_fetch_assoc($dbresult);
            $lastid = $row['productID'];     
            $newid = ($lastid + 1);


        //UPLOAD IMAGE TO FOLDER ON SERVER
        //==============================================================================================
        $name       = pathinfo($_FILES['product_image']['name']); 
        $ext        = $name['extension'];
        $temp_name  = $_FILES['product_image']['tmp_name'];  

        if(isset($name)){
            if(!empty($name)){   
                $location = $_SERVER['DOCUMENT_ROOT']."/shop/product_images/";   
                //add name file using user id and product id
                $location = $location.$sessionID."_".$newid.".".$ext;  
                
                if(move_uploaded_file($temp_name, $location)){
                    echo 'File uploaded successfully';
                    $location = "/shop/product_images/".$sessionID."_".$newid.".".$ext;
                }
            }       
        }  
        else {
            echo 'You should select a file to upload !!';
        }


        $query = "INSERT INTO products (product_name, price, categoryID, Image_path, description, sellerID, date_posted, sold) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $dbstmt = $db->prepare($query);

        $dbstmt->bind_param("sdsssisi", $product_name, $price, $category, $location, $description, $sellerID, $time, $sold);
        if($dbstmt->execute()){
            echo "added to products table";
            header("location: view_items.php");
        }
        else{
            echo "not inserted into products". mysqli_error($db);
        }
    }
?>