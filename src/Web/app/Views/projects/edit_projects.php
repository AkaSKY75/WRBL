<div class="ignitiondeck">
	<div class="id-fes-form-wrapper" >
<form class="form-horizontal" method="post" action="{SITE_URL}/projects/process/{id_user}">
<fieldset>
<input type="hidden" name="source" value="{source}" />
<ul>
<li class="form-row half" > <div class="fes_section"><h3 >
Edit project</h3></div>

</li>
<li class="form-row half">  <label class="col-md-8 control-label" for="project_title">Title</label>  
  <input id="project_title" name="project_title" type="text" placeholder="Project title here..." value="{project_title}" class="form-control input-md" required> 
</li>

<li class="form-row half "> <label class="col-md-4 control-label" for="project_amount">Amount</label>  
  <input id="project_amount" name="project_amount" type="text" placeholder="Project amount here..." value="{project_amount}"class="form-control input-md" required> 
</li>

<li class="form-row half">  
<label class="col-md-4 control-label" for="project_description">Description</label>  
  <textarea id="project_description" name="project_description" type="text" placeholder="Description here..." class="form-control input-md" required>{project_description}</textarea>
</li> 
  
  <li class="form-row half">  
<label class="col-md-4 control-label" for="project_short_description">Short description</label>  
  <textarea id="project_short_description" name="project_short_description" type="text" placeholder="Short description here..." class="form-control input-md" required>{project_short_description}</textarea>
</li> 
  
  <li class="form-row half "> <label class="col-md-4 control-label" for="project_start_date">Start date</label>  
  <input id="project_start_date" name="project_start_date" type="text" placeholder="Project start date here..." value="{project_start_date}"class="form-control input-md" required> 
</li>

<li class="form-row half "> <label class="col-md-4 control-label" for="project_end_date">End date</label>  
  <input id="project_end_date" name="project_end_date" type="text" placeholder="Project end date here..." value="{project_end_date}"class="form-control input-md" required> 
</li>

<li class="form-row half "> <label class="col-md-4 control-label" for="id_category">Category</label>  
  <select id="id_category" name="id_category" class="form-control input-md" required>
  {CATEGORY}
      <option value="{id_category}" {selected}>{category_name}</option>
  {/CATEGORY}
    </select>
</li>

<li class="form-row half "> <label class="col-md-4 control-label" for="id_status">Status</label>  
  <select id="id_status" name="id_status" class="form-control input-md" required>
  {STATUS}
      <option value="{id_status}" {selected}>{project_status}</option>
  {/STATUS}
    </select>
</li>

<li class="form-row half">  
<label class="col-md-4 control-label" for="project_photo">Photo</label>  
  <input id="project_photo" name="project_photo" type="file" accept="image/*" placeholder="Choose the project photo..." value="{project_photo}" class="form-control input-md">
</li>

<li class="form-row half">  
<label class="col-md-4 control-label" for="project_video">Video</label>  
  <input id="project_video" name="project_video" type="file" accept="video/*" placeholder="Choose the project video..." value="{project_video}" class="form-control input-md">
</li>

  
<li class="form-row half "> <label class="col-md-4 control-label" for="id_country">Location</label>  
  <select id="id_country" name="id_country" class="form-control input-md" required>
  {COUNTRY}
      <option value="{id_country}" {selected}>{country_name}</option>
  {/COUNTRY}
    </select>
</li>
<li class="form-row half">  
 <input type="submit" name="project_fesave" class="project_fesave" value="Edit project">
</li>
</fieldset>
</form>
</ul>
</div>
</div>