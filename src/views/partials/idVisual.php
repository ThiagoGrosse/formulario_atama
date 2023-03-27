<?php global $idVisual; ?>


<section class="mt-3">
    <div class="row mb-3">
        <div class="col">
            <h4><strong>Identidade Visual</strong></h4>
        </div>
    </div>

    <form action="#" method="POST" id="formIdVisual" name="formIdVisual">

        <!-- INPUT LOGO -->
        <div class="d-flex justify-content-between">

            <?php if ($idVisual['logo']) : ?>

                <div class="mb-3">
                    <label for="formlogo" class="form-label">Logo da empresa:</label>
                    <input class="form-control upload-file" type="file" id="formlogo" name="formlogo">
                </div>
                <div class="d-flex w-100 mb-3">
                    <img src="<?= $base; ?>/assets/img/uploads/<?= $idVisual['logo']; ?>" id="preview-formlogo" alt="Logo da Empresa">
                </div>

            <?php else : ?>

                <div class="mb-3">
                    <label for="formlogo" class="form-label">Logo da empresa:</label>
                    <input class="form-control upload-file" type="file" id="formlogo" name="formlogo" required>
                </div>
                <div class="d-flex w-100 mb-3">
                    <img src="<?= $base; ?>/assets/img/sem-imagem.png" id="preview-formlogo" alt="Logo da Empresa">
                </div>

            <?php endif; ?>
        </div>


        <!-- INPUT MANUAL DA MARCA -->
        <div class="d-flex justify-content-between">
            <div class="mb-3">
                <label for="formBrandManual" class="form-label">Manual da marca (caso possua):</label>
                <input class="form-control upload-file" type="file" id="formBrandManual" name="formBrandManual">
            </div>

            <div class="d-flex w-100 flex-column align-items-center justify-content-center">

                <?php if ($idVisual['brand_manual']) : ?>

                    <img src="<?= $base; ?>/assets/img/pasta-vazia.png" id="icone-pasta-vazia" class="display-none" alt="Icone de pasta sem arquivos">
                    <img src="<?= $base; ?>/assets/img/armazenamento-de-arquivo.png" id="icone-pasta" class="display-block" alt="Icone de pasta com arquivos">
                    <a href="" class="display-block">Download</a>

                <?php else : ?>

                    <img src="<?= $base; ?>/assets/img/pasta-vazia.png" id="icone-pasta-vazia" class="display-block" alt="Icone de pasta sem arquivos">
                    <img src="<?= $base; ?>/assets/img/armazenamento-de-arquivo.png" id="icone-pasta" class="display-none" alt="Icone de pasta com arquivos">
                    <a href="" class="display-none">Download</a>

                <?php endif; ?>
            </div>

        </div>


        <!-- INPUT LINK DRIVE -->
        <div class="mt-3">
            <div class="mb-3">
                <label for="linkDrive" class="form-label">Link Drive com a Logo (caso possua)</label>
                <input type="text" class="form-control" id="linkDrive" placeholder="Insira o link aqui" autocomplete="off">
            </div>
        </div>

        <div class="mt-5">
            <p>
                Outro ponto importante são as principais cores usadas na comunicação da sua empresa. Informe abaixo a cor principal, secundária e terciária de sua preferência.
            </p><br>
            <p>
                <strong>Importante:</strong> Está em dúvida sobre quais cores informar? Não se preocupe, você pode deixar os campos em branco e usaremos as variações de cores presentes na sua marca.
            </p>
        </div>

        <?php if ($idVisual['primary_color']) : ?>

            <div class="mt-5">
                <label for="cor-primaria" class="form-label">Cor Primária</label>
                <div class="d-flex align-items-center mb-3">
                    <input type="text" class="form-control name-color" id="cor-primaria" placeholder="Informe o nome da cor" autocomplete="off" value="<?= $idVisual['primary_color']; ?>">
                    <input type="color" class="input-color" id="input-cor-primaria" value="<?= $idVisual['primary_color']; ?>">
                </div>
            </div>

        <?php else : ?>

            <div class="mt-5">
                <label for="cor-primaria" class="form-label">Cor Primária</label>
                <div class="d-flex align-items-center mb-3">
                    <input type="text" class="form-control name-color" id="cor-primaria" placeholder="Informe o nome da cor" autocomplete="off" required>
                    <input type="color" class="input-color" id="input-cor-primaria">
                </div>
            </div>


        <?php endif; ?>

        <?php if ($idVisual['secondary_color']) : ?>

            <div class="mt-5">
                <label for="cor-secundaria" class="form-label">Cor Secundária</label>
                <div class="d-flex align-items-center mb-3">
                    <input type="text" class="form-control name-color" id="cor-secundaria" placeholder="Informe o nome da cor" autocomplete="off" value="<?= $idVisual['secondary_color']; ?>">
                    <input type="color" class="input-color" id="input-cor-secundaria" value="<?= $idVisual['secondary_color']; ?>">
                </div>
            </div>

        <?php else : ?>

            <div class="mt-5">
                <label for="cor-secundaria" class="form-label">Cor Secundária</label>
                <div class="d-flex align-items-center mb-3">
                    <input type="text" class="form-control name-color" id="cor-secundaria" placeholder="Informe o nome da cor" autocomplete="off" required>
                    <input type="color" class="input-color" id="input-cor-secundaria">
                </div>
            </div>

        <?php endif; ?>


        <?php if ($idVisual['tertiary_color']) : ?>

            <div class="mt-5">
                <label for="cor-terciaria" class="form-label">Cor Terciária</label>
                <div class="d-flex align-items-center mb-3">
                    <input type="text" class="form-control name-color" id="cor-terciaria" placeholder="Informe o nome da cor" autocomplete="off" value="<?= $idVisual['tertiary_color']; ?>">
                    <input type="color" class="input-color" id="input-cor-terciaria" value="<?= $idVisual['tertiary_color']; ?>">
                </div>
            </div>

        <?php else : ?>

            <div class="mt-5">
                <label for="cor-terciaria" class="form-label">Cor Terciária</label>
                <div class="d-flex align-items-center mb-3">
                    <input type="text" class="form-control name-color" id="cor-terciaria" placeholder="Informe o nome da cor" autocomplete="off" required>
                    <input type="color" class="input-color" id="input-cor-terciaria">
                </div>
            </div>

        <?php endif; ?>

        <?php if ($idVisual['do_not_use']) : ?>

            <div class="mt-5">
                <label for="cor-nao-usar" class="form-label">Cores que não devem ser utilizadas</label>
                <div class="d-flex align-items-center mb-3">
                    <input type="text" class="form-control" id="cor-nao-usar" placeholder="Digite sua resposta" autocomplete="off" value="<?= $idVisual['do_not_use']; ?>">
                </div>
            </div>

        <?php else : ?>

            <div class="mt-5">
                <label for="cor-nao-usar" class="form-label">Cores que não devem ser utilizadas</label>
                <div class="d-flex align-items-center mb-3">
                    <input type="text" class="form-control" id="cor-nao-usar" placeholder="Digite sua resposta" autocomplete="off">
                </div>
            </div>

        <?php endif; ?>

        <div class="mb-3 w-100 d-flex justify-content-end">
            <button class="btn btn-primary">Salvar</button>
        </div>
    </form>
</section>