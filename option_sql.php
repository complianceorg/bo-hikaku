<?php
require "./include/db.inc";
$sql="SELECT * FROM site_data WHERE del_flg_simple=0";
//is_beginneに変更があった場合
if($_POST["is_beginner"]==1){
  $sql .= " && beginner = '○'";
}
//is_free_demotradeに変更があった場合
if($_POST["is_free_demotrade"]==1){
  $sql .= " && demo = '○'";
}
//出金手数料に変更があった場合
if($_POST["drop_commi"]==1){
  $sql .= " && drop_commi_simple = '○'";
}
//口座開設に変更があった場合 全て当てはまる

//取引商品に変更があった場合
if($_POST["handing_currency_pair"]["0"]==0){
  $sql .= " &&trade_item LIKE '%通貨%'";
}
if($_POST["handing_currency_pair"]["1"]==1){
  $sql .= " &&trade_item LIKE '%金%'";
}
if($_POST["handing_currency_pair"]["2"]==2){
  $sql .= " &&trade_item LIKE '%株価指数%'";
}
if($_POST["handing_currency_pair"]["3"]==3){
  $sql .= " &&trade_item LIKE '%株式%'";
}
if($_POST["handing_currency_pair"]["4"]==4){
  $sql .= " &&trade_item LIKE '%先物%'";
}

//最低取引額に変更があった場合
switch ($_POST["trading_unit"]) {
  case '0':
  $sql.="";
    break;
  case '100':
  $sql.=" &&low_trade<=100";
    break;
  case '500':
  $sql.=" &&low_trade<=500";
    break;
  case '1000':
  $sql.=" &&low_trade<=1000";
    break;
}
//ペイアウト率に変更があった場合
switch ($_POST["spread_usdollar_per_yen"]) {
  case '1.5':
  $sql.="";
    break;
  case '2.0':
  $sql.=" &&payout_rate <> '1.6～1.8'";
    break;
}
//キャッシュバックに変更があった場合 全て選択


$stm = $pdo -> prepare($sql);
$stm->execute();
$count = $stm->rowCount();
echo $count;
?>