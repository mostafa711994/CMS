
tinymce.init({selector:'textarea'});




$(document).ready(function(){

    $('#selectallboxs').click(function(event){

        if(this.checked){

            $('.checkboxs').each(function(){

                this.checked = true;

            });






        }else{
            $('.checkboxs').each(function(){

                this.checked = false;

            });
        }

    });


});

function loadUsersOnline(){

    $.get("function.php?onlineusers=result",function(data){


        $(".usersonline").text(data);

    });



}
setInterval(function(){

    loadUsersOnline();

},500);

