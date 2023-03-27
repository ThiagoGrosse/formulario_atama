<?php global $envio; ?>

<section class="mt-3">

    <div class="row mb-3">
        <div class="col">
            <h4><strong>Meios de Envio</strong></h4>
        </div>
    </div>

    <form action="#" method="post" id="formEnvio">

        <div class="row mt-5">
            <div class="col">
                <p>
                    A sua loja virtual precisa também uma forma de enviar as mercadorias para os clientes.
                </p>
                <p>
                    <strong>ENTREGA VIA CORREIOS / TRANSPORTADORA</strong>
                </p>
                <p>
                    Na Tray a sua loja já sai integrada com os Correios e Jadlog com o preço do frete sendo consultado diretamente nos sistemas em tempo real.
                </p>
                <p>
                    Neste modelo, você não precisa ter contrato com nenhuma das duas. Você vai utilizar uma tabela especial do contrato da Tray; Em média 30% mais barato.
                </p>
                <p>
                    Para realizarmos a integração precisamos saber o endereço completo de onde será despachada a mercadoria.
                </p>
            </div>

            <div class="col">

                <p>
                    Para podermos configurar a opção de frete desejada, necessitamos que nos informe o endereço completo (endereço, número, bairro, cidade, estado e CEP) de onde os produtos serão despachados
                </p>

                <div class="mb-3">
                    <label for="cepEnvio" class="form-label">CEP</label>

                    <?php if ($envio['cep']) : ?>

                        <input class="form-control inpu-cep" type="text" id="cepEnvio" name="cepEnvio" placeholder="Digite sua resposta" autocomplete="off" value="<?= $envio['cep']; ?>" required maxlength="9">

                    <?php else : ?>

                        <input class="form-control inpu-cep" type="text" id="cepEnvio" name="cepEnvio" placeholder="Digite sua resposta" autocomplete="off" required maxlength="9">

                    <?php endif; ?>

                </div>

                <div class=" d-flex justify-content-between">
                    <div class="mb-3 w-100">
                        <label for="ruaEnvio" class="form-label">Logradouro</label>

                        <?php if ($envio['rua']) : ?>

                            <input class="form-control" type="text" id="ruaEnvio" name="ruaEnvio" placeholder="Digite sua resposta" autocomplete="off" value="<?= $envio['rua']; ?>" required>

                        <?php else : ?>

                            <input class="form-control" type="text" id="ruaEnvio" name="ruaEnvio" placeholder="Digite sua resposta" autocomplete="off" required>

                        <?php endif; ?>

                    </div>

                    <div class=" mb-3 w-50">
                        <label for="numeroEnvio" class="form-label">Número</label>

                        <?php if ($envio['numero']) : ?>

                            <input class="form-control" type="text" id="numeroEnvio" name="numeroEnvio" placeholder="Digite sua resposta" autocomplete="off" value="<?= $envio['numero']; ?>" required>

                        <?php else : ?>

                            <input class="form-control" type="text" id="numeroEnvio" name="numeroEnvio" placeholder="Digite sua resposta" autocomplete="off" required>

                        <?php endif; ?>

                    </div>
                </div>

                <div class=" mb-3">
                    <label for="bairroEnvio" class="form-label">Bairro</label>

                    <?php if ($envio['bairro']) : ?>

                        <input class="form-control" type="text" id="bairroEnvio" name="bairroEnvio" placeholder="Digite sua resposta" autocomplete="off" value="<?= $envio['bairro']; ?>" required>

                    <?php else : ?>

                        <input class="form-control" type="text" id="bairroEnvio" name="bairroEnvio" placeholder="Digite sua resposta" autocomplete="off" required>

                    <?php endif; ?>

                </div>

                <div class=" mb-3">
                    <label for="complementoEnvio" class="form-label">Complemento</label>

                    <?php if ($envio['complemento']) : ?>

                        <input class="form-control" type="text" id="complementoEnvio" name="complementoEnvio" placeholder="Digite sua resposta" autocomplete="off" value="<?= $envio['complemento']; ?>">

                    <?php else : ?>

                        <input class="form-control" type="text" id="complementoEnvio" name="complementoEnvio" placeholder="Digite sua resposta" autocomplete="off">

                    <?php endif; ?>

                </div>

                <div class=" d-flex justify-content-between">
                    <div class="mb-3 w-100">
                        <label for="cidadeEnvio" class="form-label">Cidade</label>

                        <?php if ($envio['cidade']) : ?>

                            <input class="form-control" type="text" id="cidadeEnvio" name="cidadeEnvio" placeholder="Digite sua resposta" autocomplete="off" value="<?= $envio['cidade']; ?>" required>

                        <?php else : ?>

                            <input class="form-control" type="text" id="cidadeEnvio" name="cidadeEnvio" placeholder="Digite sua resposta" autocomplete="off" required>

                        <?php endif; ?>

                    </div>

                    <div class=" mb-3">
                        <label for="ufEnvio" class="form-label">UF</label>

                        <?php if ($envio['estado']) : ?>

                            <input class="form-control" type="text" id="ufEnvio" name="ufEnvio" placeholder="Digite o UF" autocomplete="off" value="<?= $envio['estado']; ?>" required>

                        <?php else : ?>

                            <input class="form-control" type="text" id="ufEnvio" name="ufEnvio" placeholder="Digite o UF" autocomplete="off" required>

                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>

        <hr>

        <div class=" row mt-5">

            <div class="col">
                <p>
                    <strong>ENTREGA LOCAL - RETIRADA EM MÃOS</strong>
                </p>
                <p>
                    Uma possibilidade, é oferecer a retirada no local, neste caso, configuramos para o cliente retirar no mesmo endereço informado anteriormente.
                </p>
                <p>
                    Para isso, é necessário que você fique atento as confirmações de entregas, solicitadas pelos intermediadores de pagamento, para comprovar a entrega.
                </p>
                <p>
                    Veja por exemplo, o que a Yapay, que o intermediador mais utilizado, pede para comprar as entregas feitas em retiradas ou Motoboy.
                </p>
                <a href="https://atendimento.yapay.com.br/hc/pt-br/articles/360004271074-Como-comprovar-uma-entrega-feita-em-m%C3%A3os-motoboy-" target="_blank">Como comprovar uma entrega feita em mãos/motoboy?</a>
            </div>

            <div class="col">
                <label for="select-retirada-em-mao" class="form-label">Deseja oferecer retirada em mãos?</label>
                <select class="form-select mb-3" id="select-retirada-em-mao">

                    <?php if ($envio['retirar_local'] == 1) : ?>

                        <option disabled>Selecione</option>
                        <option value="1" selected>Sim</option>
                        <option value="0">Não</option>

                    <?php elseif ($envio['retirar_local'] == 0 && !is_null($envio['retirar_local'])) : ?>

                        <option disabled>Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>

                    <?php else : ?>

                        <option selected disabled>Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>

                    <?php endif; ?>

                </select>
            </div>
        </div>

        <hr>

        <div class="row mt-5">

            <div class="col">
                <p>
                    <strong>ENTREGA VIA MOTOBOY</strong>
                </p>
                <p>
                    Conseguimos cadastrar a entrega via Motoboy através de faixas de CEP (cep inicial - cep final).
                </p>
                <p>
                    Caso deseje utilizar esta modalidade, pedimos que nos envie uma lista com CEP inicial, CEP final e valor do frete.
                </p>
            </div>

            <div class="col">

                <label for="select-motoboy" class="form-label">Deseja incluir entrega via Motoboy?</label>
                <select class="form-select mb-3" id="select-motoboy" required>

                    <?php if ($envio['motoboy'] == 1) : ?>

                        <option value="1" selected>Sim</option>
                        <option value="0">Não</option>

                    <?php elseif ($envio['motoboy'] == 0 && !is_null($envio['motoboy'])) : ?>

                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>

                    <?php else : ?>

                        <option value="">Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>

                    <?php endif; ?>

                </select>
            </div>
        </div>

        <hr>

        <div class="row mt-5">

            <div class="col">
                <p>
                    <strong>SOLUÇÕES PARA FRETES</strong>
                </p>
                <p>
                    Existem alguns Gateways de fretes como: Melhor Envio, Frenet, Frete Rápido, entre outras. Essas podem ser gratuitas e pagas.
                </p>
                <p>
                    A Tray tem integração com uma infinidade delas. Você já contratou alguma delas?
                </p>
                <p>
                    Caso tenha contratado e pretende usar em seu E-commerce, podemos deixar configurada para você.
                </p>
                <p>
                    <i>*Somente faremos integrações de Gateways homologados pela Tray</i>
                </p>
            </div>

            <div class="col">

                <label for="select-gateway-frete" class="form-label">Deseja utilizar algum gateway de frete?</label>
                <select class="form-select mb-3" id="select-gateway-frete" required>

                    <?php if ($envio['gateway_frete'] == 1) : ?>

                        <option value="1" selected>Sim</option>
                        <option value="0">Não</option>

                    <?php elseif ($envio['gateway_frete'] == 0 && !is_null($envio['gateway_frete'])) : ?>

                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>

                    <?php else : ?>

                        <option value="">Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>

                    <?php endif; ?>

                </select>

                <?php if ($envio['gateway_frete'] == 1) : ?>

                    <div id="nomeGatewayFrete" class="display-block">

                    <?php else : ?>

                        <div id="nomeGatewayFrete" class="display-none">

                        <?php endif; ?>

                        <div class="mb-3">
                            <label for="gatewayFrete" class="form-label">Qual o seu gateway de frete?</label>

                            <?php if ($envio['nome_gateway_frete']) : ?>

                                <input class="form-control" type="text" id="gatewayFrete" name="gatewayFrete" placeholder="Digite sua resposta" autocomplete="off" value="<?= $envio['nome_gateway_frete']; ?>">

                            <?php else : ?>

                                <input class="form-control" type="text" id="gatewayFrete" name="gatewayFrete" placeholder="Digite sua resposta" autocomplete="off">

                            <?php endif; ?>

                        </div>

                        <div class=" mb-3">
                            <label for="loginGatewayFrete" class="form-label">Informe o login</label>

                            <?php if ($envio['frete_usuario']) : ?>

                                <input class="form-control" type="text" id="loginGatewayFrete" name="loginGatewayFrete" placeholder="Digite sua resposta" autocomplete="off" value="<?= $envio['frete_usuario']; ?>">

                            <?php else : ?>

                                <input class="form-control" type="text" id="loginGatewayFrete" name="loginGatewayFrete" placeholder="Digite sua resposta" autocomplete="off">

                            <?php endif; ?>

                        </div>

                        <div class=" mb-3">
                            <label for="senhaGatewayFrete" class="form-label">Informe a senha</label>

                            <?php if ($envio['frete_senha']) : ?>

                                <input class="form-control" type="password" id="senhaGatewayFrete" name="senhaGatewayFrete" placeholder="Digite sua resposta" autocomplete="off" value="<?= $envio['frete_senha']; ?>">

                            <?php else : ?>

                                <input class="form-control" type="password" id="senhaGatewayFrete" name="senhaGatewayFrete" placeholder="Digite sua resposta" autocomplete="off">

                            <?php endif; ?>
                        </div>

                        </div>

                        <?php if ($envio['gateway_frete'] == 1) : ?>

                            <div id="dadosFreteFacil" class="display-none">

                            <?php else : ?>

                                <div id="dadosFreteFacil" class="display-block">

                                <?php endif; ?>

                                <label for="select-correios" class="form-label">Deseja utilizar Correios?</label>
                                <select class="form-select mb-3" id="select-correios">

                                    <?php if ($envio['correios'] == 1) : ?>

                                        <option value="1" selected>Sim</option>
                                        <option value="0">Não</option>

                                    <?php elseif ($envio['correios'] == 0 && !is_null($envio['correios'])) : ?>

                                        <option value="1">Sim</option>
                                        <option value="0" selected>Não</option>

                                    <?php else : ?>

                                        <option value="">Selecione</option>
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>

                                    <?php endif; ?>
                                </select>

                                <label for="select-jadlog" class="form-label">Deseja utilizar JadLog? (obrigatório emissão de nota fiscal)</label>
                                <select class="form-select mb-3" id="select-jadlog">
                                    <?php if ($envio['jadlog'] == 1) : ?>

                                        <option value="1" selected>Sim</option>
                                        <option value="0">Não</option>

                                    <?php elseif ($envio['jadlog'] == 0 && !is_null($envio['jadlog'])) : ?>

                                        <option value="1">Sim</option>
                                        <option value="0" selected>Não</option>

                                    <?php else : ?>

                                        <option value="">Selecione</option>
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>

                                    <?php endif; ?>
                                </select>
                                </div>
                            </div>
                    </div>

                    <div class="mb-3 w-100 d-flex justify-content-end">
                        <button class="btn btn-primary">Salvar</button>
                    </div>

    </form>
</section>