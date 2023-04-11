<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./templates/navbar.css">
    <link rel="stylesheet" href="./style/admin_users.scss">
</head>
<body>
    <?php
        include './templates/admin_nav.php';
        session_start();
    ?>
    <div class="tab">
    <table>
        <thead>
            <tr>
                <th style="font-size: 18px;">Username</th>
                <th style="font-size: 18px;">Firstname</th>
                <th style="font-size: 18px;">Lastname</th>
                <th style="font-size: 18px;">Kuetmail</th>
                <th style="font-size: 18px;">Roll</th>
                <th style="font-size: 18px;">Active_Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include 'functions.php';
            $conn=connect();
            $sql = "SELECT username, firstname,lastname,kuetmail,roll,status
                FROM users;";
            $result=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($result);
            if($count>0){
            foreach ($result as $row) {
            $records[] = [
                'username' => $row['username'],
                'firstname' => $row['firstname'],
                'lastname' => $row['lastname'],
                'kuetmail' => $row['kuetmail'],
                'roll' => $row['roll'],
                'status' => $row['status']
                    ];
            }
            foreach ($records as $row):
        ?>
            <tr>
                <td><?=$row['username']?></td>
                <td><?=$row['firstname']?></td>
                <td><?=$row['lastname']?></td>
                <td><?=$row['kuetmail']?></td>
                <td><?=$row['roll']?></td>
                <td>
                    <a href="admin_users_active_inactive.php?username=<?=$row['username']?>&status=<?=$row['status']?>">
                  <?php if($row['status']==='1'){?>
                  <div class="status-active" style="background: #ffcdd2; border-radius:10px; padding:10px 10px;">
                  <?php echo "Deactive";}?></div>
                  <?php if($row['status']==='0'){?>
                  <div class="status-active" style="background: #c8e6c9; border-radius:10px; padding:10px 10px;">
                  <?php echo "Active";}?></div>
                </td>
            </tr>
            <?php endforeach;}
         else{
            ?>
            <div class="no_pdf" style="text-align:center;justify-content: center;padding-top:250px;
align-items: center;border-radius:20px;font-size:30px;top:100px;left:100px;position:absolute;bottom:0;right:0;font-family: 'Courier New', Courier, monospace;font-weight:800">
            <?php
            echo "You have no pdf uploaded";
            
        }?>
        </tbody>
    </table>
    </div>
</body>
</html>