<?php 
namespace App\models\Validation;

use App\models\Database;

class Users {
    public ?string $id;
    public ?string $name;
    public ?string $username;
    public float $age;
    public ?string $gender;
    public array $errors=[];
    public function load($data) {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? "";
        $this->username = $data['username'] ?? "";
        $this->age = isset($data['age']) ? (float)$data['age'] : 0.0;
        $this->gender = $data['gender'] ?? '';
    }

    public function save() {
        if (!$this->name) {
            $this->errors[] = 'User Name is Required!!!';
        }
    
        if (!$this->username) {
            $this->errors[] = 'User Username is Required!!!';
        }
    
        if ($this->age <= 0 || $this->age > 80) {
            $this->errors[] = 'Age must be between 1 and 80!';
        }
    
        if (!in_array(strtolower($this->gender), ['male', 'female'])) {
            $this->errors[] = 'Gender must be Male or Female!';
        }
    
        if (!empty($this->errors)) {
            return $this->errors;
        }
    
        $db = Database::$db;
    
        if (!$this->id) {
            $db->addNewUser($this);
        } else {
            $db->updateUser($this);
        }
    }
    
}
