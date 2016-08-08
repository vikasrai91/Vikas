$('#radio_business').click(function(){
	 $('.company-name').show();
});
$('#radio_personal').click(function(){
	 $('.company-name').hide();
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
                        if(user_type == 3){
                            $('#UserDetailFName1').val(response.first_name);
                            $('#UserDetailFName1').attr('type','hidden');
                            $('#UserDetailLName1').val(response.last_name);
                            $('#UserDetailLName1').attr('type','hidden');
                            $('#UserEmail1').val(response.email);
                            $('#UserEmail1').attr('type','hidden');
                            $('#facebookbutton1').hide();
                            $('.ddivider').hide();
                            $('#UserFacebookId').val(response.id);
                            $('#UserDetailProfilePicture').val(response.picture.data.url);
                            $('#carrier_form5').attr('action', '/users/facebookLogin/2');
                        }
                        $.ajax({
                            url: BASE_URL + '/users/facebookLogin/'+user_type,
                            type:'POST',
                            data:JSON.stringify(response),
                            contentType: "application/json; charset=utf-8",
                            traditional: true,
                            success:function(res_data){
                                //console.log(res_data);
                                if(res_data != '' && res_data != null){
                                    var get_data = JSON.parse(res_data);
                                    if(get_data.order){
                                        window.location.href = BASE_URL + "/ships/listingRequest/";
                                    }
                                    else if(get_data.already == 1){
                                        if(get_data.user_type == 1){
                                        window.location.href = BASE_URL;
                                        }else{
                                        window.location.href = BASE_URL;
                                        }
                                    }else if(get_data.already == 0){
                                        window.location.href = BASE_URL;
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

$(document).on('change','.main-checkbox',function() {
         $('.row-checkbox').prop('checked',false);
         $('.del-button').addClass('hide');
         if ($(this).is(':checked')) {
            $('.del-button').removeClass('hide');
            $('.row-checkbox').prop('checked',true);
         }
         });
         
         $(document).on('change','.row-checkbox',function() {
         if (!$(this).is(':checked')) {
            $('.main-checkbox').prop('checked',false);
         }
         checkMainCheckBoxChecked();
         });
         
         var checkMainCheckBoxChecked = function() {
         var flag = 1;
         $('.row-checkbox').each(function(){
            if (!$(this).is(':checked')) {
                flag = 0;
                return false;
            }
         });
         if (flag == 1) {
            $('.main-checkbox').prop('checked',true);
         }
         
         }
$(function() {
    $("#UserSignupForm").validate({

        rules: {
            "data[UserDetail][f_name]": "required",
            "data[UserDetail][l_name]": "required",
            "data[User][email]": {
                required: true,
                email: true,
                remote:{ url: BASE_URL + "/users/uniqueMail", type : "post" }
            },
            "data[User][password]": {
                required: true,
                minlength: 6
            },
            "data[UserDetail][company_name]": "required"
        },
        
        // Specify the validation error messages
        messages: {
            "data[UserDetail][f_name]": "Please enter your first name.",
            "data[UserDetail][l_name]": "Please enter your last name.",
            "data[User][password]": {
                required: "Passwords must be at least 6 characters.",
                minlength: "Passwords must be at least 6 characters."
            },
            "data[User][email]": {
            	required:"Please enter a valid email address.",
            	email:"Please enter a valid email address.",
            	remote:"That email address is already taken, please use another one."
            },
            "data[UserDetail][company_name]": "Enter your company name"
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

     $("#carrier_form1").validate({

        rules: {
            "data[UserDetail][f_name]": "required",
            "data[UserDetail][l_name]": "required",
            "data[User][email]": {
                required: true,
                email: true,
                remote:{ url: BASE_URL + "/users/uniqueMail", type : "post" }
            },
            "data[UserDetail][phone_number]": {
                required: true,
                minlength: 6,
                maxlength:15,
                number:true
            }
        },
        
        // Specify the validation error messages
        messages: {
            "data[UserDetail][f_name]": "Please enter your first name.",
            "data[UserDetail][l_name]": "Please enter your last name.",
            "data[UserDetail][phone_number]": {
                required: "Please enter mobile phone.",
                minlength: "Please enter valid mobile phone.",
                maxlength: "Please enter valid mobile phone.",
                number: "Please enter valid mobile phone."
            },
            "data[User][email]": {
            	required:"Please enter a valid email address.",
            	email:"Please enter a valid email address.",
            	remote:"That email address is already taken, please use another one."
            }
        },
        
        submitHandler: function(form) {
            //form.submit();
            var data = $('#carrier_form1').serialize();
            //alert(data);
            $.ajax({
					url: BASE_URL + "/users/carrierRegistration", 
					type: "POST",             
					data: data+'&form=1',       
				success: function(r_data)   
				{
					console.log(r_data);
					$('.step-1').hide();
					$('.tell-us').show();
				}
				});
        }
    });

     $("#carrier_form2").validate({

        rules: {
            "data[UserDetail][company_name]": "required",
            "data[UserDetail][street_address]": "required",
            "data[UserDetail][city]": "required",
            "data[UserDetail][pincode]": "required",
            "data[UserDetail][country]": "required"
        },
        
        // Specify the validation error messages
        messages: {

            "data[UserDetail][company_name]": "A company name is required.",
            "data[UserDetail][street_address]": "Enter your company's street address.",
            "data[UserDetail][pincode]": "A pincode is required",
            "data[UserDetail][city]": "Please enter your company's city.",
            "data[UserDetail][country]": "Country is required."
        },
        
        submitHandler: function(form) {
            //form.submit();
            var data = $('#carrier_form2').serialize();
            //alert(data);

            $.ajax({
					url: BASE_URL + "/users/carrierRegistration", 
					type: "POST",             
					data: data+'&form=2',       
				success: function(r_data)   
				{	
					console.log(r_data);
					 $('.tell-us').hide();
					 $('.tell-us2').show();
				}
				});
        }
    });

    $("#carrier_form3").validate({

        rules: {
            "data[UserDetail][equip_id][]": "required"
        },
        
        // Specify the validation error messages
        messages: {

            "data[UserDetail][equip_id][]": "Please select an equipment type."
        },
         errorElement : 'div',
    	 errorLabelContainer: '.errorTxt',
        submitHandler: function(form) {
            //form.submit();
            var data = $('#carrier_form3').serialize();
            $.ajax({
					url: BASE_URL + "/users/carrierRegistration", 
					type: "POST",             
					data: data+'&form=3',       
				success: function(r_data)   
				{	
					console.log(r_data);
					  $('.tell-us2').hide();
					  $('.tell-us3').show();
				}
				});
        }
    });

    $("#carrier_form4").validate({

        rules: {
            "data[UserDetail][transport_id][]": "required"
        },
        
        // Specify the validation error messages
        messages: {

            "data[UserDetail][transport_id][]": "Please select a category."
        },
         errorElement : 'div',
    	 errorLabelContainer: '.errorTxt',
        submitHandler: function(form) {
            //form.submit();
            var data = $('#carrier_form4').serialize();
            $.ajax({
					url: BASE_URL + "/users/carrierRegistration", 
					type: "POST",             
					data: data+'&form=4',       
				success: function(r_data)   
				{	
					console.log(r_data);
					  $('.tell-us3').hide();
					  $('.tell-us4').show();
				}
				});
        }
    });



    $("#carrier_form5").validate({

        rules: {
            "data[User][password]": {
            	required:true,
            	minlength:6
            },
        },
        
        // Specify the validation error messages
        messages: {
            "data[User][password]": {
            	required:"Passwords must be at least 6 characters.",
            	minlength:"Passwords must be at least 6 characters."
            },
        },
        submitHandler: function(form) {
            form.submit();  
        }
    });

  });

