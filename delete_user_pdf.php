<?php
    include 'functions.php';
    $conn=connect();
    $id = htmlspecialchars($_GET['id']);
    $query="delete from project_pdf where id='$id'";
    $result=mysqli_query($conn,$query);
    $query1="delete from like_post where post_id='$id'";
    $result2=mysqli_query($conn,$query1);
    $query2="delete from comment_post where pdf_id='$id'";
    $result3=mysqli_query($conn,$query2);
    header('Location: user_uploaded_pdf.php');;
?>