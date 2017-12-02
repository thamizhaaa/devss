$(document).ready(function() {
    $(".search-bar").on('click', function() {
        $(".search-box").toggle("fade")
    });
    $("[data-toggle='tooltip']").tooltip();
    if ($(".bxslider").length) {
        $('.bxslider').bxSlider({
            mode: 'fade'
        });
    }
    if ($(".bxslider2").length) {
        $('.bxslider2').bxSlider({
            pagerCustom: '#bx-pager',
            mode: 'fade'
        });
    }
    if ($(".gallery").length) {
        $("a[rel^='prettyPhoto']").prettyPhoto();
    }
       
});
