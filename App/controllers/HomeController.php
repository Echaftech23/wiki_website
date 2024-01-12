<?php

namespace App\controllers;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/test-input.php';

use App\entities\Tag;
use App\entities\Category;
use App\entities\Wiki;
use App\models\CategoryModel;
use App\models\TagModel;
use App\models\WikiModel;

session_start();
class HomeController
{

    public function index()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getLastTenCategories();
        
        $tagModel = new TagModel();
        $tags = $tagModel->getLastEightTags();

        include '../../view/index.php';
        exit();
    }

    public function addWiki()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getLastTenCategories();

        $tagModel = new TagModel();
        $tags = $tagModel->getLastEightTags();

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addwiki'])){

            if (isset($_FILES["image"])) {
                $uploadDirectory = "public/img/";
                $filename = basename($_FILES["image"]["name"]);
                $targetFile = $uploadDirectory . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
            }

            $title  = test_input($_POST['title']);
            $content  = test_input($_POST['content']);
            $status = test_input('Pending');
            $image  = test_input($filename);
            $tags_ids  = isset($_POST['tagsIds']) ? $_POST['tagsIds'] : array();
            $tags_ids  = array_map('test_input', $tags_ids);
            $auther_id  = $_SESSION['Auther_id'];
            $category_id  = test_input($_POST['categoryId']);

            $wikiModel = new WikiModel();
            $wiki = new Wiki(NULL, $title, $content, $status, $image, $category_name = NULL, $tag_names = NULL, $created_at = NULL, $auther_id, $category_id);
            $result = $wikiModel->save($wiki, $tags_ids);
            
            if ($result) {
                include '../../view/index.php';
                exit();
            }
        }
        include '../../view/auther/addwiki.php';
    }

    public function wikiDetail()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getLastTenCategories();

        $tagModel = new TagModel();
        $tags = $tagModel->getLastEightTags();

        include '../../view/detail.php';
        exit();
    }
}
