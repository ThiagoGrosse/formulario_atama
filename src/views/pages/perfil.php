<?php

$render('head');

$GLOBALS['user'] = $user;
$GLOBALS['forms'] = $forms;

?>

<body>

    <?= $render('header'); ?>

    <main class="mb-5 mt-5">

        <div class="container">

            <div class="d-flex justify-content-between mb-3">
                <div class="title-page">
                    <h4>Meu Perfil</h4>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div class="img-perfil">
                    <label for="userImgProfile">
                        <span class="btnEditImgProfile">
                            <div class="bg-text-img">
                                Alterar Imagem<i class="fas fa-edit"></i>
                            </div>
                        </span>

                        <form action="#" method="post" id="formEditImgProfile">

                            <?php if ($user['img_profile']) : ?>

                                <img src="<?= $base; ?>/assets/img/users/<?= $user['img_profile']; ?>" alt="Foto do usuário" width="150" height="150" id="img-user">

                            <?php else : ?>

                                <img src="<?= $base; ?>/assets/img/users/user.png" alt="Foto do usuário" width="150" height="150" id="img-user">

                            <?php endif; ?>

                            <input type='file' name="userImgProfile" id="userImgProfile" accept="image/png, image/jpeg, image/jpg" hidden />

                        </form>
                    </label>
                </div>

                <div class="formularioPerfil">
                    <form action="#" method="post" id="formEditUserProfile">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="col-3 mb-3">
                                <label for="nomePerfil" class="form-label">Nome</label>
                                <input type="nomePerfil" class="form-control" id="nomePerfil" value="<?= $user['nome']; ?>" disabled>
                            </div>

                            <div class="col-3 mb-3">
                                <label for="emailPerfil" class="form-label">E-mail</label>
                                <input type="emailPerfil" class="form-control" id="emailPerfil" value="<?= $user['email']; ?>" disabled>
                            </div>

                            <div class="col-3">
                                <div class="btns-forms d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" id="alterarPass" data-bs-toggle="modal" data-bs-target="#alterarSenha">Alterar senha</button>
                                    <button type="button" class="btn btn-primary display-block m-auto" id="editProfile">Editar</button>

                                    <button type="submit" class="btn btn-success display-none" id="saveEdition">Salvar</button>
                                    <button type="button" class="btn btn-danger display-none" id="cancelaEdicao">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="subTitlePageProfile d-flex justify-content-between aling-items-center mt-5 mb-5">
                <hr>
                <span class="bold f-20px">
                    Formulários
                </span><br />
                <small>Abertos nos últimos 60 dias</small>
                <hr>
            </div>

            <div class="row">
                <table class="table table-hover" id="tableFormsProfile">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Título</th>
                            <th>Tipo</th>
                            <th>Status</th>
                            <th>Completado</th>
                            <th>Arquivado</th>
                            <th>Data Criação</th>
                            <th>Última Alteração</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($forms as $i) : ?>

                            <tr>
                                <td><?= $i['tokenForm']; ?></td>
                                <td><?= $i['nomeForm']; ?></td>
                                <td><?= $i['typeForm']; ?></td>

                                <?php if ($i['status'] == 0) : ?>
                                    <td>Inativo</td>
                                <?php else : ?>
                                    <td>Ativo</td>
                                <?php endif; ?>

                                <?php if ($i['completed'] == 1) : ?>
                                    <td>Sim</td>
                                <?php else : ?>
                                    <td>Não</td>
                                <?php endif; ?>

                                <?php if ($i['archived'] == 1) : ?>
                                    <td>Sim</td>
                                <?php else : ?>
                                    <td>Não</td>
                                <?php endif; ?>

                                <td><?php echo date('d/m/Y H:i:s', strtotime($i['created_at'])); ?></td>
                                <td><?php echo date('d/m/Y H:i:s', strtotime($i['updated_at'])); ?></td>
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

    </main>

    <div class="modal fade" id="alterarSenha" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Alterar Senha</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" id="editSenhaPerfil">
                        <div class="mb-3">
                            <label for="newPassword" class="label-control">Insira a nova senha:</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Nova senha" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmNewPassword" class="label-control">Confirme a nova senha:</label>
                            <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirmar nova senha" required disabled>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary" id="save-edit-profile">Salvar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <?= $render('footer'); ?>