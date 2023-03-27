<?= $render('head'); ?>

<body class="body">
    <div class="container h-100 d-flex">

        <form method="post" action="<?= $base; ?>/login" class="m-auto">

            <div class="content-input d-flex flex-column w-100 justify-content-center">
                <div class="fita-lateral">
                    <div id="faixa-diagonal"><span>Formulário</span></div>
                </div>
                <div class="img-logo w-100">
                    <img src="<?= $base; ?>/assets/img/atma-03.png" alt="Logo Atâma Digital" width="300">
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    <label for="email">E-mail</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Password">
                    <label for="senha">Senha</label>
                </div>
                <div class="btn-submit d-flex w-100 justify-content-center">
                    <button type="submit" class="btn btn-login">Entrar</button>
                </div>
                <?php if (!empty($flash)) : ?>
                    <?php echo '<div class="msg-flash">';
                    echo $flash;
                    echo '</div>'; ?>
                <?php endif; ?>
            </div>

        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>