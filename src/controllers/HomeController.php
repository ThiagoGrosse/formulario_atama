<?php

namespace src\controllers;

use \core\Controller;
use src\handlers\FormHandler;
use src\handlers\LoginHandler;
use src\models\Usuarios;

class HomeController extends Controller
{

    private $loggedUser;

    public function __construct()
    {

        $this->loggedUser = LoginHandler::checkLogin();

        if ($this->loggedUser === false) {

            $this->redirect('/login');
        } else {

            $formActive = FormHandler::getAllFormActive();
            $formInative = FormHandler::getAllFormInative();
            $formArchived = FormHandler::getAllFormArchived();

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

            $this->render('home', [
                'user' => $db,
                'formActive' => $formActive,
                'formInative' => $formInative,
                'formArchived' => $formArchived
            ]);
        }
    }

    public function index()
    {
        // $this->render('home');
    }
}
