		<div class="row">
            <div class="col-md-12">
              <div class="widget wgreen">                
                <div class="widget-head">
                  <div class="pull-left">{TITLE}</div>
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
                     <form class="form-horizontal" role="form" method="post" action="{SITE_URL}/messages/process/{id_email}" enctype="multipart/form-data">
                              <input type="hidden" name="source" value="{source}" />	 
							 
							  <div class="form-group">
                                  <label class="col-lg-2 control-label">Tip mail</label>
                                  <div class="col-lg-5">
								  {cod_email}
                                  </div>
                                </div>
								
								 <div class="form-group">
                                  <label class="col-lg-2 control-label">Email</label>
                                  <div class="col-lg-5">
								  <textarea name="continut_email" id="continut_email" class="cleditor" placeholder="{continut_email}">{continut_email}</textarea><br/>
                                  </div>								  
                                </div>	
								
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Variabile</label>
                                  <div class="col-lg-5">
								  {mesaj}
                                  </div>
                                </div>
								
							  <div class="form-group">
                                  <div class="col-lg-5">
									<input type="submit" id="" name="project_save" class="form-control" value="Save mail">
                                  </div>
                                </div>
                              </form>
                  </div>
                </div>
                  <div class="widget-foot">
                    <!-- Footer goes -->
                  </div>
              </div>  

            </div>

          </div>
