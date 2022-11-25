<?php if (!defined("IN_WALLET")) { die("Auth Error"); } ?>
              <center> <h1><?php echo $lang['PAGE_HEADER']; ?></h1> 
<br />
<script type="text/javascript">
baseUrl = "https://widgets.cryptocompare.com/";
var scripts = document.getElementsByTagName("script");
var embedder = scripts[ scripts.length - 1 ];
var cccTheme = {"General":{"enableMarquee":true}};
(function (){
var appName = encodeURIComponent(window.location.hostname);
if(appName==""){appName="local";}
var s = document.createElement("script");
s.type = "text/javascript";
s.async = true;
var theUrl = baseUrl+'serve/v3/coin/header?fsyms=PUT&tsyms=BTC,RUB,USD,EUR,CNY';
s.src = theUrl + ( theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
embedder.parentNode.appendChild(s);
})();
</script>

</center>


<br />
<script type="text/javascript" src="https://putincoin.org/js/currency.js"></script>
<div class="coinmarketcap-currency-widget" data-currency="putincoin" data-base="USD"  data-secondary="BTC"></div>

<br />

                <?php
                if (!empty($error))
                {
                    echo "<p style='font-weight: bold; color: red;'>" . $error['message']; "</p>";
                }
                ?>
<center>
<style>
/* Full-width input fields */

.modal p{text-align:center;width:80%}
input[type=text], input[type=password],input[type=email],input[type=submit] {
    width: 360px;
    padding: 12px 20px;
    margin: 0 auto 20px auto;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
form{width: 360px;margin: auto;}
/* Set a style for all buttons */
button {
    margin-bottom: 0;
    font-weight: 400;
    cursor: pointer;
    margin:0 0 20px 0;
    background-image: none;
    border: 1px solid transparent;
    white-space: nowrap;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 24px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}


span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content { border-radius: 8px;position: relative;
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 450px; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>

<div class="separator" style="clear: both; text-align: center;">
<a href="/" imageanchor="1" style="margin-left: 1em; margin-right: 1em;"><img border="0" data-original-height="256" data-original-width="256" src="logo.png" /></a></div>
<div style="text-align: center;">
<br /></div>

<button class="btn btn-default" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login Account</button>
<button class="btn btn-default" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Create Account</button>
               <div id="id01" class="modal">
  <div  class="modal-content animate" id="loginform" name="loginform" style="display: block;"><div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="/logo.png" alt="Avatar" class="avatar">
    </div>
                
                <form action="index.php" method="POST" class="clearfix">
                    <input type="hidden" name="action" value="login">
                    <input type="email" class="form-control" required="required" name="username" placeholder="Email">
                    <input type="password" class="form-control" required="required" name="password" placeholder="Password">
                   <input type="text" class="form-control" name="auth" placeholder="2FA Authentication Code">
                    <button style="margin-bottom:20px"  type="submit" class="btn btn-default" >Log In</button>
                </form>
</div>
  
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

       
<div id="id02" class="modal">
  <div  class="modal-content animate" id="loginform" name="loginform" style="display: block;"><div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="/logo.png" alt="Avatar" class="avatar">
    </div>
                
                <form action="index.php" method="POST" class="clearfix">
                    <input type="hidden" name="action" value="register">
                    <input type="email" class="form-control" required="required" name="username" placeholder="Email">
                    <input type="password" class="form-control" required="required" name="password" placeholder="Password">
                    <input type="password" class="form-control" required="required" name="confirmPassword" placeholder="Confirm Password">
                 					<button style="margin-bottom:20px" type="submit" class="btn btn-default" >Sign Up</button>
                </form>
                <p style="text-align: center;">IMPORTANT: If you register a new account, your initial balance will be -0.0005 PUT.</p>
                <p style="text-align: center;">This is, because the first transaction fee is already calculated to avoid negative balances!</p>
                <p style="text-align: center;">Just transfer some coins and the balance is positive.</p>
</div>
  
</div>
