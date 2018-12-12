<?php

session_start();

require_once("vendor/autoload.php");

//user model
use Source\Users\Model as UserModel;

//User
use Source\Users\Login as Login;
use Source\Users\Register as UserRegister;

//Article
use Source\Articles\Article\Article as Article;
use Source\Articles\Category\Category as Category;
use Source\Articles\ScientificArea\ScientificArea as ScientificArea;
use Source\Articles\SubCategory\SubCategory as SubCategory;

use Source\Articles\Register as Register;

//Article models
use Source\Articles\Article\Model as ArticleModel;
use Source\Articles\Category\Model as CategoryModel;
use Source\Articles\ScientificArea\Model as ScientificAreaModel;
use Source\Articles\SubCategory\Model as SubCategoryModel;