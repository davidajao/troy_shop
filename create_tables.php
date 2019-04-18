<?php

            include('connection.php');
            
            //script to create CUSTOMERS table
            $sql = "CREATE TABLE IF NOT EXISTS `customers`
            (
            `userID` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `password` VARCHAR(64) NOT NULL,
            `first_name` VARCHAR(20) NOT NULL,
            `last_name` VARCHAR(20) NOT NULL,
            `email` VARCHAR(70) NOT NULL UNIQUE,
            `phone` VARCHAR(20) NOT NULL,
            `carrier` VARCHAR(40) NOT NULL,
            `street` VARCHAR(70) NOT NULL,
            `city` VARCHAR(20) NOT NULL,
            `state` VARCHAR(20) NOT NULL,
            `zip` VARCHAR(30) NOT NULL
            )";


            if(mysqli_query($db, $sql)){
                echo "Customers table created successfully.</br>";
            } else{
                echo "ERROR: Could not able to execute customers table $sql. " . mysqli_error($db)."<br/>";
            }
            

            //script to create product categories table
            $sql = "CREATE TABLE IF NOT EXISTS `categories`
            (
                `categoryID` VARCHAR(30) NOT NULL PRIMARY KEY,
                `category_name` VARCHAR(30) NOT NULL
            )";

            if(mysqli_query($db, $sql)){
                echo "categories table created successfully.</br>";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($db)."<br/>";
            }

            //adds categories to table
            include("add_categories.php");

            //script to create products table
            $sql = "CREATE TABLE IF NOT EXISTS `products`
            (
                `productID` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `product_name` VARCHAR(30) NOT NULL,
                `price` DECIMAL(6,2) NOT NULL,
                `categoryID` VARCHAR(30) NOT NULL,
                `image_path` VARCHAR(80),
                `description` VARCHAR(255),
                `sellerID` INT,
                `date_posted` TIMESTAMP NOT NULL,
                `sold` BOOLEAN,
                FOREIGN KEY(categoryID) REFERENCES categories(categoryID),
                FOREIGN KEY(sellerID) REFERENCES customers(userID)
            )";

            if(mysqli_query($db, $sql)){
                echo "products table created successfully.</br>";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($db)."<br/>";
            }

            
            //Script to create transactions table
            $sql = "CREATE TABLE IF NOT EXISTS `transactions`
            (
                `transID` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `buyerID` INT,
                `sellerID` INT,
                `productID` INT,
                FOREIGN KEY(productID) REFERENCES products(productID),
                FOREIGN KEY(buyerID) REFERENCES customers(userID),
                FOREIGN KEY(sellerID) REFERENCES customers(userID)
            )";
            if(mysqli_query($db, $sql)){
                echo " Transactions table created successfully.</br>";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($db)."<br/>";
            }


            //Script to create cart table
            $sql = "CREATE TABLE IF NOT EXISTS `cart`
            (
                `userID` INT,
                `productID` INT
            )";
            if(mysqli_query($db, $sql)){
                echo " cart table created successfully.</br>";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($db)."<br/>";
            }



            //Script to create reviews table
            $sql = "CREATE TABLE IF NOT EXISTS `reviews`
            (
                `sellerID` INT,
                `buyerID` INT,
                `rating` INT (10),
                PRIMARY KEY(sellerID, buyerID),
                FOREIGN KEY(sellerID) REFERENCES customers(userID),
                FOREIGN KEY(buyerID) REFERENCES customers(userID)
            )";
            if(mysqli_query($db, $sql)){
                echo " reviews table created successfully.</br>";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($db)."<br/>";
            }


            //Script to create debit card details
            $sql = "CREATE TABLE IF NOT EXISTS `card`
            (
                `cardNo` VARCHAR(50) NOT NULL PRIMARY KEY,
                `userID` INT,
                `expDate` VARCHAR(20) NOT NULL,
                `cvv` INT(50) NOT NULL,
                `name` VARCHAR(50) NOT NULL,
                `bill_street` VARCHAR(70) NOT NULL,
                `bill_city` VARCHAR(20) NOT NULL,
                `bill_state` VARCHAR(20) NOT NULL,
                `bill_zip` VARCHAR(30) NOT NULL,
                FOREIGN KEY(userID) REFERENCES customers(userID)
            )";
            if(mysqli_query($db, $sql)){
                echo " cards table created successfully.</br>";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($db)."<br/>";
            }
            // Close connection
            mysqli_close($db);
?>