<?php
$add_model = function(&$model) use ($conn) {
  global $s;

  mysqli_query($conn,
    "CREATE TABLE IF NOT EXISTS posts(
      id INT PRIMARY KEY AUTO_INCREMENT,
      title VARCHAR(20),
      content TEXT
    )"
  );

  $post = array();

  $post['create'] = function($post) use ($conn, $s){
    $title = $post['title'];
    $content = strip_tags($post['content'], '<a>');
    mysqli_query($conn,
      "INSERT INTO posts(title, content)
       VALUES('{$title}', '{$content}')");
    $new_id = mysqli_insert_id($conn);
    mysqli_query($conn,
      "INSERT INTO com(from_id, from_type, to_id, to_type)
       VALUES({$s['user']['id']}, 'user', {$new_id}, 'post')");
    add_flash('success', "Post created");
  };

  $post['all'] = function($where='WHERE com.rel_type="have"') use ($conn, $s){
    $result = mysqli_query($conn,
      "SELECT * FROM posts JOIN com JOIN users
      ON posts.id = com.to_id AND users.id = com.from_id {$where}
      ORDER BY posts.id DESC");
    // $posts = array();
    while ($posts[] = mysqli_fetch_assoc($result));
    array_pop($posts);
    return $posts;
  };

  $post['my_stream'] = function() use ($conn, $s, $post){
    return $post['all']("WHERE users.id = {$s['user']['id']} AND com.rel_type='have' ");
  };

  $post['by_user'] = function($id) use ($conn, $s, $post){
    return $post['all']("WHERE users.id = {$id} AND com.rel_type='have' ");
  };

  $post['by_id'] = function($id) use ($conn, $s, $post){
    return $post['all']("WHERE posts.id = {$id} AND com.rel_type='have' ");
  };


  $model['post'] = $post;
};

$add_model($model);
unset($add_model);