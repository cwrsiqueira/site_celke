<div class="container">
    <h1>Entre em contato</h1>

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
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" placeholder="Nome completo" value="<?= $this->data['form']['name'] ?? ''; ?>" class="<?= ($errors['name']) ? 'is_invalid' : ''; ?>">
        <div class="<?= ($errors['name']) ? 'required_field' : 'hidden'; ?>">Campo obrigatório.</div>

        <label for=" email">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="Seu melhor e-mail" value="<?= $this->data['form']['email'] ?? ''; ?>" class="<?= ($errors['email']) ? 'is_invalid' : ''; ?>">
        <div class="<?= ($errors['email']) ? 'required_field' : 'hidden'; ?>">Campo obrigatório.</div>

        <label for="subject">Assunto:</label>
        <input type="text" name="subject" id="subject" placeholder="Assunto do e-mail" value="<?= $this->data['form']['subject'] ?? ''; ?>" class="<?= ($errors['subject']) ? 'is_invalid' : ''; ?>">
        <div class="<?= ($errors['subject']) ? 'required_field' : 'hidden'; ?>">Campo obrigatório.</div>

        <label for="content">Conteúdo:</label>
        <textarea name="content" id="content" cols="30" rows="10" placeholder="Conteúdo do e-mail" class="<?= ($errors['content']) ? 'is_invalid' : ''; ?>"><?= $this->data['form']['content'] ?? ''; ?></textarea>
        <div class="<?= ($errors['content']) ? 'required_field' : 'hidden'; ?>">Campo obrigatório.</div>

        <input class="bg-info" name="addContMsg" type="submit" value="Enviar">
    </form>
</div>