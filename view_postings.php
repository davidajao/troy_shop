<?php
    include('session.php');
    include('header.php');
?>
        <div class="head">
            <h2>My Postings</h2>
        </div>
        
        <div class='row'>
            <?php include('get_postings.php') ?>
        </div>
<?php
    include('footer.php');
?>