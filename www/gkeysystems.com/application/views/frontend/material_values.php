		<main class="cd-main-content" id="kaydir">
			<section id="background" class="main_bg">
			</section>
			<div id="left_part_of_main">
			</div>
			
			<article id="table-area">
		      
		        <div style="border: 2px solid rgba(33, 33, 33, 0.41); border-radius: 12px;">
					<div id="filter_1" class="col-md-12" style="margin-bottom: 20px; padding: 20px 20px 30px;">
		                <div class="col-md-12">
			                <form action="<?=base_url();?>filter/filter_2" method="post">
			                    <div class="col-md-3">
			                        <label style="text-align: center;">Ամսաթիվ: </label>
			                        <input type="date" class="form-control" name="date">
			                    </div>
			                    <div class="col-md-3">
			                        <label style="text-align: center;">Պահեստ: </label>
			                        <select class="form-control" name="warehouse">
			                            <option value="">xsax</option>
			                        </select>
			                    </div>
			                    <div class="col-md-3">
			                        <label style="text-align: center;">Խումբ: </label>
			                        <select class="form-control" name="group">
			                            <option value="">xsax</option>
			                        </select>
			                    </div>
			                    <div class="col-md-3">
			                        <label style="text-align: center;">Ապրանք: </label>
			                        <select class="form-control" name="product">
			                            <option value="">xsax</option>
			                        </select>
			                    </div>
								<div class="col-md-3">
			                        <label style="text-align: center;">Ցույց տալ գումարները դրամով (Առանց ԱԱՀ): </label>
			                        <select class="form-control" name="price_amd">
			                            <option value="">xsax</option>
			                        </select>
			                    </div>
			                    <div class="col-md-3">
			                        <label style="text-align: center;">Ըստ տարբեր խմբաքանակների: </label>
			                        <select class="form-control" name="various_batches">
			                            <option value="">xsax</option>
			                        </select>
			                    </div>
			                      <div class="col-md-3">
			                        <label style="text-align: center;">Ցույց տակ գները ըստ գնի տեսակի: </label>
			                        <select class="form-control" name="price_type">
			                            <option value="">xsax</option>
			                        </select>
			                    </div>

			                    <div class="col-md-3" style="float: right; margin-top: 25px">
			                        <button type="submit" class="form-control btn btn-success" id="btn_search_by_filter"  style=" background-color: yellowgreen">Փնտրել </button>
			                    </div>
		                    </form>
		                </div>
		            </div>
		        </div>
			
			</article>
		</main>
		