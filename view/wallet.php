<?php if (!defined("IN_WALLET")) { die("Auth Error!"); } ?> <?php if (!empty($error)) {
    echo "<p style='font-weight: bold; color: red;'>" . $error['message']; "</p>";
}
?> <?php if ($admin) {
  ?>
  <a href="?a=home" class="btn btn-default">Admin Dashboard</a> <br />
  <?php
}
?> <style> /* Full-width input fields */ .modal p{text-align:center;width:80%} input[type=text], input[type=password],input[type=email],input[type=submit] {
    width: 360px;
    padding: 12px 20px;
    margin: 0 auto 20px auto;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
form{width: 360px;margin: auto;} /* Set a style for all buttons */ button {
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
/* Extra styles for the cancel button */ .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}
/* Center the image and position the close button */ .imgcontainer {
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
/* The Modal (background) */ .modal {
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
/* Modal Content/Box */ .modal-content { border-radius: 8px;position: relative;
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 450px; /* Could be more or less, depending on screen size */
}
/* The Close Button (x) */ .close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover, .close:focus {
    color: red;
    cursor: pointer;
}
/* Add Zoom Animation */ .animate {
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
/* Change styles for span and cancel button on extra small screens */ @media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style> <center> <p><?php echo $lang['WALLET_HELLO']; ?>, <strong><?php echo $user_session; ?></strong>!  <?php if ($admin) {?><strong><font color="red">[Admin]</font><?php 
}?></strong$
<br /> </center> <div class="navbar-header" style="float:right"> <form action="index.php" method="POST"> <form>
        <input type="hidden" name="action" value="logout" />
        <button type="submit" class="btn btn-default">Wallet Logout</button> </form> <div class="dropdown"> <button class="btn btn-default navbar-btn dropdown-toggle" type="button" 
id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Wallet Settings <span class="caret"></span></button> <ul class="dropdown-menu" 
aria-labelledby="dropdownMenu1">
							<li> <form action="index.php" method="POST"> <input type="hidden" name="action" value="authgen" /> <button type="submit" 
class="btn btn-default"><?php echo $lang['WALLET_2FAON']; ?></button> </form>
							</li>
							<li> <form action="index.php" method="POST"> <input type="hidden" name="action" value="disauth" /> <button type="submit" 
class="btn btn-default"><?php echo $lang['WALLET_2FAOFF']; ?></button> </form>
							</li> <li>
	
<button class="btn btn-default" onclick="document.getElementById('id03').style.display='block'" style="width:auto;">Change Password</button> </li>
				</ul>
					</div> </div> <br /> <br /> <script> // Get the modal var modals = document.getElementById('id03'); // When the user clicks anywhere outside 
of the modal, close it window.onclick = function(event) {
    if (event.target == modals) {
        modal.style.display = "none";
    }
}
</script> <div id="id03" class="modal">
  <div class="modal-content animate" id="loginform" name="loginform" style="display: block;"><div class="imgcontainer">
      <span style="right: 10px;
    top: -20px;" onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
    <form action="index.php" method="POST" class="clearfix" id="pwdform">
    <input type="hidden" name="action" value="password" />
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
    <input type="password" class="form-control" name="oldpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATEOLD']; ?>">
    <input type="password" class="form-control" name="newpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATENEW']; ?>">
    <input type="password" class="form-control" name="confirmpassword" placeholder="<?php echo $lang['WALLET_PASSUPDATENEWCONF']; ?>">
    <button style=" margin-left: 44px;
    margin-bottom: 20px;" type="submit" class="btn btn-default"><?php echo $lang['WALLET_PASSUPDATECONF']; ?></button><br /> <p id="pwdmsg"></p> </div> </form> </div>
  
</div> <center> 

 <br /> <p><?php echo $lang['WALLET_BALANCE']; ?> <strong id="balance"><?php echo satoshitize($balance); ?></strong> 
<?=$short?></p> <p><font size="2">(Deposits take 6 confirmations to show up here)</font></p> <br />

 <button class="btn btn-default" onclick="document.getElementById('id04').style.display='block'" style="width:auto;">Send Coin</button> </center> <br /> <div id="id04" 
class="modal"> <div class="modal-content animate" id="loginform" name="loginform" style="display: block;"><div class="imgcontainer">
      <span style="right: 10px;
    top: -20px;" onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
    <form action="index.php" method="POST" class="clearfix" id="withdrawform">
    <input type="hidden" name="action" value="withdraw" />
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
    <input type="text" class="form-control" name="address" placeholder="<?php echo $lang['WALLET_ADDRESS']; ?>">
    <input type="text" class="form-control" name="amount" placeholder="<?php echo $lang['WALLET_AMOUNT']; ?>">
    <button style="margin-left: 44px;
    margin-bottom: 20px;" type="submit" class="btn btn-default"><?php echo $lang['WALLET_SENDCONF']; ?></button> </form> <br /> <p id="withdrawmsg"></p> </div> </div> <div 
id="wdform" name="wdform" style="display:none"> <p><strong><?php echo $lang['WALLET_SEND']; ?></strong></p> <br /> </div> <br /> <p><strong><?php echo $lang['WALLET_USERADDRESSES']; 
?></strong></p> <form action="index.php" method="POST" id="newaddressform">
	<input type="hidden" name="action" value="new_address" />
	<button type="submit" class="btn btn-default"><?php echo $lang['WALLET_NEWADDRESS']; ?></button> </form> <br /> <br /> <p id="newaddressmsg"></p> <br /> <table class="table 
table-bordered table-striped" id="alist"> <thead> <tr> <td><?php echo $lang['WALLET_ADDRESS']; ?>:</td> <td><?php echo $lang['WALLET_QRCODE']; ?>:</td> </tr> </thead> <tbody> <?php 
foreach ($addressList as $address) { echo "<tr><td>".$address."</t>";?> <td><a href="https://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $address?>">
  <img src="https://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $address?>" alt="QR Code" style="width:42px;height:42px;border:0;"></td><tr> <?php
}
?> </tbody> </table> <p><?php echo $lang['WALLET_LAST10']; ?></p> <table class="table table-bordered table-striped" id="txlist"> <thead>
   <tr>
      <td nowrap><?php echo $lang['WALLET_DATE']; ?></td>
      <td nowrap><?php echo $lang['WALLET_ADDRESS']; ?></td>
      <td nowrap><?php echo $lang['WALLET_TYPE']; ?></td>
      <td nowrap><?php echo $lang['WALLET_AMOUNT']; ?></td>
      <td nowrap><?php echo $lang['WALLET_FEE']; ?></td>
      <td nowrap><?php echo $lang['WALLET_CONFS']; ?></td>
      <td nowrap><?php echo $lang['WALLET_INFO']; ?></td>
   </tr> </thead> <tbody>
   <?php
   $bold_txxs = "";
   foreach($transactionList as $transaction) {
      if($transaction['category']=="send") { $tx_type = '<b style="color: #FF0000;">Sent</b>'; } else { $tx_type = '<b style="color: #01DF01;">Received</b>'; }
      echo '<tr>
               <td>'.date('n/j/Y h:i a',$transaction['time']).'</td>
               <td>'.$transaction['address'].'</td>
               <td>'.$tx_type.'</td>
               <td>'.abs($transaction['amount']).'</td>
               <td>'.$transaction['fee'].'</td>
               <td>'.$transaction['confirmations'].'</td>
               <td><a href="' . $blockchain_url, $transaction['txid'] . '" target="_blank">Info</a></td>
            </tr>';
   }
   ?>
   </tbody> </table> <script type="text/javascript"> var blockchain_url = "<?=$blockchain_url?>"; $("#withdrawform input[name='action']").first().attr("name", "jsaction"); 
$("#newaddressform input[name='action']").first().attr("name", "jsaction"); $("#pwdform input[name='action']").first().attr("name", "jsaction"); $("#donate").click(function (e){
  $("#donateinfo").show();
  $("#withdrawform input[name='address']").val("<?=$donation_address?>");
  $("#withdrawform input[name='amount']").val("0.01");
});
$("#withdrawform").submit(function(e) {
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR)
        {
            var json = $.parseJSON(data);
            if (json.success)
            {
              $("#withdrawform input.form-control").val("");
            	$("#withdrawmsg").text(json.message);
            	$("#withdrawmsg").css("color", "green");
            	$("#withdrawmsg").show();
            	updateTables(json);
            } else {
            	$("#withdrawmsg").text(json.message);
            	$("#withdrawmsg").css("color", "red");
            	$("#withdrawmsg").show();
            }
            if (json.newtoken)
            {
              $('input[name="token"]').val(json.newtoken);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            //ugh, gtfo
        }
    });
    e.preventDefault();
});
$("#newaddressform").submit(function(e) {
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR)
        {
            var json = $.parseJSON(data);
            if (json.success)
            {
            	$("#newaddressmsg").text(json.message);
            	$("#newaddressmsg").css("color", "green");
            	$("#newaddressmsg").show();
            	updateTables(json);
            } else {
            	$("#newaddressmsg").text(json.message);
            	$("#newaddressmsg").css("color", "red");
            	$("#newaddressmsg").show();
            }
            if (json.newtoken)
            {
              $('input[name="token"]').val(json.newtoken);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            //ugh, gtfo
        }
    });
    e.preventDefault();
});
$("#pwdform").submit(function(e) {
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR)
        {
            var json = $.parseJSON(data);
            if (json.success)
            {
               $("#pwdform input.form-control").val("");
               $("#pwdmsg").text(json.message);
               $("#pwdmsg").css("color", "green");
               $("#pwdmsg").show();
            } else {
               $("#pwdmsg").text(json.message);
               $("#pwdmsg").css("color", "red");
               $("#pwdmsg").show();
            }
            if (json.newtoken)
            {
              $('input[name="token"]').val(json.newtoken);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            //ugh, gtfo
        }
    });
    e.preventDefault();
});
function updateTables(json) {
	$("#balance").text(json.balance.toFixed(8));
	$("#alist tbody tr").remove();
	for (var i = json.addressList.length - 1; i >= 0; i--) {
		$("#alist tbody").prepend("<tr><td>" + json.addressList[i] + "</td></tr>");
	}
	$("#txlist tbody tr").remove();
	for (var i = json.transactionList.length - 1; i >= 0; i--) {
		var tx_type = '<b style="color: #01DF01;">Received</b>';
		if(json.transactionList[i]['category']=="send")
		{
			tx_type = '<b style="color: #FF0000;">Sent</b>';
		}
		$("#txlist tbody").prepend('<tr> \
               <td>' + moment(json.transactionList[i]['time'], "X").format('l hh:mm a') + '</td> \
               <td>' + json.transactionList[i]['address'] + '</td> \
               <td>' + tx_type + '</td> \
               <td>' + Math.abs(json.transactionList[i]['amount']) + '</td> \
               <td>' + json.transactionList[i]['fee'] + '</td> \
               <td>' + json.transactionList[i]['confirmations'] + '</td> \
               <td><a href="' + blockchain_url.replace("%s", json.transactionList[i]['txid']) + '" target="_blank">Info</a></td> \
            </tr>');
	}
}
</script>
