<?php
    include('session.php');
    include('header.php');
?>              
        <div class="head">
            <h2>Items</h2>
        </div>
        
        
        <div id="sort" class="container">
            <form action="search_items.php" method="GET" class="form-inline my-2 my-lg-0 ">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" align="right" name="search">
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>

        </div>

        <div class="container"> <h2 style="text-align:center">Search results </h2> <div>

        <div>
            <div id='products' class='row'>
            <?php 

$name = $_GET['search'];

//get all products not sold
$sql = "SELECT * FROM products WHERE product_name LIKE '%$name%' ORDER BY price ASC";
$result = $db->query($sql);

$products_arr = array();

if(mysqli_num_rows($result)>=1){
    //create an array of products
    while($row = mysqli_fetch_array($result)){

        $productID = $row['productID'];
        $product_name = $row['product_name'];
        $price = $row['price'];
        $categoryID = $row['categoryID'];
        $location = $row['image_path'];
        $description = $row['description'];
        $sellerID = $row['sellerID'];

        $time = DateTime::createFromFormat ( "Y-m-d H:i:s", $row["date_posted"] );

        $sold = $row['sold'];

        $date = $time->format('m/d/y');

        $i = 0;

        echo    "<div class='col-md-4'>
                    <div class='card' style='width: 18rem;'>
                        <a href=".$location."><img src=".$location." class='card-img-top' alt=".$product_name."> </a>
                        <div id=".$productID." class='card-body'>
                            <h5 class='card-title name'>".$product_name."</h5>
                            <ul class='list-group list-group-flush'>
                                <li id='productID'style='display:none';> ".$productID." </li>
                                <li class='list-group-item price'>$".$price."</li>
                                <!--<li class='list-group-item'>Seller Rating: </li>-->
                                <li class='list-group-item'> <button type='button' class='details btn btn-sm btn-info'> Details </button> 
                                <div id='".$productID."info' style='display:none;'>".$description."</div></li>
                                <li class='list-group-item'> <button class='addToCart btn btn-sm btn-primary btn-block'><i class='fas fa-heart'></i>&nbsp;Save</button> </li>
                                <li class='list-group-item'> <button class='contact btn btn-sm btn-primary btn-block'> Contact seller</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
        ";
        $i++;
        if ($i % 3 == 0) {echo '</div><div class="row">';}
    }

}
else{
    echo "<div class='container' style='text-align:center;'> <h3>No item found with similar name</h3></div>";
}


?>
            </div>
        </div>
<?php
    include('footer.php');
?>

