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

        $wikiModel = new WikiModel();
        $wikis = $wikiModel->getBystatus();

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
                $uploadDirectory = "../../public/img/";
                $filename = basename($_FILES["image"]["name"]);
                $targetFile = $uploadDirectory . basename($_FILES["image"]["name"]);
                $result = move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
            }

            $title  = test_input($_POST['title']);
            $content  = test_input($_POST['content']);
            $status = test_input('Pending');
            $image  = test_input($filename);
            $tags_ids  = isset($_POST['tagsIds']) ? $_POST['tagsIds'] : array();
            $tags_ids  = array_map('test_input', $tags_ids);
            $auther_id  = $_SESSION['Auther_id'];
            $category_id  = test_input($_POST['categoryId']);
            
            if ($result) {

                $wikiModel = new WikiModel();
                $wiki = new Wiki(NULL, $title, $content, $status, $image, $category_name = NULL, $tags = NULL, $auther_id, $category_id, NULL, NULL, date("F j, Y"));
                $result = $wikiModel->save($wiki, $tags_ids);

                header('location:home');
                exit();
            }
        }
        include '../../view/auther/addwiki.php';
    }

    public static function fetchWikis()
    {

        if (isset($_GET["q"])) {
            $wikiModel = new WikiModel();
            $wikis = $wikiModel->search($_GET['q']);
            echo json_encode($wikis);
        }
    }
    public function wikiDetail()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getLastTenCategories();

        $tagModel = new TagModel();
        $tags = $tagModel->getLastEightTags();

        $id  = base64_decode($_GET['id']);

        $wikiModel = new WikiModel();
        $wiki = $wikiModel->getById($id);

        include '../../view/detail.php';
        exit();
    }

    public function getWikisById()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getLastTenCategories();

        $tagModel = new TagModel();
        $tags = $tagModel->getLastEightTags();

        $id  = base64_decode($_GET['id']);

        $wikiModel = new WikiModel();
        $wiki = $wikiModel->getById($id);

        include '../../view/auther/editwiki.php';
        exit();
    }

    public static function updateWiki()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editwiki'])) {

            if (isset($_FILES["image"])) {
                $uploadDirectory = "../../public/img/";
                $filename = basename($_FILES["image"]["name"]);
                $targetFile = $uploadDirectory . basename($_FILES["image"]["name"]);
                $result = move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
            }

            $id  = test_input($_POST['id']);
            $title  = test_input($_POST['title']);
            $content  = test_input($_POST['content']);
            $image  = test_input($filename);
            $tags_ids  = isset($_POST['tagsIds']) ? $_POST['tagsIds'] : array();
            $tags_ids  = array_map('test_input', $tags_ids);
            $category_id  = test_input($_POST['categoryId']);

            $wikiModel = new WikiModel();
            $wiki = new Wiki($id, $title, $content, NULL, $image, $category_name = NULL, $tags = NULL, NULL, $category_id, NULL, NULL, date("F j, Y"));
            $result = $wikiModel->update($wiki, $tags_ids);
            header("Location:home");
            exit();
        }
    }

    public static function deleteWiki()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = test_input($_GET['id']);

            $wikiModel = new WikiModel();
            $wikiModel->deleteById($id);
            header("Location: home");
            exit();
        }
    }
}
