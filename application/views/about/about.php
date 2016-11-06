<main>
    <section class="picture-section">
        <img src="/front-core/images/about.png"/>
    </section>
    <section class="props-section">
        <header class="section-title">
            <h2 class="main-font">Сфери діяльності</h2>
        </header>
        <div class="props-container">
            <div class="props-item">
                <div class="picture-block">
                    <figure>
                        <img src="/front-core/images/conc.jpg" alt="Конкурси ">
                    </figure>
                    <h2>Конкурси МАН</h2>
                </div>
                <section class="props-content">
                    <?php foreach ($this->data['competitive_list'] as $competitiveArray):?>
                        <div class="props-item-line">
                            <header>
                                <p><?=$competitiveArray['competition']?> <p>
                                <i><img src="/front-core/images/arrow.png"></i>
                            </header>
                            <article>
                            <?php foreach($competitiveArray as $competitiveItem):?>
                                    <p><?php if (is_array($competitiveItem))echo $competitiveItem['competition'] ?></p>
                            <? endforeach;?>
                            </article>
                        </div>
                    <? endforeach;?>
                </section>
            </div>
            <div class="props-item">
                <div class="picture-block">
                    <figure>
                        <img src="/front-core/images/stem.jpg" alt="STEM">
                    </figure>
                    <h2>Конкурси МАН</h2>
                </div>
                <section class="props-content">
                    <h2>Робототехнікa<br>Open Data</h2>
                </section>
            </div>
            <div class="props-item">
                <div class="picture-block">
                    <figure>
                        <img src="/front-core/images/semi.jpg" alt="Семінари ">
                    </figure>
                    <h2>Конкурси МАН</h2>
                </div>
                <section class="props-content">
                    <h2>GameHub(навчання створення ігр)<br>Інше</h2>
                </section>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <header class="section-title">
                <h2 class="main-font">Подайте заявку прямо зараз!</h2>
            </header>
            <div class="section-button-block">
                <div class="section-button section-button-main">Хочу прийняти участь!</div>
                <div class="section-button section-button-main">Хочу навчати!</div>
            </div>
        </div>
    </section>

</main>