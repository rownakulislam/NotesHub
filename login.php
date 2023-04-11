<?php
    include "functions.php";
    validate();
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
            margin: 0px;
            padding: 0;
            font-family: 'Courier New', Courier, monospace;
            background: linear-gradient(60deg,#05073a,rgba(30, 2, 8, 0.82));
            overflow: hidden;
            height: 100vh;
            color: whitesmoke;
        }
        .form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);   
        }
        .form h1{
            text-align: center;
            padding: 0px 0px 20px 0px;
            border-bottom: 1px solid white;
        }
        .form form{
            align-items: center;
            /* padding: 0px 40px; */
            box-sizing: border-box;
        }
        form .text1{
            position: relative;
            border-bottom:2px solid white ;
            margin: 30px 0px;
        }
        .form input{
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 15px;
            border: none;
            background: none;
            outline:none;
            color: whitesmoke;
        }
    
        input[type="submit"]{
            width: 100%;
            height: 50px;
            border: 1px solid black;
            border-radius: 10px;
            background: #c4e0e5;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            outline: none;
            color: black;
        }
        input[type="checkbox"]{
            height: 20px;
            width: 20px;
            margin-bottom: 30px;
        }
        input[type="submit"]:hover{
            border-radius: 30px;
            border-color:white ;
            background: white;
            color: black;
        }
        form .signup{
            padding: 10px;
            text-align: center;

        }
        .remember{
            height: 5px;
            width: 5px;
        }
        .form .text1 label{
            font-size: 20px;
        }
        form .signup a{
            text-decoration: none;
        }
        form .signup a:hover{
            color: aliceblue;
            text-decoration: none;
            font-size: 20;
        }
    </style>
</head>
<body>
        <div class="form">
            <h1>
                Login
            </h1>
            <form action="#" method="post">
                <div class="text1">
                    <label for="email">Mail</label>
                    <input type="email" required name="email" placeholder="user18070**@stud.kuet.ac.bd">
            
                </div>
                <div class="text1">
                    <label for="password">Password</label>
                    <input type="password" required name="password">
                </div>
                <i><input type="checkbox" name="remember" class="remember"> Remember me</i>
                <br>
                <div class="bu">
                    <input type="submit" name="submit" value="Login">
                </div>
                <div class="signup">
                    Not a member? <a href="/web_project/signup.php">Sign Up</a>
                </div>
            </form>
        </div>
</body>
</html>