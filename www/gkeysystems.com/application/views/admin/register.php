    <style>
        div {
            padding-bottom:20px;
        }
        .warning{
            margin-top: -10px
        }
    </style>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Add New Users <small> </small></h1>
                    <div class="alert alert-dismissable alert-warning">
                        Welcome to the admin Add New Users! Feel free to review all pages and modify the layout to your needs.
                        <br /><br />
                    </div>
                </div>
            </div>

        </div>

       <div class="col-md-12">
     
        <div>
            <label for="first_name" class="col-md-2">
                First Name:
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control user_data" id="first_name" placeholder="Enter First Name">
            </div>
            <div class="warning col-md-offset-2 col-md-10" id="warning_first_name">
            </div>
        </div>        
        <div>
            <label for="last_name" class="col-md-2">
                Last Name:
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control user_data" id="last_name" placeholder="Enter Last Name">
            </div>
             <div class="warning col-md-offset-2 col-md-10" id="warning_last_name">
            </div>
        </div>
        <div>
            <label for="email" class="col-md-2">
                Email address:
            </label>
            <div class="col-md-8">
                <input type="email" class="form-control user_data" id="email" placeholder="Enter email address" data-error="Bruh, that email address is invalid" required>
                <p class="help-block">
<!--                    Example: yourname@domain.com-->
                </p>
            </div>
             <div class="warning col-md-offset-2 col-md-10" id="warning_email">
            </div>
        </div>
        <div>
            <label for="ip_adress" class="col-md-2">
                IP Address:
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control user_data" id="ip_adress" placeholder="Enter IP Address">
            </div>
            <div class="warning col-md-offset-2 col-md-10" id="warning_ip_adress">
            </div>
        </div>
  
        <div>
            <label for="password" class="col-md-2">
                Password:
            </label>
            <div class="col-md-8">
                <input type="text" class="form-control user_data" id="password" placeholder="Enter Password">
                <p class="help-block">
                </p>
            </div> 
             <div class="warning col-md-offset-2 col-md-10" id="warning_password">
            </div>
        </div>
        <div>
             <label for="db_type" class="col-md-2">
                 DB Type:
             </label>
            <div class="col-md-8">
                <select name="db_type" id="db_type" class="form-control">
                    <option value="0">--Please Select--</option>
                    <option value="1">Type1</option>
                    <option value="2">Type2</option>
                    <option value="3">Type3</option>
                </select>
            </div>
            <div class="warning col-md-offset-2 col-md-10" id="warning_db_type">
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8 text-right" style="padding-right: 40px">
                <button type="submit" class="btn btn-primary" id="add_user">
                    Register New User
                </button>
            </div>
        </div>
    </div>  
    </div>

    <script>
        $(document).on("click","#add_user",function() {
            var first_name = $.trim($("#first_name").val());
            var last_name = $.trim($("#last_name").val());
            var ip_adress = $.trim($("#ip_adress").val());
            var email = $.trim($("#email").val());
            var password = $.trim($("#password").val());
            var db_type = $.trim($("#db_type").val());
            $("#warning_first_name").empty();
            $("#warning_last_name").empty();
            $("#warning_email").empty();
            $("#warning_ip_adress").empty();
            $("#warning_password").empty();
            $("#warning_db_type").empty();
			
			debugger;
			console.log("1");

            var error = false;
            if(first_name == "") {
                error = true;
                $("#warning_first_name").css("color","#cc0000");
                $("#warning_first_name").append('<span>First Name is required</span>')
            }

            if(last_name == "") {
                error = true;
                $("#warning_last_name").css("color","#cc0000");
                $("#warning_last_name").append('<span>Last Name is required</span>')
            }

            if(email == "") {
                error = true;
                $("#warning_email").css("color","#cc0000");
                $("#warning_email").append('<span>Email address is required</span>')
            } 

            if(ip_adress == "") {
                error = true;
                $("#warning_ip_adress").css("color","#cc0000");
                $("#warning_ip_adress").append('<span>IP Adress is required</span>')
            }

            if(password == "") {
                error = true;
                $("#warning_password").css("color","#cc0000");
                $("#warning_password").append('<span>Password is required</span>')
            } 

            if(db_type == "" || db_type == 0) {
                error = true;
                $("#warning_db_type").css("color","#cc0000");
                $("#warning_db_type").append('<span>DB Type is required</span>')
            }

            if (!error) {
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>admin/register/add_new_user",
                    data: {first_name: first_name, last_name: last_name, email: email, ip_adress: ip_adress, password: password, db_type: db_type},
                    success: function(data)
                    {
                        $("#info_message").empty();
                        if (data == 1){
                            $("#first_name").val("");
                            $("#last_name").val("");
                            $("#email").val("");
                            $("#ip_adress").val("");
                            $("#password").val("");
                            $("#db_type").val("");
                            $("#info_message").css("color","#4cc74c");
                            $("#info_message").append("User successfully added on !!!");
                        }else{
                            var new_user_data = $.parseJSON(data);
                            if (new_user_data.error) {
                                $("#warning_first_name").append(new_user_data.error.first_name);
                                $("#warning_first_name").css("color","red");
                                $("#warning_last_name").append(new_user_data.error.last_name);
                                $("#warning_last_name").css("color","red");
                                $("#warning_email").append(new_user_data.error.email);
                                $("#warning_email").css("color","red");
                                $("#warning_ip_adress").append(new_user_data.error.ip_adress);
                                $("#warning_ip_adress").css("color","red");
                                $("#warning_password").append(new_user_data.error.password);
                                $("#warning_password").css("color","red");
                                $("#warning_db_type").append(new_user_data.error.db_type);
                                $("#warning_db_type").css("color","red");
                            }
                            $("#info_message").css("color","red");
                            $("#info_message").append("Errors !!!");
                        }
                        $(".modal_info").click();
                    }
                });
            }
        });

        $(document).on("click",".user_data",function() {
            var id = $(this).attr('id');
            $("#warning_"+id).css("color","");
        });

    </script>
