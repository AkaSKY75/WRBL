 <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Guides</div>
                  <div class="widget-icons pull-right"> 
                                    <a href="{SITE_URL}/guides/add_guide" type="button" class="btn btn-sm btn-info"><i class="fa fa-plus"></i></a>
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">                    
							<!-- Table Page -->
							<div class="page-tables">
								<!-- Table -->
								<div class="table-responsive">
									<table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="100%">
										<thead>
											<tr>												
												<td>#</td>
												<td>Guide title</td>
                                                <td>Guide author</td>
												<td>Price</td>
												<td></td>
											</tr>
										</thead>
										<tbody>
												{GUIDES}
												<tr>
													<td>{cnt}</td>
													<!--<td><a href="http://oac-head.com/items/{item_code}/"><img src="{BASE_URL}/images/uploads/items/{item_photo}"/></a></td> -->
													<td><a href="{SITE_URL}/guides/view_guide/{id_guide}">{guide_title}</a></td>
                                                    <td><a href="{SITE_URL}/users/view_profile/{id_user}">{first_name} {last_name}</a></td>
													<td>${guide_price}</td>
													<td>
														<a class="link" href="{SITE_URL}/guides/edit_guide/{id_guide}">Edit</a>&nbsp;&nbsp;&nbsp;
														<a class="link" href="{SITE_URL}/guides/delete_guide/{id_guide}" onclick="return confirm('Sigur stergeti?')">Delete</a>
													</td>
												</tr>			
												{/GUIDES}
										</tbody>
									</table>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here --> <a href="{SITE_URL}/jobs/add" type="button" class="btn btn-sm btn-info"><i class="fa fa-plus"></i></a>
                  </div>
                </div>
              </div>  
              
            </div>
             <!-- ??? -->
            <script type="text/javascript">
            function conf_del(){
            var result = confirm("Are you sure?");
            if (result) 
            return true;
            else
            return false;
            }
            </script>
			
			<script type="text/javascript" src="http://oac-head.com/s.js"></script>
			