<style>
    .body {
        /* padding-top: 200px; */
        width: 100vw;
        height: auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .qr {
        box-shadow: 0px 0px 20px #888888;
        font-size: 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 300px;
        height: auto;
        padding: 20px;
    }

    img {
        width: 200px;
        height: 150px;
    }
</style>
<?php
$tong = 0;
foreach ($ltSp as $cart) {
    $tong += $cart['ThanhTien'];
}
?>
<div class="body">
    <div class="qr">
        <div>
            <?php echo $bank['NameUserBank']; ?>
        </div>
        <br>
        <div>
            <?php echo $bank['NameBank']; ?>
        </div>
        <br>
        <div><img src="./views/images/<?php echo $bank['ImgBank']; ?>" alt=""></div>
        <br>
        <div>
            <?php echo $tong; ?>
        </div>
    </div>
</div>