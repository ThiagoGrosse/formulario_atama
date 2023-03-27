<?php global $sobreEmpresa; ?>

<section class="mt-3">

    <div class="row">
        <div class="col">
            <h4><strong>Quem Somos</strong></h4>
            <p>
                Para que os clientes sintam mais confiança em sua loja virtual é importante que a sua loja contenha uma página Quem Somos.
            </p>
            <p>
                Nessa página é importante contar mais sobre a sua empresa, sua história e área de atuação.
            </p>
        </div>
    </div>

    <form action="#" method="post" id="formQuemSomos">

        <div class="row">

            <div class="col">
                <div class="mb-3">
                    <label for="quemSomos" class="form-label">Quem Somos</label>

                    <?php if ($sobreEmpresa['quem_somos']) : ?>

                        <textarea class="form-control" id="quemSomos" name="quemSomos" rows="5" autocomplete="off" required><?= $sobreEmpresa['quem_somos']; ?></textarea>

                    <?php else : ?>

                        <textarea class="form-control" id="quemSomos" name="quemSomos" rows="5" autocomplete="off" required></textarea>

                    <?php endif; ?>

                </div>
            </div>

            <div class="col">
                <div class="mb-3">
                    <label for="slogan" class="form-label">Slogan</label>

                    <?php if ($sobreEmpresa['slogan']) : ?>

                        <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Digite sua resposta" autocomplete="off" value="<?= $sobreEmpresa['slogan']; ?>">

                    <?php else : ?>

                        <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Digite sua resposta" autocomplete="off">

                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <div class="mb-3">
                        <label for="img-loja-01" class="form-label">Foto da Empresa 01:</label>
                        <input class="form-control upload-file" type="file" id="img-loja-01" name="img-loja-01">
                    </div>

                    <?php if ($sobreEmpresa['img_01']) : ?>

                        <img src="<?= $base; ?>/assets/img/uploads/<?= $sobreEmpresa['img_01']; ?>" id="preview-img-loja-01" class="img-upload" alt="Foto da Empresa 01">

                    <?php else : ?>

                        <img src="<?= $base; ?>/assets/img/sem-imagem.png" id="preview-img-loja-01" class="img-upload" alt="Foto da Empresa 01">

                    <?php endif; ?>

                </div>
            </div>

            <div class="col">
                <div class="d-flex justify-content-between">
                    <div class="mb-3">
                        <label for="img-loja-02" class="form-label">Foto da Empresa 02:</label>
                        <input class="form-control upload-file" type="file" id="img-loja-02" name="img-loja-02">
                    </div>

                    <?php if ($sobreEmpresa['img_02']) : ?>

                        <img src="<?= $base; ?>/assets/img/uploads/<?= $sobreEmpresa['img_02']; ?>" id="preview-img-loja-02" class="img-upload" alt="Foto da Empresa 02">

                    <?php else : ?>

                        <img src="<?= $base; ?>/assets/img/sem-imagem.png" id="preview-img-loja-02" class="img-upload" alt="Foto da Empresa 02">

                    <?php endif; ?>


                </div>
            </div>
        </div>

        <div class="mb-3 w-100 d-flex justify-content-end">
            <button class="btn btn-primary">Salvar</button>
        </div>


    </form>

</section>