<?php require APPROOT . '/views/inc/header.php';?>
    <h1 class="display-3"><?=$data['title']?></h1>
    <div class="row g-3">
        <div class="col-sm"><h3>Match</h3></div>
        <div class="col-sm"><h3>Date</h3></div>
        <div class="col-sm"><h3>Bet</h3></div>
    </div>
    <form action="<?php echo URLROOT; ?>/bets/index" method="post">
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
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="<?=$row->id?>" id="radio_1_<?=$row->id?>" value="1">
                    <label class="form-check-label" for="radio_1_<?=$row->id?>">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="<?=$row->id?>" id="radio_X_<?=$row->id?>" value="X">
                    <label class="form-check-label" for="radio_X_<?=$row->id?>">X</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="<?=$row->id?>" id="radio_2_<?=$row->id?>" value="2">
                    <label class="form-check-label" for="radio_2_<?=$row->id?>">2</label>
                </div>
            </div>
        </div>
        <?php
    }//end foreach
    ?>
    <?php echo (!empty($data['err'])) ?  '<div class="alert alert-warning" role="alert">' . $data['err'] . '</div>' : '';?>
        <div class="row g-3">
            <div class="col-sm"></div>
            <div class="col-sm"></div>
            <div class="col-sm">
                <input type="submit" value="Submit" class="btn btn-success w-50">
            </div>
        </div>
    </form>
<?php require APPROOT . '/views/inc/footer.php';
