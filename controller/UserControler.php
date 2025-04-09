<?php 

namespace App\controller;

use App\models\Validation\Users;
use App\Routes\Router;

class UserControler{
    public function index(Router $router){
        $keyword = $_POST['search'] ?? null;
        $users = $router->database->getUsers($keyword);
        
        $router->renderView('home',[
            "users"=>$users
        ]);
    }
    public function create(Router $router){
        $newUser=[
            "name" => '',
            "username" =>'',
            "age" => '',
            "gender" => ''
        ];
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $newUser['name'] = $_POST['name'];
            $newUser['username'] = $_POST['username'];
            $newUser['age'] = $_POST['age'];
            $newUser['gender'] = $_POST['gender'];
        }
        $users = new Users();
        $users->load($newUser);
        $users->save();

        $router->renderView("create",[
            "users" =>$newUser
        ]);
    }
    public function update(Router $router){
        $id = $_GET['id'];
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($id) {
                $user = $router->database->getUserById($id);
                return $router->renderView("update", ["users" => $user]);
            }
            return;
        }
    
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $editUser = [
                "id" => $id ?? '',
                "name" => $_POST['name'] ?? '',
                "username" => $_POST['username'] ?? '',
                "age" => $_POST['age'] ?? '',
                "gender" => $_POST['gender'] ?? ''
            ];
    
            $validation = new Users();
            $validation->load($editUser);
            $errors = $validation->save(); 

            if (!empty($errors)) {
                return $router->renderView("update", [
                    "users" => $editUser, 
                    "errors" => $errors
                ]);
            }
    
            header("Location: /users");
            exit;
        }
    }
    
    public function delete(Router $router){
        $id = $_POST['id'] ?? null;
        if($id){
            $router->database->deleteUser($id);
            header('Location: /users');
            exit;
        }else{
            header('Location: /users');
            exit;
        }
    }
}