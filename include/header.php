<?php require 'include/function.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="robots" content="noindex">
	<title>BOナビ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?php echo $site_url; ?>js/index.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(function(){
        $("#acMenu li").on("click", function() {
            $(this).next().slideToggle();
        });
    });
</script>
</head>
<body>

<header>
	<div class="head clearfix">
		<h1 class="logo"><a href="<?php echo $site_url; ?>index.php">BOナビ</a></h1>
		<nav class="pconly">
			<ul class="clearfix">
				<li><a href="<?php echo $site_url; ?>index.php">HOME</a></li>
				<li><a href="<?php echo $site_url; ?>ranking.php">BOランキング</a></li>
				<li><a href="<?php echo $site_url; ?>hikaku.php">BO比較表</a></li>
				<li><a href="<?php echo $site_url; ?>demo.php">デモランキング</a></li>
			</ul>
		</nav>
		<nav class="sponly">
			<ul>
				<li><a href="#">HOME</a></li>
				<li><a href="#">BOランキング</a></li>
				<li><a href="#">BO比較表</a></li>
				<li><a href="#">デモランキング</a></li>
			</ul>
		</nav>
	</div>
</header>

