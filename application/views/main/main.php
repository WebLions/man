<section>
    <?php
    foreach ($events as $event):?>
                <div class="news-item">
                    <header>
                        <img src="<?= $event['img'] ?>">
                    </header>
                    <article>
                        <header>
                            <h2>
                                <a href="/event/<?= $event['id'] ?>">
                                    <?= $event['title'] ?>
                                </a>
                            </h2>
                        </header>
                        <p>
                            <?= $event['short_text'] ?>
                        </p>
                        <footer>
                            <ul>
                                <li>Категория: <?= $event['category'] ?></li>
                                <li>Залишилось місць: <?= $event['quantity'] ?></li>
                                <li>Дата та час проводження: <?= $event['date_of_start'] ?></li>
                            </ul>
                            <?php
                            if(checkAuth()):
                            if($userReq):
                              foreach ($userReq as $key => $uEventId):
                                  if ($uEventId == $event['id']):?>
                                      <div class="cancel-event main-button" data-event-id="<?= $event['id'] ?>">Відписатись</div>
                            <?php else: ?>
                                      <div class="sign-to-event main-button" data-event-id="<?= $event['id'] ?>">Записатись</div>
                            <?php endif ?>
                              <?php endforeach?>
                            <?php endif ?>
                            <?php else: ?>
                            <div class="sign-up-event" data-event-id="<?= $event['id'] ?>">Записатись</div>
                            <?php endif ?>
                        </footer>
                    </article>
                </div>
        <?php endforeach;?>
</section>


