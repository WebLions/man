<div id="signIn" class="form-overlay">
    <div class="form-container">
        <header class="modal-title">Особистий кабінет</header>
        <form action="/user/login" method="post">
            <article>
                <input id="loginType" name="email" type="text" placeholder="E-mail">
                <input name="password" type="password" placeholder="Введіть пароль">
            </article>
            <input class="sign-in-event main-button" type="submit" value="Увійти">
            <span data-modal-type="user" class="change-modal" data-admin="/user/admin_login" data-user="/account">Адмін. панель</span>
        </form>
        <div class="close-icon"></div>
    </div>
</div>