<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

include_once '../../config/Database.php';
include_once '../../models/Users.php';

$database =new Database();
$db = $database->connect();


$user =new Users($db);

//$user->id=isset($_GET['id']) ? $_GET['id'] : die();
$user->name=isset($_GET['name']) ? $_GET['name'] : die();
$user->password=isset($_GET['password']) ? $_GET['password'] : die();

$user->read_credentials();

$user_arr=array(
    'id'=>$user->id,
    'name'=>$user->name,
    'email'=>$user->email,
    'status'=>$user->status
);
print_r(json_encode($user_arr));