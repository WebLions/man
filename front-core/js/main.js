$(document).ready(function(){
    
    $('header li').hover(function(){
        var margin = $(this).offset();
        var objWidth = $(this).outerWidth();
        $('.header-underline').css({"left" : margin.left+objWidth/4,"width": objWidth/2+"px"});
    });

    $('.props-item-line').on('click','header', function(){
        $(this).parent().toggleClass('active');
    })
    $('.close-icon')
        .click(function(){
            $('.form-overlay').removeClass('show');
        });
    $('.sign-up')
        .click(function(){
            $('#signUp').toggleClass('show');
        });
    $('.sign-in')
        .click(function(){
            $('#signIn').toggleClass('show');
        });

    $('.change-modal').click(function () {
        if($(this).attr('data-modal-type') == 'admin'){
            $('.modal-title').text('Особистий кабінет');
            $(this).parent().attr('action','/user/admin_login');
            $(this)
                .attr('data-modal-type','user')
                .text('Адмін. панель');
            $('#loginType')
                .prop('type', 'e-mail')
                .prop('name', 'login')
                .prop('placeholder', 'Введіть Вашу пошту');

        }else{
            $('.modal-title').text('Адмін. панель');
            $(this).parent().attr('action','/user/login');
            $(this)
                .attr('data-modal-type','admin')
                .text('Особистий кабінет');
            $('#loginType')
                .prop('type', 'text')
                .prop('name', 'login')
                .prop('placeholder', 'Введіть Ваш логін');
        }
    })
});