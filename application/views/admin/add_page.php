<section>
    <div class="admin-content">
        <h3>Додавання заходу</h3>
        <form class="ui form add-form" method="post" action="/add-event">
            <div class="field">
                <label>Назва заходу</label>
                <input type="text" name="title" placeholder="Назва заходу">
            </div>
            <div class="field">
                <label>Дата та час проведення</label>
                <input type="text" name="date_of_start" placeholder="Дата та час проведення">
            </div>
            <div class="field">
                <label>Короткий опис</label>
                <textarea type="text" name="short_text" placeholder="Короткий опис"></textarea>
            </div>
            <div class="field">
                <label>Повний опис</label>
                <textarea type="text" name="full_text" placeholder="Повний опис"></textarea>
            </div>
            <select class="ui fluid search dropdown" name="category_id">
                <?php foreach ($categories as $category):?>
                    <option value="<?=$category['id']?>"><?=$category['category']?></option>
                <?php endforeach;?>
            </select>
            <div class="field">
                <label>Кількість місць</label>
                <input type="text" name="quantity" placeholder="Кількість місць">
            </div>
            <div class="field">
                <label>Кількість місць</label>
                <input type="text" name="img" placeholder="Посилання на зображення">
            </div>
            <button class="ui green button add-button">Створити</button>
        </form>
    </div>
</section>
