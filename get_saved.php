<?php 


    //get all products not sold
    $sql = "SELECT * FROM products WHERE sold = 0 AND productID
            IN
            (SELECT productID FROM cart WHERE userID = $sessionID )";
    $result = $db->query($sql);

    $products_arr = array();

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
                                <h5 class='card-title'>".$product_name."</h5>
                                <ul class='list-group list-group-flush'>
                                    <li id='productID'style='display:none';> ".$productID." </li>
                                    <li class='list-group-item'>$".$price."</li>
                                    <li class='list-group-item'>Date posted: ".$date."</li>
                                    <li class='list-group-item'> <button type='button' class='details btn btn-sm btn-info'> Details </button> 
                                    <div id='".$productID."info' style='display:none;'>".$description."</div></li>
                                    <li class='list-group-item'> 
                                        <button class='contact btn btn-sm btn-primary btn-block'>Contact seller</button> 
                                        <button class='remove_saved btn btn-sm btn-danger btn-block'>Unsave</button> 
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            ";
            $i++;
            if ($i % 3 == 0) {echo '</div><div class="row">';}
    }

    
?>