<?php
function connect(){
    $connect1=mysqli_connect('localhost','root','','project');
    return $connect1;
        
}
function upload(){
    $connect=connect();
    if(isset($_POST["submit"])){
        $username=$_POST["username"];
        $firstname=$_POST["firstname"];
        $lastname=$_POST["lastname"];
        $kuet_mail=$_POST["kuet_mail"];
        $roll=$_POST["roll"];
        $password=$_POST["password"];
        $username=mysqli_real_escape_string($connect,$username);
        $password=mysqli_real_escape_string($connect,$password);
        $query1="select * from users where kuetmail='$kuet_mail'";
        $result1=mysqli_query($connect,$query1);
        $query2="select * from users where username='$username'";
        $result2=mysqli_query($connect,$query2);
        if(mysqli_num_rows($result1)==0 && mysqli_num_rows($result2)==0){
            $hashformat="$2y$10$";
            $salt="iusesomecrazystrings22";
            $hash_and_salt=$hashformat.$salt;
            $password=crypt($password,$hash_and_salt);
            $query="insert into users(username,firstname,lastname,kuetmail,roll,password) values('$username','$firstname','$lastname','$kuet_mail',$roll,'$password') ";
            $connect2=mysqli_query($connect,$query);
            if($connect2){
                echo '<script>alert("User Created")</script>';
                header("location:login.php");
            }
            else{
                echo '<script>alert("Could not create user")</script>';
            }
        }
        else{
            echo '<script>alert("Email or username already in use")</script>';
        }
        
    }
}
function validate(){
    session_start();
    $connect=connect();
    if(isset($_POST["submit"])){
        $email=$_POST["email"];
        $password=$_POST["password"];
        $_SESSION['email']=$email;
        if($email==="admin@admin.com" && $password==="admin1234"){
            $_SESSION['username']="admin1234";
            $_SESSION['email']="admin@admin.com";
            echo '<script>alert("Welcome to Admin Panel")</script>';
            header("location:admin_pdf.php");
        }else if($email==="admin@admin.com" && $password!="admin1234"){
            echo '<script>alert("Wrong Password")</script>';
        }
        else{
        $query="select username,status from users where kuetmail='$email'";
        $result=mysqli_query($connect,$query);
        if(mysqli_num_rows($result)>0){
            while($row = $result->fetch_assoc()) {
                    $status=$row['status'];
                    $username=$row['username'];
              }
        }
        if($status==1){
        $password=mysqli_real_escape_string($connect,$password);
        $hashformat="$2y$10$";
        $salt="iusesomecrazystrings22";
        $hash_and_salt=$hashformat.$salt;
        $password=crypt($password,$hash_and_salt);
        $query="select * from users where kuetmail='$email' and password='$password'";
        $result=mysqli_query($connect,$query);
        if(mysqli_num_rows($result)>0){
            if(!empty($_POST["remember"])) {
                setcookie ("username",$username,time()+ 5);
                setcookie("set","1");
            }
            else{
                setcookie("set","0");
            }
            $_SESSION["username"]=$username;
            header("location:home.php");
        }
        else{
            echo '<script>alert("Wrong user details")</script>';
        }
    }
    else{
        echo '<script>alert("Account is deactivated by Admin")</script>';
    }
    }
}
}
function update(){
    $oun=$_SESSION['username'];
    $connect=connect();
    if(isset($_POST["submit"])){
        $username=$_POST["username"];
        $firstname=$_POST["firstname"];
        $lastname=$_POST["lastname"];
        $kuet_mail=$_POST["kuet_mail"];
        $roll=$_POST["roll"];
        $password=$_POST["password"];
        $query="select * from users where username='$username' and kuetmail!='$kuet_mail'";
        $result=mysqli_query($connect,$query);
        if(mysqli_num_rows($result)==1){
            echo '<script>alert("User Name already exsists")</script>';
            // header("location:edit_user_details.php");
        }else{
        $username=mysqli_real_escape_string($connect,$username);
        $password=mysqli_real_escape_string($connect,$password);
        $hashformat="$2y$10$";
        $salt="iusesomecrazystrings22";
        $hash_and_salt=$hashformat.$salt;
        $password=crypt($password,$hash_and_salt);
        $query="UPDATE `users` SET `username`='$username',`firstname`='$firstname',`lastname`='$lastname',`kuetmail`='$kuet_mail',`roll`='$roll',`password`='$password' WHERE username='$oun' ";
        $connect2=mysqli_query($connect,$query);
        $query1="UPDATE `like_post` SET `username`='$username' WHERE username='$oun'";
        $connect3=mysqli_query($connect,$query1);
        $query2="UPDATE `project_pdf` SET `uploaded_by`='$username' WHERE uploaded_by='$oun'";
        $connect4=mysqli_query($connect,$query2);
        $query3="UPDATE `comment_post` SET `username`='$username' WHERE username='$oun'";
        $connect5=mysqli_query($connect,$query3);
        if($connect2 && $connect3 && $connect4 && $connect5){
            echo '<script>alert("Updated")</script>';
            $_SESSION['username']=$username;
            header("location:user.php");
        }
        else{
            echo '<script>alert("Could not update")</script>';
        }
    }
        
    }
}
?>