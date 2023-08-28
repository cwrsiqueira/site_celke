<?php
if (!empty($this->data[0])) {
    extract($this->data[0]);
}
?>
<div class="container">
    <h1>Página Home</h1>
    <ul>
        <li>ID: <?= $id; ?></li>
        <li>Título: <?= $title_top; ?></li>
        <li>Descrição: <?= $description_top; ?></li>
        <li>Link do botão: <?= $link_btn_top; ?></li>
        <li>Texto do botão: <?= $txt_btn_top; ?></li>
        <li>Nome da Imagem: <?= $image; ?></li>
    </ul>
</div>