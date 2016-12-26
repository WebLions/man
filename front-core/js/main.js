$(document).ready(function(){

    var getIsAuth = $('head').attr('data-isAuth');
    var getActivePage = $('head').attr('data-active-page');


    console.log($('#'+getActivePage));
    $('.user-dynamic').empty();

    if(getIsAuth == 1){
        $('.user-dynamic').append(
        '<li id="account">'+
            '<a href="/account">'+
                'Особистий кабінет'+
            '</a>'+
        '</li>'+
        '<li>'+
            '<a href="/user/logout">'+
                'Вийти'+
            '</a>'+
        '</li>'
        );
    }else{
        $('.user-dynamic').append(
        '<li class="sign-in">' +
            'Увійти' +
        '</li>'+
        '<li class="sign-up">'+
            'Зареєструватися'+
        '</li>'
        );
    }

    $('#'+getActivePage).addClass('active');
    
    $('header li').hover(function(){
        var margin = $(this).offset();
        var objWidth = $(this).outerWidth();
        $('.header-underline').css({"left" : margin.left+objWidth/4,"width": objWidth/2+"px"});
    });

    $('.props-item-line').on('click','header', function(){
        $(this).parent().toggleClass('active');
    });

    $('body').on('click','.close', function(){
        $('.form-overlay').removeClass('show');
        $('.success-overlay').removeClass('show');
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
            $(this).parent().attr('action','/user/login');
            $(this)
                .attr('data-modal-type','user')
                .text('Адмін. панель');
            $('#loginType')
                .prop('type', 'e-mail')
                .prop('name', 'login')
                .prop('placeholder', 'Введіть Вашу пошту');

        }else{
            $('.modal-title').text('Адмін. панель');
            $(this).parent().attr('action','/user/admin_login');
            $(this)
                .attr('data-modal-type','admin')
                .text('Особистий кабінет');
            $('#loginType')
                .prop('type', 'text')
                .prop('name', 'login')
                .prop('placeholder', 'Введіть Ваш логін');
        }
    });

    var getId;

    $('.delete-new').click(function(){
        getId = $(this).parent().attr('data-new-id');
        $('.success-overlay').addClass('show');
        $('.buttons-container').html(" ");
        $('#successText').text('Ви упевнені що хочете відізвати заявку?');
        $('.buttons-container').append(
            '<div class="button cancel-event">Так</div>'+
            '<div class="button close">Ні</div>'
        );
    });

    $('body').on('click','.cancel-event', function(){
        getId = $(this).attr('data-event-id');
        var link = '/cancel-user-req';
        $.ajax({
            type: "POST",
            url: link,
            data: {id : getId},
            success: function () {
                $('.success-overlay').addClass('show');
                $('.buttons-container').html(" ");
                $('#successText').text('Заявка була відізвана');
                location.reload();
            }
        });
    });
    $('.sign-to-event').click(function () {
        getId = $(this).attr('data-event-id');
        var link = '/send_ticket';

        if(getIsAuth == 1){
            $.ajax({
                type: "POST",
                url: link,
                data: {event_id : getId},
                success: function () {
                    $('.success-overlay').addClass('show');
                    $('#successText').text('Ви успішно зареєструвалися');
                    location.reload();
                }
            });
        }else{
            $('#signUp').toggleClass('show');
        }

    });
    $('.close-icon').click(function(){
        $(this).closest('.form-overlay').removeClass('show');
    });
    $('.already-sign-in').click(function(){
        $(this).closest('.form-overlay').removeClass('show');
        $('#signIn').toggleClass('show');
    });


});