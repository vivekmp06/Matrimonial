<?php include_once("includes/session_check.php"); ?>
<?php include_once("header.php");?>
   
 <div class="w3layouts-banner" id="home">
   <div class="container">
		
		<div class="clearfix"></div>
	    <div class="agileits-register">
		  <h3>Register NOW!</h3>
		  <h5 class="error_text"><?php echo register(); ?></h5>
		      <form action="" method="post">
			 		<div class="w3_modal_body_grid">
						<span>Profile For:</span>
					 		<select id="w3_country" name="profile_for" required>
								<option value="">Select</option>
								<option value="Myself">Myself</option>   
								<option value="Son">Son</option>   
								<option value="Daughter">Daughter</option>   
								<option value="Brother">Brother</option>   
								<option value="Sister">Sister</option>  
								<option value="Relative">Relative</option>
								<option value="Friend">Friend</option>						
					 		</select>
					</div>
					
					<div class="w3_modal_body_grid w3_modal_body_grid1">
						<span>Name:</span>
							<input type="text" name="Name" placeholder=" Name" required/>
					</div>
			
            		<div class="w3_modal_body_grid">
						<span>Gender:</span>
							<div class="w3_gender">
								<input  type="radio" name="gender" value="Male" required >Male
								<input type="radio" name="gender" value="female" class="gender_female" required >Female
							<div class="clearfix"> </div>
					</div>
						
            		<div class="clearfix"> </div>

						
    				<div class="w3_modal_body_grid w3_modal_body_grid1" >
    												<span>religion:</span>
								<select id="w3_country1"  class="frm-field required" name="religion" required> 
									<option value="">Select Religion</option>
									<option value="Hindu">Hindu</option>
									<option Muslim="Muslim">Muslim</option>    
									<option value="Christian">Christian</option>   
									<option value="Sikh">Sikh</option>   
									<option value="Jain">Jain</option>   
									<option value="Buddhist">Buddhist</option>  						
								</select>
						
					</div>

	         		<div class="w3_modal_body_grid w3_modal_body_grid1">
							<span>Mobile No:</span>
								<input type="text" name="mobile" placeholder=" Mobile" maxlength="10" minlength="10" required/>
					</div>

					<div class="w3_modal_body_grid w3_modal_body_grid1">
						<span>Date Of Birth:</span>
							<input class="date" id="datepicker" name="dob" type="date" value="mm/dd/yyyy"  required />
					</div>
				
					<div class="w3_modal_body_grid">
						<span>Email:</span>
							<input type="email" name="Email" placeholder="email@mail.com" required/>
					</div>
				
                	<div class="w3_modal_body_grid w3_modal_body_grid1">
						<span>Password:</span>
							<input type="password" name="pass" placeholder=" Password" required/>
					</div>
				
                	<div class="w3-agree">
						<input type="checkbox" id="terms_condi" name="cc" required>
							<label class="agileits-agree">I have read & agreed to the <a href="terms_cond.html"><b>Terms and Conditions</b>.</a></label>
					</div>

					<div class="footer_btn" ">
						<input type="submit" value="Register me" />				
						<p class="w3ls-login">Already a member? <a href="login.php" data-toggle="modal" data-target="#myModal"><strong>Login</strong></a></p>
					</div>
					
			  </form>
	    </div>
	
    

    </div>
</div>
</div>
<?php include_once("footer.php");?>
