		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>-->
		<script src="<?=base_url();?>/assets/frontend/js/owl.carousel.min.js"></script>
		<script src="<?=base_url();?>/assets/frontend/js/woco.accordion.min.js"></script>
		<script src="http://hammerjs.github.io/dist/hammer.min.js"></script>
		<!--<scrtipt src="js/hammer.js"></scrtipt>-->
		<script type="text/javascript" src="<?=base_url();?>assets/frontend/js/tableExport.js"></script>
		<script type="text/javascript" src="<?=base_url();?>assets/frontend/js/jquery.base64.js"></script>
		<script type="text/javascript" src="<?=base_url();?>assets/frontend/js/jspdf/jspdf.js"></script>
		<script type="text/javascript" src="<?=base_url();?>assets/frontend/js/jspdf/libs/sprintf.js"></script>
		<script type="text/javascript" src="<?=base_url();?>assets/frontend/js/jspdf/libs/base64.js"></script>
		<script src="<?=base_url();?>/assets/frontend/js/main.js"></script>
		<script>
        	$(document).on("click","#login",function() {
        		var email    = $("#email").val().trim();
        		var password = $("#password").val().trim();
        		$("#login_warning").empty();
        		$("#email_warning").empty();
        		$("#email_warning").css({"visibility":'none', "opacity": 0 });
        		$("#password_warning").empty();
        		$("#password_warning").css({"visibility":'none', "opacity": 0 });
				var email_regex = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
				var my_error = false;
        		if (email == '') {
					my_error = true;
        			$("#email_warning").append("Էլ. հասցեն նշված չէ !");
        			$("#email_warning").css({"visibility":'inherit', "opacity": 1 });
        		}else if (!email_regex.test(email)) {
					my_error = true;
					$("#email_warning").append("Դաշտի պարունակությունը չի հանդիսանում Էլ. հասցե !");
        			$("#email_warning").css({"visibility":'inherit', "opacity": 1 });
        		}
        		if (password == '') {
        			my_error = true;
        			$("#password_warning").append("Գաղտնաբառը նշված չէ !");
        			$("#password_warning").css({"visibility":'inherit', "opacity": 1 });
        		}
        		if (!my_error) {
					$.ajax({
	                    type: "POST",
	                    url: "<?=base_url()?>home/login",
	                    data: {email: email, password: password},
	                    success: function(data)
	                    {
	                        if (data == 1){
                                window.location.href = "<?=base_url()?>home/dramarkkhi_sharj";
	                        }else if(data == 0){
	                        	location.reload();
	                        }else {
                            	var login_user_data = $.parseJSON(data);
	                        	if (login_user_data.error.email) {
	                        		$("#email_warning").append(login_user_data.error.email);
        							$("#email_warning").css({"visibility":'inherit', "opacity": 1 });
	                        	}
		                       	if (login_user_data.error.password) {
		                       		$("#password_warning").append(login_user_data.error.password);
	        						$("#password_warning").css({"visibility":'inherit', "opacity": 1 });
	        					}
								if (login_user_data.error.user_error) {
		                       		$("#login_warning").append(login_user_data.error.user_error);
	        						$("#login_warning").css({"color":'red', 'font-weight': 'bold'});
	        					}
	                        }
	                    }
	                });
        		}
			});

        	$(document).on("click","#email",function() {
        			$("#email_warning").css({"visibility":'none', "opacity": 0 });
			});
			$(document).on("click","#password",function() {
        			$("#password_warning").css({"visibility":'none', "opacity": 0 });
			});
		</script>
	</body>
</html>


