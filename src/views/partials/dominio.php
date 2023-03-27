<?php global $dominio; ?>

<section>
    <form action="#" method="post" id="formDominio">
        <div class="row mt-3">
            <div class="col">
                <h4><strong>Domínio</strong></h4>
                <p>
                    Toda loja precisa de um endereço na web (domínio) para ser acessada.
                    Caso não tenha adquirido um domínio ainda, sugerimos acessar o site Registro.br e fazer a aquisição de um domínio para sua loja.
                    Lembre-se de criar um domínio que seja fácil de lembrar e que não seja muito extenso.
                </p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <label for="dominio" class="form-label">Domínio (exemplo: www.sualoja.com.br)</label>
                <div class="d-flex align-items-center mb-3">

                    <?php if ($dominio['dominio']) : ?>

                        <input type="text" class="form-control name-color" id="dominio" name="dominio" placeholder="Digite sua resposta" autocomplete="off" value="<?= $dominio['dominio']; ?>" required>

                    <?php else : ?>

                        <input type="text" class="form-control name-color" id="dominio" name="dominio" placeholder="Digite sua resposta" autocomplete="off" required>

                    <?php endif; ?>

                </div>

                <label for=" aquisicao-dominio" class="form-label">Onde foi feita a aquisição do domínio?</label>
                <div class="d-flex align-items-center mb-3">

                    <?php if ($dominio['fornecedor_dominio']) : ?>

                        <input type="text" class="form-control name-color" id="aquisicao-dominio" name="aquisicao-dominio" placeholder="Digite sua resposta" autocomplete="off" value="<?= $dominio['fornecedor_dominio']; ?>" required>

                    <?php else : ?>

                        <input type="text" class="form-control name-color" id="aquisicao-dominio" name="aquisicao-dominio" placeholder="Digite sua resposta" autocomplete="off" required>

                    <?php endif; ?>
                </div>
            </div>

            <div class="col">

                <label for="seleciona-agencia" class="form-label">Possui alguma agência/empresa gerenciando seu domínio?</label>
                <select class="form-select mb-3" id="seleciona-agencia" required>
                    <?php if ($dominio['agencia_dominio'] == 1) : ?>

                        <option value="1" selected>Sim</option>
                        <option value="0">Não</option>

                    <?php elseif ($dominio['agencia_dominio'] == 0 && !is_null($dominio['agencia_dominio'])) : ?>

                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>

                    <?php else : ?>

                        <option value="">Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>

                    <?php endif; ?>
                </select>

                <div class="visibility-hidden" id="login-dominio">
                    <label for="usuarioDominio" class="form-label">Usuário</label>
                    <div class="d-flex align-items-center mb-3">
                        <input type="text" class="form-control name-color" id="usuarioDominio" name="usuarioDominio" placeholder="Digite sua resposta" autocomplete="off">
                    </div>

                    <label for=" senhaDominio" class="form-label">Senha</label>
                    <div class="d-flex align-items-center mb-3">
                        <input type="password" class="form-control name-color" id="senhaDominio" name="senhaDominio" placeholder="Digite sua resposta" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>

        <div class=" mb-3 w-100 d-flex justify-content-end">
            <button class="btn btn-primary">Salvar</button>
        </div>
    </form>
</section>