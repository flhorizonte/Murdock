<?php
//require_once('../../config.php');
use \Source\ScientificArea\ScientificArea as Area;
use \Source\Category\Category as Category;
use \Source\SubCategory\SubCategory;
use \Source\Article\Article as Article;


# DISCLAIMER
# CLICK ON THIS LINK TO KNOW WHAT IS GOING ON
# https://miro.medium.com/max/754/1*snTXFElFuQLSFDnvZKJ6IA.png

\App\request\Request::requestTreatment(false, false, function(){

    if(isset($_GET["category"])){

        $category = new Category();

        $area = $_GET["category"];
        $category->setQuery("SELECT a.title FROM areas a WHERE a.id = :ID");
        $category->setParams([":ID" => $area]);
        $data = $category->select();
         //----------header
         ?>
         <h4 class="deep-purple-text darken-2-text center"><?=$data[0]['title']?></h4>
             <div class="container">
             <div class="row center">
         <?php
        //------bloco
        $category->setQuery("SELECT c.id, c.title FROM category c, areas a WHERE a.id = c.areas_id AND c.areas_id = :ID");
        $data = $category->select();

        \App\request\Request::gen($data,'page=explore&sub');

    } else if (isset($_GET["sub"])) {

        $sub_category = new SubCategory();

        $category = $_GET["sub"];
        $sub_category->setQuery("SELECT c.title FROM sub_category s, category c WHERE c.id = s.category_id AND s.category_id = :ID");
        $sub_category->setParams([":ID" => $category]);
        $data = $sub_category->select();

         //----------header
         ?>
         <h4 class="deep-purple-text darken-2-text center"><?=$data[0]['title']?></h4>
             <div class="container">
             <div class="row center">
         <?php
        //------bloco
        $sub_category->setQuery("SELECT s.id, s.title FROM sub_category s, category c WHERE c.id = s.category_id AND s.category_id = :ID");
        $data = $sub_category->select();

        \App\request\Request::gen($data,'page=explore&article');

    } else if (isset($_GET["article"])) {

        $article = new Article();

        $sub_category = $_GET["article"];
        #buscar o titulo da respectiva sub categoria
        $article->setQuery("SELECT s.title FROM sub_category s WHERE s.id = :ID");
        $article->setParams([":ID" => $sub_category]);
        $data = $article->select();

         //----------header
         ?>
         <h4 class="deep-purple-text darken-2-text center"><?=$data[0]['title']?></h4>
             <div class="container">
             <div class="row center">
         <?php
         //------bloco
        #buscando e imprimindo os artigos encontrados
        $article->setQuery("SELECT a.id, a.title, a.content, a.user_id, a.sub_category_id FROM article a, sub_category s WHERE s.id = a.sub_category_id AND a.sub_category_id = :ID");
        $data = $article->select();

        \App\request\Request::gen($data,'page=explore&article');
    }  else {

        $area = new Area();

        $area->setQuery("SELECT area.title, area.id  FROM areas area");
        $data = $area->select();
        //----------header
        ?>
        <h4 class="deep-purple-text darken-2-text center">Áreas de conhecimento</h4>
            <div class="container">
            <div class="row center">
        <?php
        //----------Blocos
        \App\request\Request::gen($data,'page=explore&category');
    }
});

