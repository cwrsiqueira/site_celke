<section class="about">
    <div class="max-width">
        <h2 class="title">Sobre Empresa</h2>

        <?php if (!empty($this->data['sobre'])) : ?>
            <?php foreach ($this->data['sobre'] as $item) :
                extract($item);
            ?>
                <div class="about-content">
                    <div class="column left">
                        <img src="<?= URL; ?>app/sts/assets/images/about/<?= $about_img; ?>" alt="Sobre Empresa">
                    </div>
                    <div class="column right">
                        <div class="text">
                            <?= $about_title; ?>
                        </div>
                        <p>
                            <?= $about_desc; ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <section class="not-found">
                <p>Dados Sobre Empresa não encontrados.</p>
            </section>
        <?php endif; ?>
    </div>
</section>