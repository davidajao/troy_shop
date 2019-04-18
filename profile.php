<?php
    include('session.php');
    include('header.php');
?>

                <h2 class= head>Buy and Sell textbooks and more on Campus!</h2>

                <div id="slideShow" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="images/textbooks.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/games.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/suits.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
        
                    <a class="carousel-control-prev" href="#slideShow" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#slideShow" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
        
<?php
    include('footer.php');
?>
        