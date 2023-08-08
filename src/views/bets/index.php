<?php require APPROOT . '/views/inc/header.php';?>
    <h1 class="display-3"><?php echo $data['title'] ?></h1>
    <?php
    foreach ($data['matches'] as $row) {
        echo
        '<div class="row g-3">
            <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="' . $row->team1_name . ' - ' . $row->team2_name .'" aria-label="City">
            </div>
            <div class="col-sm">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="X">
                    <label class="form-check-label" for="inlineRadio2">X</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="2">
                    <label class="form-check-label" for="inlineRadio3">2</label>
                </div>
            </div>
      </div>';
    }//end foreach
    ?>
<?php require APPROOT . '/views/inc/footer.php';
