<?php

namespace src\controllers;

use core\Controller;
use src\handlers\FormHandler;
use src\handlers\LastChange;
use src\handlers\ResponseHandler;
use src\handlers\UploadHandler;
use src\models\AcessosPlataforma;
use src\models\Contato;
use src\models\Desconto;
use src\models\Dominio;
use src\models\Envio;
use src\models\Form;
use src\models\Idvisual;
use src\models\Infotema;
use src\models\Marketplaces;
use src\models\Pagamento;
use src\models\SobreEmpresa;
use src\models\Usuarios;

class FormController extends Controller
{
    /**
     * GERENCIA TELA INCIAL DOS FORMULÁRIOS
     */
    public function index($key)
    {
        $token = $_SESSION['token'] ?? null;
        $verifiToken = FormHandler::getDataForm($key['key']);

        if ($token) {
            $db = Usuarios::select(
                [
                    'id',
                    'email',
                    'nome',
                    'type',
                    'img_profile'
                ]
            )->where('token', $token)
                ->one();
        }

        if ($verifiToken) {

            $dbAcessoPlataforma = AcessosPlataforma::select()->where('token', $key['key'])->one();
            $dbContato = Contato::select()->where('token', $key['key'])->one();
            $dbDesconto = Desconto::select()->where('token', $key['key'])->one();
            $dbDominio = Dominio::select()->where('token', $key['key'])->one();
            $dbEnvio = Envio::select()->where('token', $key['key'])->one();
            $dbIdVisual = Idvisual::select()->where('token', $key['key'])->one();
            $dbInfoTema = Infotema::select()->where('token', $key['key'])->one();
            $dbMarketplace = Marketplaces::select()->where('token', $key['key'])->one();
            $dbPagamento = Pagamento::select()->where('token', $key['key'])->one();
            $dbSobreEmpresa = SobreEmpresa::select()->where('token', $key['key'])->one();

            $this->render(
                'formulario',
                [
                    'user' => $db ?? null,
                    'token' => $key['key'],
                    'nomeForm' => $verifiToken['nomeForm'],
                    'createdby' => $verifiToken['createdby'],
                    'status' => $verifiToken['status'],
                    'completed' => $verifiToken['completed'],
                    'arquivado' => $verifiToken['archived'],
                    'typeForm' => $verifiToken['typeForm'],
                    'acessoPlataforma' => $dbAcessoPlataforma,
                    'contato' => $dbContato,
                    'desconto' => $dbDesconto,
                    'dominio' => $dbDominio,
                    'envio' => $dbEnvio,
                    'idVisual' => $dbIdVisual,
                    'infoTema' => $dbInfoTema,
                    'marketplace' => $dbMarketplace,
                    'pagamento' => $dbPagamento,
                    'sobreEmpresa' => $dbSobreEmpresa
                ]
            );
        }
    }


    /**
     * CRIA NOVO FORMULÁRIO
     */
    public function create()
    {
        $token = $_SESSION['token'];
        $db = Usuarios::select()->where('token', $token)->one();

        if ($db) {

            $tokenForm = uniqid();

            $validaToken = FormHandler::validateToken($tokenForm);

            if (!$validaToken) {

                $createDate = date('Y-m-d H:i:s');

                Form::insert([
                    'tokenForm' => $tokenForm,
                    'createdby' => $db['id'],
                    'nomeForm' => $_POST['nome-projeto'],
                    'typeForm' => strtoupper($_POST['tipoProjeto']),
                    'status' => true,
                    'created_at' => $createDate
                ])->execute();

                AcessosPlataforma::insert(['token' => $tokenForm, 'completed' => false])->execute();
                Contato::insert(['token' => $tokenForm, 'completed' => false])->execute();
                Desconto::insert(['token' => $tokenForm, 'completed' => false])->execute();
                Dominio::insert(['token' => $tokenForm, 'completed' => false])->execute();
                Envio::insert(['token' => $tokenForm, 'completed' => false])->execute();
                Idvisual::insert(['token' => $tokenForm, 'completed' => false])->execute();
                Infotema::insert(['token' => $tokenForm, 'completed' => false])->execute();
                Pagamento::insert(['token' => $tokenForm, 'completed' => false])->execute();
                SobreEmpresa::insert(['token' => $tokenForm, 'completed' => false])->execute();

                if ($_POST['tipoProjeto'] !== 'p1') {

                    Marketplaces::insert(['token' => $tokenForm])->execute();
                }


                $this->redirect('/formulario' . '/' . $tokenForm);
            }
        }
    }


    /**
     * SALVA DADOS - IDENTIDADE VISUAL
     */
    public function saveIdVisual()
    {
        $data = $_POST;

        $validaToken = FormHandler::validateToken($data['token']);
        $saveLogo = '';
        $saveManual = '';

        if ($validaToken) {

            $getDataSaved = Idvisual::select()->where('token', $data['token'])->one();

            $img = UploadHandler::saveUpload($data['token'], $_FILES);

            $saveLogo = '';
            $saveManual = '';

            if (!empty($img['formlogo'])) {

                $saveLogo = $img['formlogo'];
            } else {

                $saveLogo = $getDataSaved['logo'];
            }

            if (!empty($img['formBrandManual'])) {

                $saveManual = $img['formBrandManual'];
            } else {

                $saveManual = $getDataSaved['brand_manual'];
            }

            Idvisual::update([
                'logo' => $saveLogo,
                'brand_manual' => $saveManual,
                'link_drive_logo' => $data['linkDrive'],
                'primary_color' => $data['corPrimaria'],
                'secondary_color' => $data['corSecundaria'],
                'tertiary_color' => $data['corTerciaria'],
                'do_not_use' => $data['naoUsarCor'],
                'completed' => true
            ])
                ->where('token', $data['token'])
                ->execute();

            LastChange::updateLastChange($data['token']);

            echo ResponseHandler::response200('Dados gravados');
        } else {

            echo ResponseHandler::response401('Não autorizado');
        }
    }

    /**
     * SALVA DADOS - INFORMAÇÕES SOBRE O TEMA
     */
    public function saveInfoTema()
    {
        $token = $_POST['token'] ?? false;
        $nomeLoja = $_POST['nomeLoja'] ?? null;
        $produtoServico = $_POST['produtoServico'] ?? null;
        $diferencial = $_POST['diferencial'] ?? null;
        $linkConcorrente = $_POST['linkConcorrente'] ?? null;
        $sitesInteressantes = $_POST['sitesInteressantes'] ?? null;
        $facebook = $_POST['facebook'] ?? null;
        $instagram = $_POST['nomeLoja'] ?? null;
        $tiktok = $_POST['nomeLoja'] ?? null;
        $enderecoRodape = $_POST['enderecoRodape'] ?? null;
        $atencaoRodape = $_POST['atencaoRodape'] ?? null;
        $observacaoRodape = $_POST['observacaoRodape'] ?? null;

        if ($token) {

            $validatoken = FormHandler::validateToken($token);

            if ($validatoken) {

                Infotema::update([
                    'nome_loja' => $nomeLoja,
                    'produto_servico' => $produtoServico,
                    'diferencial' => $diferencial,
                    'link_concorrente' => $linkConcorrente,
                    'sites_interessantes' => $sitesInteressantes,
                    'link_instagram' => $instagram,
                    'link_facebook' => $facebook,
                    'link_tiktok' => $tiktok,
                    'endereco_rodape' => $enderecoRodape,
                    'atencao_rodape' => $atencaoRodape,
                    'observacao' => $observacaoRodape,
                    'completed' => true
                ])
                    ->where('token', $token)
                    ->execute();

                LastChange::updateLastChange($token);

                echo ResponseHandler::response200('Dados atualizados');
            } else {

                echo ResponseHandler::response401('Não autorizado');
            }
        } else {

            echo ResponseHandler::response400('Ops! Ocorreu um erro');
        }
    }


    /**
     * SALVA DADOS - ACESSOS DA PLATAFORMA
     */
    public function saveAcessoPlataforma()
    {
        $token = $_POST['token'] ?? false;
        $cdLojaTray = $_POST['cd-loja-tray'] ?? null;
        $emailTray = $_POST['email-acesso-tray'] ?? null;
        $senhaTray = $_POST['senha-acesso-tray'] ?? null;
        $contaGoogle = $_POST['emailGoogle'] ?? null;

        if ($token) {

            $verifiToken = FormHandler::validateToken($token);

            if ($verifiToken) {

                AcessosPlataforma::update([
                    'id_loja' => $cdLojaTray,
                    'email_acesso' => $emailTray,
                    'senha' => $senhaTray,
                    'conta_google' => $contaGoogle,
                    'completed' => true
                ])->where('token', $token)->execute();

                LastChange::updateLastChange($token);

                echo ResponseHandler::response200('Dados atualizados');
            } else {

                echo ResponseHandler::response401('Não autorizado');
            }
        } else {

            echo ResponseHandler::response400('Ops! Ocorreu um erro');
        }
    }


    /**
     * SALVA DADOS - DOMINIO
     */
    public function saveDominio()
    {
        $token = $_POST['token'] ?? false;
        $dominio = $_POST['dominio'] ?? null;
        $agenciaDominio = $_POST['agenciaDominio'] ?? false;
        $fornecedorDominio = $_POST['fornecedor_dominio'] ?? null;
        $usuario = $_POST['usuarioDominio'] ?? null;
        $senha = $_POST['senhaDominio'] ?? null;

        $verifiToken = FormHandler::validateToken($token);

        if ($verifiToken) {

            Dominio::update([
                'dominio' => $dominio,
                'agencia_dominio' => $agenciaDominio,
                'fornecedor_dominio' => $fornecedorDominio,
                'usuario' => $usuario,
                'senha' => $senha,
                'completed' => true
            ])->where('token', $token)->execute();

            LastChange::updateLastChange($token);

            echo ResponseHandler::response200('Dados atualizados');
        } else {

            echo ResponseHandler::response401('Não autorizado');
        }
    }


    /**
     * SALVA DADOS - QUEM SOMOS / SOBRE A EMPRESA
     */
    public function saveQuemSomos()
    {
        $token = filter_input(INPUT_POST, 'token');
        $quemSomos = filter_input(INPUT_POST, 'quemSomos');
        $slogan = filter_input(INPUT_POST, 'slogan');

        if (!$token) {

            die(ResponseHandler::response401('Necessário informar um token'));
        }

        $validaToken = FormHandler::validateToken($token);

        if (!$validaToken) {

            die(ResponseHandler::response401('Token inválido'));
        }


        $img = UploadHandler::saveUpload($token, $_FILES);

        if (!empty($img)) {

            // VALIDA IMAGENS

            $img_01 = $img['img-loja-01'] ?? null;
            $img_02 = $img['img-loja-02'] ?? null;


            SobreEmpresa::update(
                [
                    'quem_somos' => $quemSomos,
                    'slogan' => $slogan,
                    'img_01' => $img_01,
                    'img_02' => $img_02,
                    'completed' => true
                ]
            )
                ->where('token', $token)
                ->execute();

            LastChange::updateLastChange($token);

            echo ResponseHandler::response200('Dados atualizados');
        } else {

            SobreEmpresa::update(
                [
                    'quem_somos' => $quemSomos,
                    'slogan' => $slogan,
                    'completed' => true
                ]
            )
                ->where('token', $token)
                ->execute();

            LastChange::updateLastChange($token);


            echo ResponseHandler::response200('Dados atualizados');
        }
    }


    /**
     * SALVA DADOS - CONTATO
     */
    public function saveContato()
    {
        $token = $_POST['token'] ?? false;
        $chat = $_POST['chat'] ?? null;
        $telefoneFixo = $_POST['telefoneFixo'] ?? null;
        $whatsapp = $_POST['whatsapp'] ?? null;
        $email01 = $_POST['emailProfissional-01'] ?? null;
        $email02 = $_POST['emailProfissional-02'] ?? null;
        $email03 = $_POST['emailProfissional-03'] ?? null;
        $email04 = $_POST['emailProfissional-04'] ?? null;
        $email05 = $_POST['emailProfissional-05'] ?? null;

        if ($token) {

            $verifiToken = FormHandler::validateToken($token);

            if ($verifiToken) {

                Contato::update(
                    [
                        'chat' => $chat,
                        'telefone_fixo' => $telefoneFixo,
                        'whatsapp' => $whatsapp,
                        'email_pro_01' => $email01,
                        'email_pro_02' => $email02,
                        'email_pro_03' => $email03,
                        'email_pro_04' => $email04,
                        'email_pro_05' => $email05,
                        'completed' => true
                    ]
                )
                    ->where('token', $token)
                    ->execute();

                LastChange::updateLastChange($token);

                echo ResponseHandler::response200('Dados atualizados');
            } else {

                echo ResponseHandler::response401('Não autorizado');
            }
        } else {

            echo ResponseHandler::response400('Ops! Ocorreu um erro');
        }
    }


    /**
     * SALVA DADOS - PAGAMENTO
     */
    public function savePagamento()
    {
        $token = $_POST['token'] ?? false;

        if ($token) {

            $verifiToken = FormHandler::validateToken($token);

            if ($verifiToken) {

                $meioPagamento = $_POST['meioPagamento'];
                $loginVindi = $_POST['loginVindi'];
                $senhavindi = $_POST['senhavindi'];
                $cd_filiacao = $_POST['cd_filiacao'];
                $usuarioMiop = $_POST['usuarioMiop'];
                $senhaMoip = $_POST['senhaMoip'];
                $tokenMoip = $_POST['tokenMoip'];
                $cd_afiliacao_getnet = $_POST['cd_afiliacao_getnet'];
                $cd_terminal_getnet = $_POST['cd_terminal_getnet'];
                $usuario_captura = $_POST['usuario_captura'];
                $senha_captura = $_POST['senha_captura'];
                $outroPagamento = $_POST['outro_pagamento'];


                Pagamento::update(
                    [
                        'meio_pag' => $meioPagamento,
                        'cielo_cd_afiliacao' => $cd_filiacao,
                        'vindi_email' => $loginVindi,
                        'vindi_senha' => $senhavindi,
                        'moip_usuario' => $usuarioMiop,
                        'moip_chave_acesso' => $senhaMoip,
                        'moip_token' => $tokenMoip,
                        'getnet_cd_afiliacao' => $cd_afiliacao_getnet,
                        'getnet_cd_terminal' => $cd_terminal_getnet,
                        'getnet_suser_cap' => $usuario_captura,
                        'getnet_senha_cap' => $senha_captura,
                        'outro_pagamento' => $outroPagamento,
                        'completed' => true
                    ]
                )
                    ->where('token', $token)
                    ->execute();

                LastChange::updateLastChange($token);

                echo ResponseHandler::response200('Dados atualizados');
            } else {

                echo ResponseHandler::response401('Não autorizado');
            }
        } else {

            echo ResponseHandler::response400('Ops! Ocorreu um erro');
        }
    }


    /**
     * SALVA DADOS - ENVIO
     */
    public function saveEnvio()
    {
        $token = $_POST['token'] ?? false;

        if ($token) {

            $verifiToken = FormHandler::validateToken($token);

            if ($verifiToken) {

                Envio::update(
                    [
                        'cep' => $_POST['cepEnvio'],
                        'rua' => $_POST['ruaEnvio'],
                        'numero' => $_POST['numeroEnvio'],
                        'bairro' => $_POST['bairroEnvio'],
                        'complemento' => $_POST['complementoEnvio'],
                        'cidade' => $_POST['cidadeEnvio'],
                        'estado' => $_POST['ufEnvio'],
                        'retirar_local' => $_POST['retiradaEmMaos'],
                        'motoboy' => $_POST['motoboy'],
                        'correios' => $_POST['correios'],
                        'jadlog' => $_POST['jadlog'],
                        'gateway_frete' => $_POST['gatewayFrete'],
                        'nome_gateway_frete' => $_POST['nomeGateway'],
                        'frete_usuario' => $_POST['loginGatewayFrete'],
                        'frete_senha' => $_POST['senhaGatewayFrete'],
                        'completed' => true
                    ]
                )
                    ->where('token', $token)
                    ->execute();

                LastChange::updateLastChange($token);

                echo ResponseHandler::response200('Dados atualizados');
            } else {

                echo ResponseHandler::response401('Não autorizado');
            }
        } else {

            echo ResponseHandler::response400('Ops! Ocorreu um erro');
        }
    }



    /**
     * SALVA DADOS - PREÇOS E DESCONTOS
     */
    public function savePrecosDescontos()
    {
        $token = $_POST['token'] ?? false;

        if ($token) {

            $verifiToken = FormHandler::validateToken($token);

            if ($verifiToken) {

                Desconto::update(
                    [
                        'boleto' => $_POST['opDescBoleto'],
                        'desconto_boleto' => $_POST['descBoleto'],
                        'pix' => $_POST['opDescontoPix'],
                        'desconto_pix' => $_POST['descPix'],
                        'parcelas_sj' => $_POST['parcelamento'],
                        'valor_limite' => $_POST['valorMinimo'],
                        'desc_progressivo' => $_POST['opDescProg'],
                        'regra_desc_prog' => $_POST['regraDescProg'],
                        'frete_gratis' => $_POST['opFreteGratis'],
                        'regra_frete_gratis' => $_POST['regraFreteGratis'],
                        'completed' => true
                    ]
                )
                    ->where('token', $token)
                    ->execute();

                LastChange::updateLastChange($token);

                echo ResponseHandler::response200('Dados atualizados');
            } else {

                echo ResponseHandler::response401('Não autorizado');
            }
        } else {

            echo ResponseHandler::response400('Ops! Ocorreu um erro');
        }
    }



    /**
     * SALVA DADOS - MARKETPLACES
     */
    public function saveMarketplaces()
    {
        $token = $_POST['token'] ?? false;

        if ($token) {

            $verifiToken = FormHandler::validateToken($token);

            if ($verifiToken) {

                Marketplaces::update(
                    [
                        'americanas' => $_POST['americanas'],
                        'am_login' => $_POST['loginAm'],
                        'am_senha' => $_POST['senhaAm'],
                        'mercado_livre' => $_POST['magalu'],
                        'ml_login' => $_POST['loginMg'],
                        'ml_senha' => $_POST['senhaMg'],
                        'magalu' => $_POST['mercadoLivre'],
                        'mg_login' => $_POST['loginMl'],
                        'mg_senha' => $_POST['senhaMl'],
                        'cadastro' => $_POST['cadastroMktp'],
                        'completed' => true
                    ]
                )
                    ->where('token', $token)
                    ->execute();

                LastChange::updateLastChange($token);

                echo ResponseHandler::response200('Dados atualizados');
            } else {

                echo ResponseHandler::response401('Não autorizado');
            }
        } else {

            echo ResponseHandler::response400('Ops! Ocorreu um erro');
        }
    }


    // MARCA FORMULÁRO COMO COMPLETO
    public function setCompleted($token)
    {
        $tokenForm = $token['token'];

        $validaForm = Form::select()->where('tokenForm', $tokenForm)->one();

        if ($validaForm) {

            Form::update(
                [
                    'status' => false,
                    'completed' => true
                ]
            )
                ->where('tokenForm', $tokenForm)
                ->execute();

            LastChange::updateLastChange($token);

            echo ResponseHandler::response200('Status alterado');
        } else {

            echo ResponseHandler::response400('Formulário não encontrado');
        }
    }

    // MARCA FORMULÁRIO COMO ARQUIVADO
    public function setArchived($token)
    {
        $tokenForm = $token['token'];

        $validaForm = Form::select()->where('tokenForm', $tokenForm)->one();

        if ($validaForm) {

            Form::update(
                [
                    'archived' => true
                ]
            )
                ->where('tokenForm', $tokenForm)
                ->execute();

            echo ResponseHandler::response200('Formulário arquivado');
        } else {

            echo ResponseHandler::response400('Formulário não encontrado');
        }
    }
}
