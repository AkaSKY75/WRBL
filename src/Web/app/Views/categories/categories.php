    <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Categories</div>
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
									<table cellpadding="0" cellspacing="0" border="0" id="data-table-1" width="100%">
										<thead>
											<tr>
												<td>#</td>
												<td>Name</td>
												<td>Status</td>
												<td>&nbsp;</td>
											</tr>
										</thead>
										<tbody>
												{CATEGORIES}
												<tr>
													<td>{id_category}</td>
													<td>{category_name}</td>
													<td>{category_status}</td>
													<td>
														<a class="link" href="{SITE_URL}/categories/edit/{id_category}">Edit</a>&nbsp;&nbsp;&nbsp;
														<a class="link" href="{SITE_URL}/categories/delete/{id_category}">Delete</a>
													</td>
												</tr>		
													{SUBCATEGORIES}
													<tr>
														<td>{id_subcategory}</td>
														<td><i class="fa fa-long-arrow-right"></i>{subcategory_name}</td>
														<td>{subcategory_status}</td>
														<td>
															<a class="link" href="{SITE_URL}/categories/edit/{id_subcategory}">Edit</a>&nbsp;&nbsp;&nbsp;
															<a class="link" href="{SITE_URL}/categories/delete/{id_subcategory}">Delete</a>
														</td>
													</tr>
														{SUBSUBCATEGORIES}
														<tr>
															<td>{id_subsubcategory}</td>
															<td><i class="fa fa-long-arrow-right"></i><i class="fa fa-long-arrow-right"></i>{subsubcategory_name}</td>
															<td>{subsubcategory_status}</td>
															<td>
																<a class="link" href="{SITE_URL}/categories/edit/{id_subsubcategory}">Edit</a>&nbsp;&nbsp;&nbsp;
																<a class="link" href="{SITE_URL}/categories/delete/{id_subsubcategory}">Delete</a>
															</td>
														</tr>
														{/SUBSUBCATEGORIES}
													{/SUBCATEGORIES}
												{/CATEGORIES}
										</tbody>
									</table>
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