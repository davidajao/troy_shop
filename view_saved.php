<?php
    include('session.php');
    include('header.php');
?>
        <div class="head">
            <h2>Saved Items</h2>
        </div>
        
        <div class='row'>
            <?php include('get_saved.php') ?>
        </div>
<?php
    include('footer.php');
?>