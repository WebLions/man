<section>
    <?php foreach ($events as $event){?>
    <div class="news-item">
        <header>
            <img src="<?=$event['img']?>">
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
                <?=$event['short_text']?>
            </p>
            <footer>
                <ul>
                    <li>Категория:  <?=$event['category']?></li>
                    <li>Залишилось місць:  <?=$event['quantity']?></li>
                    <li>Дата та час проводження: <?=$event['date_of_start']?></li>
                </ul>
                <div class="sign-up-event">Записатись</div>
            </footer>
        </article>
    </div>
    <?php } ?>
</section>
