<?php

namespace App\controllers;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/test-input.php';

use App\entities\Tag;
use App\entities\Wiki;
use App\entities\Category;
use App\models\CategoryModel;
use App\models\TagModel;
use App\models\WikiModel;

session_start();


class AdminController
{

    public function dashboard()
    {
        include '../../view/admin/dashboard.php';
        exit();
    }

    public function index()
    {
        $wikiModel = new WikiModel();
        $wikis = $wikiModel->getAll();

        include '../../view/admin/wiki.php';
        exit();
    }

    public function categories()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();

        $tagModel = new TagModel();
        $tags = $tagModel->getAll();

        include '../../view/admin/categories.php';
        exit();
    }

    public function wikis($wikis)
    {
        include '../../views/admin/wikis.php';
        exit();
    }

    public function allwikis()
    {

        // $wikis = WikiModel::getAllWikis();
        // $this->wikis($wikis);
    }

    public function getWikisById()
    {
        // if (isset($_GET['id'])) {
        //     $id = base64_decode($_GET['id']);
        //     $wiki = WikiModel::getWikiById($id);
        //     include '../../views/admin/editwiki.php';
        //     exit();
        // } else {
        //     echo "Error: 'id' parameter is missing.";
        // }
    }

    public function updateStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

            $id = test_input($_POST['id']);
            $status = test_input($_POST['status']);

            $wiki = new Wiki($id, NULL, NULL, $status, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
            $wikiModel = new WikiModel();
            $result = $wikiModel->updateStatus($wiki);

            header("Location:wikis");
            exit();
        }
    }
}
