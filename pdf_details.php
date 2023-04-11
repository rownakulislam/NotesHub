<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./templates/navbar.css">
    <link rel="stylesheet" href="./style/pdf_details.css">
</head>
<body>
<?php
        session_start();
        include 'templates/navbar.php';
        $id = htmlspecialchars($_GET['id']);
        $username=$_SESSION['username'];
    ?>
    <div class="body2">
        <div class="wrapper">
            <div class="details">
                <br>
                <?php
                    include 'functions.php';
                    $conn=connect();
                    $query="select * from project_pdf where id='$id'";
                    $result=mysqli_query($conn,$query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <h3><?php echo $row['project_name'];?></h3>
                <br>
                <span>    -uploaded by <b><?php echo $row['uploaded_by'];?></b></span>
                <br>
                <br>
                          -uploaded on <b><?php echo $row['time'];?></b>
                <br>
                <br>
                <p><b><?php echo $row['description'];?></b></p>
                <?php } } ?>
                <a href="display_pdf.php?id=<?=$id?>"><button class="download">Download</button></a>
            </div>
            <form id="form" action="./pdf_details.php?id=<?=$row['id']?>">
                <div class="inputbox">
                    <br>
                    <label for="msg"><h3>Remarks:</h3></label>
                    <br>
                    <textarea type="text" id="msg" placeholder="Enter the Remarks:" required></textarea>
                </div>
                <button id="btn">Post</button>
            </form>
            <br>
            <div class="content" id="content">
            
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            function loadData(){
                var post_id=<?php echo $id;?>;

                $.ajax({
                    url: 'comment-select-data.php',
                    type: 'POST',
                    data: {post_id: post_id},
                    success: function(data){
                        $("#content").html(data);
                    }
                });
            }

            loadData();
            // if(!$("#msg").val()==''){
            $("#btn").on("click",function(e){
                e.preventDefault();
                var post_id=<?php echo $id;?>;
                var name="<?php echo $username;?>";
                var msg = $("#msg").val();
                $.ajax({
                    url: 'comment-insert-data.php',
                    type: 'POST',
                    data: {post_id: post_id,name: name,msg: msg},
                    success: function(data){
                        if (data == 1) {
                            loadData();
                            $("#form").trigger("reset");
                        }else {
                            alert("Comment Can't Submit.");
                        }
                    }
                });
            
            });
        // }
        });
    </script>
</body>
</html>
