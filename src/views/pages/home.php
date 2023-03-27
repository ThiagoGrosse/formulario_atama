<?php

$render('head');

$GLOBALS['user'] = $user;

?>

<body>

    <?= $render('header'); ?>

    <main class="mt-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="subTitlePageProfile d-flex justify-content-between aling-items-center mt-4 mb-4">
                    <hr>
                    <span class="bold f-20px">Modelos</span>
                    <hr>
                </div>
            </div>

            <!-- MODELOS FORMULÁRIOS -->
            <div class="row">

                <div class="d-flex justify-content-around mb-3 mt-3">

                    <button class="btn-modal-new-form" id="p1" data-bs-toggle="modal" data-bs-target="#myModal">
                        <span>Modelo | P1</span>
                    </button>

                    <button class="btn-modal-new-form" id="p2" data-bs-toggle="modal" data-bs-target="#myModal">
                        <span>Modelo | P2</span>
                    </button>

                    <button class="btn-modal-new-form" id="p3" data-bs-toggle="modal" data-bs-target="#myModal">
                        <span>Modelo | P3</span>
                    </button>

                </div>



                <!-- <ul class="list-modelos d-flex justify-content-center flex-column">

                    <li class="option-list option-model">
                        <span>Implementação de E-commerce | P1</span>
                        <button class="btn btn-modal-new-form" id="p1" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-play"></i></button>
                    </li>


                    <li class="option-list option-model">
                        <span>Implementação de E-commerce | P2</span>
                        <button class="btn btn-modal-new-form" id="p2" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-play"></i></button>
                    </li>


                    <li class="option-list option-model">
                        <span>Implementação de E-commerce | P3</span>
                        <button class="btn btn-modal-new-form" id="p3" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-play"></i></button>
                    </li>
                </ul> -->
            </div>


            <!-- MODELOS BANNER -->
            <!-- <div class="row">
                <ul class="list-modelos d-flex justify-content-center flex-column">

                    <li class="option-list option-model">
                        <span>Briefing de banner | P1</span>
                        <button class="btn btn-modal-new-form" id="b1" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-play"></i></button>
                    </li>

                    <li class="option-list option-model">
                        <span>Briefing de banner | P2</span>
                        <button class="btn btn-modal-new-form" id="b2" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-play"></i></button>
                    </li>

                    <li class="option-list option-model">
                        <span>Briefing de banner | P3</span>
                        <button class="btn btn-modal-new-form" id="b3" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-play"></i></button>
                    </li>
                </ul>
            </div> -->

            <div class="row">
                <div class="subTitlePageProfile d-flex justify-content-between aling-items-center mt-4 mb-4">
                    <hr>
                    <span class="bold f-20px">Formulários</span>
                    <hr>
                </div>
            </div>

            <div class="row mt-3 padding-bottom">
                <div class="accordion" id="accordionExample">

                    <!-- FOMRULARIOS AGUARDANDO PREENCHIMENTO -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingone">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseone" aria-expanded="false" aria-controls="collapseone">
                                <i class="fas fa-book-open"></i>
                                Aguardando preenchimento
                            </button>
                        </h2>
                        <div id="collapseone" class="accordion-collapse collapse" aria-labelledby="headingone" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Token</th>
                                            <th>Nome formulário</th>
                                            <th>Criado por:</th>
                                            <th>Tipo formulário</th>
                                            <th>Data criação</th>
                                            <th>Última atualização</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($formActive as $i) :

                                            $createdAt = date('d/m/Y', strtotime($i['created_at']));
                                            $updateAt = date('d/m/Y - H:i:s', strtotime($i['updated_at']));
                                        ?>
                                            <tr>
                                                <td><?= $i['tokenForm']; ?></td>
                                                <td><?= $i['nomeForm']; ?></td>
                                                <td><?= $i['createdby']; ?></td>
                                                <td><?= $i['typeForm']; ?></td>
                                                <td><?= $createdAt; ?></td>
                                                <td><?= $updateAt; ?></td>
                                                <td>
                                                    <a href="<?= $base; ?>/formulario/<?= $i['tokenForm']; ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- FOMRULARIOS CONCLUÍDOS -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fas fa-check"></i>
                                Concluídos
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Token</th>
                                            <th>Nome formulário</th>
                                            <th>Criado por:</th>
                                            <th>Tipo formulário</th>
                                            <th>Data criação</th>
                                            <th>Última atualização</th>
                                            <th colspan="2">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($formInative as $i) :

                                            $createdAt = date('d/m/Y', strtotime($i['created_at']));
                                            $updateAt = date('d/m/Y - H:i:s', strtotime($i['updated_at']));
                                        ?>
                                            <tr>
                                                <td><?= $i['tokenForm']; ?></td>
                                                <td><?= $i['nomeForm']; ?></td>
                                                <td><?= $i['createdby']; ?></td>
                                                <td><?= $i['typeForm']; ?></td>
                                                <td><?= $createdAt; ?></td>
                                                <td><?= $updateAt; ?></td>
                                                <td>
                                                    <a href="<?= $base; ?>/formulario/<?= $i['tokenForm']; ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?= $base; ?>/tabelas/<?= $i['tokenForm']; ?>" title="Abrir tabela de informações">
                                                        <i class="fas fa-table"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- FOMRULARIOS ARQUIVADOS -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="fas fa-archive"></i>
                                Arquivados
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Token</th>
                                            <th>Nome formulário</th>
                                            <th>Criado por:</th>
                                            <th>Tipo formulário</th>
                                            <th>Data criação</th>
                                            <th>Última atualização</th>
                                            <th colspan="2">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($formArchived as $i) :

                                            $createdAt = date('d/m/Y', strtotime($i['created_at']));
                                            $updateAt = date('d/m/Y - H:i:s', strtotime($i['updated_at']));
                                        ?>
                                            <tr>
                                                <td><?= $i['tokenForm']; ?></td>
                                                <td><?= $i['nomeForm']; ?></td>
                                                <td><?= $i['createdby']; ?></td>
                                                <td><?= $i['typeForm']; ?></td>
                                                <td><?= $createdAt; ?></td>
                                                <td><?= $updateAt; ?></td>
                                                <td>
                                                    <a href="<?= $base; ?>/formulario/<?= $i['tokenForm']; ?>" title="Abrir formulário">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?= $base; ?>/tabelas/<?= $i['tokenForm']; ?>" title="Abrir tabela de informações">
                                                        <i class="fas fa-table"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <!-- MODAL NOVO FORMULÁRIO -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Defina um nome para o formulário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" id="novoFormulario">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control input-oculto" name="tipo-projeto" id="tipo-projeto" disabled>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nome-projeto" id="nome-projeto" placeholder="Nome do projeto">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?= $render('footer'); ?>