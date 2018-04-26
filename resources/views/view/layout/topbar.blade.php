<div class="top_bar" style="height:18px">
            <a href="#" style="color:white;padding: 14px;text-decoration: none" role="button" data-toggle="modal" data-target="#login-modal"> Login </a>
    <!-- END # BOOTSNIP INFO -->

    <!-- BEGIN # MODAL LOGIN -->
    <div  class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;" >
        	<div class="modal-dialog" style="padding: 0px 0px 0px 97px;">
    			<div class="modal-content" style="width:400px;height:300px;">
    				<div class="modal-header" align="center">
    					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
    					</button>
    				</div>
                    <div id="div-forms">
                    
                        <!-- Begin # Login Form -->
                        <form id="login-form"  >
    		                <div class="modal-body">
    				    		<div id="div-login-msg" style="text-align:center;">
                                    <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                    <span style="font-family:initial;font-size:19px;" id="text-login-msg">Please Input Account.</span>
                                </div>
    				    		<input id="login_username" class="form-control" type="text" placeholder="Please Input Username" required>
    				    		<input id="login_password" class="form-control" type="password" placeholder="Please Input Password" required>
                                
            		    	</div>
    				        <div class="modal-footer" style="padding: 17px 140px 0px 0px;">
                                <div style="text-align:center">
                                    <button type="submit" class="btn btn-primary ">Login</button>
                                </div>
    				    	    <div style="text-align:left;padding: 0px 0px 0px 12px;">
                                    <a href="">Lost Password?</a>
                                    <a style="padding: 0px 0px 0px 12px;" href="">Register</a>
                                </div>

    				        </div>
                        </form>
                        <!-- End # Login Form -->
                        
                        <!-- Begin | Lost Password Form -->
                        <form id="lost-form" style="display:none;">
        	    		    <div class="modal-body">
    		    				<div id="div-lost-msg" style="text-align:center;">
                                    <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                                    <span style="font-family:initial;font-size:19px;" id="text-lost-msg">Please Input E-mail.</span>
                                </div>
    		    				<input id="lost_email" class="form-control" type="text" placeholder="E-Mail (type ERROR for error effect)" required>
                			</div>
    		    		    <div class="modal-footer">
                                <div>
                                    <button type="submit" class="btn btn-primary ">Send</button>
                                </div>
                                <div>
                                    <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                                    <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
                                </div>
    		    		    </div>
                        </form>
                        <!-- End | Lost Password Form -->
                        
                        <!-- Begin | Register Form -->
                        <form id="register-form" style="display:none;">
                		    <div class="modal-body">
    		    				<div id="div-register-msg" style="text-align:center;">
                                    <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                                    <span style="font-family:initial;font-size:19px;" >Register an account</span>
                                </div>
    		    				<input id="register_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
                                <input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
                                <input id="register_password" class="form-control" type="password" placeholder="Password" required>
                			</div>
    		    		    <div class="modal-footer">
                                <div>
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                                <div>
                                    <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                                    <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                                </div>
    		    		    </div>
                        </form>
                        <!-- End | Register Form -->
                        
                    </div>
                    <!-- End # DIV Form -->
                    
    			</div>
    		</div>
    	</div>
    <!-- END # MODAL LOGIN -->
</div>

