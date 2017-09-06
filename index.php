<?php require 'include/header.php';?>
<?php require 'include/function.php';?>
<?php require 'include/db.inc';?>
<div class="main">
<img src="img/botop1.jpg" alt="バイナリーオプションナビ">
</div>
<div class="wrapper clearfix">
<section class="left-box">
<div class="jyouken">
  <ul class="clearfix">
    <li><a href="#"><img src="img/hikaku1.jpg" alt="初心者向けバイナリー口座"></a></li>
    <li><a href="#"><img src="img/hikaku2.jpg" alt="5000円から始められるバイナリー口座"></a></li>
    <li><a href="#"><img src="img/hikaku3.jpg" alt="100から取引出来る口座"></a></li>
    <li><a href="#"><img src="img/hikaku4.jpg" alt="100から取引出来る口座"></a></li>
  </ul>
</div>
<h2><i class="fa fa-search fa-fw" aria-hidden="true"></i>絞り込み条件で探す</h2>
<form action="<?php echo $site_url; ?>sql.php" method="POST">
<div class="search-category-wrap clearfix">
  <div class="search-box">
    <div class="search-category">
      <label for="is_beginner">
        <input name="is_beginner" type="checkbox" value="1" id="is_beginner">
        <span class="search-name">初心者向け</span>
      </label>
    </div>
  </div>
  <div class="search-box">
    <div class="search-category">
      <label for="is_free_demotrade">
        <input name="is_free_demotrade" type="checkbox" value="1" id="is_free_demotrade">
        <span class="search-name">無料デモ有り</span>
      </label>
    </div>
  </div>
  <div class="search-box">
    <div class="search-category">
      <label for="drop_commi">
        <input name="drop_commi" type="checkbox" value="1" id="drop_commi">
        <span class="search-name">出金手数料 無料</span>
      </label>
    </div>
  </div>
  <div class="search-box">
    <div class="search-category">
      <label for="account_free">
        <input name="account_free" type="checkbox" value="1" id="account_free">
        <span class="search-name">口座開設 無料</span>
      </label>
    </div>
  </div>
</div>

<table class="search-table">
  <tbody>
  <tr>
    <th>取引商品</th>
    <td>
       <input name="handing_currency_pair[0]" type="checkbox" value="0">通貨
       <input name="handing_currency_pair[1]" type="checkbox" value="1">商品指数(金、石油)
       <input name="handing_currency_pair[2]" type="checkbox" value="2">株価指数

       <input name="handing_currency_pair[3]" type="checkbox" value="3">個別株式銘柄（株式）
       <input name="handing_currency_pair[4]" type="checkbox" value="4">先物
    </td>
  </tr>
  <tr>
    <th>最低取引額</th>
    <td>
       <input checked="checked" name="trading_unit" type="radio" value="0"><span class="radio-text">指定なし</span>
       <input name="trading_unit" type="radio" value="100"><span class="radio-text">100円以下</span>
       <input name="trading_unit" type="radio" value="500"><span class="radio-text">500円以下</span>
       <input name="trading_unit" type="radio" value="1000"><span class="radio-text">1,000円以下</span>
    </td>
  </tr>
  <tr>
    <th>ペイアウト率</th>
    <td>
       <input checked="checked" name="spread_usdollar_per_yen" type="radio" value="0"><span class="radio-text">指定なし</span>
       <input name="spread_usdollar_per_yen" type="radio" value="1.5"><span class="radio-text">1.5倍以上</span>
       <input name="spread_usdollar_per_yen" type="radio" value="2.0"><span class="radio-text">2.0倍以上</span>
    </td>
  </tr>
  <tr>
    <th>ボーナス</th>
    <td>
       <input checked="checked" name="cashback" type="radio" value="0"><span class="radio-text">指定なし</span>
       <input name="cashback" type="radio" value="1"><span class="radio-text">あり</span>
    </td>
  </tr>
  <tr>
    <td colspan="2" class="text-center">
       <input class="btn btn-submit-1" type="submit" value="この条件で検索">
       <span id="searched-count"><b id="str">6</b></span>件該当
    </td>
 </tr>
</tbody></table>
</form>
<div>
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
  $site_url1=$value['site_url'];
  $drop_commi_simple=$value['drop_commi_simple'];
echo <<<EOD
  <tr>
    <td>{$site_name}</td>
    <td>{$beginner}</td>
    <td>{$demo}</td>
    <td>{$drop_commi_simple}</td>
    <td>○</td>
    <td><a href="{$site_url1}" target="_blank">公式サイトへ</a></td>
  </tr>

EOD;
}
?>

  </table>
</div>
</section>

<?php require 'include/aside.php'; echo "\n</div>";?>
<?php require 'include/footer.php';?>
