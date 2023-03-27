<?php

$render('head');

$GLOBALS['typeForm'] = $typeForm;
$GLOBALS['user'] = $user;

$GLOBALS['arquivado'] = $arquivado;
$GLOBALS['completed'] = $completed;
$GLOBALS['status'] = $status;

$GLOBALS['acessoPlataforma'] = $acessoPlataforma;
$GLOBALS['contato'] = $contato;
$GLOBALS['desconto'] = $desconto;
$GLOBALS['dominio'] = $dominio;
$GLOBALS['envio'] = $envio;
$GLOBALS['precosDescontos'] = $desconto;
$GLOBALS['infoTema'] = $infoTema;
$GLOBALS['marketplace'] = $marketplace;
$GLOBALS['pagamento'] = $pagamento;
$GLOBALS['sobreEmpresa'] = $sobreEmpresa;
$GLOBALS['idVisual'] = $idVisual;


?>

<body>
    <?= $render('header'); ?>

    <main>

        <div class="container mb-5 mt-4">
            <input type="text" id="input-token" class="input-oculto" value="<?= $token; ?>" disabled>

            <!-- TÍTULO DO FORMULÁRIO -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4><?= $nomeForm; ?></h4>
            </div>

            <div class="row mb-3">
                <!-- ID VISUAL -->
                <div class="col">
                    <table class="table table-hover table-result">
                        <thead>
                            <tr class="cabecalhoTable">
                                <th colspan="2">ID Visual</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Logo</th>
                                <td><?= $idVisual['logo']; ?></td>
                            </tr>
                            <tr>
                                <th>Manual da Marca</th>
                                <td><?= $idVisual['brand_manual']; ?></td>
                            </tr>

                            <tr>
                                <th>Link Drive Google</th>
                                <td><?= $idVisual['link_drive_logo']; ?></td>
                            </tr>

                            <tr>
                                <th>Cor Primária</th>
                                <td><?= $idVisual['primary_color']; ?></td>
                            </tr>

                            <tr>
                                <th>Cor Secundária</th>
                                <td><?= $idVisual['secondary_color']; ?></td>
                            </tr>

                            <tr>
                                <th>Cor Terciária</th>
                                <td><?= $idVisual['tertiary_color']; ?></td>
                            </tr>

                            <tr>
                                <th>Não utilizar cores</th>
                                <td><?= $idVisual['do_not_use']; ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- INFORMAÇÕES SOBRE O TEMA -->
                <div class="col">
                    <table class="table table-hover table-result">
                        <thead>
                            <tr class="cabecalhoTable">
                                <th colspan=" 2">Informações sobre o tema</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Nome da loja</th>
                                <td><?= $infoTema['nome_loja']; ?></td>
                            </tr>

                            <tr>
                                <th>Produtos/Serviços</th>
                                <td><?= $infoTema['produto_servico']; ?></td>
                            </tr>

                            <tr>
                                <th>Diferencial da marca</th>
                                <td><?= $infoTema['diferencial']; ?></td>
                            </tr>

                            <tr>
                                <th>Link de concorrentes</th>
                                <td><?= $infoTema['link_concorrente']; ?></td>
                            </tr>

                            <tr>
                                <th>Sites interessantes</th>
                                <td><?= $infoTema['sites_interessantes']; ?></td>
                            </tr>

                            <tr>
                                <th>Enredeço e CNPJ para o rodapé</th>
                                <td><?= $infoTema['endereco_rodape']; ?></td>
                            </tr>

                            <tr>
                                <th>Atenções para o rodapé</th>
                                <td><?= $infoTema['atencao_rodape']; ?></td>
                            </tr>

                            <tr>
                                <th>Observações</th>
                                <td><?= $infoTema['observacao']; ?></td>
                            </tr>

                            <tr>
                                <th>Instagram</th>
                                <td><?= $infoTema['link_instagram']; ?></td>
                            </tr>

                            <tr>
                                <th>Facebook</th>
                                <td><?= $infoTema['link_facebook']; ?></td>
                            </tr>

                            <tr>
                                <th>Tiktok</th>
                                <td><?= $infoTema['link_tiktok']; ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mb-3">
                <!-- ACESSOS PLATAFORMA -->
                <div class="col">
                    <table class="table table-hover table-result">
                        <thead>
                            <tr class="cabecalhoTable">
                                <th colspan="2">Acessos Plataforma</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>ID Loja</th>
                                <td><?= $acessoPlataforma['id_loja']; ?></td>
                            </tr>

                            <tr>
                                <th>E-mail de acesso</th>
                                <td><?= $acessoPlataforma['email_acesso']; ?></td>
                            </tr>

                            <tr>
                                <th>Senha</th>
                                <td><?= $acessoPlataforma['senha']; ?></td>
                            </tr>

                            <tr>
                                <th>Conta Google</th>
                                <td><?= $acessoPlataforma['conta_google']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- DOMINIO -->
                <div class="col">
                    <table class="table table-hover table-result">
                        <thead>
                            <tr class="cabecalhoTable">
                                <th colspan="2">Domínio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Domínio</th>
                                <td><?= $dominio['dominio']; ?></td>
                            </tr>

                            <tr>
                                <th>Fornecedor do domínio</th>
                                <td><?= $dominio['fornecedor_dominio']; ?></td>
                            </tr>

                            <?php if ($dominio['agencia_dominio'] == true) : ?>
                                <tr>
                                    <th>Agenciado</th>
                                    <td>Sim</td>
                                </tr>
                            <?php else : ?>
                                <tr>
                                    <th>Agenciado</th>
                                    <td>Não</td>
                                </tr>
                                <tr>
                                    <th>Usuário</th>
                                    <td><?= $dominio['usuario']; ?></td>
                                </tr>
                                <tr>
                                    <th>Senha</th>
                                    <td><?= $dominio['senha']; ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php if ($typeForm !== 'P1') : ?>
                <div class="row mb-3">
                    <!-- MARKETPLACE -->
                    <div class="col">
                        <table class="table table-hover table-result">
                            <thead>
                                <tr class="cabecalhoTable">
                                    <th colspan="2">Marketplaces</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($marketplace['americanas'] == true) : ?>
                                    <tr>
                                        <th>Americanas</th>
                                        <td>Sim</td>
                                    </tr>
                                    <tr>
                                        <th>Americanas Login</th>
                                        <td><?= $marketplace['am_login']; ?></td>
                                    </tr>

                                    <tr>
                                        <th>Americanas Senha</th>
                                        <td><?= $marketplace['am_senha']; ?></td>
                                    </tr>
                                <?php else : ?>
                                    <tr>
                                        <th>Americanas</th>
                                        <td>Não</td>
                                    </tr>
                                <?php endif; ?>

                                <?php if ($marketplace['mercado_livre'] == true) : ?>
                                    <tr>
                                        <th>Memrcado Livre</th>
                                        <td>Sim</td>
                                    </tr>
                                    <tr>
                                        <th>Mercado Livre Login</th>
                                        <td><?= $marketplace['ml_login']; ?></td>
                                    </tr>

                                    <tr>
                                        <th>Mercado Livre Senha</th>
                                        <td><?= $marketplace['ml_senha']; ?></td>
                                    </tr>
                                <?php else : ?>
                                    <tr>
                                        <th>Memrcado Livre</th>
                                        <td>Não</td>
                                    </tr>
                                <?php endif; ?>


                                <?php if ($marketplace['magalu'] == true) : ?>
                                    <tr>
                                        <th>Magazine Luiza</th>
                                        <td>Sim</td>
                                    </tr>
                                    <tr>
                                        <th>Magalu Senha</th>
                                        <td><?= $marketplace['mg_login']; ?></td>
                                    </tr>

                                    <tr>
                                        <th>Magalu Senha</th>
                                        <td><?= $marketplace['mg_senha']; ?></td>
                                    </tr>
                                <?php else : ?>
                                    <tr>
                                        <th>Magazine Luiza</th>
                                        <td>Não</td>
                                    </tr>
                                <?php endif; ?>

                                <tr>
                                    <th>Possui cadastro?</th>
                                    <?php if ($marketplace['cadastro'] == true) : ?>
                                        <td>Sim</td>
                                    <?php else : ?>
                                        <td>Não</td>
                                    <?php endif; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- SOBRE A EMPRESA -->
                    <div class="col">
                        <table class="table table-hover table-result">
                            <thead>
                                <tr class="cabecalhoTable">
                                    <th colspan="2">Sobre a empresa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Quem Somos</th>
                                    <td><?= $sobreEmpresa['quem_somos']; ?></td>
                                </tr>

                                <tr>
                                    <th>Slogan</th>
                                    <td><?= $sobreEmpresa['slogan']; ?></td>
                                </tr>

                                <tr>
                                    <th>Imagem 01</th>
                                    <?php if (empty($sobreEmpresa['img_01'])) : ?>
                                        <td></td>
                                    <?php else : ?>
                                        <td><img src="<?= $base; ?>/assets/img/uploads/<?= $sobreEmpresa['img_01']; ?>" width="100" height="100" alt="Imagem 01"></td>
                                    <?php endif; ?>
                                </tr>

                                <tr>
                                    <th>Imagem 02</th>
                                    <?php if (empty($sobreEmpresa['img_02'])) : ?>
                                        <td></td>
                                    <?php else : ?>
                                        <td><img src="<?= $base; ?>/assets/img/uploads/<?= $sobreEmpresa['img_02']; ?>" width="100" height="100" alt="Imagem 02"></td>
                                    <?php endif; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row mb-3">
                <!-- DADOS PARA CONTATO -->
                <div class="col">
                    <table class="table table-hover table-result">
                        <thead>
                            <tr class="cabecalhoTable">
                                <th colspan="2">Dados para contato</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Chat</th>
                                <?php if ($contato['chat'] == 0) : ?>
                                    <td>Não</td>
                                <?php else : ?>
                                    <td>Sim</td>
                                <?php endif; ?>
                            </tr>

                            <tr>
                                <th>Telefone fixo</th>
                                <td><?= $contato['telefone_fixo']; ?></td>
                            </tr>

                            <tr>
                                <th>WhatsApp</th>
                                <td><?= $contato['whatsapp']; ?></td>
                            </tr>

                            <tr>
                                <th>E-mail Profissional 01</th>
                                <td><?= $contato['email_pro_01']; ?></td>
                            </tr>

                            <tr>
                                <th>E-mail Profissional 02</th>
                                <td><?= $contato['email_pro_02']; ?></td>
                            </tr>

                            <tr>
                                <th>E-mail Profissional 03</th>
                                <td><?= $contato['email_pro_03']; ?></td>
                            </tr>

                            <tr>
                                <th>E-mail Profissional 04</th>
                                <td><?= $contato['email_pro_04']; ?></td>
                            </tr>

                            <tr>
                                <th>E-mail Profissional 05</th>
                                <td><?= $contato['email_pro_05']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- PAGAMENTOS -->
                <div class="col">
                    <table class="table table-hover table-result">
                        <thead>
                            <tr class="cabecalhoTable">
                                <th colspan="2">Meios de Pagamentos</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- VINDI -->
                            <?php if ($pagamento['meio_pag'] == 'vindi') : ?>

                                <tr>
                                    <th>Meio de Pagamento</th>
                                    <td><?= $pagamento['meio_pag']; ?></td>
                                </tr>
                                <tr>
                                    <th>E-mail vindi</th>
                                    <td><?= $pagamento['vindi_email']; ?></td>
                                </tr>
                                <tr>
                                    <th>Senha Vindi</th>
                                    <td><?= $pagamento['vindi_senha']; ?></td>
                                </tr>

                                <!-- MOIP -->
                            <?php elseif ($pagamento['meio_pag'] == 'moip') : ?>

                                <tr>
                                    <th>Meio de Pagamento</th>
                                    <td><?= $pagamento['meio_pag']; ?></td>
                                </tr>
                                <tr>
                                    <th>Usuário Moip</th>
                                    <td><?= $pagamento['moip_usuario']; ?></td>
                                </tr>

                                <tr>
                                    <th>Senha Moip</th>
                                    <td><?= $pagamento['moip_chave_acesso']; ?></td>
                                </tr>

                                <tr>
                                    <th>Token Moip</th>
                                    <td><?= $pagamento['moip_token']; ?></td>
                                </tr>

                                <!-- CIELO -->
                            <?php elseif ($pagamento['meio_pag'] == 'cielo') : ?>

                                <tr>
                                    <th>Meio de Pagamento</th>
                                    <td><?= $pagamento['meio_pag']; ?></td>
                                </tr>
                                <tr>
                                    <th>Código de filiação Cielo</th>
                                    <td><?= $pagamento['cielo_cd_afiliacao']; ?></td>
                                </tr>

                                <!-- GETNET -->
                            <?php elseif ($pagamento['meio_pag'] == 'getnet') : ?>

                                <tr>
                                    <th>Meio de Pagamento</th>
                                    <td><?= $pagamento['meio_pag']; ?></td>
                                </tr>
                                <tr>
                                    <th>Código Filiação GetNet</th>
                                    <td><?= $pagamento['getnet_cd_afiliacao']; ?></td>
                                </tr>

                                <tr>
                                    <th>Código de terminal GetNet</th>
                                    <td><?= $pagamento['getnet_cd_terminal']; ?></td>
                                </tr>

                                <tr>
                                    <th>Usuário GetNet</th>
                                    <td><?= $pagamento['getnet_suser_cap']; ?></td>
                                </tr>

                                <tr>
                                    <th>Senha GetNet</th>
                                    <td><?= $pagamento['getnet_senha_cap']; ?></td>
                                </tr>

                                <!-- OUTRO -->
                            <?php else : ?>

                                <tr>
                                    <th>Outro meio de pagamento</th>
                                    <td><?= $pagamento['outro_pagamento']; ?></td>
                                </tr>

                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mb-3">
                <!-- MEIOS DE ENVIO -->
                <div class="col">
                    <table class="table table-hover table-result mb-5">
                        <thead>
                            <tr class="cabecalhoTable">
                                <th colspan="2">Meios de Envio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>CEP</th>
                                <td><?= $envio['cep']; ?></td>
                            </tr>

                            <tr>
                                <th>Rua e número</th>
                                <td><?= $envio['rua']; ?>, <?= $envio['numero']; ?></td>
                            </tr>

                            <tr>
                                <th>Bairro</th>
                                <td><?= $envio['bairro']; ?></td>
                            </tr>

                            <tr>
                                <th>Complemento</th>
                                <td><?= $envio['complemento']; ?></td>
                            </tr>

                            <tr>
                                <th>Cidade - UF</th>
                                <td><?= $envio['cidade']; ?> - <?= $envio['estado']; ?></td>
                            </tr>

                            <tr>
                                <th>Retirar no local</th>
                                <?php if ($envio['retirar_local'] == 1) : ?>
                                    <td>Sim</td>
                                <?php else : ?>
                                    <td>Não</td>
                                <?php endif; ?>
                            </tr>

                            <tr>
                                <th>Motoboy</th>
                                <?php if ($envio['motoboy'] == 1) : ?>
                                    <td>Sim</td>
                                <?php else : ?>
                                    <td>Não</td>
                                <?php endif; ?>
                            </tr>

                            <tr>
                                <th>Correios</th>
                                <?php if ($envio['correios'] == 1) : ?>
                                    <td>Sim</td>
                                <?php else : ?>
                                    <td>Não</td>
                                <?php endif; ?>
                            </tr>

                            <tr>
                                <th>Jadlog</th>
                                <?php if ($envio['jadlog'] == 1) : ?>
                                    <td>Sim</td>
                                <?php else : ?>
                                    <td>Não</td>
                                <?php endif; ?>
                            </tr>

                            <?php if ($envio['gateway_frete'] == 1) : ?>
                                <tr>
                                    <th>Gateway de frete</th>
                                    <td>Sim</td>
                                </tr>
                                <tr>
                                    <th>Nome gateway de frete</th>
                                    <td><?= $envio['nome_gateway_frete']; ?></td>
                                </tr>

                                <tr>
                                    <th>Usuário</th>
                                    <td><?= $envio['frete_usuario']; ?></td>
                                </tr>

                                <tr>
                                    <th>Senha</th>
                                    <td><?= $envio['frete_senha']; ?></td>
                                </tr>
                            <?php else : ?>
                                <tr>
                                    <th>Gateway de frete</th>
                                    <td>Não</td>
                                </tr>
                            <?php endif; ?>



                        </tbody>

                    </table>
                </div>

                <!-- PREÇOS E DESCONTOS -->
                <div class="col">
                    <table class="table table-hover table-result mb-5">
                        <thead>
                            <tr class="cabecalhoTable">
                                <th colspan="2">Preços e Descontos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($desconto['boleto'] == 1) : ?>
                                <tr>
                                    <th>Desconto boleto</th>
                                    <td>Sim</td>
                                </tr>

                                <tr>
                                    <th>% desconto boleto</th>
                                    <td><?= $desconto['desconto_boleto']; ?></td>
                                </tr>
                            <?php else : ?>
                                <tr>
                                    <th>Desconto boleto</th>
                                    <td>Não</td>
                                </tr>
                            <?php endif; ?>

                            <?php if ($desconto['pix'] == 1) : ?>
                                <tr>
                                    <th>Desconto pix</th>
                                    <td>Sim</td>
                                </tr>

                                <tr>
                                    <th>% desconto pix</th>
                                    <td><?= $desconto['desconto_pix']; ?></td>
                                </tr>
                            <?php else : ?>
                                <tr>
                                    <th>Desconto pix</th>
                                    <td>Não</td>
                                </tr>
                            <?php endif; ?>

                            <tr>
                                <th>Parcelas sem juros</th>
                                <td><?= $desconto['parcelas_sj']; ?></td>
                            </tr>

                            <tr>
                                <th>Valor limite por parcela</th>
                                <td><?= $desconto['valor_limite']; ?></td>
                            </tr>

                            <?php if ($desconto['desc_progressivo'] == 1) : ?>
                                <tr>
                                    <th>Desconto progressivo</th>
                                    <td>Sim</td>
                                </tr>

                                <tr>
                                    <th>Regra desconto progressivo</th>
                                    <td><?= $desconto['regra_desc_prog']; ?></td>
                                </tr>
                            <?php else : ?>
                                <tr>
                                    <th>Desconto progressivo</th>
                                    <td>Não</td>
                                </tr>
                            <?php endif; ?>

                            <?php if ($desconto['frete_gratis'] == 1) : ?>
                                <tr>
                                    <th>Frete grátis</th>
                                    <td>Sim</td>
                                </tr>
                                <tr>
                                    <th>Regra frete grátis</th>
                                    <td><?= $desconto['regra_frete_gratis']; ?></td>
                                </tr>
                            <?php else : ?>
                                <tr>
                                    <th>Frete grátis</th>
                                    <td>Não</td>
                                </tr>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>

    <?= $render("footer"); ?>