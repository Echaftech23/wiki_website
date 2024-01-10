<?php

namespace App\controllers;

use App\entities\Tag;
use App\models\TagModel;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/test-input.php';


class TagController
{

    public static function addTag(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addtag'])) {
        $name = test_input($_POST['name']);
            
        $tag = new Tag(null, $name);
        $tagModel = new TagModel();
        $tagModel->save($tag);
        header("Location: categories");
        exit();
        }
    }
}