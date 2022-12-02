<!--- modal change pass-->
<div id="id03" class="modal">
    <div class="modal-content animate" id="loginform" name="loginform" style="display: block;">
        <div class="imgcontainer">
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
    margin-bottom: 20px;" type="submit" class="btn btn-default"><?php echo $lang['WALLET_PASSUPDATECONF']; ?></button><br />
            <p id="pwdmsg"></p>
    </div>
    </form>
</div>

</div>
<!-------- en modal-------->
<div id="id04" class="modal">
    <div class="modal-content animate" id="loginform" name="loginform" style="display: block;">
        <div class="imgcontainer">
            <span style="right: 10px;
    top: -20px;" onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
        <form action="index.php" method="POST" class="clearfix" id="withdrawform">
            <input type="hidden" name="action" value="withdraw" />
            <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
            <input type="text" class="form-control" name="address" placeholder="<?php echo $lang['WALLET_ADDRESS']; ?>">
            <input type="text" class="form-control" name="amount" placeholder="<?php echo $lang['WALLET_AMOUNT']; ?>">
            <button style="margin-left: 44px;
    margin-bottom: 20px;" type="submit" class="btn btn-default"><?php echo $lang['WALLET_SENDCONF']; ?></button>
        </form> <br />
        <p id="withdrawmsg"></p>
    </div>
</div>
<!---------  modals ------------>
<div id="id05" class="modal">
    <div class="modal-content animate" id="loginform" name="loginform" style="display: block;">
        <div class="imgcontainer">
            <span style="right: 10px;
    top: -20px;" onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
        <center>
            <p id="newaddressmsg"></p>
        </center>
        <form action="index.php" method="POST" id="newaddressform">
            <input type="hidden" name="action" value="new_address" />
            <button type="submit" class="btn-default"><?php echo $lang['WALLET_NEWADDRESS']; ?></button>
        </form>
        <p><strong><?php echo $lang['WALLET_USERADDRESSES']; ?></strong></p>
        <table class="table table-bordered table-striped" id="alist">
            <thead>
                <tr>
                    <th><?php echo $lang['WALLET_ADDRESS']; ?>:</th>
                    <th><?php echo $lang['WALLET_QRCODE']; ?>:</th>
                </tr>
            </thead>
            <tbody> <?php
                    foreach ($addressList as $address) {
                        echo "<tr><td>" . $address . "</t>"; ?>
                    <td><a href="https://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $address ?>">
                            <img src="https://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $address ?>" alt="QR Code" style="width:42px;height:42px;border:0;">
                    </td>
                    <tr> <?php
                        }
                            ?>
            </tbody>
        </table>
    </div>
</div>
<!------------- modal--------------->
<div id="id06" class="modal">
    <div class="modal-content animate" id="loginform" name="loginform" style="display: block;">
        <div class="imgcontainer">
            <span style="right: 10px;
    top: -20px;" onclick="document.getElementById('id06').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
        <div class="modal-body">
            <form action="index.php" method="POST"> <input type="hidden" name="action" value="authgen" /> <button type="submit" class="btn btn-default col-sm-12" value="authgenBnT"><?php echo $lang['WALLET_2FAON']; ?></button> </form>
            <form action="index.php" method="POST"> <input type="hidden" name="action" value="disauth" /> <button type="submit" class="btn btn-default col-sm-12" value="disauthBnT"><?php echo $lang['WALLET_2FAOFF']; ?></button> </form>
            <br /><br />
        </div>
        <br /><br />
    </div>
</div>