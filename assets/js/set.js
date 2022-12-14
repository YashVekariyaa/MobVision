
//function delete_links(path) {
//    $url = base_url + 'delete/' + path;
//    $('#delete_links').attr('href', $url);
//    //    $url = base_url + 'delete/' + path;
//    //    $('#delete_link').attr('href' , $url);
//}

//4Password Hide Show
$("#iconw4").click(function () {
    if ($('#passw4').attr("type") == "text")
    {
        $('#passw4').attr("type", "password");
        $('#iconw4').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    } else
    {
        $('#passw4').attr("type", "text");
        $('#iconw4').removeClass('fa fa-eye-slash').addClass('fa fa-eye');

    }
});

//5Password Hide Show
$("#iconw5").click(function () {
    if ($('#passw5').attr("type") == "text")
    {
        $('#passw5').attr("type", "password");
        $('#iconw5').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    } else
    {
        $('#passw5').attr("type", "text");
        $('#iconw5').removeClass('fa fa-eye-slash').addClass('fa fa-eye');

    }
});

//6Password Hide Show
$("#iconw6").click(function () {
    if ($('#passw6').attr("type") == "text")
    {
        $('#passw6').attr("type", "password");
        $('#iconw6').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    } else
    {
        $('#passw6').attr("type", "text");
        $('#iconw6').removeClass('fa fa-eye-slash').addClass('fa fa-eye');

    }
});


//7 User Password Hide Show
$("#iconw7").click(function () {
    if ($('#passw7').attr("type") == "text") {
        $('#passw7').attr("type", "password");
        $('#iconw7').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    } else {
        $('#passw7').attr("type", "text");
        $('#iconw7').removeClass('fa fa-eye-slash').addClass('fa fa-eye');

    }
});

//8 User Password Hide Show
$("#iconw8").click(function () {
    if ($('#passw8').attr("type") == "text") {
        $('#passw8').attr("type", "password");
        $('#iconw8').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    } else {
        $('#passw8').attr("type", "text");
        $('#iconw8').removeClass('fa fa-eye-slash').addClass('fa fa-eye');

    }
});

//9 User Password Hide Show
$("#iconw9").click(function () {
    if ($('#passw9').attr("type") == "text") {
        $('#passw9').attr("type", "password");
        $('#iconw9').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    } else {
        $('#passw9').attr("type", "text");
        $('#iconw9').removeClass('fa fa-eye-slash').addClass('fa fa-eye');

    }
});


//User Profile Preview
document.getElementById('setPhoto').onchange = evt => {
    const [file] = document.getElementById('setPhoto').files;
    if (file) {
        $('#preview').show(500).attr('src', URL.createObjectURL(file));
    }
}


//function change_images( id )
//{
//    $data = { id: id};
//    $path = base_url + 'backend/change_images/';
//    $.post($path,$data,function(output){
////        alert(output);
//    $("#color_preview").html(output);
//    });
//}