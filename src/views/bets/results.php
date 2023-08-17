<?php require APPROOT . '/views/inc/header.php';?>
    <h1 class="display-3"><?=$data['title']?></h1>
    <div class="row g-3">
        <div class="col-sm"><h3>Match</h3></div>
        <div class="col-sm"><h3>Date</h3></div>
        <div class="col-sm"><h3>Bet</h3></div>
        <div class="col-sm"><h3>Result</h3></div>
        <div class="col-sm"><h3>Points</h3></div>
    </div>
    <?php
    foreach ($data['matches'] as $row) {
        ?>
        <div class="row g-3">
            <div class="col-sm">
                <?=$row->team1_name?> - <?=$row->team2_name?>
            </div>
            <div class="col-sm">
                <?=$row->match_date?>
            </div>
            <div class="col-sm">
                <?=$row->bet?>
            </div>
            <div class="col-sm">
                <?=$row->result?>
            </div>
            <div class="col-sm">
                <?=$row->points?>
            </div>
        </div>
        <?php
    }//end foreach
    ?>
<?php require APPROOT . '/views/inc/footer.php';
