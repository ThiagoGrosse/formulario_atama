<?php global $pagamento; ?>

<section class="mt-3">

    <div class="row mb-3">
        <div class="col">
            <h4><strong>Meio de Pagamento</strong></h4>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p>
                <strong>Já ouviu falar em Intermediadores de Pagamento Transparentes?</strong>
            </p>
            <p>
                Esses intermediadores são aqueles que a finalização do pagamento ocorre no EasyCheckout (página de finalização da compra), ou seja, o seu cliente não é direcionado para um outro ambiente para concluir seu pedido, toda a jornada de compra ocorre dentro da loja virtual.
            </p>
            <p>
                A Tray possui integração nativa com a Vindi para oferecer as melhores soluções de pagamento na sua loja virtual.
            </p>
            <p>
                A grande vantagem de utilizar a Vindi, é que ela já conta com os seguintes meios integrados.
            </p>
            <ul>
                <li>Cartão de crédito</li>
                <li>PIX</li>
                <li>Boleto Bancário</li>
                <li>Transferência Bancária: Itaú, Bradesco e Banco do Brasil</li>
            </ul>

            <p>
                Dessa forma, você através de um único intermediador de pagamento, centraliza todos os seus recebimentos.
            </p>
            <p>
                Outro ponto bacana é também o antifraude incluso. Então, caso uma compra que foi aprovada e enviada corretamente, seja uma fraude e o dono do cartão peça reembolso, a Vindi cobre 100% o valor pago.
            </p>
            <p><i>*Atenção: Veja sobre os requisitos para reembolso.</i></p>

            <p><strong>As taxas são</strong></p>
            <ul>
                <li>Cartão de Crédito: 3,89%</li>
                <li>Taxa de Antecipação: 1,99%</li>
                <li>Boleto Bancário: R$ 2,80 (Boleto Pago).</li>
                <li>Pix com Retorno Automático: 0,95% (Mínimo de R$ 1,60)</li>
            </ul>
            <p>
                Os valores após liberação ficam disponíveis em sua conta Vindi. Pode ser transferido para conta no nome do titular.
            </p>
            <p>
                Veja na imagem abaixo, uma simulação de porcentagem completa nos parcelamentos.
            </p>
            <img src="<?= $base; ?>/assets/img/taxasvindi.jpeg" alt="Imagens com taxas da vindi">
        </div>

        <div class="col">
            <p><strong>Outras opções:</strong></p>
            <p>
                A Tray conta conta com mais 3 intermediadores de pagamento que são:
            </p>
            <ul>
                <li>Moip/Wirecard</li>
                <li>Cielo</li>
                <li>Rede</li>
                <li>GetNet</li>
            </ul>
            <p>
                Esses intermediadores, deve-se entrar em contato com eles para negociar as taxas. Visto que mudam de faturamento para faturamento.
            </p>

            <p>
                Para falar com a <strong><i>Moip/Wirecard</i></strong>, acesse o seguinte link:
            </p>
            <p>
                <strong><a href="https://moip.com.br/contato/comercial/" target="_blank">Link Moip</a></strong>
            </p>
            <p>
                <strong>ATENÇÃO: Avisar que você deseja contratar a solução de "Plataforma de E-commerce" e avisar que você utiliza a Tray e vai utilizar o Checkout Transparente.</strong>
            </p>

            <p>
                Para falar com a <strong><i>Cielo</i></strong>, acesse o seguinte link:
            </p>
            <p>
                <strong><a href="https://onboarding.cielo.com.br/cielo-checkout/identificacao-cliente" target="_blan">Link Cielo</a></strong>
            </p>
            <p>
                <strong>ATENÇÃO: Avisar que você deseja contratar a solução de "Plataforma de E-commerce" e avisar que você utiliza a Tray e vai utilizar o Checkout Transparente.</strong>
            </p>

            <p>
                Para falar com a <strong><i>GetNet</i></strong>, acesse o seguinte link:
            </p>
            <p>
                <strong><a href="https://site.getnet.com.br/fale-conosco/" target="_blank">Link Getnet</a></strong>
            </p>
            <p>
                <strong>ATENÇÃO: Avisar que você deseja contratar a solução de "Plataforma de E-commerce" e avisar que você utiliza a Tray e vai utilizar o Checkout Transparente.</strong>
            </p>

            <p>
                Para falar com a <strong><i>Rede</i></strong>, acesse o seguinte link:
            </p>
            <p>
                <strong><a href="https://www.userede.com.br/Acesso/Criacao/index.html#!/criacao-acesso" target="_blank">Link Rede</a></strong>
            </p>
            <p>
                <strong>ATENÇÃO: Avisar que você deseja contratar a solução de "Plataforma de E-commerce" e avisar que você utiliza a Tray e vai utilizar o Checkout Transparente.</strong>
            </p>

            <p>
                Existem outras opções, que não são Checkouts transparentes.
                Esses não indicamos, pois a complexidade de trabalhar com eles e a alta taxa de desistência do cliente por precisar sair da loja é grande.
            </p>
        </div>

        <div class="row">

        </div>

        <div class="row">
            <p>
                Precisamos saber qual será sua escolha
            </p>
        </div>

        <form action="#" method="post" id="formMeioPagamento">

            <div class="row">
                <div class="col">
                    <label for="seleciona-pagamento" class="form-label"> Selecione qual intermediador deseja utilizar</label>
                    <select class="form-select" id="seleciona-pagamento" required>

                        <?php if ($pagamento['meio_pag'] == 'vindi') : ?>

                            <option value="vindi" selected>Vindi</option>
                            <option value="moip">Moip/Wirecard</option>
                            <option value="cielo">Cielo</option>
                            <option value="getnet">GetNet</option>
                            <option value="outroPag">Outro...</option>

                        <?php elseif ($pagamento['meio_pag'] == 'moip') : ?>

                            <option value="vindi">Vindi</option>
                            <option value="moip" selected>Moip/Wirecard</option>
                            <option value="cielo">Cielo</option>
                            <option value="getnet">GetNet</option>
                            <option value="outroPag">Outro...</option>

                        <?php elseif ($pagamento['meio_pag'] == 'cielo') : ?>

                            <option value="vindi">Vindi</option>
                            <option value="moip">Moip/Wirecard</option>
                            <option value="cielo" selected>Cielo</option>
                            <option value="getnet">GetNet</option>
                            <option value="outroPag">Outro...</option>

                        <?php elseif ($pagamento['meio_pag'] == 'getnet') : ?>

                            <option value="vindi">Vindi</option>
                            <option value="moip">Moip/Wirecard</option>
                            <option value="cielo">Cielo</option>
                            <option value="getnet" selected>GetNet</option>
                            <option value="outroPag">Outro...</option>

                        <?php elseif ($pagamento['meio_pag'] == 'outroPag') : ?>

                            <option value="vindi">Vindi</option>
                            <option value="moip">Moip/Wirecard</option>
                            <option value="cielo">Cielo</option>
                            <option value="getnet">GetNet</option>
                            <option value="outroPag" selected>Outro...</option>

                        <?php else : ?>

                            <option value="">Selecione</option>
                            <option value="vindi">Vindi</option>
                            <option value="moip">Moip/Wirecard</option>
                            <option value="cielo">Cielo</option>
                            <option value="getnet">GetNet</option>
                            <option value="outroPag">Outro...</option>

                        <?php endif; ?>


                    </select>
                </div>

                <div class="col">



                    <?php if ($pagamento['meio_pag'] == 'outroPag') : ?>

                        <div id="outroPag" class="display-block sectionPaymentMethod">
                            <div class="mb-3">
                                <label for="outroPagamento" class="form-label">Informe o meio de pagamento que será utilizado</label>
                                <input type="email" class="form-control" id="outroPagamento" placeholder="Digite sua resposta" autocomplete="off" value="<?= $pagamento['outro_pagamento']; ?>">
                            </div>
                        </div>

                    <?php else : ?>

                        <div id="outroPag" class="display-none sectionPaymentMethod">
                            <div class="mb-3">
                                <label for="outroPagamento" class="form-label">Informe o meio de pagamento que será utilizado</label>
                                <input type="email" class="form-control" id="outroPagamento" placeholder="Digite sua resposta" autocomplete="off">
                            </div>
                        </div>

                    <?php endif; ?>


                    <!-- DADOS VINDI -->

                    <?php if ($pagamento['meio_pag'] == 'vindi') : ?>

                        <div id="vindi" class="display-block sectionPaymentMethod">

                            <p>
                                Ao criar sua conta na Tray, automaticamente você cria uma conta na Vindi. <br>
                                Precisamos do acesso dela, para criar uma nova senha, basta acessar o link abaixo, digitar seu e-mail e criar uma nova senha seguindo as orientações enviados por e-mail.
                            </p>
                            <div class="mb-3">
                                <strong>
                                    <a href="https://signin.yapay.com.br/password/reset/?integration_id=intermediado" target="_blank" title="Link para definir senha de acesso Vindi">Definir senha de acesso Vindi</a>
                                </strong>
                            </div>

                            <div class="mb-3">
                                <label for="loginVindi" class="form-label">E-mail de acesso Vindi</label>
                                <input type="email" class="form-control" id="loginVindi" placeholder="Digite sua resposta" autocomplete="off" value="<?= $pagamento['vindi_email']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="senhavindi" class="form-label">Senha de acesso Vindi</label>
                                <input type="password" class="form-control" id="senhavindi" placeholder="Digite sua resposta" autocomplete="off" value="<?= $pagamento['vindi_senha']; ?>">
                            </div>
                        </div>

                    <?php else : ?>

                        <div id="vindi" class="display-none sectionPaymentMethod">
                            <div class="mb-3">
                                <label for="loginVindi" class="form-label">E-mail de acesso Vindi</label>
                                <input type="email" class="form-control" id="loginVindi" placeholder="Digite sua resposta" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="senhavindi" class="form-label">Senha de acesso Vindi</label>
                                <input type="password" class="form-control" id="senhavindi" placeholder="Digite sua resposta" autocomplete="off">
                            </div>
                        </div>

                    <?php endif; ?>


                    <!-- DADOS CIELO -->

                    <?php if ($pagamento['meio_pag'] == 'cielo') : ?>

                        <div id="cielo" class="display-block sectionPaymentMethod">
                            <div class="mb-3">
                                <label for="cd_filiacao" class="form-label">Código de Filiação</label>
                                <input type="text" class="form-control" id="cd_filiacao" placeholder="Digite sua resposta" autocomplete="off" value="<?= $pagamento['cielo_cd_afiliacao']; ?>">
                            </div>
                        </div>

                    <?php else : ?>

                        <div id="cielo" class="display-none sectionPaymentMethod">
                            <div class="mb-3">
                                <label for="cd_filiacao" class="form-label">Código de Filiação</label>
                                <input type="text" class="form-control" id="cd_filiacao" placeholder="Digite sua resposta" autocomplete="off">
                            </div>
                        </div>

                    <?php endif; ?>


                    <!-- DADOS MOIP -->

                    <?php if ($pagamento['meio_pag'] == 'moip') : ?>

                        <div id="moip" class="display-block sectionPaymentMethod">
                            <div class="mb-3">
                                <label for="usuarioMiop" class="form-label">Usuário</label>
                                <input type="text" class="form-control" id="usuarioMiop" placeholder="Digite sua resposta" autocomplete="off" value="<?= $pagamento['moip_usuario'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="senhaMoip" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senhaMoip" placeholder="Digite sua resposta" autocomplete="off" value="<?= $pagamento['moip_chave_acesso'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tokenMoip" class="form-label">Token</label>
                                <input type="text" class="form-control" id="tokenMoip" placeholder="Digite sua resposta" autocomplete="off" value="<?= $pagamento['moip_token'] ?>">
                            </div>
                        </div>

                    <?php else : ?>

                        <div id="moip" class="display-none sectionPaymentMethod">
                            <div class="mb-3">
                                <label for="usuarioMiop" class="form-label">Usuário</label>
                                <input type="text" class="form-control" id="usuarioMiop" placeholder="Digite sua resposta" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="senhaMoip" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senhaMoip" placeholder="Digite sua resposta" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="tokenMoip" class="form-label">Token</label>
                                <input type="text" class="form-control" id="tokenMoip" placeholder="Digite sua resposta" autocomplete="off">
                            </div>
                        </div>

                    <?php endif; ?>


                    <!-- DADOS GETNET -->

                    <?php if ($pagamento['meio_pag'] == 'getnet') : ?>

                        <div id="getnet" class="display-block sectionPaymentMethod">
                            <div class="mb-3">
                                <label for="cd_afiliacao_getnet" class="form-label">Código afiliação</label>
                                <input type="text" class="form-control" id="cd_afiliacao_getnet" placeholder="Digite sua resposta" autocomplete="off" value="<?= $pagamento['getnet_cd_afiliacao']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="cd_terminal_getnet" class="form-label">Código terminal</label>
                                <input type="text" class="form-control" id="cd_terminal_getnet" placeholder="Digite sua resposta" autocomplete="off" value="<?= $pagamento['getnet_cd_terminal']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="usuario_captura" class="form-label">Usuário de captura</label>
                                <input type="text" class="form-control" id="usuario_captura" placeholder="Digite sua resposta" autocomplete="off" value="<?= $pagamento['getnet_suser_cap']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="senha_captura" class="form-label">Senha de captura</label>
                                <input type="password" class="form-control" id="senha_captura" placeholder="Digite sua resposta" autocomplete="off" value="<?= $pagamento['getnet_senha_cap']; ?>">
                            </div>
                        </div>

                    <?php else : ?>

                        <div id="getnet" class="display-none sectionPaymentMethod">
                            <div class="mb-3">
                                <label for="cd_afiliacao_getnet" class="form-label">Código afiliação</label>
                                <input type="text" class="form-control" id="cd_afiliacao_getnet" placeholder="Digite sua resposta" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="cd_terminal_getnet" class="form-label">Código terminal</label>
                                <input type="text" class="form-control" id="cd_terminal_getnet" placeholder="Digite sua resposta" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="usuario_captura" class="form-label">Usuário de captura</label>
                                <input type="text" class="form-control" id="usuario_captura" placeholder="Digite sua resposta" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="senha_captura" class="form-label">Senha de captura</label>
                                <input type="password" class="form-control" id="senha_captura" placeholder="Digite sua resposta" autocomplete="off">
                            </div>
                        </div>

                    <?php endif; ?>

                </div>
            </div>

            <div class="mb-3 w-100 d-flex justify-content-end">
                <button class="btn btn-primary">Salvar</button>
            </div>

        </form>
</section>