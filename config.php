<?php

session_start();

require_once("vendor/autoload.php");

//user model
use Source\Users\Model as UserModel;

//User
use Source\Users\Login as Login;
use Source\Users\User as User;

//Article
use Source\Article\Article as Article;
use Source\Category\Category as Category;
use Source\ScientificArea\ScientificArea as ScientificArea;
use Source\SubCategory\SubCategory as SubCategory;

//crud
use Source\Crud\Register as Register;
use Source\Crud\Search as Search;
use Source\Crud\Update as Update;
use Source\Crud\Delete as Delete;

//Article models
use Source\Article\Model as ArticleModel;
use Source\Category\Model as CategoryModel;
use Source\ScientificArea\Model as ScientificAreaModel;
use Source\SubCategory\Model as SubCategoryModel;