<section >
    <div class="events-container">
        <? foreach ($events as $event):?>
        <div class="news-item account" data-new-id="<?=$event['event_id']?>">
                <article>
                    <header>
                        <h2>
                            <a href="/event/<?=$event['event_id']?>">
                                <?=$event['event']['title']?>
                            </a>
                        </h2>
                    </header>
                    <p>
                        <label>Статус заявки : <?=$event['condition']?></label>
                    </p>
                    <footer>
                        <ul>
                            <li>Категория: <?=$event['event']['category']?>  </li>
                            <li>Залишилось місць: <?=$event['event']['quantity']?>  </li>
                            <li>Дата та час проводження: <?=$event['event']['date_of_start']?> </li>
                        </ul>
                    </footer>
                </article>
                <div class="close-icon delete-new"></div>
        </div>
        <? endforeach;?>
    </div>
</section>