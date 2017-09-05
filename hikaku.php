<?php require 'include/header.php';?>
<?php require 'include/function.php';?>
<?php require 'include/db.inc';?>
<div class="main">
<img src="img/botop1.jpg" alt="バイナリーオプションナビ">
</div>
<div class="wrapper clearfix">
<section class="left-box">
  <h2><i class="fa fa-list-ul fa-fw" aria-hidden="true"></i>比較表</h2>
  <table class="hikaku-table">
  <caption>バイナリーオプション業者比較表</caption>
  <tr>
    <th>業者名</th>
    <th>初心者向け</th>
    <th>無料デモ</th>
    <th>出金手数料</th>
    <th>ボーナス</th>
    <th>公式サイト</th>
  </tr>
<?
$sql="SELECT * FROM site_data WHERE del_flg_simple=0";
$stm = $pdo -> prepare($sql);
$stm->execute();
$result=$stm->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $value) {
  $site_name=$value['site_name'];
  $beginner=$value['beginner'];
  $demo=$value['demo'];
  $site_url=$value['site_url'];
  $drop_commi_simple=$value['drop_commi_simple'];
echo <<<EOD
  <tr>
    <td>{$site_name}</td>
    <td>{$beginner}</td>
    <td>{$demo}</td>
    <td>{$drop_commi_simple}</td>
    <td>○</td>
    <td><a href="{$site_url}" target="_blank">公式サイトへ</a></td>
  </tr>

EOD;
}
?>

  </table>
</section>

<?php require 'include/aside.php'; echo "\n</div>";?>
<?php require 'include/footer.php';?>