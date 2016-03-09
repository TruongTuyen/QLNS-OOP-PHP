<!DOCTYPE HTML>
<html>
    <head>
        <title>Login </title>
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'/>
        <link href="<?php echo Configs::ABS_URL;?>libraries/css/login.css" rel="stylesheet" type="text/css" media="all" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        
    </head>
    <body>
        <!-- contact-form -->	
        <div class="message warning">
        <div class="inset">
        	<div class="login-head">
        		<h1>Login System</h1>
        		 	
        	</div>
            <div class="show-warning">
                <?php
                    if(!empty($error)){
                        foreach($error as $e){
                            echo "<p class='error'>{$e} !</p>";
                        }
                    }else{
                ?>
                <?php if(isset($message)){?>
                    <p class="message"><?php echo $message. " !"; ?></p>
                <?php } }?>
            </div>
        		<form method="post" action="">
        			<li>
        				<input name="email" type="text" class="text"placeholder="Email"/>
                        <a href="#" class=" icon user"></a>
        			</li>
        				<div class="clear"> </div>
        			<li>
        				<input name="password" type="password" placeholder="Password"/> 
                        <a href="#" class="icon lock"></a>
        			</li>
        			<div class="clear"> </div>
        			<div class="submit">
        				<input type="submit"  value="Sign In" />
        				<h4><a href="<?php echo  Configs::ABS_URL;?>admin/user/forgot-pass.php">Forgot your password ?</a></h4>
        						  <div class="clear">  </div>	
        			</div>
        				
        		</form>
        		</div>					
        	</div>
        	</div>
        	<div class="clear"> </div>
    </body>
</html>