<?php
    session_start();
    include "functions.php";
    $conn=mysqli_connect('localhost','root','','project');
    $user_name=$_SESSION['username'];
    if(isset($_POST['action'])){
        $post_id=$_POST['post_id'];
        $action=$_POST['action'];
        switch ($action){
            case 'like':
                $query="insert into like_post (username, post_id) values ('$user_name','$post_id')";
                break;
            case 'unlike':
                $query="delete from like_post where username='$user_name' and post_id='$post_id'";
                break;
            default:
                break;
        }
        mysqli_query($conn,$query);
        echo getrating($post_id);
        exit(0);
    }
    function getrating($id){
        global $conn;
        $rating=array();
        $query="select * from like_post where post_id='$id'";
        $result=mysqli_query($conn,$query);
        $result=mysqli_num_rows($result);
        $rating=['likes' => $result];
        return json_encode($rating);
    }
    function userliked($post_id){
        global $conn;
        global $user_name;
        $query="select * from like_post where username='$user_name' and post_id='$post_id'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){
            return true;
        }
        else{
            return false;
        }
    }
    function getlikes($post_id){
        global $conn;
        $query="select * from like_post where post_id='$post_id'";
        $result=mysqli_query($conn,$query);
        $result=mysqli_num_rows($result);
        return $result;
    }
?>