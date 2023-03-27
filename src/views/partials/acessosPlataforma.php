<?php global $acessoPlataforma; ?>

<section class="mt-3">

    <div class="row mb-3">
        <div class="col">
            <h4><strong>Acessos Plataforma</strong></h4>
        </div>
    </div>

    <form action="#" method="post" id="formAcessosPlataforma">

        <div class="row">
            <div class="col">
                <p>
                    Nessa etapa vamos precisar reunir todos os acessos que são necessários para garantir que o processo de criação de sua loja flua da maneira correta.
                </p>
                <p>
                    Caso você não tenha os acessos, basta nos pedir no WhatsApp que vamos lhe ajudar a encontrar para preencher corretamente.
                </p><br>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <h6><strong>Acesso Tray:</strong></h6>
                <p>
                    É provável que já tenha criado sua conta na Tray, caso não tenha e esteja com alguma dúvida, pode nos chamar que ficaremos felizes em lhe auxiliar.
                </p>

                <?php if ($acessoPlataforma['id_loja']) : ?>

                    <!-- CÓDIGO DA LOJA -->
                    <label for="cd-loja-tray" class="form-label">Código da Loja Tray</label>
                    <div class="d-flex align-items-center mb-3">
                        <input type="text" class="form-control onlyNumber" id="cd-loja-tray" name="cd-loja-tray" placeholder=" Digite sua resposta" autocomplete="off" value="<?= $acessoPlataforma['id_loja']; ?>" required>
                    </div>

                <?php else : ?>

                    <!-- CÓDIGO DA LOJA -->
                    <label for="cd-loja-tray" class="form-label">Código da Loja Tray</label>
                    <div class="d-flex align-items-center mb-3">
                        <input type="text" class="form-control onlyNumber" id="cd-loja-tray" name="cd-loja-tray" placeholder=" Digite sua resposta" autocomplete="off" required>
                    </div>

                <?php endif; ?>

                <?php if ($acessoPlataforma['email_acesso']) : ?>

                    <!-- EMAIL DE ACESSO -->
                    <label for="email-acesso-tray" class="form-label">E-mail de Acesso a Tray</label>
                    <div class="d-flex align-items-center mb-3">
                        <input type="text" class="form-control" id="email-acesso-tray" name="email-acesso-tray" placeholder="Digite sua resposta" autocomplete="off" value="<?= $acessoPlataforma['email_acesso']; ?>" required>
                    </div>

                <?php else : ?>

                    <!-- EMAIL DE ACESSO -->
                    <label for="email-acesso-tray" class="form-label">E-mail de Acesso a Tray</label>
                    <div class="d-flex align-items-center mb-3">
                        <input type="text" class="form-control" id="email-acesso-tray" name="email-acesso-tray" placeholder="Digite sua resposta" autocomplete="off" required>
                    </div>

                <?php endif; ?>

                <?php if ($acessoPlataforma['senha']) : ?>

                    <!-- SENHA -->
                    <label for="senha-acesso-tray" class="form-label">Senha de Acesso a Tray</label>
                    <div class="d-flex align-items-center mb-3">
                        <input type="password" class="form-control" id="senha-acesso-tray" name="senha-acesso-tray" placeholder="Digite sua resposta" autocomplete="off" value="<?= $acessoPlataforma['senha']; ?>" required>
                    </div>

                <?php else : ?>

                    <!-- SENHA -->
                    <label for="senha-acesso-tray" class="form-label">Senha de Acesso a Tray</label>
                    <div class="d-flex align-items-center mb-3">
                        <input type="password" class="form-control" id="senha-acesso-tray" name="senha-acesso-tray" placeholder="Digite sua resposta" autocomplete="off" required>
                    </div>

                <?php endif; ?>

            </div>
            <div class="col">

                <h6><strong>E-mail Gmail para Compartilhar Acessos Final do Projeto</strong></h6>
                <p>
                    No final do projeto, você vai receber um e-mail com todos os acessos e instruções da sua loja. Para isso, pedimos um e-mail gmail para compartilhar eles com você.
                </p>

                <?php if ($acessoPlataforma['conta_google']) : ?>

                    <!-- CONTA GOOGLE -->
                    <label for="emailGoogle" class="form-label">E-mail ou conta Google</label>
                    <div class="d-flex align-items-center mb-3">
                        <input type="email" class="form-control" id="emailGoogle" name="emailGoogle" placeholder="Digite sua resposta" autocomplete="off" value="<?= $acessoPlataforma['conta_google']; ?>" required>
                    </div>

                <?php else : ?>

                    <!-- CONTA GOOGLE -->
                    <label for="emailGoogle" class="form-label">E-mail ou conta Google</label>
                    <div class="d-flex align-items-center mb-3">
                        <input type="email" class="form-control" id="emailGoogle" name="emailGoogle" placeholder="Digite sua resposta" autocomplete="off" required>
                    </div>

                <?php endif; ?>
            </div>
        </div>


        <div class="mb-3 w-100 d-flex justify-content-end">
            <button class="btn btn-primary">Salvar</button>
        </div>

    </form>

</section>