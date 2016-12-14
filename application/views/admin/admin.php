<section>
    <div class="admin-content">
        <h3>Заявки, що очікують розгляду</h3>
        <table class="ui blue table">
            <thead>
            <tr>
                <th>№</th>
                <th>Назва заходу</th>
                <th>ПІБ Учасника</th>
                <th>Категорія</th>
                <th>Функції</th>
            </tr>
            </thead>
            <tbody>
            <?foreach ($events as $event): ?>
            <tr>
                <td><?=$event['id']?></td>
                <td><?=$event['event']['title']?></td>
                <td><?=$event['user']['fio']?></td>
                <td><?=$event['event']['category']?></td>
                <td>
                    <div class="ui green button accept-participant" data-participant-id="<?=$event['id']?>">
                        Підтвердити
                    </div>
                    <div class="ui red button cancel-participant" data-participant-id="<?=$event['id']?>">
                        Відхилити
                    </div>
                </td>
            </tr>
            <? endforeach;?>
            </tbody>
        </table>
    </div>
</section>
