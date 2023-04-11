<?php
    include 'functions.php';
    $conn=connect();
    $username=$_GET['username'];
    $status=$_GET['status'];
    if($status==1){
        $query="update users set status='0' where username='$username'";
        $result=mysqli_query($conn,$query);
        if($result){
        echo '<script>alert("User Deactivated")</script>';
        }
    }
    else{
        $query="update users set status='1' where username='$username'";
        $result=mysqli_query($conn,$query);
        if($result){
        echo '<script>alert("User Activated")</script>';
        }
    }
    header("location:admin_users.php");
?>