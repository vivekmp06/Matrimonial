<?php 
include_once("includes/session_check.php"); 
$id=$_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		processprofile_form($id);
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title> Matrimony
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<script src="js/bootstrap.min.js"></script>
<link href="css/new.css" rel='stylesheet' type='text/css' />
</head>
<body>
	<?php include_once("header.php");?>
	
	<div class="grid_3">
  <div class="container dashboard">
   
   <div class="navigation" >
   	  	<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
		        <ul class="nav navbar-nav nav_1">
		            <li><a href="dashboard.php">View Profile</a></li>
		            <li><a href="partner_preference.php">Partner Preference</a></li>
		    		<li class="dropdown active_p">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile<span class="caret"></span></a>
		              <ul class="dropdown-menu" role="menu">
		               <li><a href="photouploader.php?id=<?php echo $id;?>">Upload Photos</a></li>
		               <li><a href="profile.php?id=<?php echo $id;?>">Edit Profile</a></li>  
		              </ul>
		            </li>
		            <li><a href="search.php">Search</a></li>
		        </ul>
				</div>
   </div>
<div class="container">
	
    <form action="" method="POST">
	    
	    <div class="form-group col-sm-4">
		        <label>First Name  *</label>
		      		<input type="text"  name="fname" value="" size="60" maxlength="60" class="form-text" required>
		</div>

		<div class="form-group col-sm-2">
		    <label>Last Name  *</label>
		      	<input type="text"  name="lname" value="" size="60" maxlength="60" class="form-text" required>
		</div>

		<div class="form-group col-sm-2">
		    <label >Sex *</label>
			    <div class="select-block1">
	                <select name="sex">
	                    <option value="Male">Male</option>
	                    <option value="Female">Female</option> 
	                </select>
			    </div>
		</div>

			    <div class="form-group col-sm-4">
		        <label>Email *</label>
		      		<input type="text"  name="email" value="" size="60" maxlength="60" class="form-text" required>
		</div>
	

		<div class="form-group col-sm-6">
			    	<div class="age_select">
			      		<label >Date Of Birth * </label>
			       			<div class="age_grid">
			        			 <div class="col-sm-4 form_box">
	                  				<div class="select-block1">
	                   					<select name="day" >
		                    				<option value="">Day</option>
		                    				<option value="1">1</option>
		                   				    <option value="2">2</option>
						                    <option value="3">3</option>
						                    <option value="4">4</option>
						                    <option value="5">5</option>
						                    <option value="6">6</option>
						                    <option value="7">7</option>
						                    <option value="8">8</option>
						                    <option value="9">9</option>
						                    <option value="10">10</option>
						                    <option value="11">11</option>
						                    <option value="12">12</option>
						                    <option value="13">13</option>
						                    <option value="14">14</option>
						                    <option value="15">15</option>
						                    <option value="16">16</option>
						                    <option value="17">17</option>
						                    <option value="18">18</option>
						                    <option value="19">19</option>
						                    <option value="20">20</option>
						                    <option value="21">21</option>
						                    <option value="22">22</option>
						                    <option value="23">23</option>
						                    <option value="24">24</option>
						                    <option value="25">25</option>
						                    <option value="26">26</option>
						                    <option value="27">27</option>
						                    <option value="28">28</option>
						                    <option value="29">29</option>
						                    <option value="30">30</option>
						                    <option value="31">31</option>
	                    				</select>
	                  				</div>
	            				</div>
	           					
	           					<div class="col-sm-4 form_box2">
	                  				<div class="select-block1">
	                    				<select name="month">
						                    <option value="">Month</option>
						                    <option value="01">January</option>
						                    <option value="02">February</option>
						                    <option value="03">March</option>
						                    <option value="04">April</option>
						                    <option value="05">May</option>
						                    <option value="06">June</option>
						                    <option value="07">July</option>
						                    <option value="08">August</option>
						                    <option value="09">September</option>
						                    <option value="10">October</option>
						                    <option value="11">November</option>
						                    <option value="12">December</option>
	                   					 </select>
	                  				</div>
	                 			</div>
	                			
	                		    <div class="col-sm-4 form_box1">
	                  				<div class="select-block1">
	                    					<select name="year">
							                    <option value="">Year</option>
							                    <option value="1980">1980</option>
							                    <option value="1981">1981</option>
							                    <option value="1981">1981</option>
							                    <option value="1983">1983</option>
							                    <option value="1984">1984</option>
							                    <option value="1985">1985</option>
							                    <option value="1986">1986</option>
							                    <option value="1987">1987</option>
							                    <option value="1988">1988</option>
							                    <option value="1989">1989</option>
							                    <option value="1990">1990</option>
							                    <option value="1991">1991</option>
							                    <option value="1992">1992</option>
							                    <option value="1993">1993</option>
							                    <option value="1994">1994</option>
							                    <option value="1995">1995</option>
							                    <option value="1996">1996</option>
							                    <option value="1997">1997</option>
							                    <option value="1998">1998</option>
							                    <option value="1999">1999</option>
							                    <option value="2000">2000</option>
							                    <option value="2001">2001</option>
							                    <option value="2002">2002</option>
							                    <option value="2003">2003</option>
							                    <option value="2004">2004</option>
							                    <option value="2005">2005</option>
							                    <option value="2006">2006</option>
	                    					</select>
	                   				</div>
	                  			</div>
	                  			<div class="clearfix"> </div>
	                 		</div>
	              	</div>
        </div>

        <div class="col-sm-2 form_box">
			<label>Religion</label>
			    <div class="select-block1">
	                <select name="religion">
		                <option value="Not Applicable">Not Applicable</option>
				        <option value="Hindu">Hindu</option>
				        <option value="Christian">Christian</option>
				        <option value="Muslim">Muslim</option>
				        <option value="Jain">Jain</option>
				        <option value="Sikh">Sikh</option>
				    </select>
	            </div>
	    </div>

	   	<div class="form-group col-sm-2">
		    <label>Caste *</label>
			    <div class="select-block1">
	                <select name="caste">
	                	<option value="Not Applicable">Not Applicable</option>
	                    <option value="Lingayath">Lingayath</option>
	                    <option value="Brahmins">Brahmins</option> 
	                    <option value="Marathi">Marathi</option>
	                    <option value="Brahmins">Brahmins</option> 
	                </select>
			    </div>
		</div>

		<div class="form-group col-sm-2">
		      <label>Age</label>
			    <div class="select-block1">
	                <select name="age">
	                		<option value=""></option>
							<option value="19">19</option>
		                    <option value="20">20</option>
		                    <option value="21">21</option>
		                    <option value="22">22</option>
		                    <option value="23">23</option>
		                    <option value="24">24</option>
		                    <option value="25">25</option>
		                    <option value="26">26</option>
		                    <option value="27">27</option>
		                    <option value="28">28</option>
		                    <option value="29">29</option>
		                    <option value="30">30</option>
		                    <option value="31">31</option>
		                    <option value="25">32</option>
		                    <option value="26">33</option>
		                    <option value="27">34</option>
		                    <option value="28">35</option>
		                    <option value="29">36</option>
		                    <option value="30">37</option>
		                    <option value="31">38</option>
	                </select>
			    </div>
		    </div>
		    <div class="clearfix"> </div>

		    <div class="form-group col-sm-6">
			    	<div class="age_select">
			      		<label >Address * </label>
			       			<div class="age_grid">
			        			<div class="col-sm-4 form_box">
	                  				<div class="select-block1">
	                   					<select name="country">
		                   					<option value="Not Applicable">Country</option>
						                    <option value="India">India</option>
						                    <option value="China">China</option>
						                    <option value="UAE">UAE</option>
		                   				</select>
	                  				</div>
	            				</div>
	           					
	           					<div class="col-sm-4 form_box2">
	                  				<div class="select-block1">
					                    <select name="state">
						                    <option value="">State</option>
						                    <option value="Kerala">Kerala</option>
						                    <option value="Taminadu">Tamilnadu</option>
						                    <option value="Karnataka">Karnataka</option>
						                    <option value="Andhrapradesh">Andrapradesh</option>  
					                    </select>
					                </div>
	                 			</div>
	                			
	                		    <div class="col-sm-4 form_box1">
	                  				<div class="select-block1">
					                    <select name="district">
						                    <option value="">District</option>
						                    <option value="Davangere">Davangere</option>
						                    <option value="Banglore south">Banglore south</option>
						                    <option value="Banglore North">Banglore North</option>
						                    <option value="Chitradurga">Chitradurga</option>
					                    </select>
	                   				</div>
	                  			</div>
	                  			<div class="clearfix"> </div>
	                 		</div>
	              	</div>
        	</div>

        	<div class="form-group col-sm-2">
		    	<label>Marital Status *</label>
			    	<div class="select-block1">
	                	<select name="maritalstatus">
	                    	<option value="Single">Single</option>
	                    	<option value="Married">Married</option> 
	               			<option value="Divorsed">Divorsed</option>
	                	</select>
			    	</div>
			</div>

		 	<div class="form-group col-sm-2">
		    	<label>education *</label>
			    	<div class="select-block1">
		                <select name="education">
		                    <option value="Primary">Primary</option>
		                    <option value="Tenth level">Tenth level</option> 
		               		<option value="+2">+2</option> 
		               		<option value="Degree">Degree</option> 
		               		<option value="PG">PG</option> 
		               		<option value="Doctorate">Doctorate</option> 
		                </select>
			    	</div>
			</div>

			<div class="form-group col-sm-2">
		    	<label>Specialization *</label>
		      		<input type="text"  name="edudescr" value="" size="60" maxlength="60" class="form-text">
			</div>

			<div class="clearfix"> </div>

			<div class="form-group col-sm-2">
		    	<label>Body Type *</label>
			    	<div class="select-block1">
				        <select name="bodytype">
		                    <option value="Slim">Slim</option>
		                    <option value="Fat">Fat</option> 
		               		<option value="Average">Average</option> 
		                </select>
			    	</div>
			</div>

			<div class="form-group col-sm-2">
		    	<label>Physical Status*</label>
			    	<div class="select-block1">
			            <select name="physicalstatus">
		                    <option value="No Problem">No Problem</option>
		                    <option value="Blind">Blind</option> 
		               		<option value="Deaf">Deaf</option> 
	                	</select>
			    	</div>
			</div>

			<div class="form-group col-sm-2">
		      <label>Drinks</label>
			    <div class="select-block1">
	                <select name="drink">
	                    <option value="No">No</option>
	                    <option value="Yes">Yes</option> 
	               		<option value="Sometimes">Sometimes</option> 
	                </select>
			    </div>
		    </div>
		    <div class="form-group col-sm-2">
		      <label>Smoke</label>
			    <div class="select-block1">
	                <select name="smoke">
	                    <option value="No">No</option>
	                    <option value="Yes">Yes</option> 
	               		<option value="Sometimes">Sometimes</option>
	                </select>
			    </div>
		    </div>
		    
		    <div class="form-group col-sm-2">
		      <label>Mother Tounge</label>
			    <div class="select-block1">
	                <select name="mothertounge">
	                    <option value="Malayalam">Kannada</option>
	                    <option value="Hindi">Hindi</option> 
	               		<option value="English">English</option> 
	                </select>
			    </div>
		    </div>

		    <div class="form-group col-sm-2">
		      <label>Blood Group</label>
			    <div class="select-block1">
	                <select name="bloodgroup">
	                    <option value="O +ve">O +ve</option>
	                    <option value="O -ve">O -ve</option> 
	               		<option value="AB -ve">AB -ve</option> 
	                </select>
			    </div>
		    </div>

		    <div class="clearfix"> </div>

		    <div class="form-group col-sm-2">
		      <label>Weight</label>
			  		<input type="text" name="weight" value="" size="60" maxlength="60" class="form-text">
		    </div>

		    <div class="form-group col-sm-2">
		      	<label>Height </label>
			  		<input type="text" id="edit-name" name="height" value="" size="60" maxlength="60" class="form-text">
		    </div>
		   	
		   	<div class="form-group col-sm-2">
		      <label>Colour</label>
			    <div class="select-block1">
	                <select name="colour">
	                    <option value="Dark">Dark</option>
	                    <option value="Fair">Fair</option> 
	               		<option value="Normal">Normal</option> 
	                </select>
			    </div>
		    </div>
		    <div class="form-group col-sm-2">
		      <label>Diet</label>
			    <div class="select-block1">
	                <select name="diet">
	                    <option value="Veg">Veg</option>
	                    <option value="Non Veg">Non Veg</option> 
	               	</select>
			    </div>
		    </div>

		    <div class="form-group col-sm-2">
		      <label>Occupation</label>
			  	<input type="text"  name="occupation" value="" size="60" maxlength="60" class="form-text">
		    </div>

		    <div class="form-group col-sm-2">
		      	<label>Occupation Desc</label>
			  		<input type="text"  name="occupationdescr" value="" size="130" maxlength="120" class="form-text">
		    </div>

		    <div class="clearfix"> </div>

		    <div class="form-group col-sm-2">
		      <label>Annual Income</label>
			  <input type="text"  name="income" value="" size="60" maxlength="60" class="form-text">
		    </div>

            <div class="form-group col-sm-3">
		    	<label>Fathers Occupation</label>
			  		<input type="text"  name="fatheroccupation" value="" size="60" maxlength="500" class="form-text">
		   </div>
           <div class="form-group col-sm-3">
		      	<label>Mothers Occupation</label>
			  		<input type="text" name="motheroccupation" value="" size="60" maxlength="500" class="form-text">
		    </div>
		    
          <div class="form-group col-sm-2">
		      <label>No of sisters</label>
			    <div class="select-block1">
	                <select name="sis">
	                	<option value="0">0</option>
	                    <option value="1">1</option>
	                    <option value="2">2</option> 
	                    <option value="3">3</option> 
	                </select>
			    </div>
		    </div>

		    <div class="form-group col-sm-2">
		      <label>No of brothers</label>
			    <div class="select-block1">
	                <select name="bros">
	                	<option value="0">0</option>
	                    <option value="1">1</option>
	                    <option value="2">2</option> 
	                    <option value="3">3</option>  	
	                </select>
			    </div>
		    </div>
		   
		    <div class="clearfix"> </div>

		     <div class="form-group">
		    	<label>About Me</label>
		    		<textarea rows="5" name="aboutme" placeholder="Write about you" class="form-text"></textarea>
		    </div>
		    
		    <div class="form-actions">
			    <input type="submit" id="edit-submit" name="op" value="Submit" class="btn_1 submit">
			</div>
			<div class="clearfix"> </div>
	</form>
</div>	
</div>	
</div>	

<div class="pull_bottom">
<?php include_once("footer.php");?>
</div>
</body>
</html>	