<?php

namespace App\Dao;

interface DaoInterface
{
    public function getAll();
    public function save($entity);
    public function update($entity);
    public function getById($id);
    public function deleteById($id);
}