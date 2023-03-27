<?php

namespace src\handlers;

use src\Config;

class UploadHandler
{
    public static function saveUpload($token, $files)
    {

        $destino = $_SERVER['DOCUMENT_ROOT'] . Config::BASE_DIR . '/assets/img/uploads';

        $imagens = [];
        $teste = [];


        foreach ($files as $key => $i) {

            $fileName = $i['name'] ?? null;
            $fileDir = $i['tmp_name'] ?? null;

            $tipo = $key;

            $teste[] = [$key => $i];

            if ($fileName) {

                $extensao = pathinfo($fileName, PATHINFO_EXTENSION);
                $extensao = strtolower($extensao);

                $newFileName = $token . '-' . $tipo . '.' . $extensao;
                $novoDiretorio = $destino . '/' . $newFileName;

                if (move_uploaded_file($fileDir, $novoDiretorio)) {

                    $imagens[$key] = $newFileName;
                }
            }
        }


        return  $imagens;
    }

    public static function uploadImgProfile($idUser, $file)
    {

        $destino = $_SERVER['DOCUMENT_ROOT'] . Config::BASE_DIR . '/assets/img/users';

        $fileName = $file['userImgProfile']['name'] ?? null;
        $fileDir = $file['userImgProfile']['tmp_name'] ?? null;

        $imagem = '';

        if ($fileName) {

            $extensao = pathinfo($fileName, PATHINFO_EXTENSION);
            $extensao = strtolower($extensao);

            $newFileName = $idUser . '.' . $extensao;
            $novoDiretorio = $destino . '/' . $newFileName;

            if (move_uploaded_file($fileDir, $novoDiretorio)) {

                $imagem = $newFileName;
            }
        }

        return  $imagem;
    }
}
