<div class="row">
	<div class="col-md-12">
		<div class="widget wgreen">                
                <div class="widget-head">
                  <div class="pull-left">New Info Page</div>
                    
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
					<form class="form-horizontal" role="form"  action="{SITE_URL}/misc/settings_done" method="post">
						<input type="hidden" name="page" value="{page}" />
                        {SETTINGS}
                                <div class="form-group">
                                  <label class="col-lg-4 control-label">{label}</label>
                                  <div class="col-lg-5">
                                    <input type="text" class="form-control" placeholder="{label}" name="{name}" value="{value}">
                                  </div>
                                </div>
						{/SETTINGS}
                        <input type="submit" value="Aplica">
                        </form>
                        
                  </div>
                </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              </div>  

            </div>

          </div>