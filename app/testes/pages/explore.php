<?php
//require_once('../../config.php');
use \Source\ScientificArea\ScientificArea as Area;
use \Source\Category\Category as Category;
use \Source\SubCategory\SubCategory;
use \Source\Article\Article as Article;


# DISCLAIMER
# CLICK ON THIS LINK TO KNOW WHAT IS GOING ON
# https://miro.medium.com/max/754/1*snTXFElFuQLSFDnvZKJ6IA.png

\App\request\Request::requestTreatment(false, false, function () {

    if (isset($_GET["category"])) {

        $category = new Category();
        $category->setId($_GET["category"]);
        //buscar titulo da pagina da respectiva area de conhecimento
        $category->getDivTitle(); // titulo da pagina
        //exibir as categorias da respectiva area de conhecimento
         //corpo das divs


    } else if (isset($_GET["sub"])) {

        $sub_category = new SubCategory();
        $sub_category->setId($_GET["sub"]);
        //buscar titulo da respectiva categoria
        $sub_category->getDivTitle();
        //exibir as sub categorias da categoria em questao


    } else if (isset($_GET["article"])) {

        $article = new Article();
        $article->setId($_GET["article"]);
        #buscar o titulo da respectiva sub categoria
        $article->getDivTitle();
        #buscando e imprimindo os artigos encontrados da categoria em questao


    } else {

        $area = new Area();
        //só busca as areas de conhecimento mesmo
        $area->getDivTitleAndData();
    }
});

