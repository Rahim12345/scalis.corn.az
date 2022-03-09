window.addEventListener("load",()=>{
    document.querySelector(".preload").classList.add("non");
 
	setTimeout(function(){
		document.querySelector(".preload").style.display="none";
       
	},1500);
});


$(function () {

    "use strict";
    $(window).on("scroll",function(){
        if($(this).scrollTop()>20){
            $('.header-up').addClass('none');
            
            $('.fixedTop').addClass('sticky-header');
        }
        else{
            $('.header-up').removeClass('none');
            $('.fixedTop').removeClass('sticky-header');
        }
    });
   

    $( ".navbar-toggler").click(function(e) {
        e.preventDefault();
        $(".header-right-side").toggleClass("header-active");
    });
  
    const navToggler = document.querySelector(".navbar-toggler");
    navToggler.addEventListener("click",toggleNav);

    function toggleNav(){
        navToggler.classList.toggle("active");
    };

    $("#doubleCarousel").owlCarousel({
        navigation : true, // Show next and prev buttons
     // navigationText: ["prev","next"], 
        navigationText: [
             "<i class='fa fa-angle-left'></i>",
             "<i class='fa fa-angle-right'></i>"
             ],
         slideSpeed : 300,
         paginationSpeed : 400,
         autoPlay: true,  
         pagination: false,
         loop:true,
         items : 5,
         center:true,
         itemsDesktop:[1199,4],  
         itemsDesktopSmall:[979,4],  //As above.
         itemsTablet:[768,4],    //As above.
         // itemsTablet:[640,2],   
         itemsMobile:[479,1],    //As above
         goToFirst: true,    //Slide to first item if autoPlay reach end
         goToFirstSpeed:1000  
             
     })

     

});
wow = new WOW({
    animateClass: 'animated',
    offset: 100
});
wow.init();

const showOnPx = 70;
const backToTopButton = document.querySelector(".back-to-top");
const pageProgressBar = document.querySelector(".progress-bar");

const scrollContainer = () => {
  return document.documentElement || document.body;
};

const goToTop = () => {
  document.body.scrollIntoView({
    behavior: "smooth"
  });
};

document.addEventListener("scroll", () => {
  if (scrollContainer().scrollTop > showOnPx) {
    backToTopButton.classList.remove("hidden");
  } else {
    backToTopButton.classList.add("hidden");
  }
});

backToTopButton.addEventListener("click", goToTop);
