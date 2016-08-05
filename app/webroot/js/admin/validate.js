$(document).ready(function(){
	
	$(".disable").click(function(e){
			alert("The domain of this user is inactive");
			e.preventDefault();
		});
	$("#ContractAdminViewForm").submit(function(){
		var val = $("#ContractAdminstatus").val();
		if ( val != "None") {
			if ( confirm("Do you really mark the dispute as "+ val) ) {
			} else {
				return false;
			}
		}
	});

			$.validator.addMethod("letterssonly", function(value, element) {
			return this.optional(element) || /^[a-zA-Z\s]*$/.test(value);
			}, "Only alphabet characters are allowed."); 
			/* end here */

			/* code to check only letter and allow some special charcters*/
			$.validator.addMethod("letterssconly", function(value, element) {
			return this.optional(element) || /^[a-zA-Z\&\,\.\-\0-9\s]*$/.test(value);
			}, "Please enter valid value."); 
			/* end here */
		
	//setTimeout(function(){ $(".error-message").hide(); }, 3000);	
		

		
   $('#ServiceAdminAddForm, #ServiceAdminEditForm').validate({
	   	rules:{
			'data[Service][name]'	:	{
				required	:	true,				
			},
			'data[Service][status]'		:	{
				required	:	true,				
			}
		},
		messages:{
			'data[Service][name]'	:	{
				required	:	'Please enter service name.'
				
			},
			'data[Service][status]'		:	{
				required	:	'Please select service status.'				
			}
		}	   
	   
   });
		
	$("#UserAdminEditForm").validate({	
		rules:{
			'data[Userdetail][first_name]'	:	{
				required	:	true,
				letterssonly	:	true,
				minlength	:	2,
				maxlength	:	100
				
			},
			'data[Userdetail][last_name]'		:	{
				required	:	true,
				letterssonly	:	true,
				minlength	:	2,
				maxlength	:	100
				
			}
		},
		messages:{
			'data[Userdetail][first_name]'	:	{
				required	:	'Please enter first name.'
				
			},
			'data[Userdetail][last_name]'		:	{
				required	:	'Please enter last name.'
				
				
			}
		}
	});
	
	
	/* 
	 * @below block of code is used to validate admin login page
	 * @Error messages EMPTYUSERMESSAGE & EMPTYPASSWORDMESSAGE are defined in validationmessages.js file in app/webroot/js
	 * @common function removeSpaces is declared and defined in common_functions.js file in app/webroot/js
	*/
	$("#AdminLoginForm").validate({
			
		rules:{
			'data[Admin][username]'	:{
				required	:	true,
			},
			'data[Admin][password]'	:{
				required	: true,
				minlength	: 5
			}
		},
		messages:{
			'data[Admin][username]'	:{
				required	:	EMPTYUSERMESSAGE,
			},
			'data[Admin][password]'	:{
				required	:	EMPTYPASSWORDMESSAGE,
				minlength	:	PASSWORD5LENGTHMESSAGE
			}
		}
	});
	
	
	
	/* 
	 * @below block of code is used to validate change password page in admin panel
	 * @Error messages are defined in validationmessages.js file in app/webroot/js
	 * @common function removeSpaces is declared and defined in common_functions.js file in app/webroot/js
	*/
	$("#AdminChangepasswordForm").validate({
		
		rules		:{
					'data[Admin][currentpassword]'	:	{
						required	:	true
					},
					'data[Admin][newpassword]'		:	{
						required	:	true,
						minlength	:	6,
						maxlength	:	15
					},
					'data[Admin][confirmpassword]'	:	{
						required	:	true,
						equalTo		: 	"#AdminNewpassword"   
					}
		},
		messages	:{
					'data[Admin][currentpassword]'	:	{
						required	:	EMPTYOLDPASSWORD,
					},
					'data[Admin][newpassword]'		:	{
						required	:	EMPTYNEWPASSWORD,
						minlength	:	PASSWORD6LENGTHMESSAGE,
						maxlength	:	PASSWORDMAX15MESSAGE
					},
					'data[Admin][confirmpassword]'	:	{
						required	: 	EMPTYCONFIRMPASSWORD,
						equalTo		:	PASSWORDMISMATCHMESSAGE
					}
		}
	});
	/* end of block */

		$("#UserAdminAddstaffmemberForm").validate({
		
		rules:{
			'data[Userdetail][first_name]'	:	{
				required	:	true,
				letterssonly	:	true,
				minlength:2,
				maxlength: 100
			},
			'data[Userdetail][last_name]'		:	{
				required	:	true,
				letterssonly	:	true,
				minlength:2,
				maxlength: 100
				
			},
			'data[User][username]' : {
				required	: true,
				validEmail: true,
				remote		: {
					url: BASE_URL + "users/uniqueuser",
					type: "post"	
				}
		
			},
			'data[User][user_type]'		:	{
				required	:	true
				
			},
		},
		messages:{
			'data[Userdetail][first_name]'	:	{
				required	:	'Please enter first name',
			},
			'data[Userdetail][last_name]'		:	{
				required	:	'Please enter last name',
				
			},
			'data[User][username]' : {
				required	:	'Please enter email.',
				email		:	'Please enter valid email.',
				remote		:	'Email already exists'
			},
			'data[User][user_type]'		:	{
				required	:	'Please choose user type.',
				
			},
		}
	});
	/* 
	 * @below block of code is used to validate change password page in admin panel
	 * @Error messages are defined in validationmessages.js file in app/webroot/js
	 * @common function removeSpaces is declared and defined in common_functions.js file in app/webroot/js
	*/
	$("#IndustryAdminAddForm,#IndustryAdminEditForm").validate({
			rules	: {
				'data[Industry][heading]' : {
					required : true
				}
			},
			messages: {
				'data[Industry][heading]' : {
					required : "Please enter industry name"
				}
			}
	});
	
	$("#MediaoutletAdminAddForm,#MediaoutletAdminEditForm").validate({
			rules	: {
				'data[Mediaoutlet][heading]' : {
					required : true
				}
			},
			messages: {
				'data[Mediaoutlet][heading]' : {
					required : "Please enter heading"
				}
			}
	});
	/* end of block */
	
	/* 
	 * @below block of code is used to validate change password page in admin panel
	 * @Error messages are defined in validationmessages.js file in app/webroot/js
	 * @common function removeSpaces is declared and defined in common_functions.js file in app/webroot/js
	*/
	$("#AdminAddForm").validate({
		
		rules		:{
					'data[Admin][username]'	:	{
						required	:	true,
						email		:	true
					},
					'data[Admin][password]'		:	{
						required	:	true,
						minlength	:	5,
						maxlength	:	15
					},
					'data[Admin][domain]'		:	{
						required	:	true
					},
					'data[Admin][confirm password]': {
						required	:	true,
						equalTo		: 	"#AdminPassword"
					}
		},
		messages	:{
					'data[Admin][username]'	:	{
						required	:	EMPTYUSERMESSAGE,
						email		:	VALIDEMAILMESSAGE
					},
					'data[Admin][password]'		:	{
						required	:	EMPTYPASSWORDMESSAGE,
						minlength	:	PASSWORD5LENGTHMESSAGE,
						maxlength	:	PASSWORDMAX15MESSAGE
					},
					'data[Admin][domain]'	:	{
						required	: 	'Enter domain',
					},
					'data[Admin][confirm password]': {
						required	: 	EMPTYCONFIRMPASSWORD,
						equalTo		:	PASSWORDMISMATCHENTER
					}
		}
	});
	/* end of block */
	
	/* 
	 * @below block of code is used to validate change password page in admin panel
	 * @Error messages are defined in validationmessages.js file in app/webroot/js
	 * @common function removeSpaces is declared and defined in common_functions.js file in app/webroot/js
	*/
	$("#AdminEditForm").validate({
		
		rules		:{
					'data[Admin][username]'	:	{
						required	:	true,
						email		:	true
					},
					'data[Admin][domain]'		:	{
						required	:	true
					}
		},
		messages	:{
					'data[Admin][username]'	:	{
						required	:	EMPTYUSERMESSAGE,
						email		:	VALIDEMAILMESSAGE
					},
					'data[Admin][domain]'	:	{
						required	: 	'Enter domain',
					}
		}
	});
	/* end of block */
	
	
	
	/* 
	 * @below block of code is used to validate forgot password page in admin panel
	 * @Error messages are defined in validationmessages.js file in app/webroot/js
	 * @common function removeSpaces is declared and defined in common_functions.js file in app/webroot/js
	*/
	$("#AdminForgotpasswordForm").validate({
		rules:{
			'data[Admin][email]'	:{
				required	:	true,
				email		:	true
			}
		},
		messages:{
			'data[Admin][email]'	:{
				required	:	EMPTYEMAILMESSAGE,
				email		:	VALIDEMAILMESSAGE
			}
		}
	});
	
	/* end of block */
	
	/*below block of code is used to validate page form while adding and updating */
	/*$("#CmspageAdminAddForm,#CmspageAdminEditForm").validate({
		rules		:{
					'data[Cmspage][name]'		:	{
						required	:	true
					},
					'data[Cmspage][content]' 	:	{
						required: function getContent(textarea) {
							//return false;
						},
					},
					'data[Cmspage][metatitle]'	:	{
						required	:	true
					},
					'data[Cmspage][seourl]'	:	{
						required	:	true
					},
					'data[Cmspage][metadesc]'	:	{
						required	:	true
					},
					'data[Cmspage][metakeyword]'	:	{
						required	:	true
					}
		},
		messages	:{
					'data[Cmspage][name]'	:	{
						required	:	PAGETITLEERRMESSAGE
					},
					'data[Cmspage][content]' 	:	{
						required	:	'Please enter content of the page'
					},
					'data[Cmspage][metatitle]'	:	{
						required	:	PAGESEOTITLERRMESSAGE
					},
					'data[Cmspage][seourl]'	:	{
						required	:	PAGESEOURLERRMESSAGE
					},
					'data[Cmspage][metadesc]'	:	{
						required	:	PAGEMETADESCERRMESSAGE
					},
					'data[Cmspage][metakeyword]'	:	{
						required	:	PAGEMETAKEYERRMESSAGE
					}
		}
	});*/
	/* end here */
	
	
	
	/*below block of code is used to validate email template form while adding and updating */
	/*$("#CmsemailAdminAddForm,#CmsemailAdminEditForm").validate({
		
		rules		:{
					'data[Cmsemail][mailfrom]'		:	{
						required	: true,
						email		: true
					},
					'data[Cmsemail][mailcontent]'		:{
						required : function getContent(textarea){
							//return   : false,
						},
					},
					'data[Cmsemail][mailsubject]'	:	{
						required	:	true
					}					
		},
		messages	:{
					'data[Cmsemail][mailfrom]'		:	{
						required	:	EMPTYEMAILMESSAGE,
						email		:	VALIDEMAILMESSAGE
					},
					'data[Cmsemail][mailcontent]'		:{
						required	: 'Please enter mail content'
					},
					'data[Cmsemail][mailsubject]'		:	{
						required	:	EMPTYSUBJECTMESSAGE
					}					
		}
	});*/
	/* end here */
	
	/* for toggeling the left menus in admin panel */
	
	$(".loc").click(function(e){
		$(".hide").slideUp("slow");
		var val =removeSpaces($(this).next(".sublist-menu1").attr("style"));
		if(val == 'display:block;'){
			$(this).next(".sublist-menu1").slideUp("slow");
		} else if(val == '') {
			$(this).next(".sublist-menu1").slideUp("slow");
		} else {
			$(".sublist-menu1").slideUp("slow");
			$(this).next(".sublist-menu1").slideDown("slow");
		}
	});
	/*$(".loc1").click(function(e){
		$(".hide").slideUp("slow");
		var val =removeSpaces($(".sublist-menu1").attr("style"));
		if(val == 'display:block;'){
			$(".sublist-menu1").slideUp("slow");
		} else if(val == '') {
			$(".sublist-menu1").slideUp("slow");
		} else {
			$(".sublist-menu1").slideDown("slow");
		}
	});*/
	$(".admintoggel").click(function(){
		//alert("hello");
		$(".hide").slideUp("slow");
		var clas = $(this).parent("ul").attr("class");
		if(clas != 'sublist-menu1'){
			$(".sublist-menu1").slideUp("slow");
		}
		if ((removeSpaces($(this).next().attr("style"))) == 'display:none;') {
			($(this).next()).slideDown("slow");
		} else if ((removeSpaces($(this).next().attr("style"))) == 'display:block;'){
			($(this).next()).slideDown("slow");
		}
		
	});
	
	$(".hide").hide();
	$(".hide1").addClass("hide");
	
	
	/* end here */
	
	
	
	/*below block of code is used to validate country form while adding and updating */
	
	$("#CountryAdminAddForm,#CountryAdminEditForm").validate({
		
		rules		:{
					'data[Country][name]'		:	{
						required	:	true
					},
					'data[Country][code]'		:	{
						required	:	true
					}
		},
		messages	:{
					'data[Country][name]'		:	{
						required	:	COUNTRYERRMESSAGE
					},
					'data[Country][code]'		:	{
						required	:	COUNTRYCODMESSAGE
					}
		}
	});
	/* end here */
	
	
	/*below block of code is used to validate state form while adding and updating */
	$("#StateAdminAddForm,#StateAdminEditForm").validate({
		
		rules		:{
					'data[State][name]'		:	{
						required	:	true
					},
					'data[State][country_id]':	{
						required	: true
					},
					'data[State][code]':	{
						required	: true
					}
		},
		messages	:{
					'data[State][name]'		:	{
						required	:	STATEERRMESSAGE
					},
					'data[State][country_id]'		:	{
						required	:	STATECOUNTRYERRMESSAGE
					},
					'data[State][code]'		:	{
						required	:	STATECODEMESSAGE
					}
		}
	});
	/* end here */
		
	/*below block of code is used to validate state form while adding and updating */
	$("#CityAdminAddForm,#CityAdminEditForm").validate({
		
		rules		:{
					'data[City][name]'		:	{
						required	:	true
					},
					'data[City][state_id]'		:	{
						required	:	true
					},
					'data[City][code]'		:	{
						required	:	true
					}
		},
		messages	:{
					'data[City][name]'		:	{
						required	:	CITYERRMESSAGE
					},
					'data[City][state_id]'		:	{
						required	:	CITYSTATEMESSAGE
					},
					'data[City][code]'		:	{
						required	:	CITYCODMESSAGE
					}
		}
	});
	/* end here */
	
	/*below block of code is used to validate category form while adding and updating */
	$("#CategoryAdminAddForm,#CategoryAdminEditForm").validate({
		
		rules		:{
					'data[Category][name]'		:	{
						required	:	true
					}
		},
		messages	:{
					'data[Category][name]'		:	{
						required	:	CATEGORYERRMESSAGE
					}
		}
	});
	/* end here */
	
	
	/*below block of code is used to validate subcategory form while adding and updating */
	$("#SubcategoryAdminAddForm,#SubcategoryAdminAddForm").validate({
		
		rules		:{
					'data[Subcategory][name]'		:	{
						required	:	true
					}
		},
		messages	:{
					'data[Subcategory][name]'		:	{
						required	:	CATEGORYERRMESSAGE
					}
		}
	});
	/* end here */
	
	
	/*below block of code is used to validate subcategory form while adding and updating */
	$("#AttributeAdminAddForm,#AttributeAdminEditForm").validate({
		
		rules		:{
					'data[Attribute][subcategory_id]'		:	{
						required	:	true
					},
					'data[Attribute][name]'		:	{
						required	:	true
					}
		},
		messages	:{
					'data[Attribute][subcategory_id]'		:	{
						required	:	'Please add subcategory first.'
					},
					'data[Attribute][name]'		:	{
						required	:	'Please enter attribute.'
					}
		}
	});
	/* end here */
	
	
		/*to validate order refrence form for lab*/
	$("#TransactionAdminMarkPaidForm").validate({		
		rules		:{
					'data[Transaction][payment_reference]'		:	{
						required	:	true
					},
					'data[Transaction][payment_note]'		:	{
						required	:	true
					}
		},
		messages	:{
					'data[Transaction][payment_reference]'		:	{
						required	:	'Please enter payment reference.'
					},
					'data[Transaction][payment_note]'		:	{
						required	:	'Please enter payment notes.'
					}
		}
	});
	/* end here */
	
	
	
	$("#AccountAdminAddForm,#AccountAdminEditForm").validate({
		rules		:{
					'data[Account][domain]'		:	{
						required	:	true
					},
					'data[Account][company]'		:	{
						required	:	true
					},
					'data[Account][company_logo]'		:	{
						require		: false,
						accept		:	'jpeg|jpg|png|gif'
					}
		},
		messages	:{
					'data[Account][domain]'		:	{
						required	:	'Please enter domain'
					},
					'data[Account][company]'		:	{
						required	:	'Please enter company name'
					},
					'data[Account][company_logo]'		:	{
						accept		:	IMAGEVALIDMESSAGE
					}
		}
	});
	
	$("#PackageAdminAddForm,#PackageAdminEditForm").validate({
		rules		:{
					'data[Package][heading]'		:	{
						required	:	true
					},
					'data[Package][price]'		:	{
						required	:	true
					},
					'data[Package][days]'		:	{
						required	: true,
					}
		},
		messages	:{
					'data[Package][heading]'		:	{
						required	:	'Please enter heading'
					},
					'data[Package][price]'		:	{
						required	:	'Please enter price'
					},
					'data[Package][days]'		:	{
						required		:	'Please enter days'
					}
		}
	});
	
	/* below code is to perform  functionality */
	$("#checkall").click(function(){
		
		$(".chk").attr("checked",this.checked);
	});
	
	$(".chk").click(function(){
	
		if($(".chk").length == $(".chk:checked").length){
			
			$("#checkall").attr("checked","checked");
		}else{
			$("#checkall").removeAttr("checked");
		}
	});
	/* end here */
	
	var searchButton 	= '';
	
	$(".submitsearch").click(function() {
		
		searchButton = $(this).attr('attr');
		
	});
	
	$("#PackagePrice,#PackageDays").live("keypress",function(e){
		var AllowableCharacters='1234567890.';
		var k = document.all?parseInt(e.keyCode): parseInt(e.which);
		if (k!=13 && k!=8 && k!=0){
			if ((e.ctrlKey==false) && (e.altKey==false)) {
				return (AllowableCharacters.indexOf(String.fromCharCode(k))!=-1);
			} else {
				return true;
			}
		} else {
			return true;
		}
	});
	
	/* below code is to validate checkall functionality for every page on which we perform delete multiple or update multiple functionalioty*/
	$("#CmspageAdminIndexForm,#CmsemailAdminIndexForm,#CountryAdminIndexForm,#StateAdminIndexForm,#CityAdminIndexForm,#UserAdminIndexForm,#packageAdminIndexForm,#industriesAdminIndexForm,#IndustryAdminIndexForm,#MediaoutletAdminIndexForm,#PackageAdminIndexForm,#CampaignAdminIndexForm,#CategoryAdminIndexForm,#LanguageAdminIndexForm, #CourseAdminIndexForm,#BackupdbAdminIndexForm").submit(function(){ if(searchButton == ''){ return validatemultipleaction(); }else{ $(".chk").removeAttr("checked"); return true; } });
	/* end here */
	
	
	
	//$("#btn").click($('body').addClass('folded'));
	
	/* to change country state city */
	
	$("#AdmindetailCountry,#AdmindetailState").live("change",function(){
		var option = $(this).attr("id");
		option = (option == 'AdmindetailCountry')?'Country':'State';
		$.ajax({
			url: $("#link").attr("href"),
			type: 'post',
			data  : "id="+$(this).val()+"&opt="+option, 
			success: function(data) {
				var cont = (option == 'Country')?'AdmindetailState':'AdmindetailCity';
				var str = (option == 'Country')?'Select Your State':'Select Your City';
				if(cont == 'AdmindetailState'){
					
				}else{
					
				}
				$("#"+cont).children("option").each(function(){
					if($(this).val() != ''){
						$(this).remove();
					}
				});
				$("#"+cont).append(data);
			},
			error : function(err, req) {
				alert("Your browser broke!");
			}
		});
	});
	
	$("#AccountCountry,#AccountState").live("change",function(){
		var option = $(this).attr("id");
		option = (option == 'AccountCountry')?'Country':'State';
		$.ajax({
			url: $("#link").attr("href"),
			type: 'post',
			data  : "id="+$(this).val()+"&opt="+option, 
			success: function(data) {
				var cont = (option == 'Country')?'AccountState':'AccountCity';
				var str = (option == 'Country')?'Select Your State':'Select Your City';
				if(cont == 'AdmindetailState'){
					
				}else{
					
				}
				$("#"+cont).children("option").each(function(){
					//if($(this).val() != ''){
						$(this).remove();
					//}
				});
				$("#"+cont).append(data);
			},
			error : function(err, req) {
				alert("Your browser broke!");
			}
		});
	});
	
	/* end here */
	
	$("#ProductCategoryId").live("change",function(){
		var option = $(this).attr("id");
		option = 'category';
		$.ajax({
			url: $("#link").attr("href"),
			type: 'post',
			data  : "id="+$(this).val()+"&opt="+option, 
			success: function(data) {
				var cont = "ProductSubcategoryId";
				var str = (option == 'Country')?'Select Your State':'Select Your City';
				if(cont == 'AdmindetailState'){
					
				}else{
					
				}
				$("#"+cont).children("option").each(function(){
					if($(this).val() != ''){
						$(this).remove();
					}
				});
				$("#"+cont).append(data);
			},
			error : function(err, req) {
				alert("Your browser broke!");
			}
		});
	});
	
	$("#selectall").live("click",function(){
		if($("li.select_user_list").length != $("li.user_list").length) {
			$(".user_list").addClass("select_user_list");
			$(this).html("Remove All Users");
		} else {
			$(".user_list").removeClass("select_user_list");
			$(this).html("Add All Users");
		}
	});
	
	$("li.user_list").live("click",function(){
		if($(this).hasClass("select_user_list")) {
			$(this).removeClass("select_user_list");
		} else {
			$(this).addClass("select_user_list");
		}
		if($("li.select_user_list").length == $("li.user_list").length) {
			//$(".user_list").addClass("select_user_list");
			$("#selectall").html("Remove All Users");
		} else {
			//$(".user_list").removeClass("select_user_list");
			$("#selectall").html("Add All Users");
		}
	});
	
	$("form#NewsletterNewsletterForm").on("submit",function(e){
		$("label.error").hide();
		if($("li.select_user_list").length > 0) {
			var arr = Array();
			$("li.select_user_list").each(function(){
					arr.push($(this).attr("val"));
			});
			$("#NewsletterSentusers").html(arr.join(','));
		} else {
			$("label.error").show();
			e.preventDefault();
		}
	});
	
	
	$("#UserdetailFirstName, #UserdetailLastName").keydown(function(event) {
		if (event.keyCode == 32) {
			event.preventDefault();
		}
	});
	
});

	/*
	 * @function name	: validatemultipleaction
	 * @purpose			: validate if any checkbox checked before changing status or deleting with it also validate if there is any data to be prossesed or not
	 * @arguments		: none
	 * @return			: none 
	 * @created by		: shivam sharma
	 * @created on		: 10th oct 2012
	 * @description		: NA
	*/
	function validatemultipleaction(){
		
		var count		= $(".chk:checked").length;
		var counter		= $(".chk").length;
		var PageOptions	= $(".options").val();
		var appmessage  = " "+count+" records?";
		if(PageOptions == ''){
			$("#checkerr").html(CHECKBLANKERROR);
			$("#checkerr").show();
			$(".options").focus();
			return false;
		}
		
		if(counter < 1){
			$("#checkerr").html(CHECKMULTIPLENONEERROR);
			$("#checkerr").show();
			return false;
		}
		
		if(count < 1){
			$("#checkerr").html(CHECKMULTIPLEERROR);
			$("#checkerr").show();
			return false;
		}
		
		
		
		if(PageOptions == 'Delete'){
			if(confirm(DELETEALERTMESSAGE+appmessage)){
				
			}else{
				return false;
			}
			
		}
		
		if(PageOptions == 'Active'){
			
			if(confirm(ACTIVEALERTMESSAGE+appmessage)){
				
			}else{
				return false;
			}
			
		}
		
		if(PageOptions == 'Inactive'){
			
			if(confirm(INACTIVEALERTMESSAGE+appmessage)){
				
			}else{
				return false;
			}
			
		}
	}
	/*end here*/
	
	
	/*
	 * @function name	: hidepanel
	 * @purpose			: show and hide right panel in admin module
	 * @arguments		: none
	 * @return			: none 
	 * @created by		: shivam sharma
	 * @created on		: 15th oct 2012
	 * @description		: NA
	*/
	function hidepanel(){
		if($("body").attr('class') == 'folded'){
			$("#btn").attr("title","Click here to hide panel");
			$("body").removeClass("folded");
		}else{
			$("#btn").attr("title","Click here to show panel");
			$("body").addClass("folded");
		}
	}
	/*end here*/
	
	
$.validator.addMethod("validEmail", function(value, element) {
    if(value == '') 
    return true;
    var temp1;
    temp1 = true;
    var ind = value.indexOf('@');
    var str2=value.substr(ind+1);
    var str3=str2.substr(0,str2.indexOf('.'));
    if(str3.lastIndexOf('-')==(str3.length-1)||(str3.indexOf('-')!=str3.lastIndexOf('-')))
        return false;
    var str1=value.substr(0,ind);
    if((str1.lastIndexOf('_')==(str1.length-1))||(str1.lastIndexOf('.')==(str1.length-1))||(str1.lastIndexOf('-')==(str1.length-1)))
        return false;
    str = /(^[a-zA-Z0-9]+[\._-]{0,1})+([a-zA-Z0-9]+[_]{0,1})*@([a-zA-Z0-9]+[-]{0,1})+(\.[a-zA-Z0-9]+)*(\.[a-zA-Z]{2,3})$/;
    temp1 = str.test(value);
    return temp1;
}, "Please enter valid email."); 


/* 
 * Function to validate ckeditor
 * 
 */
function getContent(textarea) {
    CKEDITOR.instances[textarea.id].updateElement(); // update textarea
    var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
    return editorcontent;
}
		

		
		

		
