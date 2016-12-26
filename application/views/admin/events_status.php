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
                    <a class="ui green button accept-participant" href="/approve-request/<?=$dec['id']?>">
                        Підтвердити
                    </a>
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
                <td class="control-buttons">
                    <a class="ui red button accept-participant" href="/decline-request/<?=$approv['id']?>">
                       Відмовити
                    </a>
                </td>
            </tr>
            <? endforeach;?>
            </tbody>
        </table>
    </div>
</section>
