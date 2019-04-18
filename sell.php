<?php
    include('session.php');
    include('header.php');
?>

        <div id="login" class="container">
            <form class="blue_border center" action="postProduct.php" method="POST" enctype="multipart/form-data">
                <div id="details" >
                    <div class="form-group">
                        <label>Name of Product:</label>
                        <input type="text" class="form-control" name="product_name" required>	
                    </div>
                    <div class="form-group">
                        <label>Price:</label>
                        <input id="price" type="number" class="form-control" name="price" required>	
                    </div>
                    <div class="form-group">
                        <label>Category:</label>
                        <select id="category" class="form-control" name="category" required>
                            <option value=""></option>
                            <?php 
                            // Fetch departure city
                            $sql = "SELECT * FROM categories ORDER BY category_name DESC";
                            $category = mysqli_query($db,$sql);
                            while($row = mysqli_fetch_assoc($category) ){
                                $catID = $row['categoryID'];
                                $catName = $row['category_name'];

                                // Option
                                echo "<option value='".$catID."'>".$catName."</option>";
                            }
                            ?>
                        </select>   
                    </div>
                    <div class="form-group">
                        <label>Image:</label>
                        <input type="file" class="form-control" name="product_image" accept="image/png,image/gif,image/jpeg" required>
                    </div>
                    <div class="form-group">
                        <label>Product Condition/Description:</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <button name="upload" type="submit" class="btn btn-lg btn-primary btn-block">Post</button>
                </div>  
            </form>
        </div>

<?php
    include('footer.php');
?>