<section>
    <div class="news-item full">
        <header>
            <img src="<?=$event['img']?>" >
        </header>
        <article>
            <header>
                <h2>
                    <a href="/event/<?=$event['id']?>">
                        <?=$event['title']?>
                    </a>
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
            <?php foreach ($userReq as $key => $uEventId):
                    if($uEventId == $event['id']):?>
                    <div class="cancel-event main-button" data-event-id="<?=$event['id']?>">Відписатись</div>
                <?php else:?>
                <div class="sign-up-event main-button" data-event-id="<?=$event['id']?>">Записатись</div>
                    <?php endif;
                endforeach;?>
            </footer>
        </article>
    </div>
</section>