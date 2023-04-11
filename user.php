<?php 
    include 'templates/side_nav.php';
    include 'functions.php';
    session_start();
    if($_COOKIE["set"]==="1" && !isset($_COOKIE["username"])){
        session_destroy();
        setcookie("username", "", time() - 3600);
        setcookie("set", "", time() - 3600);
        header("location:login.php");
    }
    if(isset($_COOKIE["username"])){
        $_SESSION['username']=$_COOKIE["username"];
    }
    else{
        if(!isset($_SESSION["username"])){
            header("location:login.php");
        }
    }
    $username=$_SESSION['username'];
    $conn=connect();
    $query="select * from users where username='$username'";
    $result=mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./templates/navbar.css">
    <link rel="stylesheet" href="./templates/side_nav.css">
    <link rel="stylesheet" href="./style/pdf_details.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #btn {
    font-family: 'Courier New', Courier, monospace;
    font-weight: bold;
    background: rgb(234, 177, 167);
    border: 1px solid tan;
    border-radius: 10px;
    padding: 10px 5px;
    width: 110px;
    font-size: 15px;
    color: black;
    cursor: pointer;
    outline: none;
    margin: 0 auto;
    display: block;
    margin-bottom: 10px;
    transition: 0.3s all ease;
}

#btn:hover {
    background: tan;
    color: white;
    transition: 0.3s all ease;
}
    </style>
</head>
<body>
<div class="body2" style="margin-top: 80px;">
        <div class="wrapper">
            
            <div class="content" id="content">
            <?php 
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
            <div class="item">
                <div class="header">
                    <h3>Username:</h3>
                </div>
                <br>
                <p ><?php echo $row['username']; ?></p>
            </div>
            <div class="item">
                <div class="header">
                    <h3>First Name:</h3>
                </div>
                <br>
                <p ><?php echo $row['firstname']; ?></p>
            </div>
            <div class="item">
                <div class="header">
                    <h3>Last Name:</h3>
                </div>
                <br>
                <p ><?php echo $row['lastname']; ?></p>
            </div>
            <div class="item">
                <div class="header">
                    <h3>Mail:</h3>
                </div>
                <br>
                <p ><?php echo $row['kuetmail']; ?></p>
            </div>
            <div class="item">
                <div class="header">
                    <h3>Roll:</h3>
                </div>
                <br>
                <p ><?php echo $row['roll']; ?></p>
            </div>
            <a href="edit_user_details.php"><button id="btn">Edit Details</button></a>
    <?php } } ?>
            </div>
        </div>
    </div>
</body>
</html>