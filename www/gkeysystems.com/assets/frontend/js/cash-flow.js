    $(document).on("click","#btn_search_by_filter",function()
    {


        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        var storage_id = $('#warehouse option:selected').attr('id');
        var mtgroup_id = $('#product_service_group option:selected').attr('id');
        var material_id = $('#product_service option:selected').attr('id');
        var partner_id = $('#partner option:selected').attr('id');
        var sort_id = $('#sort_by option:selected').attr('id');



        $.ajax({
            type: "POST",
            url: "<?=base_url()?>home/get_sales",
            data: {start_date: start_date,
                end_date: end_date,
                storage_id: storage_id,
                mtgroup_id: mtgroup_id,
                material_id: material_id,
                partner_id: partner_id,
                sort_id: sort_id},
            dataType:"json",
            success: function(data)
            {
                var html_table = "";
                var sort_id = $('#sort_by option:selected').attr('id');
                //console.log('--------------------');
                //console.log(data);
                //alert("Yeeeeeeeeeeeees!!!!!!!!!");

                document.getElementById('div_res_table').innerHTML='';

                //alert(data[1].length);

                if (data.length > 0)
                {
                    html_table	+= "<table border='1' class='table table-hover' cellspacing='0' id='list_data'>";

                    if (sort_id == 0)
                    {

                        html_table += "<thead>"
                        html_table += "<tr><th></th><th>Дата</th><th>Код</th><th>Товар</th><th>Склад</th><th>Контрагент</th><th>Кол-во</th><th>Кол</th><th>Сумма покупки</th><th>Сумма продажи</th><th>Рента</th><th>Маржа</th></tr>";
                        html_table += "<tr><th><input id='paradigm_all' type='checkbox'></th><th></th><th><input type='text' id='search' size='3'></th><th><input type='text' id='search' size='12'></th></th><th><input type='text' id='search' size='8'></th><th><input type='text' id='search' size='8'></th><th><input type='text' id='search' size='3'></th><th></th><th></th><th></th><th></th><th></th></tr>"
                        html_table += "</thead>"
                        html_table += "<tbody>"
                        for(var i in data)
                        {
                            //console.log('--------------------');
                            //console.log(data[2]);

                            var marge_string = data[i].marge;
                            var rent_string = data[i].rent;
                            var sale_sum_string = Number(data[i].sale_sum);
                            var count_string = Number(data[i].count);
                            var cost_sum_string = Number(data[i].cost_sum);
                            var partner_name = data[i].partnr_name;
                            var storage_name = data[i].storage_name;
                            if(partner_name == null){
                                partner_name = "";
                            }
                            if(storage_name == null){
                                storage_name = "";
                            }



                            html_table += "<tr><td><input name='paradigm' class='chkOptions' type='checkbox' value='"+ cost_sum_string.toFixed(2) +"'></td><td>" + data[i].date.slice(0, 11) + "</td><td>" + data[i].prod_code + "</td><td>" + data[i].prod_name + "</td><td>" + storage_name + "</td><td>" + partner_name + "</td><td>" + count_string.toFixed(2) + "</td><td>" + data[i].qnt_unit + "</td><td class='cost-sum'>" + cost_sum_string.toFixed(2) + "</td><td>" + sale_sum_string.toFixed(2) + "</td><td>" + rent_string.toFixed(2) + "</td><td>" +  marge_string.toFixed(2); + "</td></tr>";

                        }
                        html_table += "</tbody>"

                        $(document).ajaxSuccess(function() {
                            $("#search-code").keyup(function() {
                                var value = this.value;

                                $("table").find("tbody").children("tr").each(function(index) {
                                    if (index === 0) return;
                                    var id = $(this).find("td:nth-child(3)").text();
                                    $(this).toggle(id.indexOf(value) !== -1);
                                });
                            });
                            var sum = 0;
                                // iterate through each td based on class and add the values
                            $(".cost-sum").each(function() {

                                var value = $(this).text();
                                // add only if the value is number
                                if(!isNaN(value) && value.length != 0) {
                                    sum += parseFloat(value);
                                }

                            });
                            $("#cost-sum").text(sum.toFixed(2));

                            <!--//////////////////////////////-->
                            $(document).ready(function()
                                {
                                  $("#paradigm_all").click(function()               
                                  {
                                    var checked_status = this.checked;
                                    var ntot = 0;
                                    $("input[name=paradigm]").each(function()
                                    {
                                      if (checked_status) ntot += parseFloat($(this).val());         
                                       this.checked = checked_status;                           
                                       
                                    });
                                    $("#PaymentTotal").text(ntot.toFixed(2));
                                
                                  });                   
                                });
                                function updateSum() {
                                  var ntot = 0;
                                  $("input.chkOptions:checked").each(function() {
                                    ntot += parseFloat($(this).val());
                                  });
                                  $("#PaymentTotal").text(ntot.toFixed(2));
                                }    
                                
                                $(document).ready(function() {
                                  $(".chkOptions").click(function() {
                                    updateSum();
                                  });
                                
                                  $('#paradigm_all').click(function() {
                                    $("input[type='checkbox']").attr('checked', $('#paradigm_all').is(':checked'));   
                                    updateSum();
                                  });


                                });                            
                                                            
                            <!--///////////////////////////-->                                                                                                                





                        });


                    }


                    else if (sort_id == 1)
                    {
                        html_table += "<tr><th></th><th>Контрагент</th><th>Сумма покупки</th><th>Сумма продажи</th><th>Рента</th><th>Маржа</th></tr>";
                        html_table += "<tr><th><input type='checkbox'></th><th><input type='text' id='search' size='15'></th><th></th><th></th><th></th><th></th></tr>";
                        for(var i in data)
                        {
                            var marge_string = data[i].marge;
                            var rent_string = data[i].rent;
                            var sale_sum_string = Number(data[i].sale_sum);
                            var cost_sum_string = Number(data[i].cost_sum);




                            html_table += "<tr><td><input type='checkbox'></td><td>" + data[i].partnr_name + "</td><td>" + cost_sum_string.toFixed(2) + "</td><td>" + sale_sum_string.toFixed(2) + "</td><td>" + rent_string.toFixed(2) + "</td><td>" + marge_string.toFixed(2) + "</td></tr>";
                        }
                    }
                    else if (sort_id == 2)
                    {
                        html_table += "<tr><th></th><th>Код товара</th><th>Товар</th><th>Кол-во</th><th>Кол-во</th><th>Сумма покупки</th><th>Сумма продажи</th><th>Рента</th><th>Маржа</th></tr>";
                        html_table += "<tr><th><input type='checkbox'></th><th><input type='text' id='search' size='3'></th><th><input type='text' id='search' size='15'></th><th><input type='text' id='search' size='3'></th><th></th><th></th><th></th><th></th><th></th></tr>";
                        for(var i in data)
                        {
                            var marge_string = data[i].marge;
                            var sale_sum_string = Number(data[i].sale_sum);
                            var cost_sum_string = Number(data[i].cost_sum);
                            var count_string = Number(data[i].count);

                            html_table += "<tr><td><input type='checkbox'></td><td>" + data[i].prod_code + "</td><td>" + data[i].prod_name + "</td><td>" + count_string.toFixed(2) + "</td><td>" + data[i].qnt_unit + "</td><td>" + cost_sum_string.toFixed(2) + "</td><td>" + sale_sum_string.toFixed(2) + "</td><td>" + data[i].rent + "</td><td>" + marge_string.toFixed(2) + "</td></tr>";
                        }
                    }

                    html_table += "</table>";

                    $('#div_res_table').append(html_table);
                }
            }
        });
    });
    $(document).ready(function(){
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
