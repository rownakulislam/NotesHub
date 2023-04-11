</p><div class="d-flex justify-content-center align-self-center" style="margin-top: 100px;">
    <h5 class="text-center">Current PDF Projects</h5>
</div>
<div class="d-flex justify-content-center align-self-center" style="margin-top: 55px;">
    <ul>
        <?php foreach ($records as $row): print_r($row)?>
            <li><a href="display.php?id=<?php $row['id']?>" target="_blank"><?php $row['project_name']?></a></li>
        <?php endforeach;?>
    </ul>
</div>