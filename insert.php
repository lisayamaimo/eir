<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet", href="./style.css">
</head>
<body>

<?php
// フォームからデータを受け取る
$shipping_line = $_POST['shipping_line'];
$place = $_POST['place'];
$date_time = $_POST['date_time'];
$carrier = $_POST['carrier'];
$vessel = $_POST['vessel'];
$voy = $_POST['voy'];
$bkg_bl_no = $_POST['bkg_bl_no'];
$container_no = $_POST['container_no'];
$seal_no = $_POST['seal_no'];
$size = $_POST['size'];
$type = $_POST['type'];
$status = $_POST['status'];
$pod = $_POST['pod'];
$discharging_port = $_POST['discharging_port'];
$loading_port = $_POST['loading_port'];
$por = $_POST['por'];
$tare_weight = $_POST['tare_weight'];
$imo_no = $_POST['imo_no'];
$mg_set_no = $_POST['mg_set_no'];
$ref_temperature = $_POST['ref_temperature'];
$shipper_consignee = $_POST['shipper_consignee'];
$yard_location = $_POST['yard_location'];
$condition = $_POST['condition'];
$destination = $_POST['destination'];
$return_place = $_POST['return_place'];
$remarks = $_POST['remarks'];
// $image = $_FILES['IMAGE']; // うまくいかなそうなので一旦コメントアウト

// 2. データベース接続
try {
    $pdo = new PDO('mysql:dbname=gs_eir;charset=utf8;host=127.0.0.1', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

// 3. データ登録SQLの作成
$stmt = $pdo->prepare("
    INSERT INTO
        gs_eir(
            shipping_line, place, date_time, carrier, vessel, voy,
            bkg_bl_no, container_no, seal_no, :size, :type, :status,
            pod, :discharging_port, loading_port, por, tare_weight, imo_no,
            mg_set_no, ref_temperature, shipper_consignee, yard_location, condition,
            destination, return_place, remarks, 
        )
    VALUES (
        :shipping_line, :place, :date_time, :carrier, :vessel, :voy,
        :bkg_bl_no, :container_no, :seal_no, :size, :type, :status,
        :pod, :discharging_port, :loading_port, :por, :tare_weight, :imo_no,
        :mg_set_no, :ref_temperature, :shipper_consignee, :yard_location, :condition,
        :destination, :return_place, :remarks, 
    )");

// 変数をバインドする
$stmt->bindValue(':shipping_line', $shipping_line, PDO::PARAM_STR);
$stmt->bindValue(':place', $place, PDO::PARAM_STR);
$stmt->bindValue(':date_time', $date_time, PDO::PARAM_STR);
$stmt->bindValue(':carrier', $carrier, PDO::PARAM_STR);
$stmt->bindValue(':vessel', $vessel, PDO::PARAM_STR);
$stmt->bindValue(':voy', $voy, PDO::PARAM_STR);
$stmt->bindValue(':bkg_bl_no', $bkg_bl_no, PDO::PARAM_STR);
$stmt->bindValue(':container_no', $container_no, PDO::PARAM_STR);
$stmt->bindValue(':seal_no', $seal_no, PDO::PARAM_STR);
$stmt->bindValue(':size', $size, PDO::PARAM_STR);
$stmt->bindValue(':type', $type, PDO::PARAM_STR);
$stmt->bindValue(':status', $status, PDO::PARAM_STR);
$stmt->bindValue(':pod', $pod, PDO::PARAM_STR);
$stmt->bindValue(':discharging_port', $discharging_port, PDO::PARAM_STR);
$stmt->bindValue(':loading_port', $loading_port, PDO::PARAM_STR);
$stmt->bindValue(':por', $por, PDO::PARAM_STR);
$stmt->bindValue(':tare_weight', $tare_weight, PDO::PARAM_STR);
$stmt->bindValue(':imo_no', $imo_no, PDO::PARAM_STR);
$stmt->bindValue(':mg_set_no', $mg_set_no, PDO::PARAM_STR);
$stmt->bindValue(':ref_temperature', $ref_temperature, PDO::PARAM_STR);
$stmt->bindValue(':shipper_consignee', $shipper_consignee, PDO::PARAM_STR);
$stmt->bindValue(':yard_location', $yard_location, PDO::PARAM_STR);
$stmt->bindValue(':condition', $condition, PDO::PARAM_STR);
$stmt->bindValue(':destination', $destination, PDO::PARAM_STR);
$stmt->bindValue(':return_place', $return_place, PDO::PARAM_STR);
$stmt->bindValue(':remarks', $remarks, PDO::PARAM_STR);
// 画像データのバインドはファイル処理後に行う必要があるため、ここでは示していません。
// 実行前にファイルアップロード処理を行い、データベースに適した形で$image変数を準備する必要があります。
// 注意：画像フィールドについては、ファイルアップロードを処理し、データベースの`mediumblob`カラムに適した形式（例：ファイルパスやバイナリデータ）に変換する必要があります。

// 実行
$status = $stmt->execute();

// データ登録後の処理
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('ErrorMessage:' . $error[2]);
} else {
    echo '<div class="confirmation-message">
        投稿ありがとうございます！<br>
        すべての投稿を<a href="./select.php">こちら💁</a>でご覧いただけます。
        </div>';
}

?>
</body>