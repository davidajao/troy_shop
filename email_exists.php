<?php 
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <link rel="stylesheet" type="text/css" href="fontawesome-free-5.1.1-web/css/all.min.css">
        <title> TROY MARKETPLACE </title>
    </head>
        
    <body>
        <div id="top"> 
            <a href="view_saved.php"><i class="fas fa-heart"></i> Saved items &emsp; </a>
            <a href="sell.php">Sell an Item</a> &nbsp; &nbsp; &nbsp;
            <a href="my_profile.php"> My profile &emsp; </a>
            <a href="logout.php">Log Out</a>
        </div>

        <div class="smallScreen" >
            <nav id="navigate" class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="profile.php"><img src="images/cart.png" style='width:55px;'/></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                    
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="profile.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="view_items.php">Items</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="view_postings.php">Postings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">About</a>
                            </li>
                        </ul>
                        </div>
            </nav>
        </div>

<div class="head">
            <h2>Oops!</h2>
        </div>
        
        
        <div class="container"> <h2 style="text-align:center"> </h2> <div>

        <div>
            <div class='row'>
                <h1 style="text-align:center; padding:40px;"> Oops that email is already in use, please try a new one.</h1>
            </div>
        </div>

<?php
include('footer.php');
?>