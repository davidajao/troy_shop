<?php 
    include('session.php');
    
    $order = $_GET['order'];

    //get all products not sold
    $sql = "SELECT * FROM products WHERE sold = 0 ORDER BY price $order";
    $result = mysqli_query($db,$sql);

    $products_arr = array();

    //create an array of products
    while($row = mysqli_fetch_array($result)){

                                $products_arr[] = array(
                                    "productID"=>$row['productID'], 
                                    "product_name"=>$row['product_name'], 
                                    "price"=>$row['price'], 
                                    "categoryID"=>$row['categoryID'],
                                    "image_path"=>$row['image_path'],
                                    "description"=>$row['description'],
                                    "sellerID"=>$row['sellerID'],
                                    "date_posted"=>$row['date_posted'],
                                    "sold"=>$row['sold']
                                );
    

    }

    header('Content-Type: application/json');
    echo json_encode($products_arr);
    
?>