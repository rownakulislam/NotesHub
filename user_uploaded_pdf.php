<?php 
    include 'templates/side_nav.php';
    include "like_functions.php"; 
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./style/display.css" class="style">
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
    $id=$_SESSION['username'];
    try {
        $conn=mysqli_connect('localhost','root','','project');
        $sql = "SELECT id, project_name,description 
                FROM project_pdf where uploaded_by='$id'
                 ORDER BY id;";
        $result=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($result);
        if($count>0){
        foreach ($result as $row) {
            $records[] = [
                'id' => $row['id'],
                'project_name' => $row['project_name'],
                'description' => $row['description']
            ];
        }
    ?>
    <div class="cards" style="margin-left: 200px; margin-top:100px">
        <?php foreach ($records as $row): ?>
        <div class="card">
            <!-- <a href="./pdf_details.php" class="nextpage"></a> -->
            <div class="title">
                <h4><?=$row['project_name']?><br>-<?=$id;?></h4>
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
                <a href="delete_user_pdf.php?id=<?=$row['id']?>" target="_blank" id="ls"><img src="./pics/ban-solid.svg" alt="" id="download" height="20px" width="20px" onmouseover="this.style.transform='scale(1.3)'"
                onmouseout="this.style.transform='scale(1)'"></a>
                <a href="./pdf_details.php?id=<?=$row['id']?>" class="nextpage"><img src="./pics/eye.png" alt="" class="view" height="24px" width="24px" onmouseover="this.style.transform='scale(1.3)'"
                onmouseout="this.style.transform='scale(1)'"></a>
            </div>
        </div>
        <?php endforeach;}
         else{
            ?>
            <div class="no_pdf" style="text-align:center;justify-content: center;padding-top:250px;
align-items: center;border-radius:20px;font-size:30px;top:100px;left:100px;position:absolute;bottom:0;right:0;font-family: 'Courier New', Courier, monospace;font-weight:800">
            <?php
            echo "You have no pdf uploaded";
            
        }
         ?>
         </div>
        <?php
            } catch (PDOException $e) {
            echo 'Database Error '. $e->getMessage(). ' in '. $e->getFile().
            ': '. $e->getLine();   
            }
        ?>
    </div>
</body>
</html>