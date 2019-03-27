<!DOCTYPE html>
    <html>
        <head>
        </head>

        <body>

            <?php

            //establish connection to the database
            $db = new mysqli("localhost", "root", "pwdpwd", "shop1");
            if (!$db) {
                echo "Sorry, there was a problem connecting";
                exit;
            }

            //script to create CUSTOMERS table
            $sql = "CREATE TABLE IF NOT EXISTS `customers`
            (
            `userID` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `username` VARCHAR(30) NOT NULL UNIQUE,
            `password` VARCHAR(20) NOT NULL,
            `first_name` VARCHAR(20) NOT NULL,
            `last_name` VARCHAR(20) NOT NULL,
            `email` VARCHAR(70) NOT NULL UNIQUE,
            `phone` VARCHAR(20) NOT NULL,
            `street` VARCHAR(70) NOT NULL,
            `city` VARCHAR(20) NOT NULL,
            `state` VARCHAR(20) NOT NULL,
            `zip` VARCHAR(30) NOT NULL,
            `productID` INT(10),
            FOREIGN KEY(productID) REFERENCES products(productID)
            )";

            if(mysqli_query($db, $sql)){
                echo "Customers able created successfully.";
            } else{
                echo "ERROR: Could not able to execute customers table $sql. " . mysqli_error($db)."<br/>";
            }




            //script to create products table
            $sql = "CREATE TABLE IF NOT EXISTS `products`
            (
                `productID` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `product_name` VARCHAR(30) NOT NULL,
                `category` VARCHAR(30) NOT NULL,
                `price` DECIMAL(4,2) NOT NULL,
                `image_path` VARCHAR(80)
            )";

            if(mysqli_query($db, $sql)){
                echo "products able created successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
            }

/*
            //Script to populate database with data from text file on server
            $file = file('flight_data.txt'); # read file into array
            $count = count($file);
            if($count > 0) # file is not empty
            {
                $flight_query = "INSERT IGNORE INTO flights(flightNo, departure_city, destination) VALUES";
                $i = 1;
                foreach($file as $row)
                {
                    $flight = explode('|',$row);
                    $flight_query .= "('$flight[0]',  '$flight[1]', '$flight[2]')";
                    $flight_query .= $i < $count ? ',':'';
                    $i++;
                }
                if(mysqli_query($db, $flight_query)){
                    echo "flights updated <br/>";
                } else{
                    echo "ERROR: flights not updated from txt file $flight_query. " . mysqli_error($db);
                }
            }

*/

            //Script to create Orders table
            $bookings_sql = "CREATE TABLE IF NOT EXISTS `orders`
            (
                `productID` INT,
                `userID` INT,
                `status` VARCHAR(20) NOT NULL,
                PRIMARY KEY (productID, userID),
                FOREIGN KEY(productID) REFERENCES products(productID),
                FOREIGN KEY(userID) REFERENCES customers(userID)
            )";
            if(mysqli_query($db, $bookings_sql)){
                echo " ORDERS Table created successfully.";
            } else{
                echo "ERROR: Could not able to execute $bookings_sql. " . mysqli_error($db);
            }

            // Close connection
            mysqli_close($db);

            ?>

        </body>
        
        </html>

