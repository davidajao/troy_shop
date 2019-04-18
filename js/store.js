
$(document).ready(function(){

    //add item to saved(cart) items
    $(".addToCart").click(function(){
        //get productID
        var product_ID = $(this).parent().parent().parent().attr('id');
        console.log(product_ID);

        
        $.ajax({
            url: 'add_to_cart.php',
            type: 'post',
            data: {productID:product_ID},
            //dataType: 'json',
            success:function(response){
                alert("added to saved items");
                console.log(response.responseText);
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }   
        });
    });

    //user removes an item he/she posted
    $(".remove_post").click(function(){
        //alert("a remove has been clicked");
        //get productID
        var product_ID = $(this).parent().parent().parent().attr('id');
        console.log(product_ID);

        if (confirm("Do you want to delete this listing permanently?") == true) {
                
                $.ajax({
                    url: 'remove_posting.php',
                    type: 'post',
                    data: {productID:product_ID},
                    //dataType: 'json',
                    success:function(){
                        window.location='view_postings.php';
                    },
                    error: function (request, status, error) {
                        alert(request.responseText);
                    }   
                });
        } 
    });

    //remove item from saved list
    $(".remove_saved").click(function(){
        //alert("a remove has been clicked");
        //get productID
        var product_ID = $(this).parent().parent().parent().attr('id');
        console.log(product_ID);

        if (confirm("Are you sure you want to remove from saved items?") == true) {
                
                $.ajax({
                    url: 'remove_saved.php',
                    type: 'post',
                    data: {productID:product_ID},
                    dataType: 'json',
                    success:function(){
                        window.location='view_saved.php';
                    },
                    error: function (request, status, error) {
                        alert(request.responseText);
                    }   
                });
        } 
    });



    //sort by
    $("#sortBy").change(function(){
        //get departure city and assign to depart
        var list_order = $(this).val();

        $.ajax({
            url: 'get_order.php',
            type: 'GET',
            data: {order:list_order},
            dataType: 'json',
            success:function(response){
                var len = response.length;
                console.log(response);

                $("#products").empty();

                for (var i = 0; i<len; i++){

                    var ID = response[i]['productID'];
                    var product_name = response[i]['product_name'];
                    var price = response[i]['price'];
                    var location =  response[i]['image_path'];
                    var description = response[i]['description'];

                    var content =   "<div class='col-md-4'>\
                                        <div class='card' style='width: 18rem;'>\
                                            <a href="+location+"><img src="+location+" class='card-img-top' alt="+product_name+"> </a>\
                                            <div id="+ID+" class='card-body'>\
                                                <h5 class='card-title name'>"+product_name+"</h5>\
                                                <ul class='list-group list-group-flush'>\
                                                    <li id='productID'style='display:none';> "+ID+" </li>\
                                                    <li class='list-group-item price'>$"+price+"</li>\
                                                    <!--<li class='list-group-item'>Seller Rating: </li>-->\
                                                    <li class='list-group-item'> <button type='button' class='details btn btn-sm btn-info'> Details </button>\
                                                    <div id='"+ID+"info' style='display:none;'>"+description+"</div></li>\
                                                    <li class='list-group-item'> <button class='addToCart btn btn-sm btn-primary btn-block'><i class='fas fa-heart'></i>&nbsp;Save</button> </li>\
                                                    <li class='list-group-item'> <button class='contact btn btn-sm btn-primary btn-block'> Contact seller</button></li>\
                                                </ul>\
                                            </div>\
                                        </div>\
                                    </div>"

                    

                    content_last = "<div class='col-md-4'>\
                                        <div class='card' style='width: 18rem;'>\
                                            <a href="+location+"><img src="+location+" class='card-img-top' alt="+product_name+"> </a>\
                                            <div id="+ID+" class='card-body'>\
                                                <h5 class='card-title name'>"+product_name+"</h5>\
                                                <ul class='list-group list-group-flush'>\
                                                    <li id='productID'style='display:none';> "+ID+" </li>\
                                                    <li class='list-group-item price'>$"+price+"</li>\
                                                    <!--<li class='list-group-item'>Seller Rating: </li>-->\
                                                    <li class='list-group-item'> <button type='button' class='details btn btn-sm btn-info'> Details </button>\
                                                    <div id='"+ID+"info' style='display:none;'>"+description+"</div></li>\
                                                    <li class='list-group-item'> <button class='addToCart btn btn-sm btn-primary btn-block'><i class='fas fa-heart'></i>&nbsp;Save</button> </li>\
                                                    <li class='list-group-item'> <button class='contact btn btn-sm btn-primary btn-block'> Contact seller</button></li>\
                                                </ul>\
                                            </div>\
                                        </div>\
                                    </div></div><div class='row'>"

                    if (i % 3 == 0 && i!= 0) {
                        $("#products").append(content_last);
                    }
                    else{
                        $("#products").append(content);
                    }
                }   
            },
            error: function (request, status, error) {
                alert(error);
                alert(status);
                console.log(request.responseText);
            }   
        });
    });


    //contact seller
    $(".contact").click(function(){
        //get productID
        var product_ID = $(this).parent().parent().parent().attr('id');
        console.log(product_ID);

        window.location.href = "contact_seller.php?productID=" + product_ID;
        /*
        $.ajax({
            url: 'contact_seller.php',
            type: 'post',
            data: {productID:product_ID},
            //dataType: 'json',
            success:function(response){
                //alert("email sent !");
                console.log(response);
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }   
        });
        */
    });


    $(".details").click(function(){
        //alert("viewing details");
        //get productID
        var product_ID = $(this).parent().parent().parent().attr('id');
        console.log(product_ID);
        $("#"+product_ID+"info").toggle(1000);
    });


    //password match verification
    $('#password0, #password1').on('keyup', function () {
        if ($('#password0').val() == $('#password1').val()) {
            $('#message').html('Matching').css('color', 'green');
            console.log("password matches");
            $('#submitSignUp').prop('disabled',false);
        }
        else {
            $('#message').html('Not Matching').css('color', 'red');
            $('#submitSignUp').prop('disabled',true);
        }
    });

});