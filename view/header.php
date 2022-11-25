<?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?>
<!DOCTYPE HTML>

<html>
    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="PUTinCoin - a cryptocurrency for RUSSIA!">
        <meta name="author" content="PUTinCoin">
        
        <!-- Bootstrap include stuff -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/wallet.css" rel="stylesheet">
	<link href="assets/css/languages.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.6.0/moment.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- End Bootstrap include stuff-->
        <title><?=$fullname?> Webwallet</title>
        <link rel="icon" type="image/x-icon" href="favicon.ico?v=2" />
    </head>
    
    
    <body>


<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>




        <nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php"><?=$fullname?> Wallet</a>
				</div>
				<div class="nav navbar-nav navbar-right">


					<div class="dropdown">

						<button class="btn btn-default navbar-btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Useful Links
							<span class="caret"></span>
						</button>


						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                                                        <li><a href="https://putincoin.org/" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i> Website</a></li>
                                                        <li><a href="https://putincoin.info" target="_blank"><i class="fa fa-search" aria-hidden="true"></i> Explorer</a>
                                                        <li><a href="https://t.me/putincoinput" target="_blank"><i class="fa fa-telegram" aria-hidden="true"></i> Telegram</a>
                                                        <li><a href="https://twitter.com/coin_put" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
                                                        <li><a href="https://www.minds.com/groups/profile/1349731180802478092/feed?referrer=therealputincoin" target="_blank"><i class="fa fa-map-pin" aria-hidden="true"></i> Minds</li>
                                                        <li><a href="https://coinmarketcap.com/currencies/putincoin/" target="_blank"><i class="fa fa-line-chart" aria-hidden="true"></i> Market index</a></li>

                                         </ul>
					</div>
				</div>

			</div><!-- /.container-fluid -->
        </nav>

        <div class="jumbotron" style="background-color:#ffffff">
            <div class="container">

