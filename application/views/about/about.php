<section class="props-section">
    <div class="page-container">
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
                            <?php if (is_array($competitiveItem)){?>
                                <p><?php echo $competitiveItem['competition'] ?></p>
                            <?php } ?>
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
                <h2>STEM</h2>
            </div>
            <section class="props-content">
                <h2>Робототехнікa Open Data</h2>
            </section>
        </div>
        <div class="props-item">
            <div class="picture-block">
                <figure>
                    <img src="/front-core/images/semi.jpg" alt="Семінари ">
                </figure>
                <h2>Семінари та майстер класи</h2>
            </div>
            <section class="props-content">
                <h2>GameHub(навчання створення ігр) Інше</h2>
            </section>
        </div>
    </div>
</section>