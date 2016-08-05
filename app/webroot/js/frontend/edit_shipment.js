                $(document).on('change', '.numberofitems', function() {

               $("#item-info").find('.item-information-box-hide').remove();
               var index = 1;
               var check_first = $("#online_no").is(':checked');
               var check_second = $("#online_yes").is(':checked');
               var check_imperial = $("#imperial_rad").is(':checked');
               var check_metric = $("#metric_rad").is(':checked');
               
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
              $('#item_info_'+index+' checkbox').each(function(){
                   var element_name = $(this).attr( "name" );
                   var change_name = element_name.replace("[item_infomation][0]", "[item_infomation]["+index+"]")
                   $(this).attr("name",change_name);

              });
                  index++;
               };
               if(check_first){ $("#online_no").click(); }
               if(check_second){ $("#online_yes").click(); }
               if(check_imperial){ $("#imperial_rad").click(); }
               if(check_metric){ $("#metric_rad").click(); }

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
                  console.log($(this).parents('.form-group').prev().find(".is_online").click());
          });


          $(document).on('change', '.is_online', function(){
              if(this.value == 1){
               $(this).parents('.form-group').next().next().show();
              }else{
                $(this).parents('.form-group').next().next().hide();
              }
          });




          $(document).on('keypress', '.imperial-attr', function(key) {
              //key = window.event.keyCode;
              //console.log(key.charCode);
              if(key.charCode < 57 && key.charCode > 47){
                return true;
              }
              else{
                return false;
              }
          });
          $(document).on('keypress', '.imperial-attr-next', function(key) {
          
              if(key.charCode < 57 && key.charCode > 47){
                return true;
              }
              else{
                return false;
              }
          });
          $(document).on('keypress', '.weight', function(key) {
              if(key.charCode < 57 && key.charCode > 48){
                return true;
              }
              else{
                return false;
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
                        var input = document.getElementById('PickupDeliveryPickupLocation');
                        var autocomplete = new google.maps.places.Autocomplete(input);
                        var input2 = document.getElementById('PickupDeliveryDeliveryLocation');
                        var autocomplete = new google.maps.places.Autocomplete(input2);
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


          function backButton(){
            $("#shipinfo_button").click();
            return false;
          }

        function showPosition(position){
              var address = address;
                $.ajax({
                  url:"http://maps.googleapis.com/maps/api/geocode/json?latlng=" + position.coords.latitude +
            "," + position.coords.longitude + "&sensor=true",
                  type: "POST",
                  success:function(res){
                        ddata = JSON.parse(JSON.stringify(res));
                        $('#PickupDeliveryPickupLocation').val(ddata.results[0].formatted_address);
                        //$('.current_location').toggleClass('hide');
                  }
            });
            }

          $('#PickupDeliveryDeliverOnType').change(function(){
              var data_value = $(this).val();
              if(data_value == 'Between'){ $('.between_date').show(); }
              else{ $('.between_date').hide(); }
          });
//Upload image with ajax
          $('#ShipmentChoosePicture').change(function(){
            result = this.files[0];
            if(result == '' || result == null || result == undefined){
              alert(result);
              return false;
            }
            var formData = new FormData($('#shipment_form1')[0]);
          //formData.append('file', $('input[type=file]')[0].files[0]);
              $.ajax({
                    url:'/ships/uploadImage',
                    data: formData,
                    type: 'post',
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        $('body').append('<div class="modal-backdrop fade in" ></div>');
                        $('#loader').show();
                    },
                  complete: function(){
                        $('.modal-backdrop').remove();
                        $('#loader').hide();
                    },
                    success: function(responseData){
                        var imgData = $.parseJSON(responseData);
                        if(imgData.success){
                          var firstValue = $('#ShipmentUploadPicture').val();
                          if(firstValue == '' || firstValue == null){
                            $('#ShipmentUploadPicture').val(imgData.name);
                            
                          }
                          else{ $('#ShipmentUploadPicture').val(firstValue+','+imgData.name); }
                          // $('.show_image').append('<img style="width:100px;padding:5px;" src="/img/uploads/'+imgData.name+'">');
                          var nameofFile = "'"+imgData.name+"'";
                          var elementId = imgData.name.split('_');
                          $('.show_image').append('<div style="text-align:center;" class="col-md-3" id="'+elementId[0]+'"><img style="width:100px;padding:5px;" src="/img/uploads/'+imgData.name+'"><div onclick="deleteFile('+nameofFile+', '+elementId[0]+');" class="deleteFile" >Delete</div></div>');
                        }else{
                          alert(imgData.msg);
                        }
                    }
              });
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
                      $(".all-error").show();
                       }
                    
                    var measure_type = $(this).attr( "placeholder" );

                    if(measure_type == 'ft.'){
                      $(".all-error").append('<div class="errors">* Please enter a '+rep_id+' for Furniture '+ii+' (ft and/or in).<div>');
                    flag = 0;}
                    else if(measure_type == 'lbs'){
                      $(".all-error").append('<div class="errors">* Please enter a '+rep_id+' for Furniture '+ii+' (lb).<div>');
                    flag = 0;}
                    else if(measure_type == 'm.'){
                      $(".all-error").append('<div class="errors">* Please enter a '+rep_id+' for Furniture '+ii+' (m).<div>');
                    flag = 0;
                  }
                    else if(measure_type == 'kg'){
                      $(".all-error").append('<div class="errors">* Please enter a '+rep_id+' for Furniture '+ii+' (kg).<div>');
                    flag = 0;
                  }else if(flag == 1){
                    $(".all-error").hide();
                  }
                    
                    error_count++;
                 }
                 
              });
          }
          if(flag == 0){
            $('body').animate({scrollTop : 0},800);
            return false;
          }
          var data1 = $('#shipment_form1').serialize();
              $.ajax({
            url: "/ships/shipmentRequest", 
            type: "POST",             
            data: data1+'&form=1',
          beforeSend: function(){
                $('body').append('<div class="modal-backdrop fade in" ></div>');
                $('#loader').show();
            },
          complete: function(){
                $('.modal-backdrop').remove();
                $('#loader').hide();
            },       
          success: function(r_data)   
            {
              console.log(r_data);
              $('#pickup_button').click();
              
            }
          });
              return false;
        });
        
        $.validator.addMethod("greaterStart", function (value, element, params) {
              return this.optional(element) || new Date(value) >= new Date($(params).val());
          },'Must be greater than pickup date.');

        $("#shipment_form2").validate({

        rules: {
            "data[PickupDelivery][pickup_location]": "required",
            "data[PickupDelivery][pickup_date]": "required",
            "data[PickupDelivery][deliver_date]": {
                required: true,
                greaterStart: "#PickupDeliveryPickupDate"
              },
            "data[PickupDelivery][deliver_date2]": {
                required: true,
                greaterStart: "#PickupDeliveryDeliverDate"
              },
            "data[PickupDelivery][delivery_location]": "required"
        },

        messages: {

            "data[PickupDelivery][deliver_date2]": {
                greaterStart: "Must be greater than first date."
            }
        },
        
        submitHandler: function(form) {
            //form.submit();
            var data1 = $('#shipment_form2').serialize();
              $.ajax({
            url: "/ships/shipmentRequest", 
            type: "POST",             
            data: data1+'&form=2', 
            beforeSend: function(){
                $('body').append('<div class="modal-backdrop fade in" ></div>');
                $('#loader').show();
            },
          complete: function(){
                $('.modal-backdrop').remove();
                $('#loader').hide();
            },       
          success: function(r_data)   
            {
              if(r_data == 'true'){
                window.location.href = "/ships/listingRequest/";
              }else{
              $('#listing_option').click();
              }
              
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
      });

          function deleteFile(fileName, id){

              $.ajax({
                url: "/ships/deleteuploadFile", 
                type: "POST",             
                data: 'fileName='+fileName,        
                success: function(r_data)   
                 {
                    if(r_data == 1){
                      var getValue = $('#ShipmentUploadPicture').val();
                        //alert(getValue);
                      var splitValue = getValue.split(',');
                      splitValue.splice( $.inArray(fileName,splitValue) ,1 );
                      //alert(splitValue);
                      $('#ShipmentUploadPicture').val(splitValue);
                      $('#'+id).hide();
                    }  
                }
              });
          }