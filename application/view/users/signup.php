<div class="param">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">

                <button type="button" onclick="history.back()" class="btn btn-info btn-lg buy-button">Back</button>
                <div class="logo" align="center">
                    <a href="<?php echo URL; ?>home/index">
                        <img src="<?php echo URL; ?>img/shopu-mod.png" alt="ShopU logo"/>
                    </a>
                </div>
                <div class="shape-group text-center">
                    <h2>Sign Up</h2>
                </div>

                <form action="<?php echo URL; ?>users/adduser" method="POST" enctype="multipart/form-data">
                    
                    <!-- input fields -->
                    <div class="shape-group">
                        <label for="sfsu_id" class="control-label">SFSU ID</label>
                        <input name="student_id" type="text" id="sfsu_id" class="form-control" required>
                    </div>
                    <div class="shape-group">
                        <label for="username" class="control-label">Username</label>
                        <input name="username" type="text" id="username" autocomplete="off" class="form-control" required>
                    </div>
                    <div class="shape-group">
                        <label for="email" class="control-label">SFSU Email</label>
                        <input name="email" type="email" id="email" autocomplete="off" class="form-control" required>
                    </div>
                    <div class="shape-group">
                        <label for="password" class="control-label">Password</label>
                        <input name="password" type="password" id="password" autocomplete="off"
                               class="form-control" placeholder="at least 6 characters" required>
                    </div>
                    <div class="shape-group">
                        <label for="image" class="control-label">Profile Image</label>
                        <input name="image" type="file" id="image">
                    </div><br>

                    <center><input type="checkbox" name="agree" value="agree" onclick=""/> Agree with the terms and conditions </center> <br>
                    <p class="shape-group text-center">By signing up you are agreeing to our 
                        <a href="<?php echo URL; ?>users/displayTerms">Terms of Use and Privacy Policy</a>.
                    </p>
                    
                    <div class="form-group">
                        <div class="col-xs-6 col-xs-offset-3">
                            <div class="checkbox">
                            </div>
                        </div>
                    </div>
                    
                    <!-- sign up -->
                    <div class="shape-group">
                        <button name="submit_add_user" type="submit" class="btn btn-warning btn-block" >
                            Create your account</button>
                    </div><br>
                    <hr>
                    <p class="text-center">Already have an account?
                        <a href="<?php echo URL; ?>users/signin">Sign in</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
