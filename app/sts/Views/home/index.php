<?php
if (!empty($this->data['top'][0])) :
    extract($this->data['top'][0]);
?>
    <section class="top" style="background: linear-gradient(to right, var(--main-color) 25%, rgba(255, 255, 255, 0)), url('<?= URL; ?>app/sts/assets/images/home_top/<?= $image_top; ?>') no-repeat center; background-size: cover; background-attachment: fixed;">
        <div class="max-width">
            <div class="top-content">
                <div class="text-1"><?= $title_top_one; ?></div>
                <div class="text-2"><?= $title_top_two; ?></div>
                <div class="text-3"><?= $title_top_three; ?></div>
                <a href="<?= URL . $link_btn_top; ?>"><?= $txt_btn_top; ?></a>
            </div>
        </div>
    </section>
<?php else : ?>
    <section class="not-found">
        <p>Dados Top não encontrados.</p>
    </section>
<?php endif; ?>

<?php
if (!empty($this->data['serv'][0])) :
    extract($this->data['serv'][0]);
?>
    <section class="services">
        <div class="max-width">
            <h2 class="title"><?= $serv_title; ?></h2>
            <div class="serv-content">
                <div class="card">
                    <div class="box">
                        <i class="<?= $serv_icon_one; ?>"></i>
                        <div class="text"><?= $serv_title_one; ?></div>
                        <p><?= $serv_desc_one; ?></p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="<?= $serv_icon_two; ?>"></i>
                        <div class="text"><?= $serv_title_two; ?></div>
                        <p><?= $serv_desc_two; ?></p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="<?= $serv_icon_three; ?>"></i>
                        <div class="text"><?= $serv_title_three; ?></div>
                        <p><?= $serv_desc_three; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php else : ?>
    <section class="not-found">
        <p>Dados Serviços não encontrados.</p>
    </section>
<?php endif; ?>

<?php
if (!empty($this->data['prem'][0])) :
    extract($this->data['prem'][0]);
?>
    <section class="premium">
        <div class="max-width">
            <h2 class="title"><?= $prem_title; ?></h2>
            <div class="premium-content">
                <div class="column left">
                    <img src="<?= URL; ?>app/sts/assets/images/home_prem/<?= $prem_img; ?>" alt="Serviço Premium">
                </div>
                <div class="column right">
                    <div class="text">
                        <?= $prem_subtitle; ?>
                    </div>
                    <p>
                        <?= $prem_desc; ?>
                    </p>
                    <a href="<?= URL . $prem_link_btn; ?>"><?= $prem_txt_btn; ?></a>
                </div>
            </div>
        </div>
    </section>
<?php else : ?>
    <section class="not-found">
        <p>Dados Premium não encontrados.</p>
    </section>
<?php endif; ?>