<?php require APPROOT . '/views/inc/header.php';?>
    <h1 class="display-3">Admin view for <?php echo $data['group_name']->name ?></h1>
    <div class="row g-3">
        <div class="col-sm"><h3>Id</h3></div>
        <div class="col-sm"><h3>Name</h3></div>
        <div class="col-sm"><h3>Total Points</h3></div>
    </div>
    <?php
    foreach ($data['group_members'] as $row) {
        ?>
    <div class="row g-3">
        <div class="col-sm">
            <?=$row->user_id?>
        </div>
        <div class="col-sm">
            <?=$row->user_name?>
        </div>
        <div class="col-sm">
            <?=$row->total_points?>
        </div>
    </div>
        <?php
    }//end foreach
    ?>

<?php require APPROOT . '/views/inc/footer.php';