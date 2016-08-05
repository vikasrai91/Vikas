$(function () {
	 $("#ShipmentListingRequestForm").validate({

        rules: {
            "data[Shipment][price]": {
            	required:true,
            	number:true
            }
        },
       
        submitHandler: function(form) {
          form.submit();
          
        }
    });
 });