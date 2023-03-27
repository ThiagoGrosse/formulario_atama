<?php

namespace src\handlers;

use src\models\Form;

class LastChange
{
    public static function updateLastChange($token)
    {
        $date = Date('Y-m-d H:i:s');

        $db = Form::update(
            [
                'updated_at' => $date
            ]
        )
            ->where('tokenForm', $token)
            ->execute();

        return $db;
    }
}
