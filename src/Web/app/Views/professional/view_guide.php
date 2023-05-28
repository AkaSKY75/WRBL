 <div class="row">
            <div class="col-md-12">
				
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">About the guide</div>
				     <div class="widget-icons pull-right"> 
                                    <a href="{SITE_URL}/guides/edit_guide/{id_guide}" type="button" class="btn btn-sm btn-info">Edit</a>
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">     
					<div class="row">
						<div class="col-md-2"><img src="{BASE_URL}/images/guides/{guide_photo}"/> </div>
						<div class="col-md-10">Price: ${guide_price} <br/>
												Description: {guide_content}</div>
					</div>							
				</div>
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
				
				<div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Introduction</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">        
				  {introduction}
				</div>
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
				
				<div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Classes</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">        
				  {CLASSES}
				</div>
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
				
				
				<div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Abilities</div>
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">        
				 	  <ul style="list-style:none">
						  {SPELLS}
							<li class="col-md-3>"><img src="{BASE_URL}/images/uploads/spells/{spell_photo}" /> {spell_name} </li>
						  {/SPELLS}
						  </ul>
				</div>
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
				
				
				
				
				
				
              </div>  
              
            </div>