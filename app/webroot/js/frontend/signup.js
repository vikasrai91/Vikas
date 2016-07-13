$('#radio_business').click(function(){
	 $('.company-name').show();
});
$('#radio_personal').click(function(){
	 $('.company-name').hide();
});
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
                remote:{ url: "/users/uniqueMail", type : "post" }
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
                remote:{ url: "/users/uniqueMail", type : "post" }
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
					url: "/users/carrier_registration", 
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
					url: "/users/carrier_registration", 
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
					url: "/users/carrier_registration", 
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
					url: "/users/carrier_registration", 
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

$.validator.addMethod("loginRegex", function(value, element) {
        return this.optional(element) || /^[a-z0-9\-]+$/i.test(value);
    }, "Username must contain only letters, numbers, or dashes.");

    $("#carrier_form5").validate({

        rules: {
            "data[User][username]": {
            	required:true,
            	loginRegex:true,
            	remote:{ url: "/users/uniqueUsername", type : "post" }
            },
            "data[User][password]": {
            	required:true,
            	minlength:6
            },
        },
        
        // Specify the validation error messages
        messages: {

            "data[User][username]": {
            	required:"Username is required.",
            	loginRegex:"Please enter letters and numbers only",
            	remote: "That username is already taken, please use another one."
            },
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

