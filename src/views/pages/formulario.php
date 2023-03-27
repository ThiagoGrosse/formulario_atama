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

    <main class="mb-5 mt-3">

        <div class="container">
            <input type="text" id="input-token" class="input-oculto" value="<?= $token; ?>" disabled>

            <!-- TÍTULO DO FORMULÁRIO -->
            <div class="d-flex justify-content-between align-items-center">

                <?php if ($completed == true) : ?>

                    <h4><?= $nomeForm; ?></h4>

                    <div class="status-form">
                        Formulário concluído
                        <i class="fas fa-check"></i>
                    </div>

                <?php else : ?>

                    <h4><?= $nomeForm; ?></h4>

                <?php endif; ?>

                <div class="d-flex">

                    <?php if ($status == 1 && !empty($user)) : ?>
                        <button type="button" class="btn btn-outline-success m-3" data-bs-toggle="modal" data-bs-target="#fireworksEffect" id="setFormConcluded"><i class="fas fa-check"></i> Marcar como concluído</button>
                    <?php endif; ?>

                    <?php if (!$arquivado && !empty($user)) : ?>
                        <button type="button" class="btn btn-outline-primary m-3" id="arquivarForm"><i class="fas fa-archive"></i> Arquivar</button>
                    <?php endif; ?>

                </div>
            </div>

            <div class="mt-3">
                <div class="row">
                    <div class="accordion mb-5" id="accordionPanelsStayOpenExample">

                        <!-- APRESENTAÇÃO -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                                    Apresentação
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">

                                    <?= $render('apresentacao'); ?>

                                </div>
                            </div>
                        </div>


                        <!-- IDENTIDADE VISUAL -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    Identidade Visual

                                    <?php if ($idVisual['completed']) : ?>
                                        <i class="fas fa-check visibility-visible" id="idVisualCheck"></i>
                                    <?php else : ?>
                                        <i class="fas fa-check visibility-hidden" id="idVisualCheck"></i>
                                    <?php endif; ?>

                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">

                                    <?= $render('idVisual'); ?>

                                </div>
                            </div>
                        </div>


                        <!-- INFORMAÇÕES SOBRE O TEMA -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                    Informações Sobre o Tema

                                    <?php if ($infoTema['completed']) : ?>
                                        <i class="fas fa-check visibility-visible" id="infoTemaCheck"></i>
                                    <?php else : ?>
                                        <i class="fas fa-check visibility-hidden" id="infoTemaCheck"></i>
                                    <?php endif; ?>

                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">

                                    <?= $render('infoTema'); ?>

                                </div>
                            </div>
                        </div>


                        <!-- ACESSOS PLATAFORMA -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                    Acessos Plataforma

                                    <?php if ($acessoPlataforma['completed']) : ?>
                                        <i class="fas fa-check visibility-visible" id="acessosPlataformaCheck"></i>
                                    <?php else : ?>
                                        <i class="fas fa-check visibility-hidden" id="acessosPlataformaCheck"></i>
                                    <?php endif; ?>

                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                                <div class="accordion-body">

                                    <?= $render('acessosPlataforma'); ?>

                                </div>
                            </div>
                        </div>


                        <!-- DOMÍNIO -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingEleven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEleven" aria-expanded="false" aria-controls="panelsStayOpen-collapseEleven">
                                    Domínio

                                    <?php if ($dominio['completed']) : ?>
                                        <i class="fas fa-check visibility-visible" id="dominioCheck"></i>
                                    <?php else : ?>
                                        <i class="fas fa-check visibility-hidden" id="dominioCheck"></i>
                                    <?php endif; ?>

                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseEleven" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingEleven">
                                <div class="accordion-body">

                                    <?= $render('dominio'); ?>

                                </div>
                            </div>
                        </div>


                        <!-- MARKETPLACES -->
                        <?php if ($typeForm !== 'P1') : ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                                        Marketplaces

                                        <?php if ($marketplace['completed']) : ?>
                                            <i class="fas fa-check visibility-visible" id="marketplacesCheck"></i>
                                        <?php else : ?>
                                            <i class="fas fa-check visibility-hidden" id="marketplacesCheck"></i>
                                        <?php endif; ?>

                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                                    <div class="accordion-body">

                                        <?= $render('marketplaces'); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>


                        <!-- SOBRE A EMPRESA -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
                                    Sobre a Empresa

                                    <?php if ($sobreEmpresa['completed']) : ?>
                                        <i class="fas fa-check visibility-visible" id="sobreEmpresaCheck"></i>
                                    <?php else : ?>
                                        <i class="fas fa-check visibility-hidden" id="sobreEmpresaCheck"></i>
                                    <?php endif; ?>

                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
                                <div class="accordion-body">

                                    <?= $render('sobreEmpresa'); ?>

                                </div>
                            </div>
                        </div>


                        <!-- DADOS PARA CONTATO -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven">
                                    Dados para Contato

                                    <?php if ($contato['completed']) : ?>
                                        <i class="fas fa-check visibility-visible" id="contatosCheck"></i>
                                    <?php else : ?>
                                        <i class="fas fa-check visibility-hidden" id="contatosCheck"></i>
                                    <?php endif; ?>

                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSeven">
                                <div class="accordion-body">

                                    <?= $render('contatos'); ?>

                                </div>
                            </div>
                        </div>


                        <!-- MEIOS DE PAGAMENTO -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingEigth">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEigth" aria-expanded="false" aria-controls="panelsStayOpen-collapseEigth">
                                    Meio de Pagamento

                                    <?php if ($pagamento['completed']) : ?>
                                        <i class="fas fa-check visibility-visible" id="pagamentosCheck"></i>
                                    <?php else : ?>
                                        <i class="fas fa-check visibility-hidden" id="pagamentosCheck"></i>
                                    <?php endif; ?>

                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseEigth" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingEigth">
                                <div class="accordion-body">

                                    <?= $render('pagamentos'); ?>

                                </div>
                            </div>
                        </div>


                        <!-- MEIOS DE ENVIO -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseNine" aria-expanded="false" aria-controls="panelsStayOpen-collapseNine">
                                    Meios de Envio

                                    <?php if ($envio['completed']) : ?>
                                        <i class="fas fa-check visibility-visible" id="enviosCheck"></i>
                                    <?php else : ?>
                                        <i class="fas fa-check visibility-hidden" id="enviosCheck"></i>
                                    <?php endif; ?>

                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseNine" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingNine">
                                <div class="accordion-body">

                                    <?= $render('envios'); ?>

                                </div>
                            </div>
                        </div>


                        <!-- PRECOS E DESCONTOS -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTen" aria-expanded="false" aria-controls="panelsStayOpen-collapseTen">
                                    Preços e Descontos

                                    <?php if ($desconto['completed']) : ?>
                                        <i class="fas fa-check visibility-visible" id="precosDescontosCheck"></i>
                                    <?php else : ?>
                                        <i class="fas fa-check visibility-hidden" id="precosDescontosCheck"></i>
                                    <?php endif; ?>

                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTen" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTen">
                                <div class="accordion-body">

                                    <?= $render('precosDescontos'); ?>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="progressBarForm">
            <div id="progBar" class="ldBar d-flex justify-content-center align-items-center" data-value="" data-preset="bubble"></div>
        </div>


        <div class="modal fade" id="fireworksEffect" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body d-flex justify-content-between align-items-center">
                        Formulário concluído!
                        <button type="button" id="destroyFireworks" class="btn btn-success" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?= $render("footer"); ?>