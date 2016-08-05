$(function() {

    $("#AdminIndexForm").validate({

        rules: {
            "data[Admin][name]": {
            	required:true,
            },
            "data[Admin][password]": {
            	required:true,
            },
        },
        
        submitHandler: function(form) {
            form.submit();
            
        }
    });

  });
