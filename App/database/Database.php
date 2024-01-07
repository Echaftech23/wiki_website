<?php

namespace App\database;

use PDO;
use PDOException;

require __DIR__ . '/../../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

class Database
{
    private static $instance;
    private $serverName;
    private $userName;
    private $password;
    private $dbname;
    private $conn;
    private $error;

    private function __construct()
    {
        $this->serverName = $_ENV["DB_SERVERNAME"];
        $this->userName = $_ENV["DB_USERNAME"];
        $this->password = $_ENV["DB_PASSWORD"];
        $this->dbname = $_ENV["DB_NAME"];
    }

    private function DbConnect()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->serverName;dbname=$this->dbname", $this->userName, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new PDOException("Database connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
            self::$instance->DbConnect(); 
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}