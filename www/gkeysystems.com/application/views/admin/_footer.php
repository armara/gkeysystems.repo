<!-- Modal info -->
<button type="button" class="hidden modal_info" data-toggle="modal" data-target="#modal_info"></button>
<div id="modal_info" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="padding-bottom: 0;">
            <div class="modal-header alert alert-warning" >
                <button type="button" class="close" data-dismiss="modal" style="color: darkblue">&times;</button>
                <h4 class="modal-title" style="text-align: center; font-weight: 500">INFO</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div id="info_message" style="text-align: center; font-size: 20px; font-weight: bold;">

                    </div>
                </div>
            </div>
            <div class="modal-footer" style="margin-top: 0">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- / Modal info-->

<script>
    var url = window.location.href;
    var page = url.substring(url.lastIndexOf('/') + 1);
    $("#left_bar_"+page).addClass("selected");
</script>
</body>
</html>
