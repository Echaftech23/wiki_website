<?php

namespace App\controllers;

use App\entities\Category;
use App\models\CategoryModel;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/test-input.php';


class CategoryController
{

    public static function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addcategory'])) {
            $name = test_input($_POST['name']);

            $tag = new Category(null, $name);
            $tagModel = new CategoryModel();
            $tagModel->save($tag);
            header("Location: categories");
            exit();
        }
    }
}