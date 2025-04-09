<?php

namespace App\models;

use App\models\Validation\Users;
use Dotenv\Dotenv;
use PDO;
use PDOException;

$dotenv = Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();

$host = $_ENV['APP_HOST'];
$Port = $_ENV['APP_PORT'];
$Dbname = $_ENV['APP_DBNAME'];
$name = $_ENV['APP_NAME'];
$pass = $_ENV['APP_PASS'];

class Database
{
    public $pdo = null;
    public static ?Database $db = null;
    public function __construct($host, $Port, $Dbname, $name, $pass)
    {
        try {
            $dsn = "mysql:host=$host;port=$Port;dbname=$Dbname";
            $this->pdo = new PDO($dsn, $name, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db = $this;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getUsers($keyword = null)
    {
        if ($keyword) {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE name LIKE :keyword");
            $stmt->bindValue(":keyword", "%$keyword%");
        } else {
            $stmt = $this->pdo->prepare("SELECT * FROM users ORDER BY create_date DESC");
        }
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    public function addNewUser(Users $users)
    {
        $stmt = $this->pdo->prepare('INSERT INTO users(name, username, age, gender, create_date) VALUES (:name, :username, :age, :gender, NOW())');
        $stmt->bindValue(":name", $users->name);
        $stmt->bindValue(":username", $users->username);
        $stmt->bindValue(":age", $users->age);
        $stmt->bindValue(":gender", $users->gender);
        $stmt->execute();

        header('Location:/users');
        exit;
    }
    public function deleteUser($id = null)
    {
        $stmt = $this->pdo->prepare('DELETE FROM users WHERE id = :id');
        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }
    public function getUserById($id = null)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users where id like :id');
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function updateUser(Users $user)
    {
        $stmt = $this->pdo->prepare('UPDATE users SET name = :name, username = :username, gender = :gender, age = :age, create_date = NOW() WHERE id = :id');
        $stmt->bindValue(":name", $user->name);
        $stmt->bindValue(":id", $user->id);
        $stmt->bindValue(":username", $user->username);
        $stmt->bindValue(":gender", $user->gender);
        $stmt->bindValue(":age", $user->age);
        $stmt->execute();
    }
}
