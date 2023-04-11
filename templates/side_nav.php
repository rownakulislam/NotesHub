<?php 
    include 'navbar.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="side_nav.css">
    
</head>
<body>
    <nav class="nav1">
        <ul>
            <li>
                <a href="user.php">
                    <img src="./pics/user-solid.svg" alt="" height="20px" width="20px" class="icon">
                    <span class="nav-item">User</span>
                </a>
            </li>
            <li>
                <a href="user_uploaded_pdf.php">
                    <img src="./pics/file-arrow-up-solid.svg" alt="" height="20px" width="20px" class="icon">
                    <span class="nav-item">Uploads</span>
                </a>
            </li>
            <li>
                <a href="logout.php" class="logout">
                    <img src="./pics/right-from-bracket-solid.svg" alt="" height="20px" width="20px" class="icon">
                    <span class="nav-item">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</body>
</html>