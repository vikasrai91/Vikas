$(function() {

    $("#UserLoginForm").validate({

        rules: {
            "data[User][username]": {
            	required:true,
            },
            "data[User][password]": {
            	required:true,
            },
        },
        
        submitHandler: function(form) {
            form.submit();
            
        }
    });

  });

window.fbAsyncInit = function() {
 //Initiallize the facebook using the facebook javascript sdk
    FB.init({ 
        appId:'531914513686414', // App ID 
        cookie:true, // enable cookies to allow the server to access the session
        status:true, // check login status
        xfbml:true, // parse XFBML
        oauth : true //enable Oauth 
    });
  };
  //Read the baseurl from the config.php file
  (function(d){
          var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
          if (d.getElementById(id)) {return;}
          js = d.createElement('script'); js.id = id; js.async = true;
          js.src = "//connect.facebook.net/en_US/all.js";
          ref.parentNode.insertBefore(js, ref);
        }(document));
//Onclick for fb login
    function checkLoginState(user_type){
        FB.login(function(response) {
        if (response.authResponse) {
                 FB.api('/me?fields=first_name,last_name,email,picture', function(response) {
                   if(response.id != '' && response.id != null){
                        console.log(response);
                        $.ajax({
                            url:'/users/facebookLogin/'+user_type,
                            type:'POST',
                            data:JSON.stringify(response),
                            contentType: "application/json; charset=utf-8",
                            traditional: true,
                            success:function(res_data){
                                   if(res_data != '' && res_data != null){
                                    var get_data = JSON.parse(res_data);
                                    if(get_data.order){
                                        window.location.href = "/ships/listingRequest/";
                                    }
                                    else if(get_data.already == 1){
                                        if(get_data.user_type == 1){
                                        window.location.href = "/";
                                        }else{
                                        window.location.href = "/";
                                        }
                                    }else if(get_data.already == 0){
                                        window.location.href = "/";
                                    }
                                }
                            }
                        });
                   }
                 });
                } else {
                 console.log('User cancelled login or did not fully authorize.');
                }
        }, {scope: 'email,user_likes'});
    }