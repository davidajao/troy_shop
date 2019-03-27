<?php
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message

    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $error = "Username or Password is invalid";
        }
        else
        {
            // Define $username and $password
            $username=$_POST['username'];
            $password=$_POST['password'];
            // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            $db = new mysqli("localhost", "root", "pwdpwd", "shop1");
            if (!$db) {
                echo "Sorry, there was a problem connecting";
                exit;
            }

            // To protect MySQL injection for Security purpose
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = $db->real_escape_string($username);
            $password = $db->real_escape_string($password);
            

            $query = "SELECT * FROM customers WHERE password='$password' AND username='$username'";
                $dbresult = $db->query($query);

            if ($dbresult->num_rows == 1) {
                $_SESSION['login_user'] = $username; // Initializing Session
                header("location: store_front.html"); // Redirecting To Other Page
                echo "USERNAME CHECKS OUT";
            } 
            else {
                $error = "Username or Password is invalid";
            }

            mysqli_close($db); // Closing Connection
        }
    }
?>