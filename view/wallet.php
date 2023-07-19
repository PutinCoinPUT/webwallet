<div class="container">
    <div class="row">

        <div class="col-sm-12 text-center" style='margin-top: 25px;'>
            <?php if (!defined("IN_WALLET")) {
                die("Auth Error!");
            } ?>
            <?php echo $lang['WALLET_HELLO']; ?>, <strong><?php echo $user_session; ?></strong>! <?php if ($admin) { ?><strong>
                    <span class="label label-danger"> Admin </span><?php } ?>
                <?php if (!empty($error)) {
                    echo "<div class='text-danger text-center'>" . $error['message'] . "</div>";
                }
                ?>
                </strong>
                <?php
                if ($genBTN == "authgen") {
                    echo $gen;
                }
                if ($disgenBTN == "disauth") {
                    echo $disauth;
                }
                ?>
                <br />
		<button onclick="refreshPage()">Refresh display</button>
		<br />
        </div>
        <div class="col-sm-12 text-center">
            <div class="col-sm-4 text-center" style="border: 2px solid #000000; height: 440px;">
                <center>
                    <h5><?php echo $lang['WALLET_BALANCE']; ?></h5>
		    <h5 class="alert alert-warning text-center">Deposits take 1 confirmation to show up here!</h5>
                    <h2><strong id="balance"><?php echo satoshitize($balance); ?></strong></h2>
                    <div class="img-fluid"><img src="https://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $Myaddress ?>" alt="QR Code" style="width:100px;height:100px;border:0;" class="img-responsive img-fluid"></div>
                    <div id="address-user" class="text-center" style="font-size: 11px;"><?php echo $Myaddress ?></div>
                </center>
                <div class="col-sm-12 text-center" style="margin-top: 10px;">
                    <button onclick="copyPutaddress()">Copy Address</button>
                    <a class="btn btn-default" onclick="document.getElementById('id04').style.display='block'" style="width:auto;">Transfer PUTinCoins</a>
                </div>
                <br />
            </div>

            <div class="col-sm-8 text-center" style="border: 2px solid #000000; float: auto; height: 440px; overflow-y: auto; font-size: 10px;">
		<script type="text/javascript">
		$(function(){
    			$(".wmd-view-topscroll").scroll(function(){
        		$(".wmd-view")
            			.scrollLeft($(".wmd-view-topscroll").scrollLeft());
    			});
    			$(".wmd-view").scroll(function(){
        		$(".wmd-view-topscroll")
            			.scrollLeft($(".wmd-view").scrollLeft());
    			});
		});
		</script>
		<p>&nbsp;</p>
                <p><?php echo $lang['WALLET_LAST10']; ?></p>
		<div class="wmd-view-topscroll">
    			<div class="scroll-div1" style="display: none;">
    			</div>
		</div>
                <div class="table-responsive wmd-view">
		    <div class="scroll-div2">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th style="text-align: center;" nowrap><?php echo $lang['WALLET_DATE']; ?></th>
                                <th style="text-align: center;" nowrap><?php echo $lang['WALLET_ADDRESS']; ?></th>
                                <th style="text-align: center;" nowrap><?php echo $lang['WALLET_TYPE']; ?></th>
                                <th style="text-align: center;" nowrap><?php echo $lang['WALLET_AMOUNT']; ?></th>
                                <!-- <th style="text-align: center;" nowrap><?php echo $lang['WALLET_FEE']; ?></th> -->
                                <th style="text-align: center;" nowrap><?php echo $lang['WALLET_CONFS']; ?></th>
                                <th style="text-align: center;" nowrap><?php echo $lang['WALLET_INFO']; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $bold_txxs = "";
                            $key_values = array_column($transactionList, 'time');
                            array_multisort($key_values, SORT_DESC, $transactionList);
                            foreach ($transactionList as $transaction) {
                                if ($transaction['category'] == "send") {
                                    $tx_type = '<b style="color: #FF0000;">Sent</b>';
                                } else {
                                    $tx_type = '<b style="color: #01DF01;">Received</b>';
                                }
                                echo '<tr>
               <td>' . date('d.m.Y - H:i', $transaction['time']) . '</td>
               <td>' . $transaction['address'] . '</td>
               <td>' . $tx_type . '</td>
               <td>' . abs($transaction['amount']) . '</td>
               <!-- <td>' . $transaction['fee'] . '</td> -->
               <td>' . $transaction['confirmations'] . '</td>
               <td><a href="' . $blockchain_url, $transaction['txid'] . '" target="_blank">More..</a></td>
            </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
		    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include('view/includes.php'); ?>

<div id="wdform" name="wdform" style="display:none">
    <p><strong><?php echo $lang['WALLET_SEND']; ?></strong></p>
    <script type="text/javascript">
        var blockchain_url = "<?= $blockchain_url ?>";
        $("#withdrawform input[name='action']").first().attr("name", "jsaction");
        $("#newaddressform input[name='action']").first().attr("name", "jsaction");
        $("#pwdform input[name='action']").first().attr("name", "jsaction");
        $("#donate").click(function(e) {
            $("#donateinfo").show();
            $("#withdrawform input[name='address']").val("<?= $donation_address ?>");
            $("#withdrawform input[name='amount']").val("0.01");
        });
        $("#withdrawform").submit(function(e) {
            var postData = $(this).serializeArray();
            var formURL = $(this).attr("action");
            $.ajax({
                url: formURL,
                type: "POST",
                data: postData,
                success: function(data, textStatus, jqXHR) {
                    var json = $.parseJSON(data);
                    if (json.success) {
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
                    if (json.newtoken) {
                        $('input[name="token"]').val(json.newtoken);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //ugh, gtfo
                }
            });
            e.preventDefault();
        });
        $("#newaddressform").submit(function(e) {
            var postData = $(this).serializeArray();
            var formURL = $(this).attr("action");
            $.ajax({
                url: formURL,
                type: "POST",
                data: postData,
                success: function(data, textStatus, jqXHR) {
                    var json = $.parseJSON(data);
                    if (json.success) {
                        $("#newaddressmsg").text(json.message);
                        $("#newaddressmsg").css("color", "green");
                        $("#newaddressmsg").show();
                        updateTables(json);
                    } else {
                        $("#newaddressmsg").text(json.message);
                        $("#newaddressmsg").css("color", "red");
                        $("#newaddressmsg").show();
                    }
                    if (json.newtoken) {
                        $('input[name="token"]').val(json.newtoken);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //ugh, gtfo
                }
            });
            e.preventDefault();
        });
        $("#pwdform").submit(function(e) {
            var postData = $(this).serializeArray();
            var formURL = $(this).attr("action");
            $.ajax({
                url: formURL,
                type: "POST",
                data: postData,
                success: function(data, textStatus, jqXHR) {
                    var json = $.parseJSON(data);
                    if (json.success) {
                        $("#pwdform input.form-control").val("");
                        $("#pwdmsg").text(json.message);
                        $("#pwdmsg").css("color", "green");
                        $("#pwdmsg").show();
                    } else {
                        $("#pwdmsg").text(json.message);
                        $("#pwdmsg").css("color", "red");
                        $("#pwdmsg").show();
                    }
                    if (json.newtoken) {
                        $('input[name="token"]').val(json.newtoken);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    //ugh, gtfo
                }
            });
            e.preventDefault();
        });
        /*
                function updateTables(json) {
                    $("#balance").text(json.balance.toFixed(8));
                    $("#alist tbody tr").remove();
                    for (var i = json.addressList.length - 1; i >= 0; i--) {
                        $("#alist tbody").prepend("<tr><td>" + json.addressList[i] + "</td></tr>");
                    }
                    $("#txlist tbody tr").remove();
                    for (var i = json.transactionList.length - 1; i >= 0; i--) {
                        var tx_type = '<b style="color: #01DF01;">Received</b>';
                        if (json.transactionList[i]['category'] == "send") {
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
                */
    </script>
