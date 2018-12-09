<?php include_once("includes/session_check.php");
$result=search();
include_once("header.php");?>	

<div class="grid_3">
  <div class="container dashboard">
   
   <div class="navigation" >
   	  	<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
				 <!-- <h2>Search Your Match</h2> -->
		        <ul class="nav navbar-nav nav_1">
		            <li><a href="dashboard.php">View Profile</a></li>
		            <li><a href="partner_preference.php">Partner Preference</a></li>
		    		<li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		               <li><a href="photouploader.php?id=<?php echo $id;?>">Upload Photos</a></li>
		               <li><a href="view_profile.php?id=<?php echo $id;?>">View Profile</a></li>
		               
		              </ul>
		            </li>
		            <li class="active_p"><a href="search.php">Search</a></li>
		        </ul>
				</div>
   </div>

	 <div class="col-sm-12 profile_content">
	 
	 	<!-- <h1>Search</h1> -->
		 <div class="col-md-9">
				
				<div class="resp-tabs-container hor_1">
					<div>	
						<div class="w3_regular_search">
							<form action="res.php" method="post">

							<input type="hidden" name="search_profiles">	
							   <div class="form_but1">
								<label class="col-sm-5 control-label1">Gender : </label>
								<div class="col-sm-7 form_radios">
									<input type="radio" name="gender" value="Male" checked> Male &nbsp;&nbsp;
									<input type="radio" name="gender" value="Female"> Female<br>

								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="form_but1">
								<label class="col-sm-5 control-label1">Age in years : </label>
								<div class="w3agile__text col-sm-7 ">
									<select class="frm-field required" name="agemin" id="min_age_field">
										<option value="">Min</option> 
									</select>
									<span>To </span>
									<select class="frm-field required" name="agemax" id="max_age_field">
										<option value="">Max</option> 
										
									</select>
								</div>
								<div class="clearfix"></div>
							</div>
				
							  <div class="form_but1">
								<label class="col-sm-5 control-label1">Marital Status : </label>
								<div class="col-sm-7 form_radios">
									<input type="radio" class="radio_1" value="Single" name="maritalstatus"> Single &nbsp;&nbsp;
									<input type="radio" class="radio_1" checked="checked" value="Divorsed" name="maritalstatus"> Divorced &nbsp;&nbsp;
									<input type="radio" class="radio_1" value="Widow" name="maritalstatus"> Widow &nbsp;&nbsp;
									<input type="radio" class="radio_1" value="Separated" name="maritalstatus"> Separated &nbsp;&nbsp;
									<input type="radio" class="radio_1" value="Any" name="maritalstatus"> Any
								</div>
								<div class="clearfix"> </div>
							  </div>

							  <div class="form_but1">
								<label class="col-sm-5 control-label1">Mother Tongue : </label>
								<div class="col-sm-7 form_radios">
								  <div class="select-block1">
									<select name="mothertounge">
										<option value="Kannada">Kannada</option>
										<option value="Hindi">Hindi</option>
										<option value=" Malayalam"> Malayalam</option>
										<option value="English">English</option>
										<option value="Telugu">Telugu</option>
										<option value="Tamil">Tamil</option> 
										<option value="Urdu">Urdu</option> 
									</select>
								  </div>
								</div>
								<div class="clearfix"> </div>
							  </div>

							  <div class="form_but1">
								<label class="col-sm-5 control-label1">District / City : </label>
								<div class="col-sm-7 form_radios">
								  <div class="select-block1">
									<select name="district">
										<option value="">District / City</option>
										<option value="Davangere">Davangere</option>
										<option value="Chitradurga">Chitradurga</option>
										<option value="Mysore">Mysore</option>
										<option value="Banglore">Banglore</option>
										<option value="Mangalore">Mangalore</option> 
										<option value="Hubli">Hubli</option> 
										<option value="Belguam">Belguam</option> 
										<option value="Gulbarga">Gulbarga</option> 
										<option value="Shimoga">Shimoga</option> 
										<option value="Bijapur">Bijapur</option> 
										<option value="Bellary">Bellary</option> 
										<option value="Dharwad">Dharwad</option> 
										<option value="Tumkur">Tumkur</option> 
										<option value="Udupi">Udupi</option> 
										<option value="Bidar">Bidar</option> 
										<option value="Hampi">Hampi</option> 
										<option value="Hospet">Hospet</option> 
										<option value="Madikeri">Madikeri</option> 
										<option value="Hassan">Hassan</option>
										<option value="Gadag">Gadag</option> 
										<option value="Raichur">Raichur</option> 
										<option value="Badami">Badami</option> 
										<option value="Kolar">Kolar</option>
										<option value="Mumbai">Mumbai</option> 
										<option value="Chennai">Chennai</option> 
										<option value="Hydrabad">Hydrabad</option> 
										<option value="Itanagar">Itanagar</option> 
										<option value="Dispur">Dispur</option> 
										<option value="Patna">Patna</option> 
										<option value="Panji">Panji</option> 
										<option value="Gandhinagar">Gandhinagar</option> 
										<option value="Chandigarh">Chandigarh</option>
										<option value="Shimla">Shimla</option>  
										<option value="Thiruvanantapuram">Thiruvanantapuram</option> 
										<option value="bhopal">bhopal</option>
										<option value="Impal">Impal</option> 
										<option value="Bhubaneshwar">Bhubaneshwar</option>
										<option value="Jaipur">Jaipur</option>  
										<option value="Lucknow">Lucknow</option> 
										<option value="Dehradun">Dehradun</option>  
										<option value="kolkata">kolkata</option>
										<option value="Agartala">Agartala</option>  
										<option value="Gangtok">Gangtok</option> 
										<option value="Raipur">Raipur</option> 
										<option value="Srinagar">Srinagar</option>
										<option value="Ranchi">Ranchi</option>  
										<option value="Shillong">Shillong</option> 
										<option value="Kohima">Kohima</option> 
									</select>
								  </div>
								</div>
								<div class="clearfix"> </div>
							  </div>
							  <div class="form_but1">
								<label class="col-sm-5 control-label1">State : </label>
								<div class="col-sm-7 form_radios">
								  <div class="select-block1">
									<select name="state">
										<option value="Karnataka">Karnataka</option>
										<option value="Delhi">Delhi</option>
										<option value="Gujarat">Gujarat</option>
										<option value="Goa">Goa</option>
										<option value="Assam">Assam</option>
										<option value="AndhraPradesh">AndhraPradesh</option> 
										<option value="Tamilnadu">Tamilnadu</option> 
										<option value="Chhattisgarh">Chhattisgarh</option> 
										<option value="Bihar">Bihar</option> 
										<option value="Hariyana">Hariyana</option> 
										<option value="Himachal Pradesh">Himachal Pradesh</option> 
										<option value="Jammu kashmir">Jammu kashmir</option> 
										<option value="Madhya Pradesh">Madhya Pradesh</option> 
										<option value="Kerala">Kerala</option>
										<option value="Maharastra">Maharastra</option>  
										<option value="Manipur">Manipur</option> 
										<option value="Medhalaya">Medhalaya</option>
										<option value="Mizoram">Mizoram</option> 
										<option value="Nagaland">Nagaland</option>
										<option value="Odisha">Odisha</option>  
										<option value="Panjab">Panjab</option> 
										<option value="Rajasthan">Rajasthan</option>  
										<option value="Sikkim">Sikkim</option>
										<option value="Telangana">Telangana</option>  
										<option value="Tirpura">Tirpura</option> 
										<option value="Uttar Pradesh">Uttar Pradesh</option> 
										<option value="Uttarkand">Uttarkand</option> 
										<option value="West Bengal">West Bengal</option>
									</select>
								  </div>
								</div>
								<div class="clearfix"> </div>
							  </div>
							 
							  <input type="submit" value="Search" name="search_pro_by_preference" id="search_pre"/>
							</form>
						</div>
					</div>

				</div>
		</div>
		<div class="col-md-3 w3ls-aside">
			<h3>Search by Profile ID:</h3>
			<form action="res.php" method="post"> 
				<input type="hidden" name="search_profiles">
				<input class="text" type="text" name="cust_id_to_search" placeholder="Enter Profile ID" required>
				<input type="submit" value="Search" name="search_pro_by_id">
				<div class="clearfix"></div>
			</form>
		</div>
			<div class="clearfix"> </div>
		</div>
  
</div>


 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	
	var i,temp_option_ele;

	for (i = 18; i < 40; i++) { 	    
	    //temp_option_ele = '<option value="'+i+'">'+i+'</option>';
	    $("#min_age_field").append('<option value="'+i+'">'+i+'</option>');
	}

	for (i = 19; i < 50; i++) { 	    
	    //temp_option_ele = '<option value="'+i+'">'+i+'</option>';
	    $("#max_age_field").append('<option value="'+i+'">'+i+'</option>');
	}

</script>

<div class="pull_bottom1">
<?php include_once("footer.php");?>
</div>
</body>
</html>

