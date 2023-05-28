    <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Items</div>
                  <div class="widget-icons pull-right"> 
                                    <a href="{SITE_URL}/items/add" type="button" class="btn btn-sm btn-info"><i class="fa fa-plus"></i></a>
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
                                                <td>Classes/Roles</td>
												<td>Actions</td>
											</tr>
										</thead>
										<tbody>
												{ITEMS}
												<tr>
													<td><a href="http://oac-head.com/items/{item_code}/"><img src="{BASE_URL}/images/uploads/items/{item_photo}"/></a></td>
													<td>{item_name}</td>
                                                    <td>{CLASSES} {class_name} - {/CLASSES}/<br/>
														{ROLES}{role_name} - {/ROLES}</td>
													<td>
														<a class="link" href="{SITE_URL}/items/edit/{id_item}">Edit</a>&nbsp;&nbsp;&nbsp;
														<a class="link" href="{SITE_URL}/items/delete/{id_item}" onclick="conf_del()">Delete</a>
													</td>
												</tr>		
												{/ITEMS}
										</tbody>
									</table>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here --> <a href="{SITE_URL}/items/add" type="button" class="btn btn-sm btn-info"><i class="fa fa-plus"></i></a>
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
			