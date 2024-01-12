<?php

namespace App\controllers;

use App\entities\Tag;
use App\models\TagModel, Exception;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/test-input.php';


class TagController
{

    public static function addTag(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addtag'])) {
            $name = test_input($_POST['name']);
                
            $tag = new Tag(null, $name);
            $tagModel = new TagModel();
            try {
                $tagModel->save($tag);
                header("Location: categories");
                exit();
            } catch (Exception $e) {
                echo 'Tag Duplicated please renter a new one ';
            }
        }
    }

    public static function updateTag()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edittag'])) {
            $id = test_input($_POST['id']);
            $name = test_input($_POST['name']);

            $tag = new Tag($id, $name);
            $tagModel = new TagModel();
            $tagModel->update($tag);
            header("Location: categories");
            exit();
        }
    }

    public static function deleteTag()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = test_input($_GET['id']);

            $tagModel = new TagModel();
            $tagModel->deleteById($id);
            header("Location: categories");
            exit();
        }
    }
}