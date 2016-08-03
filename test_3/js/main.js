$(document).ready(function(){

// Add dynamic hobby fields
$("form a").click(function(){

    var count = $("#hobbies-wrapper input").length + 1;

    if (count < 5) {
        $("#hobbies-wrapper").append("<input type='text' name='hobby" + count + "' id='hobbies-list'><br>");

    }

});

// Post dynamic fields to form-handler.php
$("form").submit(function(){
    console.log("submitted");

    $.ajax({
        url: "form-handler.php",
        method: "POST",
        data:$('#registration').serialize(),
        success: function(response){
         console.log("123");
     }
 })

});

$("form").submit(function(){
    alert('submit intercepted');
e.preventDefault();



});

});
