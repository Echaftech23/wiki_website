<?php

namespace App\Models;

use App\entities\Tag;
use App\database\Database, PDO, PDOException;

require_once __DIR__ . '/../../vendor/autoload.php';


class TagModel
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }


    public function getAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tags");
        $stmt->execute();
        $tagsData = $stmt->fetchAll(PDO::FETCH_OBJ);

        $tags = [];

        foreach ($tagsData as $tagData) {
            $tag = new Tag($tagData->id, $tagData->name);

            $tags[] = $tag;
        }

        return $tags;
    }

    public function getLastEightTags()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tags ORDER BY id ASC LIMIT 8");
        $stmt->execute();
        $tagsData = $stmt->fetchAll(PDO::FETCH_OBJ);

        $tags = [];

        foreach ($tagsData as $tagData) {
            $tag = new Tag($tagData->id, $tagData->name);

            $tags[] = $tag;
        }

        return $tags;
    }

    public function save($tag)
    {
        $tagName =  $tag->getName();

        $stmt = $this->pdo->prepare("INSERT INTO tags (name) VALUES (:name)");
        $stmt->bindParam(":name", $tagName);

        $stmt->execute();
        $result = $stmt->rowCount() > 0 ? $this->pdo->lastInsertId() : false;
        return $result;
    }

    public function update($tag)
    {
        $stmt = $this->pdo->prepare("UPDATE tags SET name = :name  WHERE id = :id");

        // Bind parameters
        $data = array(
            ":id" => $tag->getId(), ":name" => $tag->getName()
        );

        try {
            $stmt->execute($data);
            $result = $stmt->rowCount() > 0 ? $tag : false;
            return $result;
        } catch (PDOException $e) {
            return $result = false;
        }
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tags WHERE id = :id");
        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $tagData = $stmt->fetch(PDO::FETCH_OBJ);

                $tag = new Tag($tagData->id, $tagData->name);

                return $tag;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteById($id)
    {
        $tag = $this->getById($id);
        if (!$tag) {
            return true;
        }

        $stmt = $this->pdo->prepare("DELETE FROM tags WHERE id = :id");
        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();
            $result = $stmt->rowCount() > 0 ? $tag : false;
            return $result;
        } catch (PDOException $e) {
            return $result = false;
        }
    }

    public function countTags()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) as cat_count FROM tags");
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_OBJ);

            return $data->cat_count;
        } catch (PDOException $e) {

            return 0;
        }
    }
}
