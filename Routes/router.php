<?php 

namespace App\Routes;

use App\controller\UserControler;
use App\models\Database;

class Router{
    private array $getRoutes=[];
    private array $postRoutes=[];
    public ?Database $database = null;
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    public function get($url,$fn){
        $this->getRoutes[$url] = $fn;
    }
    public function post($url,$fn){
        $this->postRoutes[$url] = $fn;
    }
    public function resolve(){
        $method = $_SERVER['REQUEST_METHOD'];
        $url = strtok($_SERVER['REQUEST_URI'],'?'); 
        
        if($method === 'GET'){
            $func = $this->getRoutes[$url] ?? null;
        }else{
            $func = $this->postRoutes[$url] ?? null;
        }
        if(!$func){
            echo "Page Not Found";
            exit;
        }
        if($func){
            [$controlerName,$methodName] =$func;
            $controlerName = new UserControler();
            echo call_user_func([$controlerName,$methodName],$this);
        }
    }
    public function renderView($view,$params=[]){
        foreach($params as $name=>$user){
             $$name = $user;
        }
        ob_start();
        include __DIR__."/../views/$view.php";
        $content = ob_get_clean();
        include __DIR__."/../views/_layout.php";
    }
}