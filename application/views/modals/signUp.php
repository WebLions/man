<div id="signUp" class="form-overlay">
    <div class="form-container">
        <header>Реєстрація</header>
        <form action="/user/sign_up" method="post">
            <article>
                <input name="fio" type="text" placeholder="Введіть своє ФІО">
                <input name="email" type="email" placeholder="E-mail">
                <input name="password" type="password" placeholder="Пароль">
                <select name="status_id">
                    <option disabled selected>Оберіть Ваш статус</option>
                    <option value="1">Учень школи</option>
                    <option value="2">Вчитель школи</option>
                    <option value="3">Студент университету</option>
                    <option value="4">Викладач університету</option>
                </select>
            </article>
            <input class="sign-up-event" type="submit" value="Зареєструватися">
        </form>
        <div class="close-icon"></div>
    </div>
</div>