<?php
    include('login.php'); // Includes Login Script

    if(isset($_SESSION['login_user'])){
        header("location: profile.php");
    }
?>
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.1.1-web/css/all.min.css">

    <title>SHOP</title>
  </head>

  <body>
    <div id="login" class="container">
      <form class="blue_border form-signin center" action="" method="POST">
        <div class="text-center mb-4">
          <img class="mb-4" src="images/cart.png" alt="" width="100" height="80">
          <h1 class="h3 mb-3 font-weight-normal">TROY SHOPPES</h1>
          
        </div>

        <div class="form-label-group">
          <label for="inputEmail">email </label>
          <input type="text" id="inputEmail" class="form-control" placeholder="" required="" autofocus="" name="email">
        </div>

        <div class="form-label-group">
          <label for="inputPassword">password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="" required="" name="password">
        </div>

        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>  
        <input class="btn btn-lg btn-primary btn-block" type="submit"name="submit" value="Sign In">
        <br/><br/>
        <div style="text-align:center">
            <p> Or </p>
            <a href="register.html"> Create an account </a>
        </div>  
      </form>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>  
  <script src="js/store.js"></script>
</body>
</html>