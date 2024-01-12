<?php

namespace App\Models;

use App\entities\Wiki;
use App\Dao\WikiDaoInterface;
use App\database\Database, PDO, PDOException;

require_once __DIR__ . '/../../vendor/autoload.php';


class WikiModel implements WikiDaoInterface
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }


    public function getAll()
    {
        $stmt = $this->pdo->prepare("
            SELECT w.*, c.name AS category_name, GROUP_CONCAT(t.name) AS tag_names
            FROM wikis w
            JOIN categories c ON w.category_id = c.id
            LEFT JOIN wikis_tags wt ON w.id = wt.wiki_id
            LEFT JOIN tags t ON wt.tag_id = t.id
            GROUP BY w.id
        ");
        $stmt->execute();
        $wikisData = $stmt->fetchAll(PDO::FETCH_OBJ);

        $wikis = [];

        foreach ($wikisData as $wikiData) {
            $wiki = new Wiki(
                $wikiData->id, $wikiData->title, $wikiData->content,
                $wikiData->status, $wikiData->image, $wikiData->category_name, $wikiData->tag_names, 
                $wikiData->created_at, $wikiData->auther_id, $wikiData->category_id
            );

            $wikis[] = $wiki;
        }

        return $wikis;
    }


    public function save(Wiki $wiki, $tagsIds)
    {

        $this->pdo->beginTransaction();
        
        try {

            $stmt = $this->pdo->prepare("
                INSERT INTO wikis (title, content, status, image, created_at, auther_id, category_id)
                VALUES (:title, :content, :status, :image, :created_at, :auther_id, :category_id)
            ");

            // Bind parameters
            $data = array(
                ":title" => $wiki->getTitle(), ":content" => $wiki->getContent(), ":status" => $wiki->getStatus(),
                ":image" => $wiki->getImage(), ":created_at" => $wiki->getCreatedAt(),
                ":auther_id" => $wiki->getAutherId(), ":category_id" => $wiki->getCategoryId()
            );

            
            $stmt->execute($data);
            $wikiId = $this->pdo->lastInsertId();

            $stmtWikisTags = $this->pdo->prepare("INSERT INTO Wikis_Tags (wiki_id, tag_id) VALUES (:wiki_id, :tag_id)");
            
            foreach ($tagsIds as $tagId) {
                $dataWikisTags = array(":wiki_id" => $wikiId, ":tag_id" => $tagId);
                $stmtWikisTags->execute($dataWikisTags);
            }

            $this->pdo->commit();

        } catch (PDOException $e) {
            $this->pdo->rollBack();
            return $result = false;
        }
    }

    public function update(Wiki $wiki, $tagIds)
    {
        $this->pdo->beginTransaction();

        try {

            $stmt = $this->pdo->prepare("
                INSERT INTO wikis (title, content, status, image, created_at, auther_id, category_id)
                VALUES (:title, :content, :status, :image, :created_at, :auther_id, :category_id)
            ");

            // Bind parameters
            $data = array(
                ":title" => $wiki->getTitle(), ":content" => $wiki->getContent(), ":status" => $wiki->getStatus(),
                ":image" => $wiki->getImage(), ":created_at" => $wiki->getCreatedAt(),
                ":auther_id" => $wiki->getAutherId(), ":category_id" => $wiki->getCategoryId()
            );


            $stmt->execute($data);
            $wikiId = $this->pdo->lastInsertId();

            $stmtWikisTags = $this->pdo->prepare("INSERT INTO Wikis_Tags (wiki_id, tag_id) VALUES (:wiki_id, :tag_id)");

            foreach ($tagIds as $tagId) {
                $dataWikisTags = array(":wiki_id" => $wikiId, ":tag_id" => $tagId);
                $stmtWikisTags->execute($dataWikisTags);
            }

            $this->pdo->commit();
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            return $result = false;
        }
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM wikis WHERE id = :id");
        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $wikiData = $stmt->fetch(PDO::FETCH_OBJ);

            $wiki = new Wiki(
                $wikiData->id, $wikiData->title, $wikiData->content,
                $wikiData->status, $wikiData->image, $wikiData->category_name, $wikiData->tag_names, 
                $wikiData->created_at, $wikiData->auther_id, $wikiData->category_id
            );

                return $wiki;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteById($id)
    {
        $wiki = $this->getById($id);
        if (!$wiki) {
            return true;
        }

        $stmt = $this->pdo->prepare("DELETE FROM wikis WHERE id = :id");
        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();
            $result = $stmt->rowCount() > 0 ? $wiki : false;
            return $result;
        } catch (PDOException $e) {
            return $result = false;
        }
    }

    public function countWikis()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) as cat_count FROM wikis");
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_OBJ);

            return $data->cat_count;
        } catch (PDOException $e) {

            return 0;
        }
    }
}
