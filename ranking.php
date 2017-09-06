<?php
require_once "./include/function.php";
require_once "./include/header.php";
require_once "./include/db.inc";
$sql="SELECT * FROM site_data WHERE del_flg_simple=0 ORDER BY ranking_sortpoint DESC";

$stm = $pdo -> prepare($sql);
$stm->execute();
?>
<div class="main">
<img src="img/botop1.jpg" alt="バイナリーオプションナビ">
</div>
<div class="wrapper clearfix">
<section class="gyousya-box">
<h2><i class="fa fa-trophy fa-fw" aria-hidden="true"></i>BOランキング</h2>
<?php
$result=$stm->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $key=>$value) {
  $key=$key+1;
  $site_name=$value['site_name'];
  $payout_rate=$value['payout_rate'];
  $drop_commi=$value['drop_commi'];
  $demo=$value['demo'];
  $low_trade=$value['low_trade'];
  $campaign=$value['campaign'];
  $img_name=$value['img_name'];
  $catch_copy=$value['catch_copy'];
  $drop_speed=$value['drop_speed'];
  $site_url = $value['site_url'];
echo <<<EOT
 <div class="gyousya" id="{$img_name}">
  <h3>{$key}位  {$site_name}</h3>
  <div class="clear clearfix">
  <img class="g-image" src="img/{$img_name}01.jpg" alt="{$site_name}" >
  <table>
    <tr>
      <th>ペイアウト率</th>
      <td>{$payout_rate}倍</td>
    </tr>
      <th>口座開設</th>
      <td>{$drop_commi}</td>
    </tr>
      <th>無料デモ</th>
      <td>{$demo}</td>
    </tr>
      <th>最低取引金額</th>
      <td>{$low_trade}円</td>
    </tr>
      <th>出金スピード</th>
      <td>{$drop_speed}</td>
    </tr>
      <th>キャンペーン</th>
      <td>{$campaign}</td>
    </tr>
  </table>
  </div>
    <ul>{$catch_copy}</ul>
  <p><a href="{$site_url}" rel="nofollow" target="_blank">{$site_name}公式サイトへ行く</a></p>
  </div>
EOT;
  }
 ?>
</section>
<?php require 'include/aside.php'; echo "\n</div>";?>
<?php require 'include/footer.php';?>