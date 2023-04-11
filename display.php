<?php 
    include "like_functions.php"; 
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./style/display.css" class="style">
    <link rel="stylesheet" href="./templates/navbar.css">
    <script>
        $(document).ready(function(){
            $('.like-btn').on('click',function(){
                var post_id=$(this).data('id');
                $clicked_btn=$(this);

                if($clicked_btn.hasClass('fa-thumbs-o-up')){
                    action='like';
                    // alert(action);
                }
                else if($clicked_btn.hasClass('fa-thumbs-up')){
                    action='unlike';
                    // alert(action);
                }
                $.ajax({
                    url: 'display.php',
                    type: 'post',
                    data: {
                        'action': action,
                        'post_id': post_id
                    },
                    success: function(data){
                        res=JSON.parse(data);
                        if(action=="like"){
                            $clicked_btn.removeClass('fa-thumbs-o-up');
                            $clicked_btn.addClass('fa-thumbs-up');
                        }
                        else if(action=="unlike"){
                            $clicked_btn.removeClass('fa-thumbs-up');
                            $clicked_btn.addClass('fa-thumbs-o-up');
                        }
                        $clicked_btn.text(res.likes);
                    }
                })

            });
        });
    </script>
</head>
<body>
    <?php
    include 'templates/navbar.php';
    try {
        $pdo=new PDO("mysql:host=localhost;dbname=project","root","");
        $sql = "SELECT id, project_name,description,uploaded_by 
                FROM project_pdf
                ORDER BY project_name ASC;";
        $result = $pdo->query($sql);
        foreach ($result as $row) {
            $records[] = [
                'id' => $row['id'],
                'project_name' => $row['project_name'],
                'description' => $row['description'],
                'uploaded_by' => $row['uploaded_by']
            ];
        }
    ?>
    <div class="cards">
        <?php foreach ($records as $row): ?>
        <div class="card">
            <!-- <a href="./pdf_details.php" class="nextpage"></a> -->
            <div class="title">
                <h4><?=$row['project_name']?><br>-<?=$row['uploaded_by']?></h4>
            </div>
            <div class="card__content">
                <p>
                <?=$row['description']?>
                </p>
            </div>
            <div class="card__info">
                <!-- <img src="./pics/like.png" alt=""  height="24px" width="24px" onmouseover="this.style.transform='scale(1.3)'"
                onmouseout="this.style.transform='scale(1)'"> -->
                <i <?php echo $row['id']; if(userliked($row['id'])): ?>
                    class="fa fa-thumbs-up like-btn" onmouseover="this.style.transform='scale(1.3)'"
                onmouseout="this.style.transform='scale(1)'"
                    <?php else:?>
                        class="fa fa-thumbs-o-up like-btn" onmouseover="this.style.transform='scale(1.3)'"
                onmouseout="this.style.transform='scale(1)'"
                    <?php endif ?>
                    data-id="<?php echo $row['id']?>">
                    <span class="likes"><?php echo getlikes($row['id']);?></span>
                </i>
                <a href="display_pdf.php?id=<?=$row['id']?>" target="_blank" id="ls"><img src="./pics/download.png" alt="" id="download" height="27px" width="27px" onmouseover="this.style.transform='scale(1.3)'"
                onmouseout="this.style.transform='scale(1)'"></a>
                <a href="./pdf_details.php?id=<?=$row['id']?>" class="nextpage"><img src="./pics/eye.png" alt="" class="view" height="24px" width="24px" onmouseover="this.style.transform='scale(1.3)'"
                onmouseout="this.style.transform='scale(1)'"></a>
            </div>
        </div>
        <?php endforeach;?>
        <?php
            } catch (PDOException $e) {
            echo 'Database Error '. $e->getMessage(). ' in '. $e->getFile().
            ': '. $e->getLine();   
            }
        ?>
    </div>
</body>
</html>