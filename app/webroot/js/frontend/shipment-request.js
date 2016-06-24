                $(document).on('change', '.numberofitems', function() {

               $("#item-info").find('.item-information-box-hide').remove();
               var index = 1;

               for (var i = 1; i < this.value; i++) {
                 
                  $('#info-hide').children(".item-information-box-hide").clone().appendTo("#item-info").attr("id","item_info_" + index);
                  $('#item-info').children('div.item-information-box-hide').last().find('.item-info-heading').html("Item " + (index+1) + " Informatioin");
                  //$('#item_info_'+index+' input[type="text"]').val(index);
              $('#item_info_'+index+' input').each(function(){
                   //var class_name = $(this).closest('div').parent().attr('class').split(' ')[1];
                   //if(class_name == 'Length'){ $(this).attr("name",index); }
                   // console.log(class_name);
                   var element_name = $(this).attr( "name" );
                   var change_name = element_name.replace("[item_infomation][0]", "[item_infomation]["+index+"]")
                   $(this).attr("name",change_name);
                   //console.log(element_name);
                   //console.log(change_name);
              });
              $('#item_info_'+index+' select').each(function(){
                   var element_name = $(this).attr( "name" );
                   var change_name = element_name.replace("[item_infomation][0]", "[item_infomation]["+index+"]")
                   $(this).attr("name",change_name);
                   //console.log(element_name);
                   //console.log(change_name);
              });
              $('#item_info_'+index+' textarea').each(function(){
                   var element_name = $(this).attr( "name" );
                   var change_name = element_name.replace("[item_infomation][0]", "[item_infomation]["+index+"]")
                   $(this).attr("name",change_name);
                   //console.log(element_name);
                   //console.log(change_name);
              });
                  index++;
               };
          })

         $(document).on('change', '.metric', function() {
                  $(".imperial-attr").attr("placeholder", "m.");
                  $(".weight").attr("placeholder", "kg");
                  $(".imperial-attr-next").attr("placeholder", "cm.");

               if (this.value == 1) {
                  $(".imperial-attr").attr("placeholder", "ft.");
                  $(".weight").attr("placeholder", "lbs");
                  $(".imperial-attr-next").attr("placeholder", "in.");
               }
          });   

          $(document).on('change', '.found-select', function() {
                 $(this).parents(".form-group").next().show();
                 $('#online_yes').attr("checked","checked");
          });

          $('#online_yes').click(function() {
                 $('.url-input').show();
          });
          $('#online_no').click(function() {
                 $('.url-input').hide();
          });
          $(document).on('keyup', '.imperial-attr', function() {
              key = window.event.keyCode;
              if(key < 57 && key > 48){
                alert('true');
              }
              else if(key < 105 && key > 96){
                alert('true');
              }
              else{
                alert('false');
              }
          });
          $(document).on('keyup', '.imperial-attr-next', function() {
              key = window.event.keyCode;
              if(key < 57 && key > 48){
                alert('true');
              }
              else if(key < 105 && key > 96){
                alert('true');
              }
              else{
                alert('false');
              }
          });
          $('#UserAccountType').change(function(){
            if(this.value == 2){
              $('.company_name').show();
            }else{
              $('.company_name').hide();
            }
            
          });


//google api
          function init() {
                        var input = document.getElementById('ShipmentPickupLocation');
                        var autocomplete = new google.maps.places.Autocomplete(input);
                      }

                      google.maps.event.addDomListener(window, 'load', init);
          $(function(){
              var val = $('#address').val();
              if(val == '' || val == null){
              $('#gen_latlong').prop('disabled', true);

             }
             else{
              $('#gen_latlong').removeAttr('disabled');

             }

          });
          $('.datepicker').datepicker({
              format: 'mm/dd/yyyy',
              startDate: '+1d'
          });

          // $('#ShipmentPickupLocation').blur(function(e){
          //   $('.current_location').hide();
          // });
          $('#ShipmentPickupLocation').click(function(e){
            $('.current_location').toggleClass('hide');
          });
          

          $('.current_location').click(function(){
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } 
          });


        function showPosition(position){
              var address = address;
                $.ajax({
                  url:"http://maps.googleapis.com/maps/api/geocode/json?latlng=" + position.coords.latitude +
            "," + position.coords.longitude + "&sensor=true",
                  type: "POST",
                  success:function(res){
                        ddata = JSON.parse(JSON.stringify(res));
                        $('#ShipmentPickupLocation').val(ddata.results[0].formatted_address);
                        $('.current_location').toggleClass('hide');
                  }
            });
            }

          $('#ShipmentDeliverOnType').change(function(){
              var data_value = $(this).val();
              if(data_value == 'Between'){ $('.between_date').show(); }
              else{ $('.between_date').hide(); }
          });

      $(function () {
        $('#shipment_form1').on('submit', function (e) {
          var get_element = $('.item-information-box-hide input:text').prop('name');
          var ShipmentNoOfItems = $("#ShipmentNoOfItems").val();
          //alert("ShipmentNoOfItems"+ShipmentNoOfItems);
          var rep_number = get_element.replace('data[Shipment][item_infomation][', '');
          var rep_number = rep_number.replace('][online_url]', '');
          var flag = 1;
          var error_count = 1;
          $('.errors').remove();
          for(var i = 0;ShipmentNoOfItems >= i; i++){
            var ii = i+1;
            $('#item_info_'+i+' input').each(function(){
                   var element_name = $(this).attr( "name" );
                   var check_val = $("input[name='" + element_name + "']").val();
                   //debugger;
                   var element_id = $(this).attr( "id" );
                   //alert(element_id);
                   
          
                   if(check_val == ''){
                        if(element_id != undefined){
                        if(element_id.match(/ShipmentItemInfomation0/g) == 'ShipmentItemInfomation0'){
                        var rep_id = element_id.replace('ShipmentItemInfomation0', '');
                        //alert(rep_id);
                        var rep_id = rep_id.replace('0', '');
                        //alert(rep_id);
                      }
                       }
                    $(".all-error").show();
                    var measure_type = $(this).attr( "placeholder" );

                    if(measure_type == 'ft.'){
                      $(".all-error").append('<div class="errors">* Please enter a '+rep_id+' for Furniture '+ii+' (ft and/or in).<div>');
                    }
                    else if(measure_type == 'lbs'){
                      $(".all-error").append('<div class="errors">* Please enter a '+rep_id+' for Furniture '+ii+' (lb).<div>');
                    }
                    else if(measure_type == 'm.'){
                      $(".all-error").append('<div class="errors">* Please enter a '+rep_id+' for Furniture '+ii+' (m).<div>');
                    }
                    else if(measure_type == 'kg'){
                      $(".all-error").append('<div class="errors">* Please enter a '+rep_id+' for Furniture '+ii+' (kg).<div>');
                    }
                    flag = 0;
                    error_count++;
                 }
                 else
                 {
                  $(".all-error").css("display", "none");
                  //$(".all-error").hide();
                 }
              });
          }
          if(flag == 0){
            $('body').animate({scrollTop : 0},800);
            return false;
          }
          var data1 = $('#shipment_form1').serialize();
              $.ajax({
            url: "/shipthestuff/ships/shipmentRequest", 
            type: "POST",             
            data: data1+'&form=1',       
          success: function(r_data)   
            {
              console.log(r_data);
              $('#pickup_button').click();
              
            }
          });
              return false;
        });
        


        $("#shipment_form2").validate({

        rules: {
            "data[Shipment][pickup_location]": "required",
            "data[Shipment][pickup_date]": "required",
            "data[Shipment][deliver_date]": "required"
        },
        
        submitHandler: function(form) {
            //form.submit();
            var data1 = $('#shipment_form1').serialize();
              $.ajax({
            url: "/shipthestuff/ships/shipmentRequest", 
            type: "POST",             
            data: data1+'&form=1',       
          success: function(r_data)   
            {
              console.log(r_data);
              $('#listing_option').click();
              
            }
          });
        }
    });



        $("#UserSignupForm").validate({

        rules: {
            "data[UserDetail][f_name]": "required",
            "data[UserDetail][l_name]": "required",
            "data[User][email]": {
                required: true,
                email: true,
                remote:{ url: "/shipthestuff/users/uniqueMail", type : "post" }
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
            //form.submit();
            var data = $('#UserSignupForm').serialize();
            $.ajax({
              url: "/shipthestuff/users/signup", 
              type: "POST",             
              data: data,       
            success: function(r_data)   
            { 
              console.log(r_data);

            }
            });
        }
    });
      });
