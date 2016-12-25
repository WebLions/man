<section>
    <div class="admin-content">
        <h3>Додавання заходу</h3>
        <form class="ui form add-form" method="post" action="/admin/getEditEventData">
            <input type="text" name="id" value="<?=$event['id']?>" hidden>
            <div class="field">
                <label>Назва заходу</label>
                <input type="text" name="title" value="<?=$event['title']?>">
            </div>
            <div class="field">
                <label>Дата та час проведення</label>
                <input type="text" name="date_of_start" placeholder="Дата та час проведення" value="<?=$event['date_of_start']?>">
            </div>
            <div class="field">
                <label>Короткий опис</label>
                <textarea type="text" name="short_text" placeholder="Короткий опис"><?=$event['short_text']?></textarea>
            </div>
            <div class="field">
                <label>Повний опис</label>
                <textarea type="text" name="full_text" placeholder="Повний опис"><?=$event['full_text']?></textarea>
            </div>
            <select class="ui fluid search dropdown" name="category_id">
                <?php foreach ($categories as $category):?>
                <option value="<?=$category['id']?>" <?php if($category['id'] == $event['category_id']) echo 'selected'?>><?=$category['category']?></option>
                <?php endforeach;?>
            </select>
            <div class="field">
                <label>Кількість місць</label>
                <input type="text" name="quantity" value="<?=$event['quantity']?>">
            </div>
            <div class="field">
                <label>Кількість місць</label>
                <input type="text" name="img" value="<?=$event['img']?>">
            </div>
            <button class="ui green button add-button">Редагувати</button>
        </form>
    </div>
</section>
