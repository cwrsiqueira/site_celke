<?php
if (!empty($this->data['contact'][0])) :
    extract($this->data['contact'][0]);
?>
    <section class="contact" style="background: linear-gradient(to right, var(--main-color) 25%, rgba(255, 255, 255, 0)), url('<?= URL; ?>app/sts/assets/images/contact/<?= $bg_img_contact; ?>') no-repeat center; background-size: cover; background-attachment: fixed;">
        <div class="max-width">
            <h2 class="title"><?= $title_contact; ?></h2>
            <div class="contact-content">
                <div class="column left">
                    <p>
                        <?= $desc_contact; ?>
                    </p>
                    <div class="icons">
                        <div class="row">
                            <i class="<?= $icon_company; ?>"></i>
                            <div class="info">
                                <div class="head">
                                    <?= $title_company; ?>
                                </div>
                                <div class="sub-title">
                                    <?= $desc_company; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="<?= $icon_address; ?>"></i>
                            <div class="info">
                                <div class="head">
                                    <?= $title_address; ?>
                                </div>
                                <div class="sub-title">
                                    <?= $desc_address; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="<?= $icon_email; ?>"></i>
                            <div class="info">
                                <div class="head">
                                    <?= $title_email; ?>
                                </div>
                                <div class="sub-title">
                                    <?= $desc_email; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column right">
                    <div class="text">
                        <?= $title_form; ?>
                    </div>
                    <?php if (!empty($_SESSION["msg"])) {
                        echo $_SESSION["msg"];
                        unset($_SESSION['msg']);
                    }
                    ?>

                    <?php if (!empty($_SESSION["errors"])) {
                        $errors = $_SESSION['errors'];
                        unset($_SESSION['errors']);
                        echo "<ul class='alert-danger'>";
                        foreach ($errors as $key => $data) {
                            echo "<li>" . $data['msg'] . "</li>";
                        }
                        echo "</ul>";
                    }
                    ?>
                    <form method="post">
                        <div class="fields">
                            <div class="field name">
                                <input required type="text" name="name" id="name" placeholder="Nome completo" value="<?= $this->data['form']['name'] ?? ''; ?>" class="<?= ($errors['name']) ?? '' ? 'is_invalid' : ''; ?>">
                            </div>
                            <div class="field email">
                                <input required type="email" name="email" id="email" placeholder="Seu melhor e-mail" value="<?= $this->data['form']['email'] ?? ''; ?>" class="<?= ($errors['email']) ?? '' ? 'is_invalid' : ''; ?>">
                            </div>
                        </div>
                        <div class="field">
                            <input required type="text" name="subject" id="subject" placeholder="Assunto do e-mail" value="<?= $this->data['form']['subject'] ?? ''; ?>" class="<?= ($errors['subject']) ?? '' ? 'is_invalid' : ''; ?>">
                        </div>
                        <div class="field textarea">
                            <textarea required name="content" id="content" cols="30" rows="10" placeholder="Conteúdo do e-mail" class="<?= ($errors['content']) ?? '' ? 'is_invalid' : ''; ?>"><?= $this->data['form']['content'] ?? ''; ?></textarea>
                        </div>
                        <div class="button-area">
                            <button type="submit" name="addContMsg" value="Enviar">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php else : ?>
    <section class="not-found">
        <p>Dados Página Contato não encontrados.</p>
    </section>
<?php endif; ?>