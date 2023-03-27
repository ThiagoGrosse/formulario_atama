<?php global $marketplace; ?>


<section>
    <div class="row mt-3">
        <div class="col">
            <h4><strong>Marketplaces</strong></h4>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <p>
                O seu pacote, conta com a instalação de três Marketplaces, sendo eles <mark><i>Americanas, Magazine Luiza e Mercado Livre</i></mark>.
            </p>
            <p>
                Você pode escolher entre integrar 1 ou mais Marketplaces, ficando ao seu critério qual escolher.
            </p>
            <p>
                <span class="atention"><strong>ATENÇÃO:</strong> Todos eles, é obrigatório a emissão de nota fiscal.</span>
            </p>
        </div>
    </div>

    <form action="#" method="post" id="formMarketplace">

        <div class="row">

            <!-- AMERICANAS -->
            <div class="col">
                <label for="op-mktp-am" class="form-label">Deseja integração com Americanas Marketplace?</label>
                <select class="form-select mb-3" id="op-mktp-am" required>
                    <?php if ($marketplace['americanas'] == 0 && !is_null($marketplace['americanas'])) : ?>

                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>

                    <?php elseif ($marketplace['americanas'] == 1) : ?>

                        <option value="1" selected>Sim</option>
                        <option value="0">Não</option>

                    <?php else : ?>

                        <option value="">Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>

                    <?php endif; ?>
                </select>

                <div id="loginAm" <?php if ($marketplace['americanas'] == 1) {
                                        echo 'class="display-block"';
                                    } else {
                                        echo 'class="display-none"';
                                    } ?>>

                    <div class="row">
                        <div class="mb-3">
                            <label for="am-login" class="form-label">Login Americanas</label>

                            <?php if ($marketplace['am_login']) : ?>

                                <input type="text" class="form-control" id="am-login" name="am-login" placeholder="Digite sua resposta" autocomplete="off" value="<?= $marketplace['am_login']; ?>">

                            <?php else : ?>

                                <input type="text" class="form-control" id="am-login" name="am-login" placeholder="Digite sua resposta" autocomplete="off">

                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="am-senha" class="form-label">Senha Americanas</label>

                            <?php if ($marketplace['am_senha']) : ?>

                                <input type="password" class="form-control" id="am-senha" name="am-senha" placeholder="Digite sua resposta" autocomplete="off" value="<?= $marketplace['am_senha']; ?>">

                            <?php else : ?>

                                <input type="password" class="form-control" id="am-senha" name="am-senha" placeholder="Digite sua resposta" autocomplete="off">

                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>



            <!-- MAGAZINE LUIZA -->
            <div class="col">
                <label for="op-mktp-mg" class="form-label">Deseja integração com Magazine Luiza?</label>
                <select class="form-select mb-3" id="op-mktp-mg" required>

                    <?php if ($marketplace['magalu'] == 0 && !is_null($marketplace['magalu'])) : ?>

                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>

                    <?php elseif ($marketplace['magalu'] == 1) : ?>

                        <option value="1" selected>Sim</option>
                        <option value="0">Não</option>

                    <?php else : ?>

                        <option value="">Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>

                    <?php endif; ?>

                </select>

                <div id="loginMagalu" <?php if ($marketplace['magalu'] == 1) {
                                            echo 'class="display-block"';
                                        } else {
                                            echo 'class="display-none"';
                                        } ?>>
                    <div class="mb-3">
                        <label for="mg-login" class="form-label">User API Magalu </label>

                        <?php if ($marketplace['mg_login']) : ?>

                            <input type="text" class="form-control" id="mg-login" name="mg-login" placeholder="Digite sua resposta" autocomplete="off" value="<?= $marketplace['mg_login']; ?>">

                        <?php else : ?>

                            <input type="text" class="form-control" id="mg-login" name="mg-login" placeholder="Digite sua resposta" autocomplete="off">

                        <?php endif; ?>
                    </div>


                    <div class="mb-3">
                        <label for="mg-senha" class="form-label">Senha API Magalu</label>
                        <input type="password" class="form-control" id="mg-senha" name="mg-senha" placeholder="Digite sua resposta" autocomplete="off">
                    </div>
                </div>
            </div>


            <!-- MERCADO LIVRE -->
            <div class="col">
                <label for="op-mktp-ml" class="form-label">Deseja integração com Mercado Livre?</label>
                <select class="form-select mb-3" id="op-mktp-ml" required>

                    <?php if ($marketplace['mercado_livre'] == 0 && !is_null($marketplace['mercado_livre'])) : ?>

                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>

                    <?php elseif ($marketplace['mercado_livre'] == 1) : ?>

                        <option value="1" selected>Sim</option>
                        <option value="0">Não</option>

                    <?php else : ?>

                        <option value="">Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>

                    <?php endif; ?>

                </select>

                <div id="loginMl" <?php if ($marketplace['mercado_livre'] == 1) {
                                        echo 'class="display-block"';
                                    } else {
                                        echo 'class="display-none"';
                                    } ?>>
                    <div class="mb-3">
                        <label for="ml-login" class="form-label">Login Mercado Livre</label>

                        <?php if ($marketplace['ml_login']) : ?>

                            <input type="text" class="form-control" id="ml-login" name="ml-login" placeholder="Digite sua resposta" autocomplete="off" value="<?= $marketplace['ml_login']; ?>">

                        <?php else : ?>

                            <input type="text" class="form-control" id="ml-login" name="ml-login" placeholder="Digite sua resposta" autocomplete="off">

                        <?php endif; ?>

                    </div>

                    <div class="mb-3">
                        <label for="ml-senha" class="form-label">Senha Mercado Livre</label>

                        <?php if ($marketplace['ml_senha']) : ?>

                            <input type="password" class="form-control" id="ml-senha" name="ml-senha" placeholder="Digite sua resposta" autocomplete="off" value="<?= $marketplace['ml_senha']; ?>">

                        <?php else : ?>

                            <input type="password" class="form-control" id="ml-senha" name="ml-senha" placeholder="Digite sua resposta" autocomplete="off">

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col">
                <p>
                    <strong>CADASTROS</strong>
                </p>
                <p><u>Americanas</u></p>
                <p>
                    Caso não tenha cadastro no marketplace, acesse o link abaixo, efetue o cadastro e depois informe no campo a seguir os dados de acesso.
                </p>
                <p>
                    <a href="https://americanasmarketplace.com.br/v3/cadastro-seller/dados-parceiro/tray" target="_blank" title="Link para cadastro na Americanas">
                        Cadastro na Americanas
                    </a>
                </p>
                <p><u>Magazine Luiza</u></p>
                <p>
                    Para integração com o Magazine Luiza será necessário os dados de API. Estes dados são fornecidos após ter seu cadastro aprovado no marketplace. Lembrando que é necessário selecionar a opção “Sim, já utilizo uma integradora.” quando for se cadastrar no marketplace.
                </p>
                <p>
                    Caso já possua cadastro junto ao marketplace, porem não possua os dados de integração, pedimos que solicite estes dados junto ao time de suporte do Magazine Luiza.
                </p>
                <p>
                    <a href="https://marketplace-vendamais.magazineluiza.com.br/register" target="_blank" title="Link para cadastro na Magazine Luiza">
                        Cadastro na Magazine Luiza
                    </a>
                </p>
                <p><u>Mercado Livre</u></p>
                <p>
                    O cadastro no Mercado Livre é bastante simples, basta acessar o link abaixo e preencher todas as informações que forem solicitadas pelo marketplace.
                </p>
                <p>
                    <a href="https://www.mercadolivre.com.br/hub/registration/landing" target="_blank" title="Link para cadastro no mercado livre">
                        Cadastro no Mercado Livre
                    </a>
                </p>
            </div>

            <div class="col">
                <label for="op-mktp-cadastro" class="form-label">Já possui cadastro nos marketpalces?</label>
                <select class="form-select mb-3" id="op-mktp-cadastro" required>

                    <?php if ($marketplace['cadastro'] == 0 && !is_null($marketplace['cadastro'])) : ?>

                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>

                    <?php elseif ($marketplace['cadastro'] == 1) : ?>

                        <option value="1" selected>Sim</option>
                        <option value="0">Não</option>

                    <?php else : ?>

                        <option value="">Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>

                    <?php endif; ?>

                </select>

            </div>
        </div>

        <div class="mb-3 w-100 d-flex justify-content-end">
            <button class="btn btn-primary">Salvar</button>
        </div>

    </form>

</section>