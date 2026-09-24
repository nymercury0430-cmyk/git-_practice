<?php

require 'db_connection.php';


//練習
// $sql = 'SELECT * FROM contacts WHERE id = 1';
// $stmt = $pdo->query($sql);

// $result = $stmt->fetchall();

// var_dump($result);


//本番
$sql = 'SELECT * FROM contacts WHERE id = :id';
$pdo->beginTransaction();

try{
  //sql処理
$stmt = $pdo->prepare($sql);
$stmt->bindValue('id', 1, PDO::PARAM_INT);
$stmt->execute();

$pdo->commit();

} catch(PDOException $e){
  $pdo->rollback();//更新のキャンセル
}


/*----------------------------------
//トランザクション

$pdo->beginTransaction();

try{

//sql処理

$pdo->commit();

} catch(PDOException $e){
  $pdo->rollback();//更新のキャンセル
}
------------------------------------*/

