<?php
$add_user_model = function(&$model) use ($conn) {
  $user = array();

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

  $user['get_by'] = function($options) use ($conn){
    $condition = array();
    foreach ($options as $key => $value) {
      $condition[] =  " $key $value ";
    }
    $condition = implode(' AND ', $condition);

    $where = $condition ? 'WHERE '.$condition : '';
    $result = mysqli_query($conn, "
    SELECT * FROM users {$where}");
    return mysqli_num_rows($result) ? $result : False;

  };
  $model['user'] = $user;
};

$add_user_model($model);