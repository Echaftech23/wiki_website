<?php

namespace App\entities;

class Wiki
{
    private $id;
    private $title;
    private $content;
    private $status;
    private $image;
    private $created_at;
    private $auther_id;
    private $category_id;

    public function __construct($id = NULL, $title, $content, $status, $image = NULL, $created_at, $auther_id, $category_id)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->status = $status;
        $this->image = $image;
        $this->created_at = $created_at;
        $this->auther_id = $auther_id;
        $this->category_id = $category_id;
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
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
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
}
