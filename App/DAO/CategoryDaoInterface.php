<?php

namespace App\Dao;

use App\Entities\Category;

interface CategoryDaoInterface
{
    public function getAll();
    public function save(Category $category);
    public function update(Category $category);
    public function getById($id);
    public function deleteById($id);
    public function countCategories();
}
