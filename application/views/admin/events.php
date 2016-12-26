<section>
    <div class="admin-content">
        <h3>Список діючих заходів</h3>
        <table class="ui blue table">
            <thead>
            <tr>
                <th>№</th>
                <th>Назва заходу</th>
                <th>Дата</th>
                <th>Функції</th>
            </tr>
            </thead>
            <tbody>
            <? $i=1;
            foreach ($events as $event):?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$event['title']?></td>
                <td><?=$event['date_of_start']?></td>
                <td class="control-buttons">
                    <a class="ui blue button edit-event" href="/edit-event/<?=$event['id']?>">
                       Редагувати
                    </a>
                    <a class="ui red button delete-event" href="/delete-event/<?=$event['id']?>">
                        Видалити
                    </a>
                </td>
            </tr>
            <? endforeach;?>
            </tbody>
        </table>
        <a href="/add-event" class="ui blue button add-event">Додати захід</a>
    </div>
</section>
