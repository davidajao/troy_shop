<?php
include('session.php');

$productID = $_POST['productID'];


$sql = "INSERT INTO cart (userID, productID) VALUES ($sessionID, $productID)";
$result = mysqli_query($db,$sql);

if($result){
    echo "Added to cart successfully.";
} else{
    echo "Item already in cart.";
}

/*
$sql = "SELECT * from products WHERE productID = '$productID' ";

$result = mysqli_query($db,$sql);

$products_arr = array();


    while( $row = mysqli_fetch_array($result) ){

        $productID = $row['productID'];
        $product_name = $row['product_name'];
        $price = $row['price'];
        $categoryID = $row['categoryID'];
        $location = $row['image_path'];
        $description = $row['description'];
        $sellerID = $row['sellerID'];
        $date = $row['date_posted'];
        $sold = $row['sold'];

        $products_arr[] = array(
            "productID"=>$productID, 
            "product_name"=>$product_name, 
            "price"=>$price, 
            "categoryID"=>$categoryID,
            "image_path"=>$location,
            "description"=>$description,
            "sellerID"=>$sellerID,
            "date_posted"=>$date,
            "sold"=>$sold
        );
    }

    // encoding array to json format
    echo json_encode($products_arr);
*/
?>