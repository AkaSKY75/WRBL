
<h2 style="display:{disp_message}"> Currently there are no questions in your database !</h2>  
  <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Frequently - Asked Questions</div>
                  <div class="widget-icons pull-right"><a href="{SITE_URL}/faq/create" type="button" class="btn btn-sm btn-info"><i class="fa fa-plus"></i></a>
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
												<td>Question</td>
												<td></td>
											</tr>
										</thead>
										<tbody>
												{FAQSU}
												<tr>
													<td>{faq_question}</td>
													<td>
														<a class="link" href="{SITE_URL}/faq/edit/{faq_id}">Edit</a>&nbsp;&nbsp;&nbsp;
														<a class="link" href="{SITE_URL}/faq/delete/{faq_id}" onclick="conf_del()">Delete</a>
													</td>
												</tr>		
												{/FAQSU}
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
