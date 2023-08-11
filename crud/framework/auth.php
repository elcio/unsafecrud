<?php
require_once 'db.php';

session_start();

function require_login() {
  if (!isset($_SESSION['user_id'])) {
    header("Location: /crud/login.php");
    exit;
  }
  return $_SESSION['user_id'];
}

function login($login, $password) {
  global $db;
  $sql = "SELECT * FROM user WHERE login = :login";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':login', $login, PDO::PARAM_STR);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($user && password_verify($password, $user['senha'])) {
    $_SESSION['user_id'] = $user['id'];
    return true;
  }
  return false;
}
