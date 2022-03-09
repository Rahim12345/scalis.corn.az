
$(document).ready(function(){
    $(".menus-item").click(function(){
        $(".cat-two").css("display","block");
    })
    
});
 const headingTop = document.getElementById("headingTop");
function change_text(){
    headingTop.innerHTML = "Mebel Materialları";
}
function change_text2(){
    headingTop.innerHTML = "Mebel mexanizim və aksesuarları";
}
function change_text3(){
    headingTop.innerHTML = "Təmir və dekorasiya";
}
function change_text4(){
    headingTop.innerHTML = "Qida";
}



