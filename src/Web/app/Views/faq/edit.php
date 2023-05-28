<div class="row">

<div class="col-md-12">


  <div class="widget wgreen">
	
	<div class="widget-head">
	  <div class="pull-left">Frequently Asked Questions</div>
	  <div class="widget-icons pull-right">
		<a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
		<a href="#" class="wclose"><i class="fa fa-times"></i></a>
	  </div>
	  <div class="clearfix"></div>
	</div>

	<div class="widget-content">
	  <div class="padd">

		<br />
		<!-- Form starts.  -->{ITEMS}
		 <form class="form-horizontal" role="form" method="post" action="{SITE_URL}/faq/edit_done/{faq_id}" enctype="multipart/form-data">		
		 	<div class="form-group">
					  <label class="col-lg-2 control-label">Question</label>
					  <div class="col-lg-5">
						<input type="text" class="form-control" placeholder="Question" id="faq_question" name="faq_question" value="{faq_question}" required>
					  </div>
					</div>		
						<div class="form-group">
					  <label class="col-lg-2 control-label">Answer</label>
					  <div class="col-lg-6">
						<textarea class="cleditor" id="faq_answer" name="faq_answer" placeholder="Answer" >{faq_answer}</textarea>
					  </div>
					</div>     
			<div class="form-group">
					  <div class="col-lg-5">
							<input type="submit" name="project_fesave" class="project_fesave" value="Save">
					  </div>
					</div>
		  </form>{/ITEMS}
	  </div>
	</div>
	  <div class="widget-foot">
		<!-- Footer goes here -->
	  </div>
  </div>  

</div>

</div>
