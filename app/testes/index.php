<?php
    require_once('../../config.php');
    sessions('user');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <!--Linkagem do Materialize CSS via CDN-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!--Linkagem da fonte de icones do Google-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <!--Otimizar para Mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <script src="../../vendor/components/jquery/jquery.js"></script>
        <title>Murdock</title>
    </head>

    <body>
        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper grey darken-4">
                    <a href="index.html" class="white-text">MURDOCK</a>
                    <ul class="right">
                        <li>
                            <a href="?page=explore" class="white-text">Explorar</a>
                        </li>

                        <li>
                            <a href="?page=about" class="white-text">Sobre</a>
                        </li>

                        <li>
                            <a href="?page=login" class="white-text">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <main>
                <?php
                    request();
                ?>
        </main>

        <footer class="page-footer grey darken-4">
            <div class="container">
                <div class="row">
                    <div class="col s12 l6">
                        <h5 class="white-text">Contato</h5>
                        <a href="https://www.facebook.com/MurdockBiblioteca/"><i class="fab fa-facebook small white-text"></i></a>
                    </div>

                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer-copyright">
                <div class="container">
                    © Purple Kraken 2018
                </div>
            </div>
        </footer>
    </body>
</html>