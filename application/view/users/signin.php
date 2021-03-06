<div class="param">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">

                <!--Back Button-->
                <button type="button" onclick="history.back()" class="btn btn-info btn-lg buy-button">Back</button>

                <div class="logo" align="center">
                    <a href="<?php echo URL; ?>home/index">
                        <img src="<?php echo URL; ?>img/shopu-mod.png" alt="ShopU logo" />
                    </a>
                </div>
                <div class="shape-group text-center">
                    <h2>Sign in</h2>
                </div>

                <form action="<?php echo URL; ?>users/signinuser" method="POST">
                    <!-- input fields -->
                    
                    <div class="shape-group">
                        <label for="username">Username</label>
                        <input name="username" type="text" id="username" maxlength="50"
                               autocomplete="off" class="form-control" required>
                    </div>
                    <div class="shape-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" id="password" maxlength="25"
                               autocomplete="off" class="form-control" required>
                    </div><br>

                    <!-- sign in -->
                    <div class="shape-group">
                        <button name="signup" type="submit" class="btn btn-warning btn-block">Sign in</button>
                    </div>

                    <!-- create an account -->
                    <div class="shape-group div">
                        <hr class="pos-left">New to site?<hr class="pos-right">
                    </div>
                    <p class="shape-group">
                        <a href="<?php echo URL; ?>users/signup" class="btn btn-info btn-block">Create an account</a>
                    </p>

                    <!-- terms & conditions -->
                    <p class="shape-group text-center">By signing in you are agreeing to our 
                        <a href="<?php echo URL; ?>users/displayterms">Terms of Use and Privacy Policy</a>.
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
