<?php

namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;
use src\models\Usuarios;

class LoginController extends Controller
{

    public function signin()
    {
        $flash = '';

        if (!empty($_SESSION['flash'])) {

            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('login', ['flash' => $flash]);
    }

    public function signinAction()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');

        if ($email && $senha) {

            $token = LoginHandler::verifyLogin($email, $senha);

            if ($token) {

                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {

                $_SESSION['flash'] = 'E-mail e/ou senha não confere!';

                $this->redirect('/login');
            }

            $this->redirect('/login');
        }
    }

    public function signup()
    {
        $this->render('cadastro');
    }

    public function signupAction()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');
        $nome = filter_input(INPUT_POST, 'nome');

        if ($nome && $senha && $email) {

            if (LoginHandler::emailExists($email) === false) {

                $token = LoginHandler::addUser($nome, $email, $senha);

                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {

                $_SESSION['flash'] = 'E-mail já cadastrado!';
                $this->redirect('/cadastro');
            }
        } else {
            $this->redirect('/cadastro');
        }
    }

    public function logout(){
        $_SESSION['token'] = '';

        $this->redirect('/login');
    }
}
