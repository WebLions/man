<section>
    <div class="admin-content">
        <h3>Заявки, що очікують розгляду</h3>
        <table class="ui blue table">
            <thead>
            <tr>
                <th>№</th>
                <th>Назва заходу</th>
                <th>ПІБ</th>
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
                <td class="control-buttons">
                    <a class="ui green button accept-participant" href="/approve-request/<?=$event['id']?>">
                        Підтвердити
                    </a>
                    <a class="ui red button cancel-participant" href="/decline-request/<?=$event['id']?>">
                        Відхилити
                    </a>
                </td>
            </tr>
            <? endforeach;?>
            </tbody>
        </table>
    </div>
</section>
