<section>
    <?php foreach ($events as $event){?>
        <div class="news-item account">
            <article>
                <header>
                    <h2>
                        <a href="/event/<?=$event['id']?>">
                            <?=$event['title']?>
                        </a>
                    </h2>
                </header>
                <p>
                    Статус заявки :<?=$event['short_text']?>
                </p>
                <footer>
                    <ul>
                        <li>Категория:  <?=$event['category']?></li>
                        <li>Залишилось місць:  <?=$event['quantity']?></li>
                        <li>Дата та час проводження: <?=$event['date_of_start']?></li>
                    </ul>
                    <div class="sign-up-event" data-event-id="<?=$event['id']?>">Записатись</div>
                </footer>
            </article>
            <div class="close-icon close"></div>
        </div>
    <?php } ?>
</section>