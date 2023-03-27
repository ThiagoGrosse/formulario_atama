<?php global $infoTema; ?>

<section class="mt-3">

    <div class="row mb-3">
        <div class="col">
            <h4><strong>Informações sobre o tema</strong></h4>
        </div>
    </div>

    <form action="#" method="post" id="formInfoTema">

        <div class="row">
            <div class="col">
                <div class="mb-3">

                    <?php if ($infoTema['nome_loja']) : ?>

                        <label for="nomeLoja" class="form-label">Qual é o nome da sua loja?</label>
                        <input type="text" class="form-control" id="nomeLoja" name="nomeLoja" placeholder="Digite sua resposta" autocomplete="off" value="<?= $infoTema['nome_loja']; ?>" required>

                    <?php else : ?>

                        <label for="nomeLoja" class="form-label">Qual é o nome da sua loja?</label>
                        <input type="text" class="form-control" id="nomeLoja" name="nomeLoja" placeholder="Digite sua resposta" autocomplete="off" required>

                    <?php endif; ?>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">

                    <?php if ($infoTema['produto_servico']) : ?>

                        <label for="produtoServico" class="form-label">Que tipo de produtos/serviços sua empresa oferece?</label>
                        <input type="text" class="form-control" id="produtoServico" name="produtoServico" placeholder="Digite sua resposta" autocomplete="off" value="<?= $infoTema['produto_servico']; ?>" required>

                    <?php else : ?>

                        <label for="produtoServico" class="form-label">Que tipo de produtos/serviços sua empresa oferece?</label>
                        <input type="text" class="form-control" id="produtoServico" name="produtoServico" placeholder="Digite sua resposta" autocomplete="off" required>

                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="mb-3">

                <?php if ($infoTema['diferencial']) : ?>

                    <label for="diferencial" class="form-label">O que diferencia sua empresa dos seus concorrentes? Vantagens e desvantagens sobre eles.</label>
                    <textarea class="form-control" id="diferencial" name="diferencial" rows="5" autocomplete="off"><?= $infoTema['diferencial']; ?></textarea>

                <?php else : ?>

                    <label for="diferencial" class="form-label">O que diferencia sua empresa dos seus concorrentes? Vantagens e desvantagens sobre eles.</label>
                    <textarea class="form-control" id="diferencial" name="diferencial" rows="5" autocomplete="off"></textarea>

                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="mb-3">

                <?php if ($infoTema['link_concorrente']) : ?>

                    <label for="linkConcorrente" class="form-label">Informe o link do site de seus principais concorrentes</label>
                    <input type="text" class="form-control" id="linkConcorrente" name="linkConcorrente" placeholder="Digite sua resposta" autocomplete="off" value="<?= $infoTema['link_concorrente']; ?>">

                <?php else : ?>

                    <label for="linkConcorrente" class="form-label">Informe o link do site de seus principais concorrentes</label>
                    <input type="text" class="form-control" id="linkConcorrente" name="linkConcorrente" placeholder="Digite sua resposta" autocomplete="off">

                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="mb-5">

                <?php if ($infoTema['sites_interessantes']) : ?>

                    <label for="sitesInteressantes" class="form-label">Liste até 3 sites que você considera interessantes, informando o que especificamente lhe atrai.</label>
                    <textarea class="form-control" id="sitesInteressantes" name="sitesInteressantes" rows="5" autocomplete="off"><?= $infoTema['sites_interessantes']; ?></textarea>

                <?php else : ?>

                    <label for="sitesInteressantes" class="form-label">Liste até 3 sites que você considera interessantes, informando o que especificamente lhe atrai.</label>
                    <textarea class="form-control" id="sitesInteressantes" name="sitesInteressantes" rows="5" autocomplete="off"></textarea>

                <?php endif; ?>
            </div>
        </div>

        <strong>Redes Sociais</strong>
        <hr class="mb-5">

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="facebook" class="form-label">Facebook</label>

                    <?php if ($infoTema['link_facebook']) : ?>

                        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="@facebook" autocomplete="off" value="<?= $infoTema['link_facebook']; ?>" required>

                    <?php else : ?>

                        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="@facebook" autocomplete="off" required>

                    <?php endif; ?>
                </div>
            </div>

            <div class="col">
                <div class="mb-3">
                    <label for="instagram" class="form-label">Instagram</label>

                    <?php if ($infoTema['link_instagram']) : ?>

                        <input type="text" class="form-control" id="instagram" name="instagram" placeholder="@instagram" autocomplete="off" value="<?= $infoTema['link_instagram']; ?>" required>

                    <?php else : ?>

                        <input type="text" class="form-control" id="instagram" name="instagram" placeholder="@instagram" autocomplete="off" required>

                    <?php endif; ?>
                </div>
            </div>

            <div class="col">
                <div class="mb-3">
                    <label for="tiktok" class="form-label">Tik tok</label>

                    <?php if ($infoTema['link_tiktok']) : ?>

                        <input type="text" class="form-control" id="tiktok" name="tiktok" placeholder="@tiktok" autocomplete="off" value="<?= $infoTema['link_tiktok']; ?>" required>

                    <?php else : ?>

                        <input type="text" class="form-control" id="tiktok" name="tiktok" placeholder="@tiktok" autocomplete="off" required>

                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="mb-3">

                <?php if ($infoTema['endereco_rodape']) : ?>

                    <label for="enderecoRodape" class="form-label">Endereço físico (completo) que deve aparecer no rodapé do site | Razão Social e CNPJ para apresentação no rodapé da home do site</label>
                    <input type="text" class="form-control" id="enderecoRodape" name="enderecoRodape" placeholder="Endereço completo" autocomplete="off" value="<?= $infoTema['endereco_rodape']; ?>">

                <?php else : ?>

                    <label for="enderecoRodape" class="form-label">Endereço físico (completo) que deve aparecer no rodapé do site | Razão Social e CNPJ para apresentação no rodapé da home do site</label>
                    <input type="text" class="form-control" id="enderecoRodape" name="enderecoRodape" placeholder="Endereço completo" autocomplete="off">

                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="mb-3">

                <?php if ($infoTema['atencao_rodape']) : ?>

                    <label for="atencaoRodape" class="form-label">Alguma atenção especial para o rodapé?</label>
                    <input type="text" class="form-control" id="atencaoRodape" name="atencaoRodape" placeholder="Digite sua resposta" autocomplete="off" value="<?= $infoTema['atencao_rodape']; ?>">

                <?php else : ?>

                    <label for="atencaoRodape" class="form-label">Alguma atenção especial para o rodapé?</label>
                    <input type="text" class="form-control" id="atencaoRodape" name="atencaoRodape" placeholder="Digite sua resposta" autocomplete="off">

                <?php endif; ?>

            </div>
        </div>

        <div class="row">
            <div class="mb-3">

                <?php if ($infoTema['observacao']) : ?>

                    <label for="observacaoRodape" class="form-label">Alguma observação a acrescentar?</label>
                    <input type="text" class="form-control" id="observacaoRodape" name="observacaoRodape" placeholder="Digite sua resposta" autocomplete="off" value="<?= $infoTema['observacao']; ?>">

                <?php else : ?>

                    <label for="observacaoRodape" class="form-label">Alguma observação a acrescentar?</label>
                    <input type="text" class="form-control" id="observacaoRodape" name="observacaoRodape" placeholder="Digite sua resposta" autocomplete="off">

                <?php endif; ?>
            </div>
        </div>

        <div class="mb-3 w-100 d-flex justify-content-end">
            <button class="btn btn-primary">Salvar</button>
        </div>

    </form>

</section>