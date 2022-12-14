var base_url = 'http://localhost/mobvision/';

function set_counter( id , limit )
{
    var c=0;    
    var cc = setInterval( function(){       
        c++;
        if( c <= limit )
        {
            $("#"+id).html( c );
        }
        else
        {
            clearInterval(cc);
        }        
    } , 100 );
}

//admin site delete
function delete_link(path) {
    $url = base_url + 'delete/' + path;
    $('#delete_link').attr('href', $url);
       $url = base_url + 'delete/' + path;
        $('#delete_link').attr('href' , $url);
}

//user site delete
function set_combo(action, id) 
{
    var c=0;

    $("#"+action).html("<option>Loading..</option>");

    var cc = setInterval(function () {

        c++;

        if (c == 1) 
        {
            clearInterval(cc);

            $data = { id: id };
            var url = base_url + 'backend/' + action;
            $.post(url, $data, function (output) {
                $("#" + action).html(output);
            });

        }
    } , 1000);


}

function subscribe()
{
    $email = $("#mc-email").val();
        
    if($email.length > 0)
    {
//      pattern matching
        var ptn = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if($email.match(ptn))
        {
            $data = { email:$email};            
            $path = base_url + 'backend/subscribe';
            $.post($path,$data,function(output){
                
                if(output == 1)
                {
                   $("#mc-email").val("");
                   $("#msg").html("Thank You for subscribe with us.");
                }
                if(output == 2)
                {
                   $("#mc-email").val("");
                   $("#msg").html("You already subscribe with us."); 
                }
            });
        }
        else
        {
          $("#msg").html("Please Enter Valid Email.");
        }
    }
    else
    {
        $("#msg").html("Please Enter Email.");
    }
}




function change_status(action, id)
{
    if ($("#status_" + id).hasClass("fa-toggle-on"))
    {
        $("#status_" + id).removeClass("fa-toggle-on").addClass("fa-toggle-off");
        $("#status_" + id).attr("data-toggle", "Deactive");
        $("#status_" + id).css("color", "#000");

    } else {
        $("#status_" + id).removeClass("fa-toggle-off").addClass("fa-toggle-on");
        $("#status_" + id).attr("data-toggle", "Active");
        $("#status_" + id).css("color", "#5458b3");
    }
    $data = {action: action, id: id};
    $path = base_url + "backend/change_status/";
    $.post($path, $data);
}



//Password Hide Show
$("#icon").click(function () {
    if ($('#pass').attr("type") == "text") {
        $('#pass').attr("type", "password");
        $('#icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    } else {
        $('#pass').attr("type", "text");
        $('#icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');

    }
});

//1Password Hide Show
$("#iconw1").click(function () {
    if ($('#passw1').attr("type") == "text") {
        $('#passw1').attr("type", "password");
        $('#iconw1').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    } else {
        $('#passw1').attr("type", "text");
        $('#iconw1').removeClass('fa fa-eye-slash').addClass('fa fa-eye');

    }
});

//2Password Hide Show
$("#iconw2").click(function () {
    if ($('#passw2').attr("type") == "text") {
        $('#passw2').attr("type", "password");
        $('#iconw2').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    } else {
        $('#passw2').attr("type", "text");
        $('#iconw2').removeClass('fa fa-eye-slash').addClass('fa fa-eye');

    }
});

//3Password Hide Show
$("#iconw3").click(function () {
    if ($('#passw3').attr("type") == "text") {
        $('#passw3').attr("type", "password");
        $('#iconw3').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    } else {
        $('#passw3').attr("type", "text");
        $('#iconw3').removeClass('fa fa-eye-slash').addClass('fa fa-eye');

    }
});




//Subscriber Checkbox
$(document).ready(function () {
    $('#checkAll').click(function () {
        var checked = this.checked;
        $('input[type="checkbox"]').each(function () {
            this.checked = checked;
        });
    })
});

document.getElementById('setPhoto').onchange = evt => {
    const [file] = document.getElementById('setPhoto').files;
    if (file) {
        $('#preview').show(500).attr('src', URL.createObjectURL(file));
    }
}

document.getElementById('setPhoto').onchange = evt => {
    const [file] = document.getElementById('setPhoto').files
    if (file) {
        document.getElementById('preview').style.display = "block";
        document.getElementById('preview').src = URL.createObjectURL(file);
    }
}

document.getElementById('setPhoto').onchange = evt => {
    const [file] = document.getElementById('setPhoto').files
    if (file) {
        document.getElementById('preview').style.display = "block";
        document.getElementById('preview').src = URL.createObjectURL(file);
    }
}

//Add new product 
document.getElementById('setPhoto').onchange = evt => {
    const [file] = document.getElementById('setPhoto').files
    if (file) {
        document.getElementById('preview').style.display = "block";
        document.getElementById('preview').src = URL.createObjectURL(file);
    }
}

//user product change color image
function change_images( id )
{
    $data = { id: id};
    $path = base_url + 'backend/change_images/';
    $.post($path,$data,function(output){
//        alert(output);
    $("#color_preview").html(output);
    });
}


//user product change color image
function cart_btn( id )
{
    $data = { id: id};
    $path = base_url + 'backend/cart_btn/';
    $.post($path,$data,function(output){
        
    $("#cart_btn_area").html(output);
    stock_status(id);
    });
}


//user product change color image
function stock_status( id )
{
    $data = { id: id};
    $path = base_url + 'backend/stock_status/';
    $.post($path,$data,function(output){
        
    $("#stock_status").html(output);
    });
}


// user add wish from collection page
function add_wish( pid )
{
    if($("#wish_btn"+pid+" i").hasClass('fa-heart'))
    {
        $("#wish_btn"+pid+" i").removeClass('fa-heart').addClass('fa-heart-o');
        $("#wish_btn"+pid+" i").css('color','white');

    }
    else
    {
        $("#wish_btn"+pid+" i").removeClass('fa-heart-o').addClass('fa-heart');
        $("#wish_btn"+pid+" i").css('color','#f53127');
    }   
    
    $data = { pid:pid };
    $path = base_url + 'backend/wishlist/';
    $.post($path,$data);
}

//Add wish from detail page
function add_wishh( pid )
{
    if( $("#detail_wish i").hasClass('fa-heart') )
    {
        //$("#wish"+pid+" i").removeClass('fa-heart').addClass('fa-heart-o');
        $("#detail_wish ").html('<i class="fa fa-heart-o margin-right-5"></i> Add in Wish List');
    }
    else
    {
        $("#detail_wish ").html('<i class="fa fa-heart margin-right-5" style="color:red"></i> Added in Wish List');
    }
    
    $data = {pid: pid};
    $path = base_url + 'backend/wishlist/';
    $.post($path, $data);
}

// user cart from collection 
function add_cart( pid )
{
    $("#cart_btn"+pid).html('<span style="color:#fff">Added</span>');
    
    $data = { pid:pid };
    $path = base_url + 'backend/add_cart/';
    $.post($path,$data,function(output){
        if(output == "1")
            {
                header_cart();
                stickey_header_cart();
            }
    });
}



// user cart from recent view 
function add_cartr( pid )
{
    $("#cart_btnn"+pid).html('<span style="color:#fff">Added</span>');
    
    
    $data = { pid:pid };
    $path = base_url + 'backend/add_cartr/';
    $.post($path,$data,function(output){
        if(output == "1")
            {
                header_cart();
                stickey_header_cart();
            }
    });
}


//add to cart from product detail page
function add_cart_detail( pid )
{
    $data = { pid:pid };
    $path = base_url + 'backend/add_cart/';
    $.post($path,$data,function(output){
        if(output == "1")
            {
                $("#cart_btn_area").html('<a class="button" type="submit" style="background: #000">Added</a>');
                header_cart();
                stickey_header_cart();
            }
    });
}

//user header cart
function header_cart()
{
    $path = base_url + 'backend/header_cart/';
    $.post($path,$data,function(output){
        $("#headercart_data").html(output);            
    });
}

//user stickey header cart
function stickey_header_cart()
{
    $path = base_url + 'backend/stickey_header_cart/';
    $.post($path,$data,function(output){
        $("#stickey_headercart_data").html(output);            
    });
}

// User Change qty
function change_qty( cart_id , qty )
{
    $data = { cart_id:cart_id , qty:qty };
    $path = base_url + 'backend/change_qty/';
    $.post($path,$data,function(output){
       if(output == 1)
       {
           cartdata();
                 
       }
    });

}

//user remove cart
function remove_cart( cart_id )
{
    if( confirm('Are You Sure Want To Remove This Item.'))
    {
        $data = { cart_id:cart_id };
        $path = base_url + 'backend/remove_cart/';
        $.post($path,$data,function(output){
           if(output == 1)
           {
               cartdata();
               header_cart();
               stickey_header_cart();
           }
        });
    }
}

//user delete cart data
function cartdata()
{
    $path = base_url + 'backend/cartdata/';
    $.post($path,$data,function(output){
        $("#cartdata").html(output);            
    });
}


///user select cart data
function select_address( id )
{
    $data = { id:id };
    $path = base_url + 'backend/select_address/';
    $.post($path,$data,function(output){
//        alert(output);
        $("#shipment_area").html(output);            
    });
}

//apply promocode in checkout
function apply_code()
{
    $code = $("#code").val();
    
    $data = { code:$code };
    $path = base_url + 'backend/apply_code/';
    $.post($path,$data,function(output){
//        alert(output);
//        
        if(output == 1)
        {
            $("#codemsg").html('<font class="text-success">'+ $code +' Applied Successfully.</font>');
            order_summary();
        }
        else
        {
            $("#codemsg").html('<font class="text-danger">Sorry, Invalid Promocode.</font>'); 
        }
        
        $("#code").val('');           
    });
}


function order_summary()
{
    $path = base_url + 'backend/order_summary/';
    $.post($path,$data,function(output){
//        alert(output);
        $("#order_summary").html(output);            
    });
}

//status accept or cancel
function order_status(bill_id , status)
{
    if(confirm('Are You Sure Want To Perform This Action On Order ?'))
    {
        $data = {bill_id:bill_id, status:status};
        $path = base_url + 'backend/order_status/';
        $.post($path,$data,function(output){
//        alert(output);
        $("#example").html(output);
        });
    }
}


//user side review
function add_review(pid)
{
    var rate = $("#rate-value").val();
    var msg = $("#review-msg").val();
    
    
    
    if( rate == "" || msg == "")
    {
        $("#msg").html('<span class="text-danger">Please Select Rating And Enter Review Message.</span>');
    }
    else
    {
        $data = { rate:rate,msg:msg,pid:pid };
        $path = base_url + 'backend/add_review/';
        $.post($path,$data,function(output){
            if(output == 1)
            {
                $("#msg").html('<span class="text-success">Thank you for giving your rating.</span>');
                $("#rate-value").val();
                $("#review-msg").val();
            }
        });
    }   
}


function product_data(action, id, limit)
{
//    var c = 0;
//    
//    $("#product-data").html("<div class='text-center'><h1 style='color:#ddd;'>Search A Product...</h1></div>");
//
//    
//    var cc = setInterval( function(){
//        c++;
//        if(c == 1)
//        {
//            clearInterval(cc);
//            
//            $data = { action:action,id:id,limit:limit};
//            $path = base_url + 'backend/product_data/';
//            $.post($path,$data,function(output){
//    //                alert(output);
//            $("#product-data").html(output);
//        });
//       }
//    }, 1000);
//     
}

function product_data(action,id,limit)
{
    $filter_data = $("#filter-data").serializeArray();
    
    
    $data = { action:action,id:id,limit:limit, filter_data:$filter_data };
            $path = base_url + 'backend/product_data/';
            $.post($path,$data,function(output){
//                    alert(output);
            $("#product-data").html(output);
        });
}



function search_enter(event) 
{
   var search_value = $("#transcript").val();

   var encoded = encodeURIComponent(search_value).replace(/%20/g, "-");

   if (event.keyCode == 13) 
   {
      $url = base_url + 'collection/search/' + encoded;
      window.location.href = $url;


  }
}
