<?php

namespace App\Models;

use App\entities\Category;
use App\Dao\CategoryDaoInterface;
use App\database\Database, PDO, PDOException;

require_once __DIR__ . '/../../vendor/autoload.php';


class CategoryModel implements CategoryDaoInterface
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }


    public function getAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM categories");
        $stmt->execute();
        $categoriesData = $stmt->fetchAll(PDO::FETCH_OBJ);

        $categories = [];

        foreach ($categoriesData as $categoryData) {
            $category = new Category($categoryData->id, $categoryData->name);

            $categories[] = $category;
        }

        return $categories;
    }


    public function getLastTenCategories()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM categories ORDER BY id ASC LIMIT 10");
        $stmt->execute();
        $categoriesData = $stmt->fetchAll(PDO::FETCH_OBJ);

        $categories = [];

        foreach ($categoriesData as $categoryData) {
            $category = new Category($categoryData->id, $categoryData->name);

            $categories[] = $category;
        }

        return $categories;
    }

    public function save(Category $category)
    {
        $categoryName =  $category->getName();

        $stmt = $this->pdo->prepare("INSERT INTO categories (name) VALUES (:name)");
        $stmt->bindParam(":name", $categoryName);

        try {
            $stmt->execute();
            $result = $stmt->rowCount() > 0 ? $this->pdo->lastInsertId() : false;
            return $result;
        } catch (PDOException $e) {
            return $result = false;
        }
    }

    public function update(Category $category)
    {
        $stmt = $this->pdo->prepare("UPDATE categories SET name = :name  WHERE id = :id");

        // Bind parameters
        $data = array(
            ":id" => $category->getId(), ":name" => $category->getName()
        );

        try {
            $stmt->execute($data);
            $result = $stmt->rowCount() > 0 ? $category : false;
            return $result;
        } catch (PDOException $e) {
            return $result = false;
        }
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $categoryData = $stmt->fetch(PDO::FETCH_OBJ);

                $category = new Category($categoryData->id, $categoryData->name);

                return $category;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteById($id)
    {
        $category = $this->getById($id);
        if (!$category) {
            return true;
        }

        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();
            $result = $stmt->rowCount() > 0 ? $category : false;
            return $result;
        } catch (PDOException $e) {
            return $result = false;
        }
    }

    public function countCategories()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) as cat_count FROM categories");
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_OBJ);

            return $data->cat_count;
        } catch (PDOException $e) {
        
            return 0;
        }
    }
}
