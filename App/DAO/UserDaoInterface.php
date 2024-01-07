<?php

namespace App\Dao;

use App\Entities\User;

interface UserDaoInterface
{
    public function getAll();
    public function save(User $user);
    public function update(User $user);
    public function getById($id);
    public function getByEmail($email);
    public function deleteById($id);
}