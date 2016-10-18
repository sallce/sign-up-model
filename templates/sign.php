
{include file="header.php"}
{config_load file="base.conf"}

<script>
    $( document ).ready(function() {
        if({$signup==1}){
            $('#loginbox').hide(); $('#signupbox').show()
        }
    });
</script>

<script>
  function onSignIn(googleUser) {
    // Useful data for your client-side scripts:
    var profile = googleUser.getBasicProfile();
    /*console.log("ID: " + profile.getId()); 
    console.log('Full Name: ' + profile.getName());
    console.log('Given Name: ' + profile.getGivenName());
    console.log('Family Name: ' + profile.getFamilyName());
    console.log("Image URL: " + profile.getImageUrl());
    console.log("Email: " + profile.getEmail());

    //The ID token you need to pass to your backend:
    var id_token = googleUser.getAuthResponse().id_token;*/
    $( "#google_first_name" ).val(profile.getGivenName());
    $( "#google_last_name" ).val(profile.getFamilyName());
    $( "#google_email" ).val(profile.getEmail());
    $( "#google_icon" ).val(profile.getImageUrl());
    document.getElementById("target").submit();
  };
</script>

<form style="display:none;" id="target" action="{#CONTROL#}google.php" method='post'>
  <input id='google_first_name' type="text" name='first_name'>
  <input id="google_last_name" type="text" name='last_name'>
  <input id="google_email" type="text" name='email'>
  <input id="google_icon" type="text" name='google_icon'>
</form>

<div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                    </div> 
                    {if $error != ''}
                        <div class="alert alert-danger">
                          {$error} 
                        </div>
                    {/if}     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="post" action="{#CONTROL#}login.php">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="email" class="form-control" placeholder="email" name="username" data-error="Bruh, that email address is invalid" required>
                                        <div class="help-block with-errors"></div>                           
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>
                                    </div>                            

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <button name="sub" type="submit" class="btn btn-success" value='1'><i class="icon-hand-right"></i>
                                        &nbsp Sign in</button> 
                                         &nbsp or 
                                        <a id="btn-fblogin" class="g-signin2 btn" data-onsuccess="onSignIn" data-theme="dark"></a>
                                        
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
        <div id="signupbox" style="display: none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                        </div>
                        {if $error1 != ''}
                        <div class="alert alert-danger">
                          {$error1} 
                        </div>
                        {/if} 
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form" method="post" action="{#CONTROL#}signup.php">
                                
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input id='email' type="email" class="form-control" name="email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input id="givenname" type="text" class="form-control" name="firstname" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input id="familyname" type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password"  class="form-control" id="inputPassword" name="password" placeholder="Password"  required>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label" >Confrim Password</label>
                                    <div class="col-md-9">
                                       <input type="password" id='retyped' class="form-control" placeholder="Confirm"  required>
                                       <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" name="sub" type="submit" class="btn btn-info" value='1'><i class="icon-hand-right"></i>
                                        &nbsp Sign Up</button>
                                        
                                    </div>
                                </div>
                                
                            </form>

                            <script>
                                $('#signupform').on('submit',function(){
                                   var value = $('#inputPassword').val()
                                   if($('#inputPassword').val()!=$('#retyped').val()){
                                       alert('Password not matches');
                                       return false;
                                   }else if( value.length < 6 ){
                                       alert('Password length should be longer than 6');
                                       return false;
                                   }
                                   return true;
                                });
                            </script>
    
                         </div>
                    </div>

               
               
                
         </div> 
    </div>

{include file="footer.php"}