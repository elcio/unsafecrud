<?php

$db = new PDO("mysql:host=localhost;dbname=carros", "carros", "carros");

function list_carros(){
  global $db;
  $sql = "SELECT * FROM carro WHERE user = :user";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':user', $_SESSION['user_id'], PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_carro($id){
  global $db;
  $sql = "SELECT * FROM carro WHERE id = :id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

function save_carro($id, $modelo, $ano){
  global $db;
  $sql = "UPDATE carro SET modelo = :modelo, ano = :ano WHERE id = :id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->bindValue(':modelo', $modelo, PDO::PARAM_STR);
  $stmt->bindValue(':ano', $ano, PDO::PARAM_INT);
  return $stmt->execute();
}
