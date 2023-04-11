<?php
    include 'templates/navbar.php';
    include 'functions.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./templates/navbar.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            padding: 0;
            font-family: 'Courier New', Courier, monospace;
            background: linear-gradient(120deg,#ffafbd ,#ffc3a0);
            height: 100vh;
            overflow: auto;
            color: black;
            
            background-repeat: repeat;
            background-attachment:scroll;
        }
        .form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%); 
        }
        .form h1{
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid whitesmoke;
        }
        .form form{
            align-items: center;
            /* padding: 0px 40px; */
            box-sizing: border-box;
        }
        form .text{
            position: relative;
            border-bottom:2px solid whitesmoke ;
            margin: 20px 0px;
        }
        .form input{
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 15px;
            border: none;
            background: none;
            outline:none;
            color: black;
        }
        input[type="submit"]{
            width: 100%;
            height: 50px;
            border: 1px solid black;
            border-radius: 10px;
            background: #000000;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            outline: none;
            color: white;
        }
        input[type="submit"]:hover{
            transition: all 1s ease 0s;
            border-radius: 30px;
            background: #19547b;
            color:black;
            border-color: tan;
        }
        .form .text label{
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="form">
        <h1>Upload pdf</h1>
        <form action="./submit.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="text">
            <label for="project_name">Note</label>
            <input type="text" name="project_name"/>
            </div>
            <div class="text">
            <label for="pdf_file">Choose File:</label>
            <input type="file" name="pdf_file" accept=".pdf"/>
            <input type="hidden" name="MAX_FILE_SIZE" value="67108864"/>
            </div>
            <div class="text">
            <label for="description">Description</label>
            <input type="text" name="description" id=""/>
            </div>
            <input type="submit" name="submit"/>
        </form>
    </div>
</body>
</html>