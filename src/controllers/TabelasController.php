<?php

namespace src\controllers;

use core\Controller;
use src\handlers\FormHandler;
use src\handlers\LoginHandler;
use src\models\AcessosPlataforma;
use src\models\Contato;
use src\models\Desconto;
use src\models\Dominio;
use src\models\Envio;
use src\models\Idvisual;
use src\models\Infotema;
use src\models\Marketplaces;
use src\models\Pagamento;
use src\models\SobreEmpresa;
use src\models\Usuarios;

class TabelasController extends Controller
{
    private $loggedUser;

    public function index($token)
    {
        $this->loggedUser = LoginHandler::checkLogin();

        if ($this->loggedUser === false) {

            $this->redirect('/login');
        } else {

            $db = Usuarios::select(
                [
                    'id',
                    'email',
                    'nome',
                    'token',
                    'type',
                    'img_profile'
                ]
            )->where('id', $this->loggedUser->id)->one();

            $verifiToken = FormHandler::getDataForm($token['token']);

            if ($verifiToken) {

                $dbAcessoPlataforma = AcessosPlataforma::select()->where('token', $token['token'])->one();
                $dbContato = Contato::select()->where('token', $token['token'])->one();
                $dbDesconto = Desconto::select()->where('token', $token['token'])->one();
                $dbDominio = Dominio::select()->where('token', $token['token'])->one();
                $dbEnvio = Envio::select()->where('token', $token['token'])->one();
                $dbIdVisual = Idvisual::select()->where('token', $token['token'])->one();
                $dbInfoTema = Infotema::select()->where('token', $token['token'])->one();
                $dbMarketplace = Marketplaces::select()->where('token', $token['token'])->one();
                $dbPagamento = Pagamento::select()->where('token', $token['token'])->one();
                $dbSobreEmpresa = SobreEmpresa::select()->where('token', $token['token'])->one();

                $this->render(
                    'tabelas',
                    [
                        'user' => $db ?? null,
                        'token' => $token['token'],
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
            } else {

                $this->redirect('/');
            }
        }
    }
}
