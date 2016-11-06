$(document).ready(function(){
    $('header li').hover(function(){
        var margin = $(this).offset();
        var objWidth = $(this).outerWidth();
        $('.header-underline').css({"left" : margin.left+objWidth/4,"width": objWidth/2+"px"});
    });

    $('.props-item-line').on('click','header', function(){
        $(this).parent().toggleClass('active');
    })
})