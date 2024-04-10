<?php

$pt = $_POST['bank_code'];

switch ($pt) {
    case 'qr':
        include_once ('momo_pay/qr_momo.php');
        break;
    case 'atm':
        include_once ('momo_pay/atm_momo.php');
        break;
    case 'quick':
        include_once ('momo_pay/quick_momo.php');
        break;
}


?>