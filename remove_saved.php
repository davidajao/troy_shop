<?php
include('session.php');

$productID = $_POST['productID'];


$sql = "DELETE FROM cart WHERE productID = $productID";
$result = mysqli_query($db,$sql);

if($result){
    echo "Deleted from database successfully.";
    //header('location: view_postings.php');
} else{
    echo "Not removed sucessfully";
}

?>