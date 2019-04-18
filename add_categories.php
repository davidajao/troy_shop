<?php
include("connection.php");
/*
////script to insert categories table
$sql = "INSERT IGNORE INTO categories (categoryID, category_name) VALUES ('Other', 'Other')";

if(mysqli_query($db, $sql)){
    echo "Other category created successfully.</br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db)."<br/>";
}
*/


////script to insert categories table
$sql = "INSERT IGNORE INTO categories (categoryID, category_name) VALUES ('Tech', 'Technology')";

if(mysqli_query($db, $sql)){
    echo "Technology category created successfully.</br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db)."<br/>";
}


////script to insert categories table
$sql = "INSERT IGNORE INTO categories (categoryID, category_name) VALUES ('Text', 'Textbooks')";

if(mysqli_query($db, $sql)){
    echo "Texbooks category created successfully.</br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db)."<br/>";
}
?>