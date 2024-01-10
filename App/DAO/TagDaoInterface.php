<?php

namespace App\Dao;

use App\Entities\Tag;

interface TagDaoInterface
{
    public function getAll();
    public function save(Tag $tag);
    public function update(Tag $tag);
    public function getById($id);
    public function deleteById($id);
    public function countTags();
}
