<?php

namespace App\request;

class Request
{

    public static function requestTreatment($json = true, $post = true, $function)
    {

        try {
            /**
             * Tu tem quer mandar requisições POST em, n manda get que não vai funfar.
             */
            if ($_SERVER["REQUEST_METHOD"] == "POST" || $post != true) {

                //add var filters to improve sec
                //instanciar objeto, setar os atributos e disparar os métodos
                $function();
            } else {

                throw new \Exception("post not found");
            }

        } catch (\Exception $e) {

            //SAIDA PARA O JAVASCRIPT EM JSON :)
            echo ($json != true) ? self::phpAlert($e) : json_encode(["message" => $e->getMessage()]);

        }
    }

    private static function phpAlert($alerta)
    {

        $html = $alerta->getMessage();

        return $html;
    }



    public static function genDivsExplore($data, $link)
    {

        foreach ($data as $value => $b) {

            foreach ($b as $k) {
                ?>
                    <div class="col s12 m12 l4">
                        <div class="card-panel flow-text">
                        <i class="fas fa-leaf medium green-text text-darken-4"></i>
                        <h4 class="black-text"><?= $b['title'] ?></h4>
                        <a href="?<?= $link ?>=<?= $b['id'] ?>" class="waves-effect waves-light btn-large deep-purple darken-2 white-text">Acessar</a>
                        </div>
                    </div>
                <?php
                break;
            }
        }
    }

    public static function genDivsTitle($title, $data, $link)
    {

        ?>
         <h4 class="deep-purple-text darken-2-text center"><?= $title ?></h4>
             <div class="container">
                <div class="row center">
                    <?php
                        self::genDivsExplore($data, $link);
                    ?>
                </div>
             </div>
         <?php

    }
}
