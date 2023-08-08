<?php require APPROOT . '/views/inc/header.php';?>
    <h1 class="display-3"><?php echo $data['title'] ?></h1>
    <?php
    foreach ($data['matches'] as $row) {
        prePrint($row);
    }
    ?>
<?php require APPROOT . '/views/inc/footer.php';
