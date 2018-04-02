        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Texts <small>Information, edit, delete, add </small></h1>
                    <div class="alert alert-dismissable alert-warning">
                        Welcome to the admin texts! Feel free to review all pages and modify the layout to your needs.
                        <br /><br />
                        <button class="btn btn-success" id="add"><i class="glyphicon glyphicon-plus"></i>&nbsp&nbsp Add new Text</button>
                    </div>
                </div>
            </div>
        </div>

       <div class="col-md-12">
            <div class="row">
               
                <div class="col-sm-9">

                    <div class="row" style="display:none" id="add_new_text">
                        <div class="col-xs-12">
                            <div class="col-md-12"> 
                                <div class=" col-md-offset-4 col-md-4" style="text-align: center">
                                    <label for="alias" ><h2>Alias</h2></label>
                                    <br><span id="text_alias_warning"></span>
                                    <input type="text" class="form-control" id="text_alias" name="text_alias" placeholder="Alias">
                                </div>
                            </div>
                            <label for="text_eng">Text (Eng):</label>
                            <br><span id="text_eng_warning"></span>
                            <textarea class="form-control" id="text_eng"></textarea>
                            <label for="text_arm">Text (Arm):</label>
                            <br><span id="text_arm_warning"></span>
                            <textarea class="form-control" id="text_arm"></textarea>

                            <div class="text-right" style="margin-top: 20px">
                            
                                <button type="button" class="btn btn-danger" id="cancel_add_new_text" data-id="">Cancel</button>
                                <button type="button" class="btn btn-primary" id="confirm_add_new_text" data-id=""><i class="glyphicon glyphicon-pencil"></i> Confirm</button>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <?php foreach ($texts as $key => $value):?>
                        <div class="row">
                            <div class="col-xs-12" id="<?=$value['id']?>">
                                <h2 style="text-align: center"><?=$value['alias'];?></h2>
                                <label for="text_eng">Text (Eng):</label>
                                <br><span id="text_eng_warning"></span>
                                <textarea class="form-control" id="text_eng" disabled="disabled"> <?=$value['text_eng'];?> </textarea>
                                <label for="text_arm">Text (Arm):</label>
                                <br><span id="text_arm_warning"></span>
                                <textarea class="form-control" id="text_arm" disabled="disabled"> <?=$value['text_arm'];?> </textarea>

                                <div class="text-right" style="margin-top: 20px">
                                    <button type="button" class="btn btn-danger remove" data-id="<?=$value['id']?>">Delete</button>

                                    <button type="button" class="btn btn-warning edit_text" id="edit_save_text" data-id="<?=$value['id']?>"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
                                </div>
                            </div>
                        </div>
                        <hr />
                    <?php endforeach ?>

                    <!-- the comment box -->
            

                </div>
         
            </div>
        </div>
    </div>

    <script>
            $(document).on("click",".edit_text",function() {
                $id = $(this).data("id");
                $("#"+$id+" #text_eng").removeAttr("disabled");
                $("#"+$id+" #text_arm").removeAttr("disabled");
                $("#"+$id+" #edit_save_text").removeClass("btn-warning edit_text");
                $("#"+$id+" #edit_save_text").addClass("btn-success save_text");
                $("#"+$id+" #edit_save_text").empty();
                $("#"+$id+" #edit_save_text").append ("Save");
            });

            $(document).on("click",".save_text",function() {
                $("#"+$id+" #text_eng_warning").empty();
                $("#"+$id+" #text_arm_warning").empty();

                var text_eng= $("#"+$id+" #text_eng").val();
                var text_arm = $("#"+$id+" #text_arm").val();
                var error = false;
                if (text_eng == "") {
                    error = true;
                    $("#"+$id+" #text_eng_warning").append("Text (Eng) is required");
                    $("#"+$id+" #text_eng_warning").css("color","red");
                }
                if (text_arm == "") {
                    error = true;
                    $("#"+$id+" #text_arm_warning").append("Text (Arm) is required");
                    $("#"+$id+" #text_arm_warning").css("color","red");
                }
                if (!error) {
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url()?>admin/texts/edit_text_data",
                        data: {text_id: $id, text_eng: text_eng, text_arm: text_arm },
                        success: function(data)
                        {
                            $("#info_message").empty();
                            $("#"+$id+" #remove_text").remove();

                            if (data == 1){
                                $("#"+$id+" #text_eng").attr('disabled','disabled');
                                $("#"+$id+" #text_eng").val(text_eng);
                                $("#"+$id+" #text_arm").attr('disabled','disabled');
                                $("#"+$id+" #text_arm").val(text_arm);
                                $("#info_message").css("color","#4cc74c");
                                $("#info_message").append("Text data is successfully changed !!!");

                                $("#"+$id+" #edit_save_text").removeClass("btn-success save_text");
                                $("#"+$id+" #edit_save_text").addClass("btn-warning edit_text");
                                $("#"+$id+" #edit_save_text").empty();
                                $("#"+$id+" #edit_save_text").append ('<i class="glyphicon glyphicon-pencil"></i>Edit');
                            }else{
                                var text_data = $.parseJSON(data);
                                if (text_data.error) {
                                    $("#"+$id+" #text_eng_warning").append(text_data.error.text_eng);
                                    $("#"+$id+" #text_eng_warning").css("color","red");
                                    $("#"+$id+" #text_arm_warning").append(text_data.error.text_arm);
                                    $("#"+$id+" #text_arm_warning").css("color","red");
                                }
                                $("#info_message").css("color","red");
                                $("#info_message").append("Errors !!!");
                            }
                            $(".modal_info").click();
                        }
                    });
                }

            });


            $(document).on("click",".remove",function() {
                id = $(this).data("id");
                $("#info_message").empty();
                $("#remove_text").remove();
                $("#info_message").css("color","red");
                $("#info_message").append("You are sure you want to delete ?");
                $("#modal_info .modal-footer").prepend('<button type="button" id="remove_text" class="btn btn-success">Yes</button>')
                $(".modal_info").click();

            });

            $(document).on("click","#remove_text",function() {
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>admin/texts/delete_text",
                    data: {id: id},
                    success: function(data)
                    {

                        $("#remove_text").remove();
                        $("#info_message").empty();
                        if (data == 1){
                            $("#info_message").css("color","#4cc74c");
                            $("#info_message").append("User deleted successfully !!!");
                            $("#"+id).remove();
                        }else{
                            $("#info_message").css("color","red");
                            $("#info_message").append("Errors !!!");
                        }
                    }
                });
            });

            $(document).on("click","#add",function() {
                $("#add_new_text").css("display","block");
            });
            $(document).on("click","#cancel_add_new_text",function() {
                $("#add_new_text").css("display","none");
            });

            $(document).on("click","#confirm_add_new_text",function() {
                $("#add_new_text #text_eng_warning").empty();
                $("#add_new_text #text_arm_warning").empty();
                $("#add_new_text #text_alias_warning").empty();

                var text_alias= $("#add_new_text #text_alias").val();
                var text_eng= $("#add_new_text #text_eng").val();
                var text_arm = $("#add_new_text #text_arm").val();
                var error = false;
                if (text_alias == "") {
                    error = true;
                    $("#add_new_text #text_alias_warning").append("Alias is required");
                    $("#add_new_text #text_alias_warning").css("color","red");
                }
                if (text_eng == "") {
                    error = true;
                    $("#add_new_text #text_eng_warning").append("Text (Eng) is required");
                    $("#add_new_text #text_eng_warning").css("color","red");
                }
                if (text_arm == "") {
                    error = true;
                    $("#add_new_text #text_arm_warning").append("Text (Arm) is required");
                    $("#add_new_text #text_arm_warning").css("color","red");
                }

                if (!error) {
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url()?>admin/texts/add_new_text",
                        data: {text_alias: text_alias, text_eng: text_eng, text_arm: text_arm },
                        success: function(data)
                        {
                            $("#info_message").empty();
                            $("#add_new_text #remove_text").remove();

                            if (data == 1){
                                location.reload();
                                // $("#add_new_text").css("display","none");
                            }else{
                                var text_data = $.parseJSON(data);
                                if (text_data.error) {
                                    $("#add_new_text #text_alias_warning").append(text_data.error.text_alias);
                                    $("#add_new_text #text_alias_warning").css("color","red");
                                    $("#add_new_text #text_eng_warning").append(text_data.error.text_eng);
                                    $("#add_new_text #text_eng_warning").css("color","red");
                                    $("#add_new_text #text_arm_warning").append(text_data.error.text_arm);
                                    $("#add_new_text #text_arm_warning").css("color","red");
                                }
                                $("#info_message").css("color","red");
                                $("#info_message").append("Errors !!!");
                            }
                            $(".modal_info").click();
                        }
                    });
                }

            });
            
            


    </script>

