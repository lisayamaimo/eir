<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EIR登録</title>
    <link rel="stylesheet", href="./style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="./select.php">管理者用一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Main[Start] -->
    <form method="post" action="./insert.php">
        <div class="fillinfield">
            <fieldset>
                <legend>Equipment Interchange Receipt</legend>
                <label>SHIPPING LINE：<input type="text" name="shipping_line"></label><br>
                <label>PLACE：<input type="text" name="place"></label><br>
                <label>DATE&TIME：<input type="text" name="date_time"></label><br>
                <label>CARRIER：<input type="text" name="carrier"></label><br>
                <label>VESSEL：<input type="text" name="vessel"></label><br>
                <label>VOY：<input type="text" name="voy"></label><br>
                <label>BKG NO. /BL NO.：<input type="text" name="bkg_bl_no"></label><br>
                <label>CONTAINER NO.：<input type="text" name="container_no"></label><br>
                <label>SEAL NO.：<input type="text" name="seal_no"></label><br>
                <label>SIZE：<input type="text" name="size"></label><br>
                <label>TYPE：<input type="text" name="type"></label><br>
                <label>STATUS：<input type="text" name="status"></label><br>
                <label>POD：<input type="text" name="pod"></label><br>
                <label>DISCHARGING PORT：<input type="text" name="discharging_port"></label><br>
                <label>LOADING PORT：<input type="text" name="loading_port"></label><br>
                <label>POR：<input type="text" name="por"></label><br>
                <label>TARE WEIGHT：<input type="text" name="tare_weight"></label><br>
                <label>IMO NO.：<input type="text" name="imo_no"></label><br>
                <label>MG SET NO.：<input type="text" name="mg_set_no"></label><br>
                <label>REF TEMPERATURE：<input type="text" name="ref_temperature"></label><br>
                <label>SHIPPER/CONSIGNEE：<input type="text" name="shipper_consignee"></label><br>
                <label>YARD LOCATION：<input type="text" name="yard_location"></label><br>
                <label>CONDITION：<input type="text" name="condition"></label><br>
                <label>DESTINATION：<input type="text" name="destination"></label><br>
                <label>RETURN PLACE：<input type="text" name="return_place"></label><br>
                <label>REMARKS：<textArea name="remarks" rows="4" cols="40"></textArea></label><br>
<!-- <label>IMAGE：<input type="file" name="image" accept="image/*"></label><br> -->　
<!-- うまくいかなそうなので一旦コメントアウト -->

                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
