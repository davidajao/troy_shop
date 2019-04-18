<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="css/custom.css">
        <title> </title>
        </head>

        <body>

            <?php

            include("session.php");
            
            //when form is submitted
            if(isset($_POST['submit'])){ 

                $first_name =       $_POST['first_name'];
                $last_name =        $_POST['last_name'];
                $email =            $_POST['email'];
                $phone =            $_POST['phone'];
                $carrier =          $_POST['carrier'];
                $street =           $_POST['street'];
                $city =             $_POST['city'];
                $state =            $_POST['state'];
                $zip =              $_POST['zip'];

                echo 'DONE <br/>'; 
                
                $sql = "UPDATE customers 
                            SET 
                                first_name = '$first_name',
                                last_name = '$last_name', 
                                email = '$email', 
                                phone = '$phone', 
                                carrier = '$carrier', 
                                street = '$street', 
                                city = '$city', 
                                state = '$state', 
                                zip = '$zip'
                          WHERE userID = $sessionID";
               
               if ($db->query($sql) === TRUE) {
                    echo "Record updated successfully";
                    header("location: my_profile.php");
                } else {
                    echo "Error updating record: " . $db->error;
                }

            }

            ?>
            
        <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>  
        <script src="js/store.js"></script>
        </body>
    </html>