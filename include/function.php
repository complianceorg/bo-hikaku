<?php
// 自分のURL
$site_url = (empty($_SERVER["HTTPS"]) ? "http://": "https://").$_SERVER["HTTP_HOST"]."/";
$media_url = (empty($_SERVER["HTTPS"]) ? "http://": "https://").$_SERVER["HTTP_HOST"]."/";

// 今のファイル名
$now_file = basename($_SERVER['PHP_SELF']);

// サイト名1
$media_name = "バイナリーオプションナビ";

//コピーライト
$copy_date = (date("Y") == "2016") ? "2016": "2016 ～ ".date("Y");