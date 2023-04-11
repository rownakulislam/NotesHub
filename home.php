<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/home.css">
</head>
<body>
    <?php
    session_start();
        if($_COOKIE["set"]==="1" && !isset($_COOKIE["username"])){
            header("location:login.php");
        }
        if(isset($_COOKIE["username"])){
            session_destroy();
            setcookie("username", "", time() - 3600);
            setcookie("set", "", time() - 3600);
            $_SESSION['username']=$_COOKIE["username"];
        }
        else{
            if(!isset($_SESSION["username"])){
                header("location:login.php");
            }
        }
    ?>
    <nav class="navbar">
        <img class="logo" src="./templates/Noteshub-logos_transparent.png" height="100" width="100" alt="logo">
        <ul class="nav">
            <li class="nav-item-u"><a href="home.php">Home</a></li>
            <li class="nav-item-u"><a href="upload.php">Upload</a></li>
            <li class="nav-item-u"><a href="display.php">Notes</a></li>
            <li class="nav-item-u"><a href="user.php">User</a></li>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
    <header>
        <div class="header-content">
            <h2>A place to share your notes</h2>
            <div class="line">
            </div>
            <h1>Academic made easier</h1>
        </div>
    </header>
</body>
<script>
    const hamburger = document.querySelector(".hamburger");
    const nav = document.querySelector(".nav");

    hamburger.addEventListener("click",() =>{
        hamburger.classList.toggle("active");
        nav.classList.toggle("active");
    })
</script>
</html>