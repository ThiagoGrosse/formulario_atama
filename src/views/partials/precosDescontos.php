<?php global $desconto; ?>

<section class="mt-3">

    <div class="row mb-3">
        <div class="col">
            <h4><strong>Preços e Descontos</strong></h4>
        </div>
    </div>

    <form action="#" method="post" id="formPrecoDesconto">

        <div class="row">
            <div class="col">

                <p>
                    <strong>Benefícios</strong>
                </p>
                <p class="mb-3">
                    Vamos falar agora sobre algo muito importante que são os benefícios ofertados para as formas de pagamento.
                </p>
                <label for="op-desc-boleto" class="form-label">Deseja oferecer desconto para compas a vista, no boleto?</label>
                <select class="form-select mb-3" id="op-desc-boleto" required>

                    <?php if ($desconto['boleto'] == 1) : ?>

                        <option value="1" selected>Sim</option>
                        <option value="0">Não</option>

                    <?php elseif ($desconto['boleto'] == 0 && !is_null($desconto['boleto'])) : ?>

                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>

                    <?php else : ?>

                        <option value="">Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>

                    <?php endif; ?>

                </select>

                <?php if ($desconto['boleto'] == 1) : ?>

                    <div id="desconto-boleto" class="display-block">
                        <div class="mb-3">
                            <label for="desc-boleto" class="form-label">Qual a porcentagem de desconto?</label>
                            <input type="text" class="form-control w-25 input-porcentagem" id="desc-boleto" name="desc-boleto" placeholder="0%" autocomplete="off" value="<?= $desconto['desconto_boleto'] . "%"; ?>">
                        </div>
                    </div>

                <?php else : ?>

                    <div id="desconto-boleto" class="display-none">
                        <div class="mb-3">
                            <label for="desc-boleto" class="form-label">Qual a porcentagem de desconto?</label>
                            <input type="text" class="form-control w-25 input-porcentagem" id="desc-boleto" name="desc-boleto" placeholder="0%" autocomplete="off">
                        </div>
                    </div>

                <?php endif; ?>

                <label for="op-desc-pix" class="form-label">Deseja oferecer desconto para compas a vista, no PIX?</label>
                <select class="form-select mb-3" id="op-desc-pix" required>

                    <?php if ($desconto['pix'] == 1) : ?>

                        <option value="1" selected>Sim</option>
                        <option value="0">Não</option>

                    <?php elseif ($desconto['pix'] == 0 && !is_null($desconto['pix'])) : ?>

                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>

                    <?php else : ?>

                        <option value="">Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>

                    <?php endif; ?>

                </select>

                <?php if ($desconto['pix'] == 1) : ?>

                    <div id="desconto-pix" class="display-block">
                        <div class="mb-3">
                            <label for="desc-pix" class="form-label">Qual a porcentagem de desconto?</label>
                            <input type="text" class="form-control w-25 input-porcentagem" id="desc-pix" name="desc-pix" placeholder="0%" autocomplete="off" value="<?= $desconto['desconto_pix'] . '%'; ?>">
                        </div>
                    </div>

                <?php else : ?>

                    <div id="desconto-pix" class="display-none">
                        <div class="mb-3">
                            <label for="desc-pix" class="form-label">Qual a porcentagem de desconto?</label>
                            <input type="text" class="form-control w-25 input-porcentagem" id="desc-pix" name="desc-pix" placeholder="0%" autocomplete="off">
                        </div>
                    </div>

                <?php endif; ?>

            </div>

            <div class="col">
                <p>
                    <strong>Parcelamento</strong>
                </p>
                <div class="mb-5">
                    <label for="parcelamento" class="form-label">Em até quantas vezes o cliente vai poder comprar sem juros no cartão de crédito?</label>
                    <div class="d-flex align-items-center">

                        <?php if ($desconto['parcelas_sj']) : ?>

                            <input type="number" class="form-control mb-2" id="parcelamento" name="parcelamento" min="1" max="12" autocomplete="off" value="<?= $desconto['parcelas_sj']; ?>" required>

                        <?php else : ?>

                            <input type="number" class="form-control mb-2" id="parcelamento" name="parcelamento" min="1" max="12" value="1" autocomplete="off" required>

                        <?php endif; ?>

                        <span>Vez(es) sem juros</span>
                    </div>
                    <p><strong>DICA:</strong><br>
                        Se o seu ticket médio é alto, acima de R$ 250,00, indicamos sempre oferecer no mínimo 6 parcelas sem juros. Já se o seu ticket é menor, entre 3 e 6 está bem ótimo! Você sempre pode mudar facilmente na plataforma essas condições.”
                    </p>
                </div>

                <div class="mb-5">
                    <label for="valor-minimo" class="form-label">Qual o valor mínimo para cada parcela?</label>

                    <?php if ($desconto['valor_limite']) : ?>

                        <input type="text" class="form-control mb-2 w-25 maskPreco" id="valor-minimo" name="valor-minimo" placeholder="R$ 00,00" autocomplete="off" value="<?= 'R$ ' . str_replace(".", ",", $desconto['valor_limite']); ?>" required>

                    <?php else : ?>

                        <input type="text" class="form-control mb-2 w-25 maskPreco" id="valor-minimo" name="valor-minimo" placeholder="R$ 00,00" autocomplete="off" required>

                    <?php endif; ?>

                    <p>
                        <strong>EXEMPLO:</strong>
                        <br>
                        Se você fez uma venda de R$ 100,00 (cem reais) e a parcela mínima é R$ 50,00 (cinquenta reais), seu cliente poderá parcelar a compra em até 2 vezes
                    </p>
                </div>

            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col">
                <p>
                    <strong>Desconto Progressivo</strong>
                </p>
                <p>
                    Uma ótima maneira para aumentar seu ticket médio é oferecer para o seu cliente vantagens ao comprar mais itens.
                </p>
                <p>
                    <mark>
                        <i>
                            Exemplo:<br>
                            Compre camisetas e ganhe 10% de desconto.<br>
                            Compre acima de 3 produtos e ganhe 15% de desconto.<br>
                            Compre acima de R$ 250,00 e ganhe 5% de desconto.
                        </i>
                    </mark>
                </p>
                <p>
                    O desconto pode ser aplicado em produtos, marcas ou categorias específicas.
                </p>

            </div>

            <div class="col">
                <label for="op-desc-prog" class="form-label">Deseja oferecer algum desconto progressivo?</label>
                <select class="form-select mb-3" id="op-desc-prog" required>

                    <?php if ($desconto['desc_progressivo'] == 1) : ?>

                        <option value="1" selected>Sim</option>
                        <option value="0">Não</option>

                    <?php elseif ($desconto['desc_progressivo'] == 0 && !is_null($desconto['desc_progressivo'])) : ?>

                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>

                    <?php else : ?>

                        <option value="">Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>

                    <?php endif; ?>

                </select>

                <?php if ($desconto['desc_progressivo'] == 1) : ?>

                    <div id="regra-desconto-progessivo" class="display-block">
                        <div class="mb-3">
                            <label for="regra-desc-prog" class="form-label">Quais serão as regras para os seus descontos progressivos?</label>
                            <textarea class="form-control" id="regra-desc-prog" name="regra-desc-prog" rows="3" autocomplete="off"><?= $desconto['regra_desc_prog']; ?></textarea>
                        </div>
                    </div>

                <?php else : ?>

                    <div id="regra-desconto-progessivo" class="display-none">
                        <div class="mb-3">
                            <label for="regra-desc-prog" class="form-label">Quais serão as regras para os seus descontos progressivos?</label>
                            <textarea class="form-control" id="regra-desc-prog" name="regra-desc-prog" rows="3" autocomplete="off"></textarea>
                        </div>
                    </div>

                <?php endif; ?>

                <!-- FRETE GRATIS -->

                <label for="op-fg" class="form-label">Deseja oferecer frete grátis?</label>
                <select class="form-select mb-3" id="op-fg" required>

                    <?php if ($desconto['frete_gratis'] == 1) : ?>

                        <option value="1" selected>Sim</option>
                        <option value="0">Não</option>

                    <?php elseif ($desconto['frete_gratis'] == 0 && !is_null($desconto['frete_gratis'])) : ?>

                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>

                    <?php else : ?>

                        <option value="">Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>

                    <?php endif; ?>

                </select>

                <?php if ($desconto['frete_gratis'] == 1) : ?>

                    <div id="regra-frete-gratis" class="display-block">
                        <div class="mb-3">
                            <label for="regra-fg" class="form-label">Quais serão as regras para frete grátis ?</label>
                            <textarea class="form-control" id="regra-fg" name="regra-fg" rows="3" autocomplete="off"><?= $desconto['regra_frete_gratis']; ?></textarea>
                        </div>
                    </div>

                <?php else : ?>

                    <div id="regra-frete-gratis" class="display-none">
                        <div class="mb-3">
                            <label for="regra-fg" class="form-label">Quais serão as regras para frete grátis ?</label>
                            <textarea class="form-control" id="regra-fg" name="regra-fg" rows="3" autocomplete="off"></textarea>
                        </div>
                    </div>

                <?php endif; ?>
            </div>

        </div>

        <div class="mb-3 w-100 d-flex justify-content-end">
            <button class="btn btn-primary">Salvar</button>
        </div>


    </form>
</section>