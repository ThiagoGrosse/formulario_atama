<?php

$render('head');

$GLOBALS['user'] = $user;
?>

<body>

    <?= $render('header'); ?>


    <main class="mb-5 mt-5">

        <div class="container">

            <div class="d-flex justify-content-between">
                <div class="title-page">
                    <h4>Usuários</h4>
                </div>
                <di class="new-user">
                    <button type="button" class="btn btn-primary" id="newUser" data-bs-toggle="modal" data-bs-target="#modalNewUser">Adicionar usuário</button>
                </di modal-dialog-centeredv>
            </div>

            <section class="mt-5">

                <div class="container-table">

                    <table class="table table-hover table-borderless text-center">
                        <thead>
                            <tr class="table-dark align-middle">
                                <th>Foto</th>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Nível de acesso</th>
                                <?php if ($user['type']) : ?>
                                    <th>Ações</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($data as $i) : ?>

                                <?php
                                if ($i['type'] == 1) {
                                    $typeUser = 'Admin';
                                } else {
                                    $typeUser = 'Usuário';
                                }
                                ?>

                                <tr class="align-middle" id="<?= $i['id']; ?>">

                                    <?php if ($i['img_profile']) : ?>

                                        <td>
                                            <img src="<?= $base; ?>/assets/img/users/<?= $i['img_profile']; ?>" width="50" height="50" class="profileImgUser" alt="Foto do usuário">
                                        </td>

                                    <?php else : ?>

                                        <td>
                                            <img src="<?= $base; ?>/assets/img/users/user.png" alt="Foto do usuário" width="50" height="50" class="profileImgUser">
                                        </td>

                                    <?php endif; ?>


                                    <td><?= $i['id']; ?></td>
                                    <td><?= $i['nome']; ?></td>
                                    <td><?= $i['email']; ?></td>
                                    <td><?= $typeUser; ?></td>
                                    <?php if ($user['type']) : ?>
                                        <td>
                                            <button type="button" class="btn editUser" id="edit-<?= $i['id']; ?>" data-bs-toggle="modal" data-bs-target="#modalEditUser">
                                                <i class="fas fa-edit" title="Editar usuário"></i>
                                            </button>

                                            <button type="button" class="btn removeUser" id="remove-<?= $i['id']; ?>">
                                                <i class="fas fa-trash" title="Remover usuário"></i>
                                            </button>
                                        </td>
                                    <?php endif; ?>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>

                    </table>

                </div>

            </section>

        </div>

    </main>

    <!-- MODAL CADASTRO DE USUÁRIO -->
    <div class="modal fade" id="modalNewUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cadastrar novo usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="#" method="post" id="formNewUser">

                        <div class="mb-3">
                            <label for="nomeUsuario" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nomeUsuario" placeholder="Nome do usuário" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" placeholder="E-mail do usuário" required>
                        </div>

                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" placeholder="Senha do usuário" required>
                        </div>

                        <label for="tipoUsuario" class="form-label">Tipo de usuário</label>
                        <select class="form-select" name="tipoUsuario" id="tipoUsuario" required>
                            <option selected disabled>Selecione</option>
                            <option value="1">Admin</option>
                            <option value="0">Usuário</option>
                        </select>

                        <div class="modal-footer d-flex justify-content-between mt-3">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL EDIÇÃO DE USUÁRIO -->
    <div class="modal fade" id="modalEditUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar dados usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="#" method="post" id="userEdit">

                        <input type="number" class="display-none" name="idUserEdit" id="idUserEdit">
                        <div class="mb-3">
                            <label for="nomeUsuarioEdit" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nomeUsuarioEdit" placeholder="Nome do usuário" required>
                        </div>

                        <div class="mb-3">
                            <label for="emailEdit" class="form-label">E-mail</label>
                            <input type="emailEdit" class="form-control" id="emailEdit" placeholder="E-mail do usuário" required>
                        </div>

                        <div class="mb-3">
                            <label for="senhaEdit" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senhaEdit" placeholder="Senha do usuário">
                        </div>

                        <label for="tipoUsuarioEdit" class="form-label">Tipo de usuário</label>
                        <select class="form-select" name="tipoUsuarioEdit" id="tipoUsuarioEdit">
                            <option selected disabled>Selecione</option>
                            <option value="1">Admin</option>
                            <option value="0">Usuário</option>
                        </select>

                        <div class="modal-footer d-flex justify-content-between mt-3">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?= $render('footer'); ?>