<div class="row">

<div class="col-md-12">


  <div class="widget wgreen">
	
	<div class="widget-head">
	  <div class="pull-left">Edit Guide</div>
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
		 <form class="form-horizontal" role="form" method="post" action="{SITE_URL}/guides/edit_guide_done/{id_guide}" enctype="multipart/form-data">	
					<div class="form-group">
					  <label class="col-lg-2 control-label">Title</label>
					  <div class="col-lg-6">
						<input type="text" class="form-control"  id="guide_title" name="guide_title" value="{guide_title}" required>
					  </div>
					</div>	
					<div class="form-group">
					  <label class="col-lg-2 control-label">Guide type</label>
					  <div class="col-lg-6">
						<input type="radio" name="guide_type" value="pvp" {checkedpvp}/>PVP<br/>
						<input type="radio" name="guide_type" value="pve" {checkedpve}/>PVE<br/>
						<input type="radio" name="guide_type" value="all" {checkedall}/>All
					  </div>
					</div>						
					<div class="form-group">
					  	<div class="form-group">
					  <label class="col-lg-2 control-label">A short description</label>
					  <div class="col-lg-6">
						<textarea class="cleditor" id="guide_content" name="guide_content" placeholder="A short description" >{guide_content}</textarea>
					  </div>
					</div>
					</div>    				
					<div class="form-group">
					  	<div class="form-group">
					  <label class="col-lg-2 control-label">Guide price</label>
					  <div class="col-lg-6">
							<input type="text" class="form-control" placeholder="Price" id="guide_price" name="guide_price" value="{guide_price}" required>
					  </div>
					</div>
					</div>    
					<div class="form-group">
					  <label class="col-lg-2 control-label">Guide photo</label>
					  <div class="col-lg-5">
					Current photo: <img src="{BASE_URL}/images/guides/{guide_photo}" /><br style="clear:both" />
					  
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
											<input type="checkbox" name="ck_{id_role}" value="{id_role}" {selected} /> 
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
						<textarea class="cleditor" id="introduction" name="introduction" placeholder="Introduction" >{introduction}</textarea>
					  </div>
					</div>
					</div>
					<hr/>
					<div class="form-group">
					  	<div class="form-group">
					  <label class="col-lg-2 control-label">Spells section</label>
					  <div class="col-lg-6">
						<label for="spells_text">Spells details</label>
					  <textarea class="cleditor" id="spells_text" name="spells_text" placeholder="Spells section details" >{spells_text}</textarea>
						  <ul style="list-style:none">
						  {SPELLS}
							<li class="col-md-3>"><input type="checkbox" name="spell_{id_spell}" id="spell_{id_spell}" value="spell_{id_spell}" {selected} /> <img src="{BASE_URL}/images/uploads/spells/{spell_photo}" /> {spell_name} </li>
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
					  <textarea class="cleditor" id="gear_mastery_text" name="gear_mastery_text" placeholder="Gear mastery section details" >{gear_mastery_text}</textarea>
						  <ul style="list-style:none">
						  {GMS}
							<li class="col-md-3>"><input type="checkbox" name="gear_mastery_{id_gear_mastery}" id="gear_mastery_{id_gear_mastery}" value="gear_mastery_{id_gear_mastery}" {selected}}/> <img src="{BASE_URL}/images/uploads/gear_mastery/{gear_mastery_photo}" /> {gear_mastery_name} </li>
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