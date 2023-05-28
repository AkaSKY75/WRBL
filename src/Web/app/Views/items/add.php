<div class="row">

<div class="col-md-12">


  <div class="widget wgreen">
	
	<div class="widget-head">
	  <div class="pull-left">Add New Item</div>
	  <div class="widget-icons pull-right">
		<a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
		<a href="#" class="wclose"><i class="fa fa-times"></i></a>
	  </div>
	  <div class="clearfix"></div>
	</div>

	<div class="widget-content">
	  <div class="padd">

		<br />
		<!-- Form starts.  -->
		 <form class="form-horizontal" role="form" method="post" action="{SITE_URL}/items/process/" enctype="multipart/form-data">		 
					<div class="form-group">
					  <label class="col-lg-2 control-label">Name</label>
					  <div class="col-lg-5">
						<input type="text" class="form-control" placeholder="Item Name" id="item_name" name="item_name" required>
					  </div>
					</div>					
					<div class="form-group">
					  <label class="col-lg-2 control-label">Classes</label>
					  <div class="col-lg-6">
							  {CLASSES}
								  <b>{class_name}:</b> <br/>
									  {ROLES}  
									  <label class="checkbox-inline">
											<input type="checkbox" name="ck_{id_role}" value="{id_role}" /> 
											{role_name}
                                    </label>
										{/ROLES}<br/><br/>
							  {/CLASSES}
							
					  </div>
					</div>      
					<div class="form-group">
					  <label class="col-lg-2 control-label">Photo</label>
					  <div class="col-lg-5">
						<input type="file" class="form-control"  id="item_photo" name="item_photo" accept="image/*" placeholder="Choose item photo">
					  </div>
					</div>
					<div class="form-group">
					  <label class="col-lg-2 control-label">Item code</label>
					  <div class="col-lg-5">
						<input type="text" class="form-control" placeholder="Item Code" id="item_code" name="item_code" >
					  </div>
					</div>		
					<div class="form-group">
					  <label class="col-lg-2 control-label">Item price</label>
					  <div class="col-lg-5">
						<input type="text" class="form-control" placeholder="Item Price" id="item_price" name="item_price" >
					  </div>
					</div>										
					<div class="form-group">
					  <div class="col-lg-5">
							<input type="submit" name="add_item" class="add_item" value="Add item">
					  </div>
					</div>
					
				  </form>
	  </div>
	</div>
	  <div class="widget-foot">
		<!-- Footer goes here -->
	  </div>
  </div>  

</div>

</div>