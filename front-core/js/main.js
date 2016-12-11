$(document).ready(function(){
    
    $('header li').hover(function(){
        var margin = $(this).offset();
        var objWidth = $(this).outerWidth();
        $('.header-underline').css({"left" : margin.left+objWidth/4,"width": objWidth/2+"px"});
    });

    $('.props-item-line').on('click','header', function(){
        $(this).parent().toggleClass('active');
    })
    $('body').on('click','.close', function(){
        $('.form-overlay').removeClass('show');
        $('.success-overlay').removeClass('show');
    })

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
    });

    var newItemId;

    $('.delete-new').click(function(){
        newItemId = $(this).parent().attr('data-new-id');
        $('.success-overlay').addClass('show');
        $('.button').html(" ");
        $('#successText').text('Ви упевнені що хочете відізвати заявку?');
        $('.success-form').append(
            '<div class="button delete-yes">Так</div>'+
            '<div class="button close">Ні</div>'
        );
    });

    $('body').on('click','.delete-yes', function(){
        var link = '/cancel_event';
        $.ajax({
            type: "POST",
            url: link,
            data: newItemId,
            success: function () {
                $('.button').html(" ");
                $('#successText').text('Заявка була відізвана');
            }
        });
    });
    $('.sign-up-event').click(function () {
        var getId = $(this).attr('data-event-id');
        var link = '/send_ticket';
        $.ajax({
            type: "POST",
            url: link,
            data: getId,
            success: function () {
                $('.success-overlay').addClass('show');
                $('#successText').text('Ви успішно зареєструвалися');
            }
        });
    });


});