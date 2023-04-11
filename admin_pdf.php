<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./templates/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./style/display.css" class="style">
</head>
<body>
    <?php
        include './templates/admin_nav.php';
        session_start();
        try {
            $conn=mysqli_connect('localhost','root','','project');
        $sql = "SELECT id, project_name,description,uploaded_by 
                FROM project_pdf
                 ORDER BY id;";
        $result=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($result);
        if($count>0){
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
            <a href="admin_delete_pdf.php?id=<?=$row['id']?>" target="_blank" id="ls"><img src="./pics/ban-solid.svg" alt="" id="download" height="20px" width="20px" onmouseover="this.style.transform='scale(1.3)'"
                onmouseout="this.style.transform='scale(1)'"></a>
                <a href="display_pdf.php?id=<?=$row['id']?>" target="_blank" id="ls"><img src="./pics/download.png" alt="" id="download" height="27px" width="27px" onmouseover="this.style.transform='scale(1.3)'"
                onmouseout="this.style.transform='scale(1)'"></a>
                <a href="./admin_pdf_details.php?id=<?=$row['id']?>" class="nextpage"><img src="./pics/eye.png" alt="" class="view" height="24px" width="24px" onmouseover="this.style.transform='scale(1.3)'"
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
            
        }?>
        <?php
            } catch (PDOException $e) {
            echo 'Database Error '. $e->getMessage(). ' in '. $e->getFile().
            ': '. $e->getLine();   
            }
        ?>
    </div>
</body>
</html>