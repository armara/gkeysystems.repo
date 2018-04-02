        <style>
            .warning{
                margin-left: 0;
            }
        </style>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Users <small>Information, edit, delete </small></h1>
                    <div class="alert alert-dismissable alert-warning">
                        Welcome to the admin users! Feel free to review all pages and modify the layout to your needs.
                        <br /><br />
                        <a href="<?=base_url()?>admin/register" class="btn btn-success" style="text-decoration: none"><i class="glyphicon glyphicon-plus"></i>&nbsp&nbsp Add new User</a>
<!--                        This theme uses the <a href="https://www.shieldui.com">ShieldUI</a> JavaScript library for the -->
<!--                        additional data visualization and presentation functionality illustrated here. -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Users list </h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-grid1"></div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- /#wrapper -->

        <!-- Modal -->
        <div id="show_user" class="modal fade" role="dialog">
            <div class="container" style="margin-top: 30px">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header alert alert-warning">
                        <button type="button" class="close" data-dismiss="modal" style="color: darkblue">&times;</button>
                        <h4 class="modal-title" style="text-align: center; font-weight: 500">USER DATA</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input id="user_id" class="hidden form-control" name="user_id" placeholder="User Id">
                            <div class="col-md-4">
                                <label for="first_name"> First Name
                                    <input id="first_name" class="form-control" name="first_name" placeholder="First Name">
                                </label>
                                <div class="warning col-md-offset-2 col-md-10" id="warning_first_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="last_name">Last Name
                                    <input id="last_name" class="form-control" name="last_name" placeholder="Last Name">
                                </label>
                                <div class="warning col-md-offset-2 col-md-10" id="warning_last_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="email"> E-mail
                                    <input id="email" class="form-control" name="email" placeholder="E-mail">
                                </label>
                                <div class="warning col-md-offset-2 col-md-10" id="warning_email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="ip_adress"> IP Adress
                                    <input id="ip_adress" class="form-control" name="ip_adress" placeholder="IP Adress">
                                </label>
                                <div class="warning col-md-offset-2 col-md-10" id="warning_ip_adress">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="db_type">DB Type
                                    <select name="db_type" id="db_type" class="form-control">
                                        <option value="0">--Please Select--</option>
                                        <option value="1">Type1</option>
                                        <option value="2">Type2</option>
                                        <option value="3">Type3</option>
                                    </select>
                                </label>
                                <div class="warning col-md-offset-2 col-md-10" id="warning_db_type">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="password"> Password
                                    <input id="password" class="form-control" name="password" placeholder="Password">
                                </label>
                                <div class="warning col-md-offset-2 col-md-10" id="warning_password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="margin-top: 100px">
                        <button type="button" id="edit_save_user" class="btn btn-warning edit_user"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- Modal -->

        <script type="text/javascript">
            jQuery(function ($) {
                var performance = [12, 43, 34, 22, 12, 33, 4, 17, 22, 34, 54, 67],
                    visits = [123, 323, 443, 32];
                var traffic = <?php echo json_encode($users) ?>;// don't use quotes

//            traffic = [
//                {
//                    Source: "Direct", Amount: 323, Change: 53, Percent: 23, Target: 600
//                },
//                {
//                    Source: "Refer", Amount: 345, Change: 34, Percent: 45, Target: 567
//                },
//                {
//                    Source: "Social", Amount: 567, Change: 67, Percent: 23, Target: 456
//                },
//                {
//                    Source: "Search", Amount: 234, Change: 23, Percent: 56, Target: 890
//                },
//                {
//                    Source: "Internal", Amount: 111, Change: 78, Percent: 12, Target: 345
//                }];

                $("#shieldui-chart1").shieldChart({
                    theme: "dark",

                    primaryHeader: {
                        text: "Visitors"
                    },
                    exportOptions: {
                        image: false,
                        print: false
                    },
                    dataSeries: [{
                        seriesType: "area",
                        collectionAlias: "Q Data",
                        data: performance
                    }]

                });

                $("#shieldui-chart2").shieldChart({
                    theme: "dark",
                    primaryHeader: {
                        text: "Traffic Per week"
                    },
                    exportOptions: {
                        image: false,
                        print: false
                    },
                    dataSeries: [{
                        seriesType: "pie",
                        collectionAlias: "traffic",
                        data: visits
                    }]
                });

                $("#shieldui-grid1").shieldGrid({
                    dataSource: {
                        data: traffic
                    },
                    sorting: {
                        multiple: true
                    },

                    rowHover: true,
                    paging: true,
                    columns: [
                        { field: "id", width: "170px", title: "Id" },
                        { field: "full_name", title: "Full Name" },
//                { field: "email", title: "E-mail", format: "{0} %" },
                        { field: "email", title: "E-mail" },
                        { field: "ip_adress", title: "IP Adress" },
                        { field: "edit_delete", title: "Edit / Delete" },
                    ]
                });

            });
        </script>

        <script type="text/javascript" src="<?=base_url()?>assets/common/datepicker/js/bootstrap-datepicker.js"></script>

        <script>
            $.fn.datepicker.defaults.format = "yyyy/mm/dd";
            $('.datepicker').datepicker({
                startDate: '-3d'
            });

            $(document).on("click",".remove",function() {
                id = $(this).data("id");
                row = $(this).closest('tr');
                $("#info_message").empty();
                $("#remove_user").remove();
                $("#info_message").append("You are sure you want to delete ?");
                $("#modal_info .modal-footer").prepend('<button type="button" id="remove_user" class="btn btn-success">Yes</button>')
                $(".modal_info").click();

            });

            $(document).on("click","#remove_user",function() {
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>admin/users/delete_user",
                    data: {id: id},
                    success: function(data)
                    {
                        $("#remove_user").remove();
                        $("#info_message").empty();
                        if (data == 1){
                            $("#info_message").css("color","#4cc74c");
                            $("#info_message").append("User deleted successfully !!!");
                            row.remove();
                        }else{
                            $("#info_message").css("color","red");
                            $("#info_message").append("Errors !!!");
                        }
                    }
                });
            });

            $(document).on("click",".show_user",function() {
                $("#edit_save_user").removeClass("btn-success save_user");
                $("#edit_save_user").addClass("btn-warning edit_user");
                $("#edit_save_user").empty();
                $("#edit_save_user").append ("Edit");
                var id = $(this).data("id");
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>admin/users/get_user_data",
                    data: {id: id},
                    success: function(data)
                    {
                        if (data != ""){
                            var user_data = $.parseJSON(data);
                            $("#user_id").val(user_data['id']);
                            $("#first_name").attr('disabled','disabled');
                            $("#first_name").empty();
                            $("#first_name").attr('disabled','disabled');
                            $("#first_name").val(user_data['first_name']);
                            $("#last_name").empty();
                            $("#last_name").attr('disabled','disabled');
                            $("#last_name").val(user_data['last_name']);
                            $("#email").empty();
                            $("#email").attr('disabled','disabled');
                            $("#email").val(user_data['email']);
                            $("#ip_adress").empty();
                            $("#ip_adress").attr('disabled','disabled');
                            $("#ip_adress").val(user_data['ip_adress']);
                            $("#db_type").attr('disabled','disabled');
                            $("#db_type").val(user_data['db_type']);
                            $("#password").attr('disabled','disabled');
                        }
                    }
                });
            });

            $(document).on("click",".edit_user",function() {
                $("#first_name").removeAttr("disabled");
                $("#last_name").removeAttr("disabled");
                $("#email").removeAttr("disabled");
                $("#ip_adress").removeAttr("disabled");
                $("#db_type").removeAttr("disabled");
                $("#password").removeAttr("disabled");
                $("#edit_save_user").removeClass("btn-warning edit_user");
                $("#edit_save_user").addClass("btn-success save_user");
                $("#edit_save_user").empty();
                $("#edit_save_user").append ("Save");
            });

            $(document).on("click",".save_user",function() {

                var user_id= $("#user_id").val();
                var first_name = $("#first_name").val();
                var last_name = $("#last_name").val();
                var email = $("#email").val();
                var ip_adress = $("#ip_adress").val();
                var db_type = $("#db_type").val();
                var password = $("#password").val();
                $("#warning_first_name").empty();
                $("#warning_last_name").empty();
                $("#warning_email").empty();
                $("#warning_ip_adress").empty();
                $("#warning_db_type").empty();
                $("#warning_password").empty();
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>admin/users/edit_user_data",
                    data: {user_id: user_id, first_name: first_name, last_name: last_name, email: email, ip_adress: ip_adress,password: password, db_type: db_type},
                    success: function(data)
                    {
                        $("#info_message").empty();
                        $("#remove_user").remove();
                        if (data == 1){
                            $("#first_name").attr('disabled','disabled');
                            $("#first_name").val(first_name);
                            $("#last_name").attr('disabled','disabled');
                            $("#last_name").val(last_name);
                            $("#email").attr('disabled','disabled');
                            $("#email").val(email);
                            $("#ip_adress").attr('disabled','disabled');
                            $("#ip_adress").val(ip_adress);
                            $("#db_type").attr('disabled','disabled');
                            $("#db_type").val(db_type);
                            $("#password").val("");
                            $("#password").attr('disabled','disabled');

                            $("#edit_save_user").removeClass("btn-success save_user");
                            $("#edit_save_user").addClass("btn-warning edit_user");
                            $("#edit_save_user").empty();
                            $("#edit_save_user").append ('Edit');

                            $("#info_message").css("color","#4cc74c");
                            $("#info_message").append("User data is successfully changed !!!");
                        }else{
                            console.log($.parseJSON(data));
                            var edit_user_data = $.parseJSON(data);
                            if (edit_user_data.error) {
                                $("#warning_first_name").append(edit_user_data.error.first_name);
                                $("#warning_first_name").css("color","red");
                                $("#warning_last_name").append(edit_user_data.error.last_name);
                                $("#warning_last_name").css("color","red");
                                $("#warning_email").append(edit_user_data.error.email);
                                $("#warning_email").css("color","red");
                                $("#warning_ip_adress").append(edit_user_data.error.ip_adress);
                                $("#warning_ip_adress").css("color","red");
                                $("#warning_db_type").append(edit_user_data.error.db_type);
                                $("#warning_db_type").css("color","red");
                                $("#warning_password").append(edit_user_data.error.password);
                                $("#warning_password").css("color","red");
                                
                            }
                            $("#info_message").css("color","red");
                            $("#info_message").append("Errors !!!");
                        }
                        $(".modal_info").click();
                    }
                });
            });

        </script>

