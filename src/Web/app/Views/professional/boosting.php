    <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Boosting - {TITLE}</div>
                  <div class="widget-icons pull-right">
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
								  <form class="form-horizontal" role="form" method="post" action="{SITE_URL}/professional/boosting_save" enctype="multipart/form-data">
									<table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="100%">
										<thead>
											<tr>
												<td>Class</td>
												<td>Level name (min-max)</td>
												<td>Arena type</td>
												<td>Price per game</td>
											</tr>
										</thead>
										<tbody>
												{BOOSTING}
												<tr>
													<td> {class_name}</td>
													<td> {level_name}({level_min}-{level_max}) </td>
													<td> {arena_type}x{arena_type} </td>
													<td> <input type="text" name="price_{id_boosting}" value="{price}"/> </td>
												</tr>		
												{/BOOSTING}
										</tbody>
									</table>
									<input type="submit" name="project_fesave" class="project_fesave" value="Save">
									</form>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>  
              
            </div>