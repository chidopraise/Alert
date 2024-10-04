		function ask1(){
			var question = confirm("You Are About TO LOGOUT. Click OK If You Consent.");
			if(question == true){
				window.location.href = "../lib/logout";
			}else{
				alert("Okay Then, Let\'s Continue !!!");
			}
		}


/***
		function load(id,file,q){
			
			var xmlHttpRequest;
			if(window.XMLHttpRequest){
				xmlHttpRequest = new XMLHttpRequest();
			}else{
				xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlHttpRequest.onreadystatechange = function(){
				if(xmlHttpRequest.readyState == 4 && xmlHttpRequest.status == 200){
					document.getElementById(id).innerHTML = xmlHttpRequest.responseText;
				}
			}
			
			xmlHttpRequest.open("GET",file+'?q='+q,true);
			xmlHttpRequest.send();
		}
**/




		function makepayment(key, email, amount, ref, callback) {
			var handler = PaystackPop.setup({
				key: "pk_live_b5b3419448b4d99686c888272cd4937efa127a3e", // This is your public key only! 
				email: email || 'customer@email.com', // Customers email
				amount: amount || 5000000.00, // The amount charged, I like big money lol
				//currency: 'USD',
				ref: ref || 6019, // Generate a random reference number and put here",
				metadata: { // More custom information about the transaction
				 custom_fields: [
					{}
				 ]
				},
				callback: function(response){
					$.ajax({
						url: callback+'?reference='+ response.reference,
						method: 'get',
						success: function (response) {
						// the transaction status is in response.data.status
						}
					});
				},
				onClose: function(){
				  alert('window closed');
				  window.location.href = '../index';
				}
			});

			// Payment Request Just Fired  
			handler.openIframe(); 
		}

		

		
function test_close(){
		$("#test").hide(700);
}
		



function motion(){
	setTimeout("$('.pic2').hide(1000);$('.pic3').hide(1000); $('.pic1').show(1000);",1000);
	setTimeout("$('.pic1').hide(); $('.pic3').hide(1000); $('.pic2').show(1000);",5000);
	setTimeout("$('.pic1').hide(); $('.pic2').hide(1000); $('.pic3').show(1000);",9000);
}



function stomach(){
	setTimeout("$('.service').hide(2000);$('.service1').hide(2000);",1000);
	setTimeout("$('.service').show(2000);",6000);
	setTimeout("$('.serv').hide(2000);$('.service1').hide(2000);",6000);
	setTimeout("$('.service').hide(2000);$('.serv').hide(2000);",11000);
	setTimeout("$('.service1').show(2000);",11000);
	setTimeout("$('.service').hide(2000);$('.service1').hide(2000);",16000);
	setTimeout("$('.serv').show(2000);",16000);
}



function play(){
	var a = new Audio("../images/song.mp3");
		a.volume = 0.5;
		a.play();
		a.loop = true;
}
	
		
function pay_trial(){
	var email = $(".eemail").val();
	var money = $(".trial_pay_input").val();
	load("test1","../lib/insert_trial.php",money);
	window.location.href = '../lib/insert_trial1';
	//var money = $(".trial_pay_input").val() *100;
	//makepayment('',email,money,Math.random(),'https://www.asbesoc-vpad.org/images/asbesoc/lib/pay_trial.php');
}

		
function join_game(game_num){
	load('test1','../parts/game_join.php',game_num);
	$(".test_1").show();
}





$(document).ready(function(){
	//$(".index").text("Welcome To Asbesoc And Vpad Online Base");
	
	/////here i initiate loader spinner on click/////
$("a,button").on("click",function(){
	$('#loading').show();
	setTimeout("$('#loading').hide();",3000);
});
	
//////////////this code here handles the introductory page////////////////////////////////////////////////
	$(".index_img").show(5000);
	$(".one").show(1000);
	$(".two").show(3000);
	$(".three").show(5000);
	$(".four").show(7000);
	$(".five").show(10000);
	setTimeout("$('.name').css('color','white');",10000);
	
////////////////this is here is handling the navigation bar slideUp, slideDown and on scroll function////////////////////////////////////////
	$(".li").slideUp(1);
	$(".menu,.a").on("click",function(){
		$(".li").toggle(2000);
	});
	
	$(this).on("scroll",function(){
		$(".nav").css({"position":"fixed","top":"0","left":"0","z-index":"100"});
	});
	
	
	
////////////this code handles the animation of the service area(stomach)///////////////////////
	setInterval("stomach()",16000);
	
	
////////////////page loading handler onclick/////////////////////////////////
	$("div ul li a").on("click",function(){
		var page = $(this).attr("href");
		window.location.href = page +".php";
		//$(".content").load(page +".php");
		$(this).css({"background-color":"blue"});
		
		return false;
		
	});
	
	$(".notify").on("click",function(){
		var page = $(this).attr("href");
		$(".content").load(page +".php");
		$(this).css({"background-color":"blue"});
		
		return false;
		
	});
	

//////////////////////////login and registration form display handler/////////////////////////////
	$(".login0").on("click",function(){
		$(".register").hide(1500);
		$(".login").show(2000);
		$(this).hide(2000);
		$(".register0").show(1500);
		$(".pass_reset").hide("slow");
	});
	
	$(".register0").on("click",function(){
		$(".login").hide(1500);
		$(".register").show(2000);
		$(this).hide(2000);
		$(".login0").show(1500);
		$(".pass_reset").hide("slow");
	});
	
	
	/////////// THIS CODE CONTROLS THE SPINER ////////////
	$('.a, .button, .input,.spin,.a2').click(function(){
		$('#loading').show();
		setTimeout("$('#loading').hide();",5000);
    });
	setTimeout("$('#loading').hide();",5000);
	
	
	///////////image animation hadler
	setInterval("motion();",13000);
	
	
	
	
	///////////////profile pics section handler/////////////////////////////
	$(".change").on("click",function(){
		$(".change-form").toggle();
		$(this).hide();
	});
	
	
	$(".end").on("click",function(){
		$(".change-form").toggle();
		$(".change").show();
	});
	
	$(".search_input").on("keyup",function(){
		$("#search").show();
		load("search","../parts/search.php",document.tt.search.value);
	});
	
	
	$(".volt").slideUp(1);
	$(".cash").click(function(){
		$(".volt").toggle(1000);
		$(".transfer").hide(1000);
	});
	
	$(".cash_close").on("click",function(){
		$(".volt").hide(1000);
		$(".donate_form").hide(1000);
		$(".donate").show(1000);
		$(".r_s").hide(1000);
		$(".request_support").hide(1000);
		$(".compact_form").hide(1000);
		$(".compact").show(1000);
		$(".promotion_form").hide(1000);
		$(".promotion").show(1000);
	});
	
	
	$(".transfer1").on("click",function(){
		$(".volt").toggle(1000);
		$(".transfer").toggle(1000);
	});
	$(".transfer_close").on("click",function(){
		$(".transfer").toggle(1000);
	});
	
	
	/////////for trial wallet//////////////////////
	$(".trial").click(function(){
		$(".trial1").toggle(1000);
	});
	
	$(".dp").click(function(){
		$(".dp1").toggle(1000);
	});
	
	$(".trial_pay1").on("click",function(){
		$(this).hide(1000);
		$(".trial_pay0").show(1000);
		$(".withdraw0").hide(1500);
		$(".withdraw").show(1500);
		$(".trial_pay").show();
	});
	
	$(".withdraw").on("click",function(){
		$(this).hide(1000);
		$(".trial_pay0").hide(1000);
		$(".withdraw0").show(1500);
		$(".trial_pay").show();
		$(".trial_pay1").show();
		
		const bt = document.querySelector(".withdraw0");
		bt.disabled = true;
	});
	
	$(".withdraw0").on("click",function(){
		var input = $(".trial_pay_input").val();
		load("test1","../lib/transfer_trial.php",input);
		$(".test_1").show();
	});
	
	$(".trial_close").click(function(){
		$(".trial1").hide(1000);
	});
	
	
	///////////For Self Wallet//////////////////////
	$(".self").click(function(){
		$(".self1").toggle(1000);
	});
	
	
	$(".self_pay1").on("click",function(){
		$(this).hide(1000);
		$(".self_pay0").show(1000);
		$(".withdraw_self0").hide(1500);
		$(".withdraw_self").show(1500);
		$(".self_pay").show();
	});
	
	$(".withdraw_self").on("click",function(){
		$(this).hide(1000);
		$(".self_pay0").hide(1000);
		$(".withdraw_self0").show(1500);
		$(".self_pay").show();
		$(".self_pay1").show();
	});
	
	$(".withdraw_self0").on("click",function(){
		var input = $(".self_pay_input").val();
		load("test1","../lib/transfer_self.php",input);
		$(".test_1").show();
	});
	
	$(".self_close").click(function(){
		$(".self1").hide(1000);
	});
	
	
	$(".self_pay0").on("click",function(){
			//var email = $(".eemail").val();
			var money = $(".self_pay_input").val();
			load("test","../lib/insert_self.php",money);
			//window.location.href = '../lib/insert_self1';
			//var money = $(".trial_pay_input").val() *100;
			//makepayment('',email,money,Math.random(),'https://www.asbesoc-vpad.org/images/asbesoc/lib/pay_trial.php');
	});
	
	
	/////////////Payment for Pyramid_Thrift////////////////////
	$(".thrift_pay").on("click",function(){
			var money = $(this).attr("id");
			load("test","../lib/insert_pyramid_thrift.php",money);
		});

	
	
	
	///////////for online toggle light/////////////
	setInterval("$('.online').toggle();",10000);
	
	/////kill switch For Countdown Displayer//////////////////////
	$(".test_close").on("click",function(){
		$("#test").hide(700);
	});
	
	$(".test1_close").on("click",function(){
		$(".test_1").hide(700);
		$(".test_2").hide(700);
		$(".instruction").show(1000);
	});
	
	
	
	$(".dialog_close").on("click",function(){
		var callback = $(".callback").text();
		$("#dialog").hide(1500);
		//play();
		window.location.href = callback;
	});
	
	$(".dialog_stay").on("click",function(){
		var callback1 = $(".callback1").text();
		$("#dialog").hide(1500);
		//play();
		window.location.href = callback1;
	});
	
	/////birth and kill switch For down menu Displayer//////////////////////
	$(".menu0_close").on("click",function(){
		$("#menu_0").hide(500);
		$(".menu_1").show(1000);
	});
	
	$(".menu1_close").on("click",function(){
		$(".menu_1").hide(500);
		$(".menu_0").show(1000);
	});
	
	/////// This code handles the opening and closing of discount datails //////
	$(".addp_open").on("click",function(){
		$(".addp").show(1000);
	});
	
	/////// This code handles the opening and closing of membership and fellow page //////
	$(".membership_open").on("click",function(){
		$(".membership").show(1000);
	});
	
	
	$(".add_dp").on("click",function(){
		window.location.href = '../lib/pay_discount1';
		//var email = $(".eemail").val();
		//makepayment('',email,'2000000',Math.random(),'https://www.asbesoc-vpad.org/images/asbesoc/lib/pay_discount.php');
	});
	
	////////////here i got the total available cash in the users account////////////////////
	var x = $(".v1").val();
	var y = $(".v2").val();
	var w = $(".v3").val();
	var z = Number(x) + Number(y) + Number(w);
	//$(".cash_value").text(z);
	
	//////////pos submit button///////////
	var t = "REQUEST FOR YOUR MONEY";
	$(".total_amount").on("keyup",function(){
		$(".request").val(t);
	});
	
	
	
	////////////for vdst game handling/////////////////////////
	$(".start_game").click(function(){
		$(this).hide();
		$(".promo_game").show();
		$(".play_form").show(1000);
		$(".play_promo").hide(500);
	});
	
	$(".close_play").click(function(){
		$(".play_form").hide();
		$(".start_game").show();
	});
	
	/////////for VDST promo Game//////////
	$(".promo_game").click(function(){
		$(this).hide();
		$(".start_game").show();
		$(".play_promo").show(1000);
		$(".play_form").hide(500);
	});
	
	$(".close_promo").click(function(){
		$(".play_promo").hide();
		$(".promo_game").show();
	});
	
	$('.game_join').on("click",function(){
		//there is a function up (join_game(param) handling the data processing of this click/////
		//load('test1','../parts/game_join.php','2');
		//$(".test_1").show();
		$("#game_add").load("../parts/vdst_note2.php");
		$(this).hide();
		//load("game_add","../parts/vdst_note2.php","");
	});
	
	setInterval('$("#game_add").load("../parts/vdst_note2.php");',30000);
	
	
	$(".instruction").on("click",function(){
		$(this).hide(1000);
		load("test1","../parts/instruction.php","");
		$(".test_1").show(1000);
	});
	
	//play();
	
	
	
	//////////This Code Handles Donation payment protocol/////////////////////////////////////////////////////////////////////////////////////////////////////
	//.cash_close handles the closing of forms while the function donate() below handles the opening of the donation form//////////
	$(".donate_amount").on("keyup",function(){
		var amount = $(this).val();
		if(amount <= 999){
			$(".d_s_f").text("The Minimum Donation Is 1000");
			$(".donate_submit").hide("slow");
			$(".donate_submit_dollar").hide("slow");
		}else{
			$(".donate_submit").show("slow");
			$(".donate_submit_dollar").show("slow");
			$(".d_s_f").text("");
			$(".donate_submit").html("Donate &#8358 "+amount);
			$(".donate_submit_dollar").html("Donate $"+amount);
		}
	});
	$(".donate_submit").on("click",function(){
		var amount = $(".donate_amount").val();
		var reason = "Donating To Asbesoc Welfare And Support System";
		window.location.href = "../lib/donate_init.php?amount="+amount+"&reason="+reason;
		//window.location.href = "../lib/donate_init.php?r="+amount+"&reason="+reason;
	});
	$(".donate_submit_dollar").on("click",function(){
		var amount = $(".donate_amount").val();
		var reason = "Donating To Asbesoc Welfare And Support System";
		window.location.href = "../lib/donate_init_dollar.php?amount="+amount+"&reason="+reason;
		//window.location.href = "../lib/donate_init.php?r="+amount+"&reason="+reason;
	});
	
	$(".r_s").on("click",function(){
		$(".request_support").show(1000);
		$(".donate_form").hide(2000);
	});
	
	$(".d_r_s").on("click",function(){
		$(".s_r_f").toggle();
	});
	
	$(".approve").on("click",function(){
		var req_id = $(this).attr("id");
		var div_id = "tr_"+req_id;
		load(div_id,"../parts/support_approve.php",req_id);
	});
	
	$(".disapprove").on("click",function(){
		var req_id = $(this).attr("id");
		var div_id = "tr_"+req_id;
		load(div_id,"../parts/support_disapprove.php",req_id);
	});
	
	
	
	
	////////email checker///////////////////
	$(".email").on("keyup",function(){
		load("email_checker","../parts/email_checker.php",$(this).val());
	});
	
	////////////////for password reset process//////////
	$(".forgot").on("click",function(){
		$(".login").hide("slow");
		$(".pass_reset").show("slow");
	});
	
	$(".reset").on("click",function(){
		$(".login").show("slow");
		$(".pass_reset").hide("slow");
		$(".login").hide(1500);
		$(".login0").show(1500);
		load("test1","../parts/email_reset.php",$('#email_reset').val());
		$(".test_1").show(1500);
	});
	
	/////////this loads the invite and admin financial report///////////////
	load("invite","../parts/invite.php","");
	
	
	//////////////this handles promotion initialisation////////////////
	$(".sponsor").on("keyup",function(){
		var user = $(".sp").val();
		var col = $(this).attr('name');
		var val = $(this).val();
		var value = user+","+col+","+val;
		//$(".test_1").show(1000);
		load("test1","../parts/promotion.php",value);
	});
	$(".permit").on("click",function(){
		var user = $(".sp").val();
		var col = $(this).attr('name');
		var val = $(this).val();
		var value = user+","+col+","+val;
		$(".promotion_form").hide(1000);
		$(".promotion").show(1000);
		$(".test_1").show(1000);
		load("test1","../parts/promotion.php",value);
		setInterval("window.location.reload()",5000);
	});
	
	
	//////////////this handles promotion Cpanel////////////////
	$(".sponsor_cpanel").on("keyup",function(){
		//var user = $(".sp_cpanel").attr("id");
		//var user = $("#"+user).val();
		var user = $(this).attr('id');
		var user = $("#sp_"+user).val();
		var col = $(this).attr('name');
		var val = $(this).val();
		var value = user+","+col+","+val;
		//$(".test_1").show(1000);
		load("test1","../parts/promotion_cpanel.php",value);
	});
	$(".permit_cpanel").on("click",function(){
		//var user = $(".sp_cpanel").attr("id");
		//var user = $("#"+user).val();
		var user = $(this).attr('id');
		var user = $("#sp_"+user).val();
		var col = $(this).attr('name');
		var val = $(this).val();
		var value = user+","+col+","+val;
		$(".test_1").show(1000);
		load("test1","../parts/promotion_cpanel.php",value);
		setInterval("window.location.reload()",5000);
	});
	
	$(".promo_close").on("click",function(){
		var id = $(this).attr("id");
		var id = $("#promo_"+id);
		id.fadeOut(2000);
	});
	
	/////////controls promotion on logout///////
	$(".promo_a").on("click",function(){
		$(this).fadeOut(1000);
		$(".promo_close").fadeOut(1000);
		$(".test_1").show(1000);
		load("test1","../parts/access_403.php",'');
	});
	
	////////for promotion cpanel more history display///////
	$(".more_down").on("click",function(){
		var down0 = $(this).attr('name');
		var down = $("#more_down_"+down0);
		down.hide(1000);
		$("#more_up_"+down0).show(1000);
		$(".more_his_"+down0).slideDown(1000);
	});
	$(".more_up").on("click",function(){
		var up0 = $(this).attr('name');
		var up = $("#more_up_"+up0);
		up.hide(1000);
		$("#more_down_"+up0).show(1000);
		$(".more_his_"+up0).slideUp(1000);
	});
	
	//////////for promo button toggling/////////
	setInterval("$('.promo_button_text').toggle();",1000);
	$(".promo_button").on("click",function(){
		$(".promo_show").toggle(1000);
	});
	
	
	////////////this code controlsthe loading of keke ticket////////////////
	$(".ticket").click(function(){
		$(".content").load("../menu/keke_ticket.php");
	});
	
	
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	/////////this code controls the match making intro///////////////
	$(".match_headline").show(1500);
	//$('.match_intro').animate({left: '100px'},"slow");
	
	setTimeout("$('.match_intro').animate({top: '-50%'},2000); $('.match_headline').animate({left: '100%'},2000); $('.match_intro_2').animate({bottom: '-50%'},2000);",5000);
	
	////////////this code loads matching protocol, mainframe and system/////////
	//load("match_content","../parts/match_content.php","");
	
	
	
	const da = document.querySelector(".deactivate_age");
	da.disabled = true;
	
	
	
	
///////////////////////////////////////this code handles find match display////////////////////////////////////////
	$(".find_match").on("click",function(){
		$(".subscribe_match,.pro_pics").show(1000);
		$(this).hide(1000);
		$(".match_warning").hide(1000);
		$(".h").hide(1000);
		$(".first_name,.last_name,.middle_name,.email,.phone,.address,#radio").show(1500);
	});
	
	//////////this controls dating and relationship section////////////////////////////
	$(".nl1").on("click",function(){
		$(".h").hide(1000);
		$("#radio,.m_a_y,.sex,.country,.state,.l_g_a,.d_o_b,.profession,.marital_status,.religion,.age,.complexion,.height,.weight,.temper,.education,.likes,.dislikes,.tribe,.language,.submit").show(1500);
		
		$(".continue").attr("type","button");
		$(".continue").attr("value","NEXT ...");
		$(".continue").attr("class","btn btn-default dating_next");
	});
	
	$(".continue").on("click",function(){
		$(".h").hide(1000);
		$("#radio,.w_y_n,.sex_2,.country_2,.state_2,.l_g_a_2,.profession_2,.religion_2,.age_2,.complexion_2,.height_2,.weight_2,.temper_2,.education_2,.tribe_2,.language_2").show(1500);
	});
	
	$(".country_2,.religion_2,.sex_2,.age_2,.complexion_2").on("click",function(){
		$(".submit").show(1000);
		$("#next_dating").attr("type","submit");
		$("#next_dating").attr("value","Continue ...");
		$("#next_dating").attr("class","btn btn-success");
	});
	
	////////this code here handles business display section//////////////////////////////////
	$(".nl2").on("click",function(){
		$(".h").hide(1000);
		$("#radio,.m_a_y,.sex,.country,.state,.l_g_a,.business_type,.business_desc,.business_scale,.business_country,.business_state,.business_lga,.continue_2").show(1000);
	});
	$(".continue_2").on("click",function(){
		$(".h").hide(1000);
		$("#radio,.w_y_n,.business_type_2,.business_desc_2,.business_scale_2,.business_country_2,.business_state_2,.business_lga_2,.submit").show(1000);
	});
	
	////////this code here handles academias display section//////////////////////////////////
	$(".nl3").on("click",function(){
		$(".h").hide(1000);
		$("#radio,.m_a_y,.sex,.country,.state,.l_g_a,.education,.language,.inst_name,.inst_type,.courses,.inst_country,.inst_state,.inst_lga,.continue_3").show(1000);
	});
	$(".continue_3").on("click",function(){
		$(".h").hide(1000);
		$("#radio,.w_y_n,.inst_name_2,.inst_type_2,.courses_2,.inst_country_2,.inst_state_2,.inst_lga_2,.submit").show(1000);
	});
	
	////////this code here service providers display section//////////////////////////////////
	$(".nl4").on("click",function(){
		$(".h").hide(1000);
		$("#radio,.m_a_y,.sex,.country,.state,.l_g_a,.continue_4").show(1000);
	});
	$(".continue_4").on("click",function(){
		$(".h").hide(1000);
		$("#radio,.w_y_n,.service_type_2,.service_scale_2,.service_country_2,.service_state_2,.service_lga_2,.submit").show(1000);
	});
	
	////////this code here service transport display section//////////////////////////////////
	$(".nl5").on("click",function(){
		$(".h").hide(1000);
		$("#radio,.m_a_y,.sex,.country,.state,.l_g_a,.continue_5").show(1000);
	});
	$(".continue_5").on("click",function(){
		$(".h").hide(1000);
		$("#radio,.w_y_n,.transport_type_2,.transport_country_2,.transport_state_2,.transport_lga_2,.submit").show(1000);
	});
	
	////////this code here service producers display section//////////////////////////////////
	$(".nl6").on("click",function(){
		$(".h").hide(1000);
		$("#radio,.m_a_y,.sex,.country,.state,.l_g_a,.continue_6").show(1000);
	});
	$(".continue_6").on("click",function(){
		$(".h").hide(1000);
		$("#radio,.w_y_n,.product_type_2,.product_country_2,.product_state_2,.product_lga_2,.product_scale_2,.submit").show(1000);
	});
	
	////////this code here service sports display section//////////////////////////////////
	$(".nl7").on("click",function(){
		$(".h").hide(1000);
		$("#radio,.m_a_y,.sex,.country,.state,.l_g_a,.continue_7").show(1000);
	});
	$(".continue_7").on("click",function(){
		$(".h").hide(1000);
		$("#radio,.w_y_n,.sport_type_2,.sport_country_2,.sport_state_2,.sex_2,.submit").show(1000);
	});
	
	////////this code here handles technician display section//////////////////////////////////
	$(".nl8").on("click",function(){
		$(".h").hide(1000);
		$("#radio,.m_a_y,.sex,.country,.state,.l_g_a,.continue_8").show(1000);
	});
	$(".continue_8").on("click",function(){
		$(".h").hide(1000);
		$("#radio,.w_y_n,.technician_type_2,.technician_country_2,.technician_state_2,.technician_lga_2,.experience_2,.sex_2,.submit").show(1000);
	});
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	
////////////////////////////////////////this code handles subscribe match display/////////////////////////////////////////////////////////////////////////////
	$(".subscribe_match").on("click",function(){
		$(".find_match,.pro_pics").show(1000);
		$(this).hide(1000);
		$(".match_warning").hide(1000);
		$(".h").hide(1000);
		$(".first_name,.last_name,.middle_name,.email,.phone,.address,#radio_sm").show(1500);
		
	});
	
	//////////this controls dating and relationship section////////////////////////////
	$(".nl1_sm").on("click",function(){
		$(".h").hide(1000);
		$("#radio_sm,.m_a_y,.sex,.country,.state,.l_g_a,.d_o_b,.profession,.marital_status,.religion,.age,.complexion,.height,.weight,.temper,.education,.likes,.dislikes,.tribe,.language,.submit").show(1500);
	});
	
	////////this code here handles business display section//////////////////////////////////
	$(".nl2_sm").on("click",function(){
		$(".h").hide(1000);
		$("#radio_sm,.m_a_y,.sex,.country,.state,.l_g_a,.business_type,.business_desc,.business_scale,.business_country,.business_state,.business_lga,.submit").show(1500);
	});
	
	////////this code here handles academias display section//////////////////////////////////
	$(".nl3_sm").on("click",function(){
		$(".h").hide(1000);
		$("#radio_sm,.m_a_y,.sex,.country,.state,.l_g_a,.education,.language,.inst_name,.inst_type,.courses,.inst_country,.inst_state,.inst_lga,.submit").show(1500);
	});
	
	////////this code here service providers display section//////////////////////////////////
	$(".nl4_sm").on("click",function(){
		$(".h").hide(1000);
		$("#radio_sm,.m_a_y,.sex,.country,.state,.l_g_a,.service_type,.service_scale,.service_country,.service_state,.service_lga,.submit").show(1500);
	});
	
	////////this code here service transport display section//////////////////////////////////
	$(".nl5_sm").on("click",function(){
		$(".h").hide(1000);
		$("#radio_sm,.m_a_y,.sex,.country,.state,.l_g_a,.transport_type,.transport_country,.transport_state,.transport_lga,.submit").show(1500);
	});
	
	////////this code here service producers display section//////////////////////////////////
	$(".nl6_sm").on("click",function(){
		$(".h").hide(1000);
		$("#radio_sm,.m_a_y,.sex,.country,.state,.l_g_a,.product_type,.product_country,.product_state,.product_lga,.product_scale,.submit").show(1500);
	});
	
	////////this code here service sports display section//////////////////////////////////
	$(".nl7_sm").on("click",function(){
		$(".h").hide(1000);
		$("#radio_sm,.m_a_y,.sex,.country,.state,.l_g_a,.sport_type,.sport_country,.sport_state,.submit").show(1500);
	});
	
	////////this code here handles technician display section//////////////////////////////////
	$(".nl8_sm").on("click",function(){
		$(".h").hide(1000);
		$("#radio_sm,.m_a_y,.sex,.country,.state,.l_g_a,.technician_type,.technician_country,.technician_state,.technician_lga,.experience,.submit").show(1500);
	});
	
	
	
});

function cancel(){
	$("#dialog").hide(1000);
	$(".test_1").show(1000);
	load("test1","../lib/match_cancel.php","");
}

function match_not_work(){
	var value = $(".match_not_work").attr('id');
	$(".mc").hide(1000);
	$(".test_1").show(1000);
	load("test1","../lib/match_not_work.php",value);
}

function match_worked(){
	var value = $(".match_worked").attr('id');
	$(".mc").hide(1000);
	$(".test_1").show(1000);
	load("test1","../lib/match_worked.php",value);
}

function dis_0(){
	setTimeout("$('.dis_row').animate({left: '410px'},'slow')",5000);
	setTimeout("$('.dis_row').animate({left: '815px'},'slow')",10000);
	setTimeout("$('.dis_row').animate({left: '1215px'},'slow')",15000);
	setTimeout("$('.dis_row').animate({left: '1620px'},'slow')",20000);
	setTimeout("$('.dis_row').animate({left: '2020px'},'slow')",25000);
	setTimeout("$('.dis_row').animate({left: '2420px'},'slow')",30000);
	setTimeout("$('.dis_row').animate({left: '2020px'},'slow')",35000);
	setTimeout("$('.dis_row').animate({left: '1620px'},'slow')",40000);
	setTimeout("$('.dis_row').animate({left: '1215px'},'slow')",45000);
	setTimeout("$('.dis_row').animate({left: '815px'},'slow')",50000);
	setTimeout("$('.dis_row').animate({left: '410px'},'slow')",55000);
	setTimeout("$('.dis_row').animate({left: '0px'},'slow')",60000);
	//$(".dis_row").animate({left: "2550px"},10000);
}

function dis(){
	dis_0();
	setInterval("dis_0()",60000);
}
	

function dis_link(){
	$(".test_1").show(1000);
	load("test1","../parts/dis_link.php",'');
}

function dis_dis(){
	$(".test_1").show(1000);
	load("test1","../parts/dis_dis.php",'');
}	

function donate(){
	///////////This Code Is Handling Donation Form Display//////////////////////
		$(".r_s").show(1000);
		$(".donate_form").show(1000);
		$(".donate").hide(1000);
}

function kite_game(){
	window.location.href = "../menu/kite_game_intro.php";
}

function fly_kite(val_1,val_2){
	//var val_1 = $(this).attr("id");
	//var val_2 = $(this).attr("name");
	val = val_1+","+val_2;
	$(".test_1").show(1000);
	load("test1","../parts/kite_game.php",val);
	setInterval("window.location.reload()",4000);
}


function comp(ans,id){
	//////////marriage compactibility////////
	var val = ans+","+id;
		if(ans == 1){
			$(".a2_"+id+",.a3_"+id+",.a4_"+id+",.a5_"+id).css({"background":"white","border":"grey thin solid","color":"#000"});
			$(".ans_"+id+",.a1_"+id).css({"background":"red","border":"red thin solid"});
			$(".a1_"+id).css({"color":"#fff"});
			load("p22","../parts/compact.php",val);
			load("p22","../parts/compact.php",val);
		}else if(ans == 2){
			$(".a1_"+id+",.a3_"+id+",.a4_"+id+",.a5_"+id).css({"background":"white","border":"grey thin solid","color":"#000"});
			$(".ans_"+id+",.a1_"+id+",.a2_"+id).css({"background":"#ff9900","border":"#ff9900 thin solid"});
			$(".a2_"+id).css({"color":"#fff"});
			load("p22","../parts/compact.php",val);
			load("p22","../parts/compact.php",val);
		}else if(ans == 3){
			$(".a1_"+id+",.a2_"+id+",.a4_"+id+",.a5_"+id).css({"background":"white","border":"grey thin solid","color":"#000"});
			$(".ans_"+id+",.a1_"+id+",.a2_"+id+",.a3_"+id).css({"background":"#ffff00","border":"#ffff00 thin solid"});
			$(".a3_"+id).css({"color":"#fff"});
			load("p22","../parts/compact.php",val);
			load("p22","../parts/compact.php",val);
		}else if(ans == 4){
			$(".a1_"+id+",.a2_"+id+",.a3_"+id+",.a5_"+id).css({"background":"white","border":"grey thin solid","color":"#000"});
			$(".ans_"+id+",.a1_"+id+",.a2_"+id+",.a3_"+id+",.a4_"+id).css({"background":"#ccff33","border":"#ccff33 thin solid"});
			$(".a4_"+id).css({"color":"#fff"});
			load("p22","../parts/compact.php",val);
			load("p22","../parts/compact.php",val);
		}else if(ans == 5){
			$(".a1_"+id+",.a2_"+id+",.a3_"+id+",.a4_"+id).css({"background":"white","border":"grey thin solid","color":"#000"});
			$(".ans_"+id+",.a1_"+id+",.a2_"+id+",.a3_"+id+",.a4_"+id+",.a5_"+id).css({"background":"green","border":"green thin solid"});
			$(".a5_"+id).css({"color":"#fff"});
			load("p22","../parts/compact.php",val);
			load("p22","../parts/compact.php",val);
		}
}

function compact(){
	$(".compact_form").toggle(1000);
	$(".compact").toggle(1000);
}

function compact_submit(){
		var spouse = $(".spouse").val();
	window.location.href = '../menu/compact.php?q='+spouse;
}
	
function compact_edit(){
	window.location.href = '../menu/compact_edit.php';
}

function result_pay(val){
	$(".test_1").show(1000);
	load("test1","../parts/compact_spouse.php",val);
	setInterval("window.location.reload()",5000);
}

function promotion(){
	$(".promotion_form").toggle(1000);
	$(".promotion").toggle(1000);
}

function keke(id){
	if(id == "a_join_keke_riders"){
		$("#a_join_keke_riders").hide(1000);
		$(".res_page").show(2000);
		load("res","../parts/keke_menu_cont.php",id);
		//$(".res").html("You Just Clicked A Menu With The Class : "+id);
	}else if(id == "a_sell_keke_ticket"){
		$("#a_sell_keke_ticket").hide(1000);
		$(".res_page").show(2000);
		load("res","../parts/keke_menu_cont.php",id);
		//$(".res").html("You Just Clicked A Menu With The Class : "+id);
	}else if(id == "a_find_keke"){
		$("#a_find_keke").hide(1000);
		$(".res_page").show(2000);
		load("res","../parts/keke_menu_cont.php",id);
		//$(".res").html("You Just Clicked A Menu With The Class : "+id);
	}else if(id == "a_join_ticket_sellers"){
		$("#a_join_ticket_sellers").hide(1000);
		$(".res_page").show(2000);
		load("res","../parts/keke_menu_cont.php",id);
		//$(".res").html("You Just Clicked A Menu With The Class : "+id);
	}else if(id == "a_sales_ride_commute_history"){
		$("#a_sales_ride_commute_history").hide(1000);
		$(".res_page").show(2000);
		load("res","../parts/keke_menu_cont.php",id);
		//$(".res").html("This Is The History Page With The Class : "+id);
	}else if(id == "a_buy_keke_ticket"){
		$("#a_buy_keke_ticket").hide(1000);
		$(".res_page").show(2000);
		load("res","../parts/keke_menu_cont.php",id);
		//$(".res").html("You Just Clicked A Menu With The Class : "+id);
	}
}

function close_res(){
	$(".res_page").hide(1000);
	$("#a_join_keke_riders").show(2000);
	$("#a_sell_keke_ticket").show(2000);
	$("#a_find_keke").show(2000);
	$("#a_join_ticket_sellers").show(2000);
	$("#a_sales_ride_commute_history").show(2000);
	$("#a_buy_keke_ticket").show(2000);
}

function keke_sys_processor(){
	var id = $(".reason").attr("id");
	if(id == "a_join_keke_riders"){
		var reason = $(".reason").val();
		var couple = id+"^"+reason;
		load("res","../parts/keke_sys_processor.php",couple);
	}else if(id == "a_sell_keke_ticket" || id == "a_buy_keke_ticket"){
		var amount = $(".amountt").val();
		var name = $(".reason").val();
		var couple = id+"^"+amount+"^"+name;
		load("res","../parts/keke_sys_processor.php",couple);
	}else if(id == "a_find_keke"){
		id = $(".location").attr("id");
		var locate = $(".location").val();
		var des = $(".destination").val();
		var couple = id+"^"+locate+"^"+des;
		load("res","../parts/keke_sys_processor.php",couple);
	}else if(id == "a_join_ticket_sellers"){
		var reason = $(".reason").val();
		var couple = id+"^"+reason;
		load("res","../parts/keke_sys_processor.php",couple);
	}else if(id == "a_sales_ride_commute_history"){
		
	}
}

function keke_admin_processor(id,name,title,value){
	var couple = id+"^"+name+"^"+title+"^"+value;
	load("admin_res","../parts/keke_sys_processor.php",couple);
}



$(window).on("load",function(){
	setTimeout("$('#loading').hide();",3000);
	///////////kite Game Intro Display//////////////////////////
	$(".kitee").show(4000);
	$("#kite_red").show(6000);
	$("#kite_yellow").show(6000);
	$("#kite_green").slideDown(8000);
	$("#kite_blue").slideDown(8000);
	$(".kite_heading").slideUp();
	$(".kite_heading").slideDown();
	$(".kite_heading").slideUp();
	$(".kite_heading").slideDown();
	$(".kite_heading").slideUp();
	$(".kite_heading").slideDown();
	$(".kite_heading").slideUp();
	$(".kite_heading").slideDown();
	$(".kite_heading").slideUp();
	$(".kite_heading").slideDown(8000);
	
	$("#p22").load("../parts/compact.php");
});
