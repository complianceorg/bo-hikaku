<?php
require_once "./include/function.php";
require_once "./include/header.php";
require_once "./include/db.inc";

session_start();

//ソート
switch ($_GET["st"]) {
  case 'p':
  $sql2 = " order by payhi desc";
    break;
  case 'm':
  $sql2 = " order by low_trade asc";
    break;
  case 's':
  $sql2 = " order by droplow asc";
    break;
}

$sql=$_SESSION['sql'].$sql2;

$stm = $pdo -> prepare($sql);
$stm->execute();
$count = $stm->rowCount();

?>
<div class="main">
<img src="img/botop1.jpg" alt="バイナリーオプションナビ">
</div>
<div class="wrapper clearfix">
<section class="gyousya-box">
  <div class="cl_count">表示件数<span class="cl_num"><?php echo $count ; ?></span>件</div>
  <a href="<?php echo $site_url; ?>company_list.php?st=p">ペイアウト率 高い順</a>
  <a href="<?php echo $site_url; ?>company_list.php?st=m">最低取引額 低い順</a>
  <a href="<?php echo $site_url; ?>company_list.php?st=s">出金スピード 早い順</a>
<?php
$result=$stm->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $value) {
  $site_name=$value['site_name'];
  $payout_rate=$value['payout_rate'];
  $drop_commi=$value['drop_commi'];
  $demo=$value['demo'];
  $low_trade=$value['low_trade'];
  $campaign=$value['campaign'];
  $img_name=$value['img_name'];
  $catch_copy=$value['catch_copy'];
  $drop_speed=$value['drop_speed'];
  $site_url1 = $value['site_url'];
echo <<<EOT
 <div class="gyousya">
  <h3>{$site_name}</h3>
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
  <p><a href="{$site_url1}" rel="nofollow" target="_blank">{$site_name}公式サイトへ行く</a></p>
  </div>
EOT;
  }
 ?>
</section>
<?php require 'include/aside.php'; echo "\n</div>";?>
<?php require 'include/footer.php';?>