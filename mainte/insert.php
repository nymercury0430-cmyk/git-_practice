<?php

//DB接続
require 'db_connection.php';
function insertContact($pdo, $request){

//入力
$params = [
  'id' => null,
  'your_name' => $request['your_name'],
  'email' => $request['email'],
  'created_at' => null
];

$count = 0;
$columns = '';
$values = '';

foreach(array_keys($params) as $key){
  if($count > 0){
    $columns .= ',';
    $values .= ',';
  }
  $columns .= $key;
  $values .= ':' . $key;
  
  $count++;
}

$sql = 'insert into contacts ('. $columns .')values('. $values .')';

// var_dump($sql);
// exect();

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

}