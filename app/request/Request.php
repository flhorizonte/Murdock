<?php

namespace App\request;

class Request {

    public static function requestTreatment($function) {

        try {
            /**
             * Tu tem quer mandar requisições POST em, n manda get que não vai funfar.
             */
            if($_SERVER["REQUEST_METHOD"] == "POST") {

            //add var filters to improve sec
            //instanciar objeto, setar os atributos e disparar os métodos
            $function();

            } else {

                throw new \Exception("post not found");
            }

        } catch (\Exception $e) {

            //SAIDA PARA O JAVASCRIPT EM JSON :)
            echo self::outPutException($e);

        } catch (\SuccessException $s) {

            //SAIDA PARA O JAVASCRIPT EM JSON :)
            echo self::outPutException($s);
        }
    }

    public static function outPutException($error) {

        return json_encode(["Message" => $error->getMessage()]);
    }

    public static function msgErrorNotLogged() {


    }

}
