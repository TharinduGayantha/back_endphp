<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

include_once '../../config/Database.php';
include_once '../../models/Users.php';

$database =new Database();
$db = $database->connect();

$users =new Users($db);
$result =$users -> read();

$num =$result->rowCount();

if($num > 0){
    $users_arr = array();
    $users_arr['data'] = array();
    while($row =$result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $name_user=array(
            'id'=>$id,
            'name'=>$name,
            'email'=>$email,
            'status'=> $status
        );
        array_push($users_arr['data'],$name_user);
    }
    echo json_encode($users_arr);
}else{
    echo json_encode(
        array('message'=>'no post found')
    );
}