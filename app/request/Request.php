<?php

namespace App\request;

class Request
{

    public static function requestTreatment($post = true, $function)
    {

        try {
            /**
             * Tu tem quer mandar requisições POST em, n manda get que não vai funfar.
             */
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                //add var filters to improve sec
                //instanciar objeto, setar os atributos e disparar os métodos
                $function();
            } else {

                throw new \Exception("request not found");

            }

        } catch (\Exception $e) {

            //SAIDA PARA O JAVASCRIPT EM JSON :)
            echo json_encode(["message" => $e->getMessage()]);

        }
    }
}
