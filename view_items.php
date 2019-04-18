<?php
    include('session.php');
    include('header.php');
?>              
        <div class="head">
            <h2>Items</h2>
        </div>
        
        
        <div id="sort" class="container">
            <form action="search_items.php" method="GET" class="form-inline my-2 my-lg-0 ">
                <input id="search" class="form-control mr-sm-2" type="text" placeholder="Search" align="right" name="search">
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>

            <form action="" method="POST">
                <div class="form-group" align="right">
                    <label><b>SORT BY:</b><label>
                    <select id="sortBy" class="form-control" name="order">
                        <option> </option> 
                        <option value="asc">$-$$</option>
                        <option value="desc">$$-$</option>
                    </select>
                </div>
            </form>
        </div>

        <div>
            <div id='products' class='row'>
                <?php include('get_items.php') ?>
            </div>
        </div>
<?php
    include('footer.php');
?>