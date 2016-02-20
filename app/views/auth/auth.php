<?php include_once('../app/views/default/top.php'); ?>
    <div id="loginbox" style="<?php if(isset($data['register'])) echo 'display:none;'; ?> margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Log In</div>
            </div>     

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    
                <form id="login_form" method="post" action="<?php echo BASE_URL . '/auth/singin' ?>"  class="form-horizontal" role="form">
                    <?php if(isset($data['error'])) { ?>
                        <div id="signupalert" class="alert alert-danger">
                            <p>Error:</p>
                                <span><?php echo $data['error'] ?></span>
                        </div>
                    <?php } ?>

                    <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-email" type="text" class="form-control" name="email" value="" placeholder="email">                                        
                            </div>
                        
                    <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                            </div>
     
                    <div class="input-group">
                              <div class="checkbox">
                                <label>
                                  <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                              </div>
                            </div>


                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button id="btn-signin" type="submit" class="btn btn-info">Log In  </button>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    Don't have an account! 
                                <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                    Register Here
                                </a>
                                </div>
                            </div>
                        </div>    
                    </form>     
                </div>                     
            </div>  
    </div>
    <div id="signupbox" style="<?php if(!isset($data['register'])) echo 'display:none;'; ?> margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Register</div>
                    <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Log In</a></div>
                </div>  
                <div class="panel-body" >
                    <form id="register_form" method="post" action="<?php echo BASE_URL . '/auth/singup' ?>" class="form-horizontal" role="form">
                        
                        <?php if(isset($data['error'])) { ?>
                            <div id="signupalert" class="alert alert-danger">
                                <p>Error:</p>
                                    <span><?php echo $data['error'] ?></span>
                            </div>
                        <?php } ?>

                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Email*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email" placeholder="Email Address">
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label for="firstname" class="col-md-3 control-label">Name*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" placeholder="First Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Password*</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-3 control-label"></div>
                                <div style="font-size:85%" >
                                    * required fields
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- Button -->                                        
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Register</button>
                            </div>
                        </div>
                                            
                    </form>
                 </div>
            </div>
     </div> 
<?php include_once('../app/views/default/bottom.php');?>