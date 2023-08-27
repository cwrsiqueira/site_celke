<?php

use Sts\Models\helpers\HelpersFunctions;

echo "View da página Home<br><br>";

if (!empty($this->data[0])) {
    extract($this->data[0]);
    echo "ID: $id <br>";
    echo "Título: $title_top <br>";
    echo "Descrição: $description_top <br>";
    echo "Link do botão: $link_btn_top <br>";
    echo "Texto do botão: $txt_btn_top <br>";
    echo "Nome da Imagem: $image <br>";
} else {
    echo "<p style='color:orange;'>Alerta! Nenhum registro encontrado.</p>";
}
echo "<br><br>";
