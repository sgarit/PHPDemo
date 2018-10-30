<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
include_once '../../config/Database.php';
include_once '../../models/users.php';
$database = new Database();
$db = $database->connect();
$user = new users($db);
$result = $user->read();
$num = $result->rowcount();
if($num>0){
    $users_array = array();
    $users_array["data"] = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $user_item = array(
         "id"  =>$id,
         "First_Name" =>$First_Name,
         "Last_Name"  =>$Last_Name,
         "Email"      =>$Email  
        );
        array_push($users_array["data"], $user_item);
    }
    echo json_encode($users_array);
}else{
    echo json_encode(array('message' => "No Posts Found" ));
}
?>