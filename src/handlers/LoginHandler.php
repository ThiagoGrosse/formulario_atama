<?php

namespace src\handlers;

use src\models\Usuarios;

class LoginHandler
{
    public static function checkLogin()
    {
        if (!empty($_SESSION['token'])) {

            $token = $_SESSION['token'];

            $db = Usuarios::select()->where('token', $token)->one();

            if (count($db) > 0) {

                $loggedUser = new Usuarios;
                $loggedUser->id = $db['id'];
                $loggedUser->email = $db['email'];
                $loggedUser->nome = $db['nome'];
                $loggedUser->tipoUsuario = $db['type'];
                $loggedUser->img_profile = $db['img_profile'];

                return $loggedUser;
            }
        }

        return false;
    }

    public static function verifyLogin($email, $senha)
    {
        $user = Usuarios::select()->where('email', $email)->one();

        if ($user) {
            if (password_verify($senha, $user['senha'])) {

                $token = md5(time() . rand(0, 9999) . $email);

                Usuarios::update()
                    ->set('token', $token)
                    ->where('id', $user['id'])
                    ->execute();

                return $token;
            }
        }

        return false;
    }

    public static function emailExists($email)
    {
        $user = Usuarios::select()->where('email', $email)->one();

        return $user ? true : false;
    }

    public static function addUser($nome, $email, $senha, $tipoUsuario)
    {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $token = md5(time() . rand(0, 9999) . $email);

        Usuarios::insert([
            'email' => $email,
            'nome' => $nome,
            'senha' => $hash,
            'type' => $tipoUsuario,
            'token' => $token
        ])->execute();

        return $token;
    }
}
