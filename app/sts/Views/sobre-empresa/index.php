<div class="container">
    <h1>Página Sobre Empresa</h1>
    <br><br>
    <?php if (!empty($this->data)) : ?>
        <?php foreach ($this->data as $item) : ?>
            <?php extract($item); ?>
            <img src="<?= URL; ?>assets/img/<?= $image; ?>" alt="foto" height="250">
            <h3><?= $title; ?></h3>
            <p><?= $description; ?></p>
            <br><br>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Nenhum registro encontrado.</p>
    <?php endif; ?>
</div>