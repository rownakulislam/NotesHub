<?php
    include "functions.php";
    upload();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: 'Courier New', Courier, monospace;
            background: linear-gradient(120deg,#ffafbd ,#ffc3a0);
            height: 100vh;
            overflow: auto;
            color: black;
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
        <h1>SignUp</h1>
        <form action="#" method="post">
            <div class="text">
                <label for="username">User Name</label>
                <input type="text" required name="username" placeholder="rownak1807044">
            </div>
            <div class="text">
                <label for="firstname">First Name</label>
                <input type="text" required name="firstname" placeholder="rownak">
            </div>
            <div class="text">
                <label for="lastname">Last Name</label>
                <input type="text" required name="lastname" placeholder="islam">
            </div>
            <div class="text">
                <label for="Kuet_mail">Mail</label>
                <input type="email" required name="kuet_mail" placeholder="rownak-ul-islam1807044@stud.kuet.ac.bd">
            </div>
            <div class="text">
                <label for="roll">Roll</label>
                <input type="input" required name="roll" placeholder="1807044">
            </div>
            <div class="text">
                <label for="password">Set Password</label>
                <input type="password" required name="password" placeholder="Rasnka12312">
            </div>
            <div class="bu">
                <input type="submit" name="submit" value="Create account">
            </div>
        </form>
    </div>
</body>
</html>