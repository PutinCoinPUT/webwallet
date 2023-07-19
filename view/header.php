<?php if (!defined("IN_WALLET")) {
    die("Auth Error!");
} ?>
<!DOCTYPE HTML>

<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PUTinCoin - a cryptocurrency for RUSSIA!">
    <meta name="author" content="PUTinCoin">

    <!-- Bootstrap include stuff -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">
    <link href="https://putincoin.net/assets/cssset/style.css" rel="stylesheet">
    <link href="assets/css/wallet.css" rel="stylesheet">
    <link href="assets/css/languages.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.6.0/moment.min.js"></script>

    <script type="text/javascript">
        function refreshPage() {
                location.reload();
        }

	function copyPutaddress() {
  		// get the container
  		const element = document.querySelector('#address-user');
  		// Create a fake `textarea` and set the contents to the text
  		// you want to copy
  		const storage = document.createElement('textarea');
  		storage.value = element.innerHTML;
  		element.appendChild(storage);

 		// Copy the text in the fake `textarea` and remove the `textarea`
		storage.select();
		storage.setSelectionRange(0, 99999);
		document.execCommand('copy');
		element.removeChild(storage);
		alert("Address copied: " + storage.value);
	}
    </script>

    <script>
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        var comboGoogleTradutor = null; //Varialvel global

        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,de,ru,pt,es',
                layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
            }, 'google_translate_element');

            comboGoogleTradutor = document.getElementById("google_translate_element").querySelector(".goog-te-combo");
        }

        function changeEvent(el) {
            if (el.fireEvent) {
                el.fireEvent('onchange');
            } else {
                var evObj = document.createEvent("HTMLEvents");

                evObj.initEvent("change", false, true);
                el.dispatchEvent(evObj);
            }
        }

        function trocarIdioma(sigla) {
            if (comboGoogleTradutor) {
                comboGoogleTradutor.value = sigla;
                changeEvent(comboGoogleTradutor); //Dispara a troca
            }
        }
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    </script>
    <!-- End Bootstrap include stuff-->
    <title><?= $fullname ?> Webwallet</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico?v=<?php rand(0001, 9999999999); ?>" />
</head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top" style="margin-top: 35px">
        <div class="container-fluid" style="padding-bottom: 5px">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php"><img src="assets/images/logo-put.png" height="35" width="200" class="img-fluid"></a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <div class="nav navbar-nav navbar-right" style="margin-top: 5px;">
                    <?php if (!isset($_SESSION['user_session'])) { ?>
                    <li class="dropdown">

                        <button class="btn btn-default navbar-btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Language&nbsp; <span class="caret"></span>
                        </button>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <div id="google_translate_element" class="boxTradutor"></div>
                            <li class="col-sm-12"><a href="javascript:trocarIdioma('en')"><img src="assets/images/en.png" width="20" style="margin-right:10px;">English</a></li>
                            <li class="col-sm-12"><a href="javascript:trocarIdioma('ru')"><img src="assets/images/ru.png" width="20" style="margin-right:10px;">Русский</a></li>
                            <li class="col-sm-12"><a href="javascript:trocarIdioma('de')"><img src="assets/images/de.png" width="20" style="margin-right:10px;">Deutsch</a></li>
                            <li class="col-sm-12"><a href="javascript:trocarIdioma('es')"><img src="assets/images/es.png" width="20" style="margin-right:10px;">Español</a></li>
                            <li class="col-sm-12"><a href="javascript:trocarIdioma('pt')"><img src="assets/images/pt.png" width="20" style="margin-right:10px;">Português</a></li>

                        </ul>
                    </li>
                    <li class="dropdown" style="margin-right: 15px;">

                        <button class="btn btn-default navbar-btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Links&nbsp; <span class="caret"></span>
                        </button>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="https://putincoin.org/" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i> Website</a></li>
                            <li><a href="https://putincoin.info" target="_blank"><i class="fa fa-search" aria-hidden="true"></i> Explorer</a>
                            <li><a href="https://t.me/putincoinput" target="_blank"><i class="fa fa-telegram" aria-hidden="true"></i> Telegram</a>
                            <li><a href="https://twitter.com/coin_put" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
                            <li><a href="https://www.minds.com/groups/profile/1349731180802478092/feed?referrer=therealputincoin" target="_blank"><i class="fa fa-map-pin" aria-hidden="true"></i> Minds</li>
                            <li><a href="https://coinmarketcap.com/currencies/putincoin/" target="_blank"><i class="fa fa-line-chart" aria-hidden="true"></i> Market index</a></li>

                        </ul>
                    </li>
                    <?php } ?>
                    <?php if (isset($_SESSION['user_session'])) { ?>
                    <li class="dropdown">

                        <button class="btn btn-default navbar-btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Language&nbsp; <span class="caret"></span>
                        </button>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <div id="google_translate_element" class="boxTradutor"></div>
                            <li class="col-sm-12"><a href="javascript:trocarIdioma('en')"><img src="assets/images/en.png" width="20" style="margin-right:10px;">English</a></li>
                            <li class="col-sm-12"><a href="javascript:trocarIdioma('ru')"><img src="assets/images/ru.png" width="20" style="margin-right:10px;">Русский</a></li>
                            <li class="col-sm-12"><a href="javascript:trocarIdioma('de')"><img src="assets/images/de.png" width="20" style="margin-right:10px;">Deutsch</a></li>
                            <li class="col-sm-12"><a href="javascript:trocarIdioma('es')"><img src="assets/images/es.png" width="20" style="margin-right:10px;">Español</a></li>
                            <li class="col-sm-12"><a href="javascript:trocarIdioma('pt')"><img src="assets/images/pt.png" width="20" style="margin-right:10px;">Português</a></li>

                        </ul>
                    </li>
                    <li class="dropdown">

                        <button class="btn btn-default navbar-btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Links&nbsp; <span class="caret"></span>
                        </button>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="https://putincoin.org/" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i> Website</a></li>
                            <li><a href="https://putincoin.info" target="_blank"><i class="fa fa-search" aria-hidden="true"></i> Explorer</a>
                            <li><a href="https://t.me/putincoinput" target="_blank"><i class="fa fa-telegram" aria-hidden="true"></i> Telegram</a>
                            <li><a href="https://twitter.com/coin_put" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
                            <li><a href="https://www.minds.com/groups/profile/1349731180802478092/feed?referrer=therealputincoin" target="_blank"><i class="fa fa-map-pin" aria-hidden="true"></i> Minds</li>
                            <li><a href="https://coinmarketcap.com/currencies/putincoin/" target="_blank"><i class="fa fa-line-chart" aria-hidden="true"></i> Market index</a></li>

                        </ul>
                    </li>
                        <li>
                            <div class="dropdown">

				<button class="btn btn-default navbar-btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Settings&nbsp; <span class="caret"></span>
				</button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><?php if ($admin) {
                                        ?>
                                            <a href="?a=home">Admin Dashboard</a> <br />
                                        <?php
                                        }
                                        ?>
                                    </li>
                                    <li>
                                        <a onclick="document.getElementById('id06').style.display='block'" style="width:auto;">Wallet Security</a>
                                    </li>
                                    <li>

                                        <a onclick="document.getElementById('id03').style.display='block'" style="width:auto;">Change Password</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="logoutbutton">
                            <form action="index.php" method="POST">
                                <form>
                                    <input type="hidden" name="action" value="logout" />
                                    <button type="submit" class="btn btn-danger navbar-btn ">Logout</button>
                                </form>
                        </li>
                    <?php } ?>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </nav>
    <br /> <br />
