<section>
    <div class="news-item full">
        <header>
            <img src="<?=$event['img']?>" >
        </header>
        <article>
            <header>
                <h2>
                        <?=$event['title']?>
                </h2>
            </header>
            <p>
                <?=$event['full_text']?>
            </p>
            <footer>
                <ul>
                    <li>Категория:  <?=$event['category']?></li>
                    <li>Залишилось місць:  <?=$event['quantity']?></li>
                    <li>Дата та час проводження: <?=$event['date_of_start']?></li>
                </ul>
                <?php $signed = null;
                if(checkAuth()) {
                    foreach ($userReq as $key => $uEventId) {
                        if ($uEventId == $event['id']) {
                            $signed = true;
                        }
                    }
                }
                if($signed):?>
                    <div class="cancel-event main-button" data-event-id="<?=$event['id']?>">Відписатись</div>
                <?php else:?>
                    <div class="sign-to-event main-button" data-event-id="<?=$event['id']?>">Записатись</div>
                <?php endif;?>
            </footer>
        </article>
    </div>
</section>