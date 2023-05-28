<a  href="{SITE_URL}/projects/add" class="linkmare">Add new project</a>
<div class="entry-content">
<table class="lista">
<tr>
	<td>#</td>
	<td>Title</td>
	<td>User</td>
	<td>Required sum</td>
	<td>Financed</td>
	<td>Start Date</td>
	<td>End Date</td>
	<td>Status</td>
	<td>Actions</td>
</tr>
{PROJECTS}
<tr>
	<td>{id_project}</td>
	<td>{project_title}</td>
	<td>{username}</td>
	<td>{project_amount}</td>
	<td>{financed}</td>
	<td>{project_start_date}</td>
	<td>{project_end_date}</td>
	<td>{id_status}</td>
	<td>
	<a class="link" href="{SITE_URL}/projects/view/{id_project}">View</a><br/>	
	<a class="link" href="{SITE_URL}/projects/edit/{id_project}">Edit</a><br/>	
	<a class="link" href="{SITE_URL}/projects/suspend/{id_project}">Suspend</a>	
	</td>
</tr>	
{/PROJECTS}
</table>
</div>