<?php

session_start();

require_once("vendor/autoload.php");

//equire_once('app/request/request.php');

function sessions($user) {

    if(!isset($_SESSION[$user])) {

        session_destroy();

        return false;
    } else {

        return true;
    }

}

\App\request\Request::requestTreatment(false, false, function () {

    function request() {

        if(isset($_GET["page"])) {

            $dir = 'pages/';
            $page = $dir . $_GET["page"];

            if(!empty($_GET["page"]) && file_exists($page.".php")) {

                $page .= '.php';

                if($page == 'cadastrarArtigo.php') {

                    if(sessions('user')) {

                        require_once('cadastrarArtigo.php');
                    } else {

                        throw new \Exception ('you are not logged in!');
                    }
                }
                require_once($page);
            } else {
                if(!empty($_GET["page"]) && file_exists($page.'.html')) {

                    require_once($page.'.html');
                } else {

                    require_once('pages/home.html');
                }
            }
        } else {

            require_once('pages/home.html');
        }
    }
});






