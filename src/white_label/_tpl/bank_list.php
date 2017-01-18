<link rel="stylesheet" type="text/css" href="white_label/_css/bank_list.css"/>
<div id="white-label-info">
    <?php foreach ($data as $bank) { ?>
        <div class="bank-block">
            <img src="https://secure.transferuj.pl/_/banks/b<?php echo $bank['bank_id'] ?>.png" alt=""/>

            <div class="fullname"><?php echo $bank['fullname'] ?></div>
            <div class="account_number"><?php echo $bank['account_number'] ?></div>
            <div class="availability">
                <?php foreach ($bank['availability'] as $date => $availability) { ?>
                    <?php foreach ($availability as $time) { ?>
                        <div><?php echo $date . ' : ' . $time ?></div>
                    <?php } ?>
                <?php } ?>
            </div>
            <a href="<?php echo $bank['login_url'] ?>" target="_blank"><?php Transferuj\Lang::l('go_to_bank') ?></a>
        </div>
    <?php } ?>
</div>