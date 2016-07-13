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
