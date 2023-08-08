<?php require APPROOT . '/views/inc/header.php';?>
    <h1 class="display-3"><?php echo $data['title'] ?></h1>
    <?php
    echo
    '<div class="row g-3">
        <div class="col-sm">
            <h3>Match</h3>
        </div>
        <div class="col-sm">
            <h3>Date</h3>
        </div>
        <div class="col-sm">
            <h3>Result</h3>
        </div>
    </div>';
    foreach ($data['matches'] as $row) {
        echo
        '<div class="row g-3">
            <div class="col-sm">
            ' . $row->team1_name . ' - ' . $row->team2_name .'
            </div>
            <div class="col-sm">
            ' . $row->match_date .'
            </div>
            <div class="col-sm">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions' . $row->id . '" id="radio1_' . $row->id .'" value="1">
                    <label class="form-check-label" for="radio1_' . $row->id .'">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions' . $row->id . '" id="radioX_' . $row->id .'" value="X">
                    <label class="form-check-label" for="radioX_' . $row->id .'">X</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions' . $row->id . '" id="radio2_' . $row->id .'" value="2">
                    <label class="form-check-label" for="radio2_' . $row->id .'">2</label>
                </div>
            </div>
      </div>';
    }//end foreach
    ?>
<?php require APPROOT . '/views/inc/footer.php';
