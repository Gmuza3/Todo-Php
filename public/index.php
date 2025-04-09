<?php

use App\controller\UserControler;
use App\models\Database;
use App\Routes\Router;
use Dotenv\Dotenv;

require_once "../vendor/autoload.php";

$dotenv = Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();

$host = $_ENV['APP_HOST'];
$Port = $_ENV['APP_PORT'];
$Dbname = $_ENV['APP_DBNAME'];
$name = $_ENV['APP_NAME'];
$pass = $_ENV['APP_PASS'];

$database = new Database($host,$Port,$Dbname,$name,$pass);

$router = new Router($database);


$router->get('/users',array(UserControler::class,'index'));
$router->post('/users',array(UserControler::class,'index'));
$router->get('/users/create',array(UserControler::class,'create'));
$router->post('/users/create',[UserControler::class,'create']);
$router->get('/users/update',[UserControler::class,'update']);
$router->post('/users/update',[UserControler::class,'update']);
$router->post('/users/delete',[UserControler::class,'delete']);

$router->resolve();