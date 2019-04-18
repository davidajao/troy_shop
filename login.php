<?php
    if (isset($_POST['submit'])) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            echo "email or Password is invalid";
        }
        else
        {
            // Define $email and $password
            $email=$_POST['email'];
            $password=$_POST['password'];

            
            //establish connection to the database
            include('connection.php');

            // To protect MySQL injection for Security purpose
            $email = stripslashes($email);
            $password = stripslashes($password);
            $email = $db->real_escape_string($email);
            $password = $db->real_escape_string($password);
            

            $query = "SELECT * FROM customers WHERE password='$password' AND email='$email'";
            $dbresult = $db->query($query);

            if (mysqli_fetch_array($dbresult)) {
                session_start();    //start session
                $_SESSION['login_user'] = $email; // Initializing Session
                header("location:profile.php"); // Redirecting To Other Page
                echo "USERNAME CHECKS OUT";
            } 
            else {
                $error = "email or Password is invalid";
                header("location:login_invalid.php");
            }

            mysqli_close($db); // Closing Connection
        }
    }
?>