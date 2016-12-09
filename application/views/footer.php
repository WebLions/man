    </main>
    <div class="form-overlay">
        <div class="form-container">
            <header>Реєстрація</header>
            <form action="/">
                <article>
                    <input name="name" type="text" placeholder="Введіть своє ім'я">
                    <input name="e-mail" type="email" placeholder="E-mail">
                    <input name="password" type="password" placeholder="Пароль">
                    <select name="lid-type">
                        <option value="" disabled selected>Оберіть Ваш статус</option>
                        <option>Учень</option>
                        <option>Вчитель</option>
                    </select>
                    <select name="path-type">
                        <option value="" disabled selected>Оберіть сферу діяльності</option>
                        <option>Конкурси МАН</option>
                        <option>STEM</option>
                        <option>Семінари та майстер класи</option>
                    </select>
                </article>
                <input class="sign-up-event" type="submit" value="Зареєструватися">
            </form>
            <div class="close-icon"></div>
        </div>
    </div>
</body>
<script src="/front-core/js/main.js" type="text/javascript"></script>
<script>
    $('#propsSlider').bxSlider({
        mode: 'fade',
        captions: true
    });
</script>
</html>