<?php if (!defined("IN_WALLET")) {
    die("Auth Error");
} ?>
<div class="jumbotron" style="background-color:#ffffff">
    <div class="container">

        <?php
        if (!empty($error)) {
            echo "<div class='text-danger text-center'>" . $error['message'] . "</div>";
        }
        ?>
        <center>
            <h1><?php echo $lang['PAGE_HEADER']; ?></h1>
            <div class="separator" style="clear: both; text-align: center;">
                <a href="/" imageanchor="1" style="margin-left: 1em; margin-right: 1em;"><img border="0" data-original-height="256" data-original-width="256" src="logo.png" /></a>
            </div>
            <div class="text-center mb-2">
               <br />Simple, fast and secure web wallet for PUTincoin!<br /><br /><br />
            </div>

            <button class="btn btn-default" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login Account</button>
            <button class="btn btn-default" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Create Account</button>
            <div id="id01" class="modal">
                <div class="modal-content animate" id="loginform" name="loginform" style="display: block;">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                        <img src="assets/images/logo.png" alt="Avatar" class="avatar">
                    </div>

                    <form action="index.php" method="POST" class="clearfix">
                        <input type="hidden" name="action" value="login">
                        <input type="email" class="form-control" required="required" name="username" placeholder="Email">
                        <input type="password" class="form-control" required="required" name="password" placeholder="Password">
                        <input type="text" class="form-control" name="auth" placeholder="2FA Authentication Code">
                        <button style="margin-bottom:20px" type="submit" class="btn btn-default col-sm-12">Log In</button>
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
                <div class="modal-content animate" id="loginform" name="loginform" style="display: block;">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                        <img src="assets/images/logo.png" alt="Avatar" class="avatar">
                    </div>

                    <form action="index.php" method="POST" class="clearfix">
                        <input type="hidden" name="action" value="register">

                        <input type="email" class="form-control" required="required" name="username" placeholder="Email">

                        <input type="password" class="form-control" required="required" name="password" placeholder="Password">

                        <input type="password" class="form-control" required="required" name="confirmPassword" placeholder="Confirm Pass">

                        <button style="margin-bottom:20px" type="submit" class="btn btn-default col-sm-12">Sign Up</button>
                    </form>
                    <h6 class="text-center alert alert-danger">
                        <strong>IMPORTANT:</strong><br />
                        If you register a new account, your initial balance will be -0.0005 PUT.<br />
                        This is, because the first transaction fee is already calculated to avoid negative balances!<br />
                        Just transfer some coins and the balance is positive.
                    </h6>
                </div>

            </div>