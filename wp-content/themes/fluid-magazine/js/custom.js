jQuery(document).ready(function($){
        
    var mns, hdr, mn, h, slider_auto, slider_animation, rtl, mrtl;
    
    $('.banner').imagesLoaded( function() {
        mns = "sticky";
        hdr = $('.banner').height();
        mn  = $(".site-header .header-t");
        h   = mn.height();
        $(window).scroll(function() {
            if( $(this).scrollTop() > hdr ) {
                mn.addClass(mns);
                 $('.sticky-holder').css('height', h);    
                    } else {
                mn.removeClass(mns);
                 $('.sticky-holder').css('height', 0);    
            }
        });
    });
     
    /** Variables from Customizer for Slider settings */
    if( fluid_magazine_data.auto == '1' ){
        slider_auto = true;
    }else{
        slider_auto = false;
    }

    if( fluid_magazine_data.animation == "slide" ){
        slider_animation = '';
    }else{
        slider_animation = 'fadeOut';
    }
    if (fluid_magazine_data.rtl == '1') {
        rtl = true;
        mrtl = false;
    } else {
        rtl = false;
        mrtl = true;
    }

    console.log( slider_animation );
    $("#banner-slider").owlCarousel({
        items: 1,
        nav : true,
        autoplay : slider_auto,
        autoplayHoverPause : true,
        rewind : true,
        dots : false,
        lazyLoad : true,
        mouseDrag : false,
        autoplayTimeout :  fluid_magazine_data.speed,  
        autoplaySpeed :  fluid_magazine_data.a_speed,
        animateOut : slider_animation,
        rtl        : rtl,

   });
   
    $('.post-slider').owlCarousel({
        items      : 1,
        animateOut    :'',
        loop       : true,
        nav        : true,
        lazyLoad   : true,
        mouseDrag  : false,
        rtl          : rtl
    });

    $(".btn-down").click(function() {
        $('html, body').animate({
            scrollTop: $("#next-section").offset().top
        }, 1000);
    });

    if( ( $('.page-template-template-home').length > 0 ) || ( $('.archive').length > 0 ) ){        
        $('.featured-post').imagesLoaded(function(){ 
            $('.featured-post').masonry({
        		itemSelector: '.post',
        		columnWidth: '.grid-sizer',
                percentPosition: true,
                isOriginLeft: mrtl
        	});
        });
    }

    $('#responsive-menu-button').sidr({
        name: 'sidr-main',
        source: '#site-navigation',
        side: 'right'
    });

    // search form
    $('html').click(function() {
        $('.form-holder').hide(); 
    });

    $('.form-holder').click(function(event){
        event.stopPropagation();
    });
    $(".btn-search").click(function(){
        $(".form-holder").slideToggle();
        return false;
    });

    /* Equal Height */
    $('.top-stories .col .text-holder .entry-content').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
    });

});