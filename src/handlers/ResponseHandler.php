<?php

namespace src\handlers;

class ResponseHandler
{
    public static function response200($msg)
    {
        header('HTTP/1.1 200 Ok');
        header('Content-type: application/json');

        return json_encode($msg);
    }

    public static function response201($msg)
    {
        header('HTTP/1.1 201 Created');
        header('Content-type: application/json');

        return json_encode($msg);
    }

    public static function response400($msg)
    {
        header('HTTP/1.1 400 Bad Request');
        header('Content-type: application/json');

        return json_encode($msg);
    }

    public static function response401($msg)
    {
        header('HTTP/1.1 401 Unauthorized');
        header('Content-type: application/json');

        return json_encode($msg);
    }

    public static function response404($msg)
    {
        header('HTTP/1.1 404 Not Found');
        header('Content-type: application/json');

        return json_encode($msg);
    }
}
