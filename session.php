<?php
    // Establishing Connection with Server by passing server_name, user_id and password as a parameter
    //establish connection to the database
    include('connection.php');

    //starting session
    session_start();

    // Storing Session
    $user_check = $_SESSION['login_user'];

    // SQL Query To Fetch Complete Information Of User
    $query = "SELECT * FROM customers WHERE email='$user_check'";
    $dbresult = $db->query($query);

    $row = mysqli_fetch_assoc($dbresult);
    $login_session = $row['first_name'];
    $sessionID = $row['userID'];
    $buyer_phone = $row['phone'];
    $buyer_carrier = $row['carrier'];

    if(!isset($login_session)){
        mysqli_close($db); // Closing Connection
        header('Location: login_form.php'); // Redirecting To Home Page
    }
?>