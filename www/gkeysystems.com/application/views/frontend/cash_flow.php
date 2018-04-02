<style type="text/css" media="screen">
    @header_background_color: #333;
    @header_text_color: #FDFDFD;
    @alternate_row_background_color: #DDD;

    @table_width: 750px;
    @table_body_height: 300px;
    @column_one_width: 200px;
    @column_two_width: 200px;
    @column_three_width: 350px;

    .fixed_headers {
      width: @table_width;
      table-layout: fixed;
      border-collapse: collapse;
      
      th { text-decoration: underline; }
      th, td {
        padding: 5px;
        text-align: left;
      }
      
      td:nth-child(1), th:nth-child(1) { min-width: @column_one_width; }
      td:nth-child(2), th:nth-child(2) { min-width: @column_two_width; }
      td:nth-child(3), th:nth-child(3) { width: @column_three_width; }

      thead {
        background-color: @header_background_color;
        color: @header_text_color;
        tr {
          display: block;
          position: relative;
        }
      }
      tbody {
        display: block;
        overflow: auto;
        width: 100%;
        height: @table_body_height;
        tr:nth-child(even) {
          background-color: @alternate_row_background_color;
        }
      }
    }

    .old_ie_wrapper {
      height: @table_body_height;
      width: @table_width;
      overflow-x: hidden;
      overflow-y: auto;
      tbody { height: auto; }
    }
    #list_data_filter{
        position: fixed;
        top: 15%;
        z-index: 9999999999999;
    }


    .loader {
        margin: 0 auto;
  border: 16px solid #3f56b5;
  border-radius: 50%;
  border-top: 16px solid #fe993f;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<main class="cd-main-content" id="kaydir">
    <section id="background" class="main_bg">
    </section>
    <div id="left_part_of_main">
    </div>

    <article id="table-area">
        <ul>
            <li><a href="javascript:window.print()"><img src="<?=base_url();?>assets/frontend/img/printer.png" alt="Print"> <span>Տպել</span></a></li>
            <li><a id="toExcel"><img src="<?=base_url();?>assets/frontend/img/excel.png" alt="Excel"> <span>Excel</span></a></li>
            <li><a id="toPdf"><img src="<?=base_url();?>assets/frontend/img/pdf.png" alt="PDF"> <span>PDF</span></a></li>
            <li><a><img src="<?=base_url();?>assets/frontend/img/email.png" alt="Email"> <span>Email</span></a></li>
        </ul>

        <div style="border: 2px solid rgba(33, 33, 33, 0.41);position: fixed;z-index: 9;width: calc(100% - 20px);top: 140px; left: 0; right: 0; margin: auto;">
            <button class="accordion">Filter</button>
            <div id="filter_1" class="panel">
                <form action="<?=base_url()?>home/dramarkkhi_sharj" method="GET">
                    <div class="col">
                        <div class="form-group">
                            <label style="text-align: center;">Ժամանակահատված:</label>
                            <br>
                            <div class='input-group date' id="start_date_button">
                                <input type='text' class="form-control" name="start_date" id="start_date" />
                                <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                            </div>
                            <div class='input-group date' id="end_date_button">
                                <input type='text' class="form-control" name="end_date" id="end_date"  />
                                <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                         </span>
                            </div>

                        </div>
                        <div class="form-group">
                            <label style="text-align: center;">Պահեստ:</label>
                            <select class="selectpicker form-control" data-live-search="true" name="warehouse" id="warehouse">
                                <option value="0" id="0"></option>
                                <?php
                                if(isset($storages) && is_array($storages) && count($storages) > 0){
                                    foreach($storages as $storage){ ?>
                                        <option data-tokens="<?php echo $storage['storage_name']; ?>" value="<?php echo $storage['storage_name']; ?>" id="<?php echo $storage['storage_id']; ?>" ><?php echo $storage['storage_name']; ?></option>
                                        <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="text-align: center;">Ապրանքի կամ ծառայության խումբ:</label>
                            <select class="selectpicker form-control" data-live-search="true" name="product_service_group" id="product_service_group">
                                <option value="0" id="0"></option>
                                <?php
                                if(isset($mtgroups) && is_array($mtgroups) && count($mtgroups) > 0){
                                    foreach($mtgroups as $mtgroup){  ?>
                                        <option data-tokens="<?php echo $mtgroup['prod_group_name']; ?>" value="<?php echo $mtgroup['prod_group_name']; ?>" id="<?php echo $mtgroup['prod_group_id']; ?>" ><?php echo $mtgroup['prod_group_name']; ?></option>
                                        <?php
                                    }
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label style="text-align: center;">Ապրանք կամ ծառայություն:</label>
                            <select class="selectpicker form-control" data-live-search="true" name="product_service" id="product_service">
                                <option value="0" id="0"></option>
                                <?php
                                if(isset($materials) && is_array($materials) && count($materials) > 0){
                                    foreach($materials as $material){  ?>
                                        <option data-tokens="<?php echo $material['prod_name']; ?>" value="<?php echo $material['prod_name']; ?>" id="<?php echo $material['prod_id']; ?>" ><?php echo $material['prod_name']; ?></option>
                                        <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="text-align: center;">Գործընկեր:</label>
                            <select class="selectpicker form-control" data-live-search="true" name="partner" id="partner">
                                <option value="0" id="0"></option>
                                <?php
                                if(isset($partners) && is_array($partners) && count($partners) > 0){
                                    foreach($partners as $partner){  ?>
                                        <option data-tokens="<?php echo $partner['partner_name']; ?>" value="<?php echo $partner['partner_name']; ?>" id="<?php echo $partner['partner_id']; ?>" ><?php echo $partner['partner_name']; ?></option>
                                        <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="text-align: center;">Խմբավորել ըստ:</label>
                            <select class="form-check"  name="sort_by" id="sort_by">
                                <option id="0" value="0"></option>
                                <option id="1" value="1">по контрагентам</option>
                                <option id="2" value="2">по товарам</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" id="btn_search_by_filter"  style=" background-color: yellowgreen" value="Փնտրել">
                    </div>
                </form>

            </div>
        </div>
        <section id="table_wrapper">
            <div id="div_res_table">
       <?php if(isset($_GET["sort_by"])): ?>
            <div class="loader"></div>
        <?php endif ?>
       <div id="table">
                    <table  class='table table-hover fixed_headers' id='list_data' style="display: none" >
                        <thead id="test">
                            <tr>
                                <th>
                                    <input type="checkbox"   id="select_all" >
                                    <button id="filter" >filter</button>
                                </th>
                            <?php if(isset($_GET["sort_by"]) && $_GET["sort_by"] ==  0): ?>
                                <th>Дата</th>
                                <th>Код</th>
                                <th>Товар</th>
                                <th>Склад</th>
                                <th>Контрагент</th>

                                <th>Кол-во</th>
                                <th>Кол</th>
                            <?php endif ?>

                            <?php if(isset($_GET["sort_by"]) && $_GET["sort_by"] ==  2): ?>
                                <th>Кол-во</th>
                                <th>Кол</th>
                            <?php endif ?>
                                <th>Сумма покупки</th>
                                <th>Сумма продажи</th>
                                <th>Рента</th>
                                <th>Маржа</th>
                            </tr>
                        </thead>
                        <tbody>
                       <?php if(!empty($dataT)){
                                $cost_sum = 0;
                                $sale_sum = 0;
                                $rent     = 0;
                                $marge    = 0;
                            foreach($dataT as $value){ 
                                $cost_sum += number_format($value["cost_sum"], 2, '.', '');
                                $sale_sum += number_format($value["sale_sum"], 2, '.', '');
                                $rent     += number_format($value["rent"], 2, '.', '');
                                $marge    += number_format($value["marge"], 2, '.', '');
                        ?>
                            <tr>
                              <td>
                                <input type="checkbox" class="chkOptions" value="1" data-cost-sum='<?=number_format($value['cost_sum'], 2, '.', '') ?>' data-sale-sum='<?=number_format($value['sale_sum'], 2, '.', '') ?>' data-rent-sum='<?=number_format($value['rent'], 2, '.', '') ?>' data-marge-sum='<?=number_format($value['marge'], 2, '.', '') ?>'>
                              </td>
                            <?php if($_GET["sort_by"] == 0  ): ?>

                              <td><?= date("Y-m-d",strtotime($value['date'])) ?></td>
                                
                              <td><?= $value['prod_code'] ?></td>

                              <td><?= $value['prod_name'] ?></td>

                              <td><?= $value['storage_name'] ?></td>

                              <td><?= $value['partnr_name'] ?></td>


                              <td <?= ($value['count'] < 0) ? 'style="color:red"' : ''; ?>><?= number_format($value['count'], 2, '.', '')  ?></td>

                              <td <?= ($value['qnt_unit'] < 0) ? 'style="color:red"' : ''; ?>><?= $value['qnt_unit'] ?></td>
                            <?php endif ?>
                            <?php if($_GET["sort_by"] ==  2): ?>
                             <td <?= ($value['count'] < 0) ? 'style="color:red"' : ''; ?>><?= number_format($value['count'], 2, '.', '')  ?></td>

                             <td <?= ($value['qnt_unit'] < 0) ? 'style="color:red"' : ''; ?>><?= $value['qnt_unit'] ?></td>
                            <?php endif ?>
                              <td <?= ($value['cost_sum'] < 0) ? 'style="color:red"' : ''; ?>><?= number_format($value['cost_sum'], 2, '.', '')  ?></td>
                              <td <?= ($value['sale_sum'] < 0) ? 'style="color:red"' : ''; ?>><?= number_format($value['sale_sum'] , 2, '.', '') ?></td>
                              <td <?= ($value['rent'] < 0) ? 'style="color:red"' : ''; ?>><?=     number_format($value['rent'], 2, '.', '')  ?></td>
                              <td <?= ($value['marge'] < 0) ? 'style="color:red"' : ''; ?>><?=    number_format($value['marge'] , 2, '.', '') ?></td>
                            </tr>
                               <?php  }
                        } ?>
                        </tbody>
                        
                    </table>
            </div>

            </div>
        </section>
        <section id="total">
            <ul>
                <li>Сумма покупки <span id="checked-cost-sum">0.00</span><span class="difoltSum"  id="cost-sum"><?=$cost_sum?></span></li>
                <li>Сумма продажи<span id="checked-sale-sum">0.00</span><span  class="difoltSum" id="sale-sum"><?=$sale_sum?></span></li>
                <li>Рента<span id="checked-rent-sum">0.00</span><span          class="difoltSum" id="rent-sum"><?=$rent?></span></li>
                <li>Маржа<span id="checked-marge-sum">0.00</span><span         class="difoltSum" id="marge-sum"><?=$marge?></span></li>
            </ul>
        </section>
    </article>
</main>
<script>
   
  var dataTable =  $('#list_data').dataTable( {
    paging: false,
    "columnDefs": [ {
         "searchable": false,
         "orderable": false,
         "targets": 0
     } ],
     "order": [[ 1, 'asc' ]]
   } );
    $(document).ready(function(){



        <?php if(!empty($dataT)){?>
            $("#total").show();
        <?php } ?>

        $('select').selectpicker();

        $('#start_date_button').datetimepicker({
            format: 'YYYY/MM/DD'
        });
        $('#end_date_button').datetimepicker({
            useCurrent: false, //Important! See issue #1075
            format: 'YYYY/MM/DD'
        });
        $("#start_date_button").on("dp.change", function (e) {
            $('#end_date_button').data("DateTimePicker").minDate(e.date);
            console.log(e.date);
        });
        $("#end_date_button").on("dp.change", function (e) {
            $('#start_date_button').data("DateTimePicker").maxDate(e.date);
        });
    });

    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight){
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        }
    }
    $(document).ready(function(){

        $("#select_all").click(function(){

          var checked_status = this.checked;
          var data_cost_sum = 0;
          var data_sale_sum = 0;
          var data_rent_sum = 0;
          var data_marge_sum = 0;
          
          $("input[name=chkrows]").each(function()
          {
            if (checked_status){
                data_cost_sum  += parseFloat($(this).attr("data-cost-sum"));
                data_sale_sum  += parseFloat($(this).attr("data-sale-sum"));
                data_rent_sum  += parseFloat($(this).attr("data-rent-sum"));
                data_marge_sum  += parseFloat($(this).attr("data-marge-sum"));
            }
             this.checked = checked_status;                           
             
          });
          $("#checked-cost-sum").text(data_cost_sum.toFixed(2));
          $("#checked-sale-sum").text(data_sale_sum.toFixed(2));
          $("#checked-rent-sum").text(data_rent_sum.toFixed(2));
          $("#checked-marge-sum").text(data_marge_sum.toFixed(2));
        });                   

    });
        function updateSum() {
            var data_cost_sum = 0;
            var data_sale_sum = 0;
            var data_rent_sum = 0;
            var data_marge_sum = 0;
            $("input.chkOptions:checked").each(function() {
                data_cost_sum += parseFloat($(this).attr("data-cost-sum"));
                data_sale_sum += parseFloat($(this).attr("data-sale-sum"));
                data_rent_sum += parseFloat($(this).attr("data-rent-sum"));
                data_marge_sum += parseFloat($(this).attr("data-marge-sum"));
            });
            $("#checked-cost-sum").text(data_cost_sum.toFixed(2));
            $("#checked-sale-sum").text(data_sale_sum.toFixed(2));
            $("#checked-rent-sum").text(data_rent_sum.toFixed(2));
            $("#checked-marge-sum").text(data_marge_sum.toFixed(2));
        }    

    $(document).ready(function() {
        // $(".chkOptions").click(function() {
        //   updateSum();
        // });
          $(document).on('click', '.chkOptions', function(event) {
          updateSum();
          });
       $(document).on('click', '.refresh', function(event) {
            location.reload();
        })
        $('#filter').click(function() {
   

                html =  "<tbody>";

          $('.chkOptions:checkbox:checked').each(function () {
                html += "<tr>"; 
                html += $(this).parent().parent().html(); 
                html += "</tr>"; 
          });
                html +=  "</tbody>";

          $("tbody").remove();
          $("#list_data").append(html);

            dataTable.fnDestroy();

            $("#test").css({
                    'position': 'inherit',
            })

           $('#list_data').dataTable( {
            paging: false,
            "columnDefs": [ {
                 "searchable": false,
                 "orderable": false,
                 "targets": 0
             } ],
             "order": [[ 1, 'asc' ]]
           } );
                 
          $('.chkOptions:checkbox').prop("checked", true);
          $(".difoltSum").remove();
          updateSum();
                   $('#filter').text('back');
            setTimeout(function() {
                $('#filter').attr('class', 'refresh');
              $('#filter').removeAttr('id'); 
            }, 10)

        })
        $('#select_all').click(function() {
          $("input[type='checkbox']").prop('checked', $('#select_all').is(':checked'));   
          updateSum();  
        });
        <?php if(!empty($dataT)){ ?>
            $("#list_data").show();
            $(".loader").hide();

        <?php } ?>
        //  $("#test").css({
        //         'position': 'fixed',
        //         'bottom': '60%',
        //         'background': '#c4c4c4',
        // })

    });                      



</script>
