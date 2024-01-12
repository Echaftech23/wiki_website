<?php

namespace App\Models;

use App\entities\Wiki;
use App\database\Database, PDO, PDOException;

require_once __DIR__ . '/../../vendor/autoload.php';


class WikiModel
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getBystatus()
    {
        $stmt = $this->pdo->prepare("
            SELECT 
                w.*, c.name AS category_name, GROUP_CONCAT(t.name) AS tag_names,
                u.username AS author_name, u.image AS author_image
            FROM
                wikis w
            JOIN categories c ON
                w.category_id = c.id
            LEFT JOIN wikis_tags wt ON
                w.id = wt.wiki_id
            LEFT JOIN tags t ON
                wt.tag_id = t.id
            JOIN users u ON
                w.auther_id = u.id
            WHERE w.status = 'accepted'
            GROUP BY
                w.id
            ORDER BY
                w.created_at DESC;
            
        ");


        $stmt->execute();
        $wikisData = $stmt->fetchAll(PDO::FETCH_OBJ);

        $wikis = [];

        foreach ($wikisData as $wikiData) {
            $wiki = new Wiki(
                $wikiData->id, $wikiData->title, $wikiData->content, $wikiData->status,
                $wikiData->image, $wikiData->category_name, $wikiData->tag_names,
                $wikiData->auther_id, $wikiData->category_id, $wikiData->author_name, $wikiData->author_image, $wikiData->created_at
            );
            $wikis[] = $wiki; 
        }
        return $wikis;
    }

    public function getAll()
    {
        $stmt = $this->pdo->prepare("
            SELECT 
                w.*, c.name AS category_name, GROUP_CONCAT(t.name) AS tag_names,
                u.username AS author_name, u.image AS author_image
            FROM
                wikis w
            JOIN categories c ON
                w.category_id = c.id
            LEFT JOIN wikis_tags wt ON
                w.id = wt.wiki_id
            LEFT JOIN tags t ON
                wt.tag_id = t.id
            JOIN users u ON
                w.auther_id = u.id
            GROUP BY
                w.id
            ORDER BY
                w.created_at DESC;

        ");


        $stmt->execute();
        $wikisData = $stmt->fetchAll(PDO::FETCH_OBJ);

        $wikis = [];

        foreach ($wikisData as $wikiData) {
            $wiki = new Wiki(
                $wikiData->id,
                $wikiData->title,
                $wikiData->content,
                $wikiData->status,
                $wikiData->image,
                $wikiData->category_name,
                $wikiData->tag_names,
                $wikiData->auther_id,
                $wikiData->category_id,
                $wikiData->author_name,
                $wikiData->author_image,
                $wikiData->created_at
            );
            $wikis[] = $wiki;
        }
        return $wikis;
    }

    public function save($wiki, $tagsIds)
    {

        $this->pdo->beginTransaction();
        
        try {

            $stmt = $this->pdo->prepare("
                INSERT INTO wikis (title, content, status, image, auther_id, category_id)
                VALUES (:title, :content, :status, :image, :category_id)
            ");

            // Bind parameters
            $data = array(
                ":title" => $wiki->getTitle(), ":content" => $wiki->getContent(), 
                ":status" => $wiki->getStatus(),
                ":image" => $wiki->getImage(),
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

    public function update($wiki, $tagIds)
    {
        $this->pdo->beginTransaction();

        try {

            $stmt = $this->pdo->prepare("UPDATE wikis 
                SET title = :title, content = :content, image = :image, category_id = :category_id 
                WHERE id = :id"
            );

            // Bind parameters
            $data = array(
                ":title" => $wiki->getTitle(), ":content" => $wiki->getContent(),
                ":image" => $wiki->getImage(), ":category_id" => $wiki->getCategoryId(), ":id" => $wiki->getId()
            );


            $stmt->execute($data);

            // Delete existing Wikis_Tags entries for this wiki
            $stmtDeleteTags = $this->pdo->prepare("DELETE FROM Wikis_Tags WHERE wiki_id = :wiki_id");
            $stmtDeleteTags->execute(array(":wiki_id" => $wiki->getId()));

            $stmtWikisTags = $this->pdo->prepare("INSERT INTO Wikis_Tags (wiki_id, tag_id) VALUES (:wiki_id, :tag_id)");

            foreach ($tagIds as $tagId) {
                $dataWikisTags = array(":wiki_id" => $wiki->getId(), ":tag_id" => $tagId);
                $stmtWikisTags->execute($dataWikisTags);
            }

            $this->pdo->commit();
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            return false;
        }
    }

    public function updateStatus($wiki)
    {
        try {

            $stmt = $this->pdo->prepare("UPDATE wikis SET status = :status WHERE id = :id");

            // Bind parameters
            $data = array(":status" => $wiki->getStatus(), ":id" => $wiki->getId());
            $stmt->execute($data);

        } catch (PDOException $e) {
            return false;
        }
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT 
            w.*, c.name AS category_name, GROUP_CONCAT(t.name) AS tag_names,
            u.username AS author_name, u.image AS author_image
            FROM
                wikis w
            JOIN categories c ON
                w.category_id = c.id
            LEFT JOIN wikis_tags wt ON
                w.id = wt.wiki_id
            LEFT JOIN tags t ON
                wt.tag_id = t.id
            JOIN users u ON
                w.auther_id = u.id
            WHERE w.status = 'accepted' AND w.id = :id
            GROUP BY
                w.id
        ");

        $stmt->bindParam(':id', $id);

        try {
            if ($stmt->execute()) {
                $wikiData = $stmt->fetch(PDO::FETCH_OBJ);

                if ($wikiData) {
                    $wiki = new Wiki(
                        $wikiData->id,
                        $wikiData->title,
                        $wikiData->content,
                        $wikiData->status,
                        $wikiData->image,
                        $wikiData->category_name,
                        $wikiData->tag_names,
                        $wikiData->auther_id,
                        $wikiData->category_id,
                        $wikiData->author_name,
                        $wikiData->author_image, $wikiData->created_at
                    );

                    return $wiki;
                } else {
                    return null;
                }
            } else {                
                $errorInfo = $stmt->errorInfo();
                print_r($errorInfo);
                return false;
            }
        } catch (PDOException $e) {            
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteById($id)
    {

        $stmt = $this->pdo->prepare("DELETE FROM wikis WHERE id = :id");
        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();
            $result = $stmt->rowCount() > 0 ? true : false;
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

    public function search($searchInput)
    {
        $searchInput = "%$searchInput%";
        try {
            $stmt = $this->pdo->prepare("
                SELECT DISTINCT w.*, c.name AS category_name, GROUP_CONCAT(t.name) AS tag_names,
                u.username AS author_name, u.image AS author_image
                FROM wikis w 
                LEFT JOIN users u ON w.auther_id = u.id 
                LEFT JOIN categories c ON w.category_id = c.id
                LEFT JOIN wikis_tags wt ON w.id = wt.wiki_id  
                LEFT JOIN tags t ON wt.tag_id = t.id 
                WHERE (w.title LIKE :searchInput OR w.content LIKE :searchInput 
                OR u.username LIKE :searchInput OR c.name LIKE :searchInput 
                OR t.name LIKE :searchInput) AND w.status = 'accepted'
                GROUP BY w.id, u.username, c.name
            ");

            // Bind parameters
            $stmt->bindParam(':searchInput', $searchInput, PDO::PARAM_STR);
            $stmt->execute();

            $wikiData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $wikiData;
        } catch (PDOException $e) {
            return false;
        }
    }
}
