jQuery.noConflict();
(function( $ ) {
  $(function() {
  
$(document).ready(function() {
    $(".gs_pin_wrap tr:nth-child(4) select option:nth-child(n+2)").attr('disabled','disabled');
    $(".gs_pin_wrap tr:nth-child(7) select option:nth-child(n+3)").attr('disabled','disabled');
});

});
})(jQuery);