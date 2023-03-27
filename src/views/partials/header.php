    <?php global $user; ?>

    <header>
        <nav class="nav">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center h-100">

                    <?php if ($user) : ?>

                        <a href="<?= $base; ?>/" id="link-home">
                            <div class="logo-cabecalho d-flex flex-column align-items-end">
                                <span>atâma</span>
                                <span>digital</span>
                            </div>
                        </a>

                        <div class="dropstart">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">

                                <?php if ($user['img_profile']) : ?>

                                    <img src="<?= $base; ?>/assets/img/users/<?= $user['img_profile']; ?>" width="40" height="40" class="profileImgUser" alt="Foto do usuário">

                                <?php else : ?>

                                    <img src="<?= $base; ?>/assets/img/users/user.png" alt="Foto do usuário" width="40" height="40" class="profileImgUser">

                                <?php endif; ?>

                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="<?= $base; ?>/perfil">Meu Perfil</a></li>
                                <li><a class="dropdown-item" href="<?= $base; ?>/usuarios">Usuários</a></li>
                                <li>
                                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="<?= $base; ?>/logout">
                                        Dar no pé
                                        <i class="fas fa-sign-out-alt"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    <?php else : ?>

                        <div class="logo-cabecalho d-flex flex-column align-items-end">
                            <span>atâma</span>
                            <span>digital</span>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </nav>
    </header>