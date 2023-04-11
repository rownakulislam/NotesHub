<head>
    <link rel="stylesheet" href="./navbar.css">
</head>
<header>
    <div class="navbar">
        <img class="logo" src="./templates/Noteshub-logos_transparent.png" height="100" width="100" alt="logo">
        <nav>
            <ul class="nav">
                <li class="nav-item-u"><a href="home.php">Home</a></li>
                <li class="nav-item-u"><a href="upload.php">Upload</a></li>
                <li class="nav-item-u"><a href="display.php">Notes</a></li>
                <li class="nav-item-u"><a href="user.php">User</a></li>
            </ul>
        </nav>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
</header>
<script>
    const hamburger = document.querySelector(".hamburger");
    const nav = document.querySelector(".nav");

    hamburger.addEventListener("click",() =>{
        hamburger.classList.toggle("active");
        nav.classList.toggle("active");
    })
</script>