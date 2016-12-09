<div id="signUp" class="form-overlay">
    <div class="form-container">
        <header>Реєстрація</header>
        <form action="/user/sign_up" method="post">
            <article class="qwer">
                <input name="fio" type="text" placeholder="Введіть своє ФІО">
                <input name="email" type="email" placeholder="E-mail">
                <input name="password" type="password" placeholder="Пароль">
                <select name="lid-type">
                    <option value="" disabled selected>Оберіть Ваш статус</option>
                    <option>Учень</option>
                    <option>Вчитель</option>
                </select>
            </article>
            <input class="sign-up-event" type="submit" value="Зареєструватися">
        </form>
        <div class="close-icon"></div>
    </div>
</div>