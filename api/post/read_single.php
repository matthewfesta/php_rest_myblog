<?php

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Post.php';

    // Instantiate DB object and connect
    $database = new Database();
    $db_connect = $database->connect();

    // Instantiate blog post object
    $post = new Post($db_connect);

    // Get ID
    $post->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Call read single - get post
    $post->read_single();

    // Create Array - Single post JSON object
    $post_arr = array(
        'id' => $post->id,
        'title' => $post->title,
        'body' => $post->body,
        'author' => $post->author,
        'category_id' => $post->category_id,
        'category_name' => $post->category_name
    );

    // Convert to JSON
    print_r(json_encode($post_arr));

?>