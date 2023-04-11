<?php
    include 'comment.php';
    $post_id=$_POST['post_id'];

    $sql = "SELECT * FROM comment_post where pdf_id='$post_id' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
?>

<div class="item">
    <div class="header" style="display: flex; justify-content: space-between;">
        <h3><?php echo $row['username']; ?></h3>
        <i style="font-size: 13px;"><?php echo $row['time'];?></i>
    </div>
    <br>
    <p ><?php echo $row['comment']; ?></p>
</div>

    <?php } } ?>