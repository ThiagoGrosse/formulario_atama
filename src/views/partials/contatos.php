<?php global $contato; ?>

<section class="mt-3">

    <?php global $typeForm; ?>

    <div class="row">
        <div class="col">
            <h4><strong>Dados para contato</strong></h4>
            <p>
                Os clientes precisam ainda saber como entrar em contato com a sua empresa. Essa informações estarão presentes no rodapé da sua loja, página de contatos e outros locais.
            </p>
        </div>
    </div>

    <form action="#" method="post" id="formContato" >

        <div class="row mt-3">

            <div class="col">
                <h6><strong>Chat</strong></h6>
                <p>
                    Conseguimos deixar instalado uma opção de chat gratuito.
                </p>
                <p>
                    O critério de instalação é da Atâma. Visando a melhor opção para o seu segmento.
                </p>

                <label for="seleciona-chat" class="form-label">Deseja utilizar chat?</label>
                <select class="form-select mb-3" id="seleciona-chat" required>

                    <?php if ($contato['chat'] == 1) : ?>
                        <option value="1" selected>Sim</option>
                        <option value="0">Não</option>

                    <?php elseif ($contato['chat'] == 0 && !is_null($contato['chat'])) : ?>

                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>

                    <?php else : ?>

                        <option value="">Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>

                    <?php endif; ?>
                </select>

                <div class="mb-3">
                    <label for="telefoneFixo" class="form-label">Telefone Fixo</label>

                    <?php if ($contato['telefone_fixo']) : ?>

                        <input type="text" class="form-control phone" id="telefoneFixo" name="telefoneFixo" placeholder="Digite sua resposta" autocomplete="off" value="<?= $contato['telefone_fixo']; ?>">

                    <?php else : ?>

                        <input type="text" class="form-control phone" id="telefoneFixo" name="telefoneFixo" placeholder="Digite sua resposta" autocomplete="off">

                    <?php endif; ?>

                </div>

                <div class="mb-3">
                    <label for="whatsapp" class="form-label">WhatsApp</label>

                    <?php if ($contato['whatsapp']) : ?>

                        <input type="text" class="form-control phone" id="whatsapp" name="whatsapp" placeholder="Digite sua resposta" autocomplete="off" value="<?= $contato['whatsapp']; ?>">

                    <?php else : ?>

                        <input type="text" class="form-control phone" id="whatsapp" name="whatsapp" placeholder="Digite sua resposta" autocomplete="off">

                    <?php endif; ?>
                </div>
            </div>

            <div class="col">

                <?php if ($typeForm !== 'P1') : ?>

                    <h6><strong>E-mail profissional gratuito</strong></h6>
                    <p>
                        Em parceria com a Zoho, conseguimos disponibilizar para você cliente, um e-mail profissional para trazer muito mais confiança para seus clientes.
                    </p>
                    <p>
                        Seu e-mail profissional pode ser utilizado em computadores e celular.
                    </p>
                    <span>Exemplos:</span>
                    <ul>
                        <li>contato@dominiodaloja.com.br</li>
                        <li>falecom@dominiodaloja.com.br</li>
                        <li>sac@dominiodaloja.com.br</li>
                    </ul>

                    <div class="mb-3">
                        <label for="emailProfissional-01" class="form-label">E-mail</label>

                        <?php if ($contato['email_pro_01']) : ?>

                            <input type="email" class="form-control" id="emailProfissional-01" name="emailProfissional-01" placeholder="Digite sua resposta" autocomplete="off" value="<?= $contato['email_pro_01']; ?>">

                        <?php else : ?>

                            <input type="email" class="form-control" id="emailProfissional-01" name="emailProfissional-01" placeholder="Digite sua resposta" autocomplete="off">

                        <?php endif; ?>

                    </div>

                    <?php if ($typeForm == 'P3') : ?>

                        <div class=" mb-3">
                            <label for="emailProfissional-02" class="form-label">E-mail</label>

                            <?php if ($contato['email_pro_02']) : ?>

                                <input type="email" class="form-control" id="emailProfissional-02" name="emailProfissional-02" placeholder="Digite sua resposta" autocomplete="off" value="<?= $contato['email_pro_02']; ?>">

                            <?php else : ?>

                                <input type="email" class="form-control" id="emailProfissional-02" name="emailProfissional-02" placeholder="Digite sua resposta" autocomplete="off">

                            <?php endif; ?>

                        </div>

                        <div class=" mb-3">
                            <label for="emailProfissional-03" class="form-label">E-mail</label>

                            <?php if ($contato['email_pro_03']) : ?>

                                <input type="email" class="form-control" id="emailProfissional-03" name="emailProfissional-03" placeholder="Digite sua resposta" autocomplete="off" value="<?= $contato['email_pro_03']; ?>">

                            <?php else : ?>

                                <input type="email" class="form-control" id="emailProfissional-03" name="emailProfissional-03" placeholder="Digite sua resposta" autocomplete="off">

                            <?php endif; ?>

                        </div>

                        <div class=" mb-3">
                            <label for="emailProfissional-04" class="form-label">E-mail</label>

                            <?php if ($contato['email_pro_04']) : ?>

                                <input type="email" class="form-control" id="emailProfissional-04" name="emailProfissional-04" placeholder="Digite sua resposta" autocomplete="off" value="<?= $contato['email_pro_04']; ?>">

                            <?php else : ?>

                                <input type="email" class="form-control" id="emailProfissional-04" name="emailProfissional-04" placeholder="Digite sua resposta" autocomplete="off">

                            <?php endif; ?>

                        </div>

                        <div class=" mb-3">
                            <label for="emailProfissional-05" class="form-label">E-mail</label>

                            <?php if ($contato['email_pro_05']) : ?>

                                <input type="email" class="form-control" id="emailProfissional-05" name="emailProfissional-05" placeholder="Digite sua resposta" autocomplete="off" value="<?= $contato['email_pro_05']; ?>">

                            <?php else : ?>

                                <input type="email" class="form-control" id="emailProfissional-05" name="emailProfissional-05" placeholder="Digite sua resposta" autocomplete="off">

                            <?php endif; ?>

                        </div>

                    <?php endif; ?>

                <?php endif; ?>

            </div>

        </div>

        <div class=" mb-3 w-100 d-flex justify-content-end">
            <button class="btn btn-primary" type="submit">Salvar</button>
        </div>

    </form>





</section>