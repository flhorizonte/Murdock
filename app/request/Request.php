<?php

namespace App\request;

final class Request
{
    public function __construct($post = true, $function)
    {
        #vai instaciar
        /**
         *  $request = new Request(function(){
         *      //code
         *  })
         */
        $this->requestTreatment($post, $function);
    }

    /* A variavel $function é um função anonima ou closure,e ela vai ser chamada dentro da função, assim,
     * -economizando código
    */
    final public function requestTreatment($post = true, $function)
    {
        try {
            /**
             * Tu tem quer mandar requisições POST em, n manda get que não vai funfar.
             */
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                /* add verificação de request do ajax
                 * add var filters to improve sec
                 * instanciar objeto, setar os atributos e disparar os métodos
                */
                $function();
            } else {

                throw new \Exception("request not found");
            }
        } catch (\Exception $e) {

            //SAIDA PARA O JAVASCRIPT EM JSON :)
            //echo json_encode(["message" => $e->getMessage()]);
            //a saida vai ser em html mesmo
            $this->setAlert($e->getMessage());
        }
    }

    final public function setAlert($alert)
    {
        //built up the div body
        $this->$alertBody = "<div>";
        $this->$alertBody .= $alert;
        $this->$alertBody .= "</div>";
    }

    final public function getAlert()
    {
        return $this->$alertBody;
    }
}
