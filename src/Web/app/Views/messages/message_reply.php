  <!-- Chats widget -->
            <div class="col-md-12">
              <!-- Widget -->
              <div class="widget">
                <!-- Widget title -->
                <div class="widget-head">
                  <div class="pull-left">{problem_type}</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <!-- Widget content -->
				  <!-- Below class "scroll-chat" will add nice scroll bar. It uses Slim Scroll jQuery plugin. Check custom.js for the code -->
                  <div class="padd scroll-chat">
                    
                    <ul class="chats">
					{REPLIES}
                      <!-- Chat by us. Use the class "by-me". -->
                      <li class="by-{x}">
                        <!-- Use the class "pull-left" in avatar -->
                        <div class="avatar pull-left">
                          <img src="img/user.jpg" alt=""/>
                        </div>

                        <div class="chat-content">
                          <!-- In meta area, first include "name" and then "time" -->
                          <div class="chat-meta">{first_name} {last_name} <span class="pull-right">{msg_time}</span></div>
							  {description}
                          <div class="clearfix"></div>
                        </div>
                      </li> 
					  {/REPLIES}
                                                                           

                    </ul>

                  </div>
                  <!-- Widget footer -->
                  <div class="widget-foot">
				    
					<div class="input-group">
					<form action="{SITE_URL}/messages/reply_process/{id_message}" method="post">
					 
					<textarea name="description" class="cleditor"></textarea><br/>
					<input type="submit" value="Send!" />
					  
					  </form>
					</div>


                  </div>
                </div>


              </div> 
            </div>












