<?php
if (!empty($this->data['footer'][0])) :
    extract($this->data['footer'][0]);
?>
    <footer>
        <span><?= $footer_desc; ?> <a href="<?= $footer_link; ?>" target="_blank"><?= $footer_text; ?></a></span>
    </footer>
<?php else : ?>
    <section class="not-found">
        <p>Dados Rodapé não encontrados.</p>
    </section>
<?php endif; ?>

<script src="<?= URL; ?>app/sts/assets/js/custom.js"></script>
</body>

</html>