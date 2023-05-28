<div class="row">

<div class="col-md-12">


  <div class="widget wgreen">
	
	<div class="widget-head">
	  <div class="pull-left">Add New Category</div>
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
		 <form class="form-horizontal" role="form" method="post" action="{SITE_URL}/categories/process/" enctype="multipart/form-data">		 
					<div class="form-group">
					  <label class="col-lg-2 control-label">Name</label>
					  <div class="col-lg-5">
						<input type="text" class="form-control" placeholder="Category Name" id="category_name" name="category_name" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="col-lg-2 control-label">Parent</label>
					  <div class="col-lg-5">
						<select class="form-control" id="id_parent" name="id_parent">
							<option value="0">Main category</option>
						 {CATEGORIES}
							  <option value="{id_category_parent}">{parent_category_name}</option>
								  {SUBCATEGORIES}
									<option value="{id_subcategory}">-->{subcategory_name}</option>
								  {/SUBCATEGORIES}
						  {/CATEGORIES}
						</select>
					  </div>
					</div>
					<div class="form-group">
					  <label class="col-lg-2 control-label">Description</label>
					  <div class="col-lg-6">
						<textarea class="cleditor" id="category_description" name="category_description" placeholder="Enter category description " ></textarea>
					  </div>
					</div>       								
					<div class="form-group">
					  <label class="col-lg-2 control-label">Photo</label>
					  <div class="col-lg-5">
						<input type="file" class="form-control"  id="category_photo" name="category_photo" accept="image/*" placeholder="Choose category photo">
					  </div>
					</div>
					
					<div class="form-group">
					  <label class="col-lg-2 control-label">Status</label>
					  <div class="col-lg-2">
						<select class="form-control" id="id_category_status" name="id_category_status">
						 {STATUS}
							  <option value="{id_category_status}">{category_status}</option>
						  {/STATUS}
						</select>
					  </div>
					</div>     

					<div class="form-group">
					  <div class="col-lg-5">
							<input type="submit" name="project_fesave" class="project_fesave" value="Add category">
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