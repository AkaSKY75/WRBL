    <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Messages</div>
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
												
												<td>Message</td>
												<td>Date</td>
												<td></td>
											</tr>
										</thead>
										<tbody>
												{PENDING}
												<tr>
													
													<td>{description}</td>
													<td>{date_added}</td>
													<td>
													<a class="link" href="{SITE_URL}/messages/reply/{id_message}">Reply</a>&nbsp;&nbsp;&nbsp;	
													<a class="link" style="display:{disp}" href="{SITE_URL}/messages/close/{id_message}">Close</a>	
													</td>
												</tr>	
												{/PENDING}
										</tbody>
									</table>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
                  </div>
                  <div class="widget-foot">
                    <b><div class="pull-left">Send new notification</div></b> <br><br>
					<div class="input-group">
					<form action="{SITE_URL}/messages/send_notification" method="post">
					
					<textarea name="description" class="cleditor"></textarea><br/>
					Send to:<br>
					<input type="checkbox" name="send_users"/> Users    
					<input type="checkbox" name="send_sellers"/> Sellers<br><br>
					<input type="submit" value="Send!" />
					  
					  </form>
					</div>


                  </div>
                </div>
              </div>  
              
            </div>
