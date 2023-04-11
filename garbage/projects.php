<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #ls{
            text-decoration: none;
            color:#5F4B8BFF;
            font-weight: 700;
        }
        #ls:hover{
            font-size: 20px;
            color:#5F4B8BFF;
        }
        .uls{
            align-items: center;
            position: absolute;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%); 
            transition: all 0.3s ease 0s;
        }
    </style>
</head>
<body>
<?php
    try {
        $pdo=new PDO("mysql:host=localhost;dbname=project","root","");
        $sql = "SELECT id, project_name,description 
                FROM project_pdf
                ORDER BY project_name ASC;";
        $result = $pdo->query($sql);
        foreach ($result as $row) {
            $records[] = [
                'id' => $row['id'],
                'project_name' => $row['project_name'],
                'description' => $row['description']
            ];
        }
        $title = 'Display PDF File';
        ?>
        </p><div class="d-flex justify-content-center align-self-center" style="margin-top: 100px;">
            <h5 class="text-center" style="color: tan;">Current PDF Projects</h5>
        </div>
        <div class="uls">
        <!-- <div class="d-flex justify-content-center align-self-center" style="margin-top: 55px;"> -->
        <ul>
        <?php foreach ($records as $row): ?>
            <li><a href="display.php?id=<?=$row['id']?>" target="_blank" id="ls"><?=$row['project_name']?></a></li>
        <?php endforeach;?>
        </ul>
        </div>
        <?php
    } catch (PDOException $e) {
        echo 'Database Error '. $e->getMessage(). ' in '. $e->getFile().
            ': '. $e->getLine();   
    }
    
     include __DIR__."/templates/base.html.php";
        ?>
</body>
</html>