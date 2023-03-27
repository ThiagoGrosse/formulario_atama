<?php

namespace src\controllers;

use core\Controller;
use src\handlers\FormHandler;
use src\handlers\LoginHandler;
use src\handlers\ResponseHandler;
use src\models\Usuarios;

class UsuariosController extends Controller
{
    public function index()
    {
        $token = $_SESSION['token'] ?? null;

        if ($token) {

            $db = Usuarios::select()->where('token', $token)->one();

            $allUsers = Usuarios::select(
                [
                    'id',
                    'nome',
                    'email',
                    'type',
                    'img_profile'
                ]
            )->execute();


            $this->render(
                'usuarios',
                [
                    'user' => $db,
                    'data' => $allUsers
                ]
            );
        }
    }

    public function novoUsuario()
    {
        $user = LoginHandler::checkLogin();

        if ($user->tipoUsuario == 1) {

            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha');
            $nome = filter_input(INPUT_POST, 'nomeUsuario');
            $tipoUsuario = filter_input(INPUT_POST, 'tipoUsuario');

            if ($nome && $senha && $email) {

                if (LoginHandler::emailExists($email) === false) {

                    $db = LoginHandler::addUser($nome, $email, $senha, $tipoUsuario);

                    echo ResponseHandler::response201('Usuário cadastrado');
                } else {

                    echo ResponseHandler::response400('E-mail informado já cadastrado');
                }
            }
        } else {

            echo ResponseHandler::response401('Usuário não autorizado!');
        }
    }

    public function removeUser($id)
    {
        $user = LoginHandler::checkLogin();

        if ($user->tipoUsuario == 1) {

            $verifyUser = Usuarios::select()->where('id', $id)->one();

            if ($verifyUser['id'] !== $user->id) {

                Usuarios::delete()->where('id', $id)->execute();

                echo ResponseHandler::response200('Usuário removido!');
            }else {

                echo ResponseHandler::response401('Não autorizado');
            }
        } else {

            die('não pode remover');
        }
    }

    public function editUser()
    {
        $user = LoginHandler::checkLogin();

        if ($user->tipoUsuario == 1) {

            $nome = filter_input(INPUT_POST, 'nome');
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha');
            $type = filter_input(INPUT_POST, 'type');
            $idUsuario = filter_input(INPUT_POST, 'idUsuario');

            $db = Usuarios::select()->where('id', $idUsuario)->one();

            $nomeUsuario = ($nome) ? $nome : $db['nome'];
            $emailUsuario = ($email) ? $email : $db['email'];
            $tipoUsuario = ($type) ? $type : $db['type'];

            if ($senha) {

                $hash = password_hash($senha, PASSWORD_DEFAULT);

                Usuarios::update(
                    [
                        'senha' => $hash
                    ]
                )
                    ->where('id', $idUsuario)
                    ->execute();
            }

            Usuarios::update(
                [
                    'nome' => $nomeUsuario,
                    'email' => $emailUsuario,
                    'type' => $tipoUsuario
                ]
            )
                ->where('id', $idUsuario)
                ->execute();

            echo ResponseHandler::response200('Usuário atualizado');
        } else {

            echo ResponseHandler::response401("Não autorizado");
        }
    }

    public function getUser($id)
    {
        $db = Usuarios::select(
            [
                'id',
                'nome',
                'email',
                'type'
            ]
        )
            ->where('id', $id)
            ->one();

        if ($db) {

            echo ResponseHandler::response200($db);
        } else {

            echo ResponseHandler::response400('Usuário não encontrado');
        }
    }
}
