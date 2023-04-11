<?php
    include 'comment.php';
    $post_id=$_POST['post_id'];
    $name = $_POST['name'];
    $msg = $_POST['msg'];
    
    $sql = "INSERT INTO comment_post (pdf_id, username, comment) VALUES ('$post_id','$name', '$msg')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo 1;
    }else {
        echo 0;
    }
?>