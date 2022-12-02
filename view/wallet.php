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
                <br /><br />
        </div>
        <div class="col-sm-12 text-center">
            <div class="col-sm-4 text-center" style="border: 2px solid #000000; height: 400px;">
                <center>
                    <h5><?php echo $lang['WALLET_BALANCE']; ?></h5>
                    <h2><strong id="balance"><?php echo satoshitize($balance); ?></strong></h2>
                    <div class="img-fluid"><img src="https://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $Myaddress ?>" alt="QR Code" style="width:100px;height:100px;border:0;" class="img-responsive img-fluid"></div>
                    <div class="text-center" style="font-size: 9px;"><input value="<?php echo $Myaddress ?>" class="form-control" id="address-user" disabled></div>
                </center>
                <div class="col-sm-12 text-center">
                    <button onclick="copiarTexto()">Copy Address</button>
                    <a class="btn btn-default" onclick="document.getElementById('id04').style.display='block'" style="width:auto;">Withdraw</a>
                </div>
                <br />
            </div>



            <div class="col-sm-8 text-center" style="border: 2px solid #000000; height: 400px;">
                <p><?php echo $lang['WALLET_LAST10']; ?></p>
                <h5 class="alert alert-warning text-center">Deposits take 6 confirmations to show up here</h5>
                <div class="table-responsive">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th nowrap><?php echo $lang['WALLET_DATE']; ?></th>
                                <th nowrap><?php echo $lang['WALLET_ADDRESS']; ?></th>
                                <th nowrap><?php echo $lang['WALLET_TYPE']; ?></th>
                                <th nowrap><?php echo $lang['WALLET_AMOUNT']; ?></th>
                                <th nowrap><?php echo $lang['WALLET_FEE']; ?></th>
                                <th nowrap><?php echo $lang['WALLET_CONFS']; ?></th>
                                <th nowrap><?php echo $lang['WALLET_INFO']; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $bold_txxs = "";
                            foreach ($transactionList as $transaction) {
                                if ($transaction['category'] == "send") {
                                    $tx_type = '<b style="color: #FF0000;">Sent</b>';
                                } else {
                                    $tx_type = '<b style="color: #01DF01;">Received</b>';
                                }
                                echo '<tr>
               <td>' . date('n/j/Y h:i a', $transaction['time']) . '</td>
               <td>' . $transaction['address'] . '</td>
               <td>' . $tx_type . '</td>
               <td>' . abs($transaction['amount']) . '</td>
               <td>' . $transaction['fee'] . '</td>
               <td>' . $transaction['confirmations'] . '</td>
               <td><a href="' . $blockchain_url, $transaction['txid'] . '" target="_blank">Info</a></td>
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
        function copiarTexto() {
            /* Selecionamos por ID o nosso input */
            var textoCopiado = document.getElementById("address-user");

            /* Deixamos o texto selecionado (em azul) */
            textoCopiado.select();
            textoCopiado.setSelectionRange(0, 99999); /* Para mobile */

            /* Copia o texto que está selecionado */
            document.execCommand("copy");

            alert("Has Copied: " + textoCopiado.value);
        }
    </script>