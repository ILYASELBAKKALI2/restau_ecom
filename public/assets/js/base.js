
$(Document).ready(function(){

    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:20,
        nav:true,
        dots:false,
        navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }
    });

        $('.close').on('click',function(){
            $('.alert').fadeOut();
        });

        $(".button_quantity").on("click", function() {

            var $button = $(this);
            var oldValue = $button.parent().find("input").val();
          
            if ($button.text() == "−") {
                if (oldValue > 1) {
                    var newVal = parseFloat(oldValue) - 1;
                }else{
                    newVal = 1; 
                }
            }
            else {
             // Don't allow decrementing below zero  
                var newVal = parseFloat(oldValue) + 1;
            }
            $button.parent().find("input").val(newVal);
            
          });

          

});




   







