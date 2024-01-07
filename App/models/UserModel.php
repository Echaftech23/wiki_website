<?php

namespace App\models;

use App\entities\User;
use App\Dao\UserDaoInterface;
use App\database\Database, PDO, PDOException;

include __DIR__ . '/../../vendor/autoload.php';


class UserModel implements UserDAOInterface
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        $usersData = $stmt->fetchAll(PDO::FETCH_OBJ);

        $users = [];

        foreach ($usersData as $userData) {
            $user = new User(
                $userData->username, $userData->email, $userData->password,
                $userData->image, $userData->role_id
            );

            $users[] = $user;
        }
        
        return $users;
    }

    public function save($user)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO users (username, email, password, image, role_id)
            VALUES (:username, :email, :password, :image, :role_id)
        ");

        // Bind parameters
        $data = array(
            ":username" => $user->getUsername(), ":email" => $user->getEmail(), 
            ":password" => $user->getPassword(), ":image" => $user->getImage(),
            ":role_id" => $user->getRoleId()
        );

        try {
            $stmt->execute($data);
            $result = $stmt->rowCount() > 0 ? $this->pdo->lastInsertId() : false;
            return $result;

        } catch (PDOException $e) {
            return $result = false;
        }
    }

    public function update($user)
    {
        $stmt = $this->pdo->prepare("
            UPDATE users SET username = :username, email = :email, password = :password, 
            image = :image, role_id = :role_id WHERE id = :id
        ");

        // Bind parameters
        $data = array(
            ":username" => $user->getUsername(), ":email" => $user->getEmail(),
            ":password" => $user->getPassword(), ":image" => $user->getImage(),
            ":role_id" => $user->getRoleId(), ":id" => $user->getId()
        );

        try {
            $stmt->execute($data);
            $result = $stmt->rowCount() > 0 ? $user : false;
            return $result;

        } catch (PDOException $e) {
            return $result = false;
        } 
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $userData = $stmt->fetch(PDO::FETCH_OBJ);

                $user = new User(
                    $userData->username, $userData->email, $userData->password,
                    $userData->image, $userData->role_id
                );

                return $user;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);

        try {
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $userData = $stmt->fetch(PDO::FETCH_OBJ);

                $user = new User(
                    $userData->username, $userData->email,$userData->password,
                    $userData->image, $userData->role_id
                );

                return $user;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteById($id)
    {
        $user = $this->getById($id);
        if (!$user) {return true;}

        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();
            $result = $stmt->rowCount() > 0 ? $user : false;
            return $result;

        } catch (PDOException $e) {
            return $result = false;
        }
    }
}