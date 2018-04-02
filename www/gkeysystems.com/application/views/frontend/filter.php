<main class="cd-main-content" id="kaydir">
    <section id="background" class="main_bg">
    </section>
    <div id="left_part_of_main">
    </div>

    <article id="table-area">
        <ul>
            <li><a href="##" class="filter_1"><span>Filter_1</span></a></li>
            <li><a href="##" class="filter_2"><span>Filter_2</span></a></li>
        </ul>

        <div style="border: 2px solid rgba(33, 33, 33, 0.41); border-radius: 12px;">

            <div id="filter_1" class="col-md-12" style="margin-bottom: 20px; padding: 20px 20px 30px;">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <label style="text-align: center;">Ամսաթիվ: </label>
                        <input type="date" class="form-control" >
                    </div>
                    <div class="col-md-3">
                        <label style="text-align: center;">Պահեստ: </label>
                        <select class="form-control" id="animal_types" name="animal_types">
                            <option value="">xsax</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label style="text-align: center;">Խումբ: </label>
                        <select class="form-control" id="animal_types" name="animal_types">
                            <option value="">xsax</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label style="text-align: center;">Ապրանք: </label>
                        <select class="form-control" id="animal_types" name="animal_types">
                            <option value="">xsax</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label style="text-align: center;">Ցույց տալ գումարները դրամով (Առանց ԱԱՀ): </label>
                        <select class="form-control" id="animal_types" name="animal_types">
                            <option value="">xsax</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label style="text-align: center;">Ըստ տարբեր խմբաքանակաների: </label>
                        <select class="form-control" id="animal_types" name="animal_types">
                            <option value="">xsax</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label style="text-align: center;">Ցույց տալ գները ըստ գնի տեսակի: </label>
                        <select class="form-control" id="animal_types" name="animal_types">
                            <option value="">xsax</option>
                        </select>
                    </div>

                    <div class="col-md-3" style="float: right; margin-top: 25px">
                        <button class="form-control btn btn-success" id="btn_search_by_filter"  style=" background-color: yellowgreen">Փնտրել </button>
                    </div>
                </div>
            </div>

            <div id="filter_2" class="col-md-12" style="margin-bottom: 20px; padding: 20px 20px 30px; display: none">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <label style="text-align: center;"></label>
                        <input type="text" class="form-control" id="filter_text" name="filter_text" >
                    </div>
                    <div class="col-md-3">
                        <label style="text-align: center;"></label>
                        <select class="form-control" id="animal_types" name="animal_types">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label style="text-align: center;"></label>
                        <select class="form-control" id="animal_types" name="animal_types">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-md-3" style="float: right; margin-top: 25px">
                        <button class="form-control btn btn-success" id="btn_search_by_filter"  style=" background-color: yellowgreen">Փնտրել </button>
                    </div>
                </div>
            </div>
        </div>


    </article>
</main>

<script>
    $(document).on("click",".filter_1",function() {
        $("#filter_1").css("display", 'block');
        $("#filter_2").css("display", 'none');
    });
    $(document).on("click",".filter_2",function() {
        $("#filter_2").css("display", 'block');
        $("#filter_1").css("display", 'none');
    });
</script>