<?php

namespace src\handlers;

use src\models\Form;
use src\models\Idvisual;

class FormHandler
{
    public static function validateToken($token)
    {
        $db = Form::select()->where('tokenForm', $token)->one();

        if ($db) {
            return true;
        }

        return false;
    }

    public static function getAllFormActive()
    {
        $db = Form::select()->where('status', true)->execute();

        return $db;
    }

    public static function getAllFormInative()
    {
        $db = Form::select()
            ->where('status', false)
            ->where('archived', false)
            ->execute();

        return $db;
    }

    public static function getAllFormArchived()
    {
        $db = Form::select()
            ->where('archived', true)
            ->where('status', false)
            ->execute();

        return $db;
    }

    public static function getDataForm($token)
    {
        $db = Form::select()->where('tokenForm', $token)->one();

        if ($db) {

            return $db;
        }

        return false;
    }

    public static function verificaTokenIdVisual($token)
    {

        $db = Idvisual::select()->where('token', $token)->one();

        if ($db) {

            return true;
        }

        return false;
    }
}
