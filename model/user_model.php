<?php
$add_model = function(&$model) use ($conn) {
  $user = array();

  mysqli_query($conn,
    "CREATE TABLE IF NOT EXISTS users(
      id INT PRIMARY KEY AUTO_INCREMENT,
      name VARCHAR(20) UNIQUE,
      password VARCHAR(40),
      email VARCHAR(40),
      email_hash VARCHAR(40)
    )"
  );

  $user['create'] = function($user) use ($conn){
    $name = $user['name'];
    $password = md5($user['password']);
    $email = strtolower($user['email']);
    $email_hash = md5($email);
    mysqli_query($conn,
      "INSERT INTO users(name, password, email, email_hash)
       VALUES('{$name}', '{$password}', '{$email}', '{$email_hash}')");

    add_flash('success', "User created");
  };

  $user['login'] = function($name, $password) use ($conn){
    $result = mysqli_query($conn, "SELECT * FROM users WHERE name='$name' AND password='$password'");
    return mysqli_num_rows($result) ? $result : False;
  };

  $user['by_name'] = function($name) use ($conn){
    $result = mysqli_query($conn, "SELECT * FROM users WHERE name='$name'");
    $user = mysqli_fetch_assoc($result);
    return $user;
  };

  $model['user'] = $user;
};

$add_model($model);
unset($add_model);