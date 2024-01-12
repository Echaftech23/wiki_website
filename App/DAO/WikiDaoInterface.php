<?php

namespace App\Dao;

use App\Entities\Wiki;

interface WikiDaoInterface
{
    public function getAll();
    public function save(Wiki $wiki, $tagIds);
    public function update(Wiki $wiki, $tagIds);
    public function getById($id);
    public function deleteById($id);
    public function countWikis();
}
