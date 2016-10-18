{include file="header.php"}

{config_load file="base.conf"}
<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <div class="container">
      <div class="row">
          <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
            <br>
            <p class=" text-info">{$profile['time']}</p>
          </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Profile</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" {if $profile['icon'] eq ''}
                    src="{#IMAGE#}usericon.png"
                {else}
                    src="{$profile['icon']}"
                {/if} class="img-circle img-responsive"> </div>
               
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Frist name:</td>
                        <td>{$profile['first_name']}</td>
                      </tr>
                      <tr>
                        <td>Last name:</td>
                        <td>{$profile['last_name']}</td>
                      </tr>                        
                      <tr>
                        <td>Email</td>
                        <td>{$profile['email']}</a></td>
                      </tr>                     
                    </tbody>
                  </table>
                  
                  <a href="{#CONTROL#}logout.php" class="btn btn-info" onclick="signOut();">
                    <span class="glyphicon glyphicon-off"></span>Sign out
                  </a>
                  <script>

                    function onLoad() {
                      gapi.load('auth2', function() {
                        gapi.auth2.init();
                      });
                    }
                    
                    function signOut() {
                      var auth2 = gapi.auth2.getAuthInstance();
                      auth2.signOut().then(function () {
                        console.log('User signed out.');
                      });
                    }
                  </script>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
 {include file="footer.php"}