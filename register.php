<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="flight.css">
        <title> </title>
        </head>

        <body>

            <?php

            require("connection.php");

            $db = new mysqli("localhost", "root", "pwdpwd", "shop1");
            if (!$db) {
                echo "Sorry, there was a problem connecting";
                exit;
            }
            
            //when form is submitted
            if(isset($_POST['submit'])){ 

                $username =         $_POST['username'];
                $password =         $_POST['password1'];
                $first_name =       $_POST['first_name'];
                $last_name =        $_POST['last_name'];
                $email =            $_POST['email'];
                $phone =            $_POST['phone'];
                $street =           $_POST['street'];
                $city =             $_POST['city'];
                $state =            $_POST['state'];
                $zip =              $_POST['zip'];

                echo 'DONE <br/>'; 
                
                $query = "INSERT INTO customers (username, password, first_name, last_name, email, phone, street, city, state, zip)
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $dbstmt = $db->prepare($query);

                $dbstmt->bind_param('ssssssssss', $username, $password, $first_name, $last_name,  $email, $phone, $street, $city, $state, $zip);

                if ($dbstmt->execute()){
                    echo '<p>INSERTED INTO TABLE SUCCESSFULLY </p>';
                    header("location: login.html"); // Redirecting To login Page
                }
                else{
                    echo '<p>NOT INSERTED INTO TABLE </p>'. mysqli_error($db);;
                }
            }

            ?>
            
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>  
        <script src="js/flight.js"></script>
        </body>
    </html>