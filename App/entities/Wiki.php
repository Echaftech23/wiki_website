<?php

namespace App\entities;

use DateTime;

class Wiki
{
    private $id;
    private $title;
    private $content;
    private $status;
    private $image;
    private $category_name;

    private $created_at;
    private $auther_id;
    private $category_id;
    private $tags = [];
    private $author_name;
    private $author_image;

    public function __construct($id = NULL, $title, $content, $status, $image = NULL, $category_name, $tags, $auther_id, $category_id, $author_name, $author_image, $created_at)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->status = $status;
        $this->image = $image;
        $this->category_name = $category_name;
        $this->tags = $tags;
        $this->auther_id = $auther_id;
        $this->category_id = $category_id;
        $this->author_name = $author_name;
        $this->author_image = $author_image;
        $this->created_at = $created_at;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getCreatedAt()
    {
        $dateTime = new DateTime($this->created_at);
        return $dateTime->format("F, j, Y");
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getAuthorName()
    {
        return $this->author_name;
    }

    public function setAuthorName($author_name)
    {
        $this->author_name = $author_name;
    }

    public function getAuthorImage()
    {
        return $this->author_image;
    }

    public function setAuthorImage($author_image)
    {
        $this->author_image = $author_image;
    }

    public function getAutherId()
    {
        return $this->auther_id;
    }

    public function setAutherId($auther_id)
    {
        $this->auther_id = $auther_id;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    public function getCategoryName()
    {
        return $this->category_name;
    }

    public function setCategoryName($category_name)
    {
        $this->$category_name = $category_name;    
    }

    public function getTags()
    {
        return explode(',', $this->tags);
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }
}
