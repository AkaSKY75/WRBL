<div class="row">

<div class="col-md-12">


  <div class="widget wgreen">
	
	<div class="widget-head">
	  <div class="pull-left">Add New Guide</div>
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
		 <form class="form-horizontal" role="form" method="post" action="{SITE_URL}/guides/add_guide_done/" enctype="multipart/form-data">	
					<div class="form-group">
					  <label class="col-lg-2 control-label">Title</label>
					  <div class="col-lg-6">
						<input type="text" class="form-control"  id="guide_title" name="guide_title" required>
					  </div>
					</div>	
					<div class="form-group">
					  <label class="col-lg-2 control-label">Guide type</label>
					  <div class="col-lg-6">
						<input type="radio" name="guide_type" value="pvp"  checked="checked"/>PVP<br/>
						<input type="radio" name="guide_type" value="pve"/>PVE<br/>
						<input type="radio" name="guide_type" value="all"/>All
					  </div>
					</div>						
					<div class="form-group">
					  	<div class="form-group">
					  <label class="col-lg-2 control-label">A short description</label>
					  <div class="col-lg-6">
						<textarea class="cleditor" id="guide_content" name="guide_content" placeholder="A short description" ></textarea>
					  </div>
					</div>
					</div>    				
					<div class="form-group">
					  	<div class="form-group">
					  <label class="col-lg-2 control-label">Guide price</label>
					  <div class="col-lg-6">
							<input type="text" class="form-control" placeholder="Price" id="guide_price" name="guide_price" required>
					  </div>
					</div>
					</div>    
					<div class="form-group">
					  <label class="col-lg-2 control-label">Guide photo</label>
					  <div class="col-lg-5">
						<input type="file" class="form-control"  id="guide_photo" name="guide_photo" accept="image/*" placeholder="Choose guide photo">
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
					<hr/>
					<div class="form-group">
					  	<div class="form-group">
					  <label class="col-lg-2 control-label">Introduction section</label>
					  <div class="col-lg-6">
						<textarea class="cleditor" id="introduction" name="introduction" placeholder="Introduction" ></textarea>
					  </div>
					</div>
					</div>
					<hr/>
					<div class="form-group">
					  	<div class="form-group">
					  <label class="col-lg-2 control-label">Spells section</label>
					  <div class="col-lg-6">
						<label for="spells_text">Spells details</label>
					  <textarea class="cleditor" id="spells_text" name="spells_text" placeholder="Spells section details" ></textarea>
						  <ul style="list-style:none">
						  {SPELLS}
							<li class="col-md-3>"><input type="checkbox" name="spell_{id_spell}" id="spell_{id_spell}" value="spell_{id_spell}" /> <img src="{BASE_URL}/images/uploads/spells/{spell_photo}" /> {spell_name} </li>
						  {/SPELLS}
						  </ul>
					  </div>
					   <div class="col-lg-8">
						<label for="spells_text">Spells details</label>
					  <textarea class="cleditor" id="spells_text" name="spells_text" placeholder="Spells section details" ></textarea>
						  <ul style="list-style:none">
						  {SPELLS}
							<li class="col-md-3>"><input type="checkbox" name="spell_{id_spell}" id="spell_{id_spell}" value="spell_{id_spell}" /> <img src="{BASE_URL}/images/uploads/spells/{spell_photo}" /> {spell_name} </li>
						  {/SPELLS}
						  </ul>
					  </div>
					   <div class="col-lg-6">
						<label for="spells_text">Spells details</label>
					  <textarea class="cleditor" id="spells_text" name="spells_text" placeholder="Spells section details" ></textarea>
						  <ul style="list-style:none">
						  {SPELLS}
							<li class="col-md-3>"><input type="checkbox" name="spell_{id_spell}" id="spell_{id_spell}" value="spell_{id_spell}" /> <img src="{BASE_URL}/images/uploads/spells/{spell_photo}" /> {spell_name} </li>
						  {/SPELLS}
						  </ul>
					  </div>
					</div>
					</div>		
					<hr/>
					<div class="form-group">
					  	<div class="form-group">
					  <label class="col-lg-2 control-label">Gear mastery section</label>
					  <div class="col-lg-6">
						<label for="spells_text">Gear mastery details</label>
					  <textarea class="cleditor" id="gear_mastery_text" name="gear_mastery_text" placeholder="Gear mastery section details" ></textarea>
						  <ul style="list-style:none">
						  {GMS}
							<li class="col-md-3>"><input type="checkbox" name="gear_mastery_{id_gear_mastery}" id="gear_mastery_{id_gear_mastery}" value="gear_mastery_{id_gear_mastery}" /> <img src="{BASE_URL}/images/uploads/gear_mastery/{gear_mastery_photo}" /> {gear_mastery_name} </li>
						  {/GMS}
						  </ul>
					  </div>
					</div>
					</div>								
					<div class="form-group">
					  <div class="col-lg-5">
							<input type="submit" name="add_guide" class="add_item" value="Save guide">
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