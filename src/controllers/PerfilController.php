<?php

namespace src\controllers;

use core\Controller;
use src\handlers\ResponseHandler;
use src\handlers\UploadHandler;
use src\models\Form;
use src\models\Usuarios;

class PerfilController extends Controller
{
    public function index()
    {
        $token = $_SESSION['token'] ?? null;

        if ($token) {

            $db = Usuarios::select()->where('token', $token)->one();

            $data = date("Y-m-d", strtotime("-60 days"));

            $forms = Form::select()
                ->where('createdby', $db['id'])
                ->where('created_at', '>=', $data)
                ->execute();

            $this->render(
                'perfil',
                [
                    'user' => $db,
                    'forms' => $forms
                ]
            );
        }
    }

    public function alterarImagemPerfil()
    {
        $token = $_SESSION['token'] ?? null;

        $idUser = Usuarios::select('id')->where('token', $token)->one();

        if ($token) {

            $img = $_FILES;

            $teste = UploadHandler::uploadImgProfile($idUser['id'], $img);

            if (!empty($teste)) {

                Usuarios::update([
                    'img_profile' => $teste
                ])
                    ->where('id', $idUser)
                    ->execute();

                echo ResponseHandler::response200('Imagem alterada');
            } else {

                echo ResponseHandler::response400('Erro ao salvar imagem');
            }
        } else {

            echo ResponseHandler::response401('Não autorizado');
        }
    }

    public function editarPerfil()
    {
        $token = $_SESSION['token'] ?? null;

        if ($token) {

            $nome = filter_input(INPUT_POST, 'nome');
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $type = filter_input(INPUT_POST, 'type');

            $db = Usuarios::select()->where('token', $token)->one();

            if ($db) {

                $nomeUsuario = ($nome) ? $nome : $db['nome'];
                $emailUsuario = ($email) ? $email : $db['email'];

                Usuarios::update(
                    [
                        'nome' => $nomeUsuario,
                        'email' => $emailUsuario
                    ]
                )
                    ->where('token', $token)
                    ->execute();

                echo (ResponseHandler::response200('Dados atualizados'));
            } else {

                echo ResponseHandler::response400('Ops! Ocorreu um erro');
            }
        }
    }

    public function alterarSenha()
    {

        $token = $_SESSION['token'] ?? null;

        if ($token) {

            $newPass = filter_input(INPUT_POST, 'newPassword');
            $confirmPass = filter_input(INPUT_POST, 'confirmNewPassword');

            if ($newPass == $confirmPass) {

                Usuarios::update(['senha' => password_hash($newPass, PASSWORD_DEFAULT)])->where('token', $token)->execute();

                echo ResponseHandler::response200('Senha alterada');
            }
        } else {

            echo ResponseHandler::response401('Não autorizado!');
        }
    }
}
