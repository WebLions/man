<section>
    <div class="admin-content">
        <h3>Відхилені завки</h3>
        <table class="ui red table">
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
            <? foreach ($declined as $dec):?>
            <tr>
                <td><?=$dec['id']?></td>
                <td><?=$dec['event']['title']?></td>
                <td><?=$dec['user']['fio']?></td>
                <td><?=$dec['event']['category']?></td>
                <td>
                    <div class="ui green button accept-participant" data-participant-id="<?=$dec['id']?>">
                        Підтвердити
                    </div>
                </td>
            </tr>
            <? endforeach;?>
            </tbody>
        </table>
        <h3>Прийняті заявки</h3>
        <table class="ui green table">
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
            <? foreach ($approved as $approv): ?>
            <tr>
                <td><?=$approv['id']?></td>
                <td><?=$approv['event']['title']?></td>
                <td><?=$approv['user']['fio']?></td>
                <td><?=$approv['event']['category']?></td>
                <td>
                    <div class="ui red button accept-participant" data-participant-id="<?=$approv['id']?>">
                       Відмовити
                    </div>
                </td>
            </tr>
            <? endforeach;?>
            </tbody>
        </table>
    </div>
</section>
