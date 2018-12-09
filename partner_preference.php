<?php 
include_once("includes/session_check.php");
require_once("includes/dbconn.php");

$id=$_SESSION['id'];

//reading partnerprefs from db

		$sql="SELECT * FROM partnerprefs WHERE custId = $id";
		$result=mysqlexec($sql);
		if($result){
			$row=mysqli_fetch_assoc($result);
			$agemin=$row['agemin'];
			$agemax=$row['agemax'];
			$marital_status=$row['maritalstatus'];
			$complexion=$row['complexion'];
			$height=$row['height'];
			$diet=$row['diet'];
			$religion=$row['religion'];
			$caste=$row['caste'];
			$mother_tounge=$row['mothertounge'];
			$education=$row['education'];
			$occupation=$row['occupation'];
			$country=$row['country'];
			$descr=$row['descr'];
		}
		else{ echo mysqli_error($conn); }
?>

<?php include_once("header.php");?>

<div class="grid_3">
  <div class="container dashboard">
   
   <div class="navigation" >
   	  	<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
		        <ul class="nav navbar-nav nav_1">
		            <li><a href="dashboard.php">View Profile</a></li>
		            <li class="active_p"><a href="partner_preference.php">Partner Preference</a></li>
		    		<li class="dropdown">
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

	 <div class="col-sm-12 profile_content">
	 	<!-- <h1>Partner Prefernce</h1> -->
		<div class="col-sm-12 row_1">
		<h5 class="error_text"><?php echo writepartnerprefs($id); ?></h5>
		<form action="" method="post" name="partner">
				<table width="900" style="float:left;">
				        	<tbody>
				        		<tr>
									<td width="300"><label>Age :</label></td>
									<td>
									<input type="text" value="<?php echo $agemin; ?>" name="agemin" style="width:120px;padding-left:15px;" placeholder="MIn" class="float_left;" > <span  class="float_left;"> &nbsp; </span> <input type="text" placeholder="Max" name ="agemax" style="width:120px;padding-left:15px;"  class="float_left;" value="<?php echo $agemax; ?>">  
									</td>
								</tr>
				        		<tr>
									<td><br><label>Marital Status :</label></td>
									<td><br>
										<div class="select-block1">
										
										<select name="maritalstatus" class="inputs_fields" >
						                    <option value="Single" <?php if($marital_status == 'Single'){ echo 'selected="selected"'; } ?> >Single</option>
						                    <option value="Married" <?php if($marital_status == 'Married'){ echo 'selected="selected"'; } ?> >Married</option> 
						               		<option value="Divorsed" <?php if($marital_status == 'Divorsed'){ echo 'selected="selected"'; } ?> >Divorsed</option>
						                </select>
						                </div>
									</td>
								</tr>
							    <tr>
									<td><br><label>Complexion :</label></td>
									<td><br>
									<div class="select-block1">
									    <select name="colour"  class="inputs_fields">
						                    <option value="Black" <?php if($complexion == 'Black'){ echo 'selected="selected"'; } ?> >Black</option>
						                    <option value="Fair" <?php if($complexion == 'Fair'){ echo 'selected="selected"'; } ?> >Fair</option> 
						               		<option value="Normal" <?php if($complexion == 'Normal'){ echo 'selected="selected"'; } ?> >Normal</option> 
						                </select>
								    </div>
								    </td>
								</tr>
								<tr>
									<td><br><label>Height</label></td>
									<td><br><input type="text" name="height" value="<?php echo $agemin; ?>" class="form-text inputs_fields" placeholder="Enter Height in cms" > cms</td>
								</tr>
								<tr>
									<td><br><label>Diet :</label></td>
									<td><br><div class="select-block1">
					                <select name="diet"  class="inputs_fields">
					                    <option value="Veg" <?php if($diet == 'Veg'){ echo 'selected="selected"'; } ?> >Veg</option>
					                    <option value="Non Veg" <?php if($diet == 'Non Veg'){ echo 'selected="selected"'; } ?> >Non Veg</option> 
					                </select>
							    	</div>
							    	</td>
								</tr>
								<tr>
									<td><br><label>Religion :</label></td>
									<td><br><span>
									<div class="select-block1">
					                    <select name="religion" class="inputs_fields">
						                    <option value="Not Applicable" <?php if($religion == 'Not Applicable'){ echo 'selected="selected"'; } ?> >Not Applicable</option>
						                    <option value="Hindu" <?php if($religion == 'Hindu'){ echo 'selected="selected"'; } ?> >Hindu</option>
						                    <option value="Christian" <?php if($religion == 'Christian'){ echo 'selected="selected"'; } ?> >Christian</option>
						                    <option value="Muslim" <?php if($religion == 'Muslim'){ echo 'selected="selected"'; } ?> >Muslim</option>
						                    <option value="Jain" <?php if($religion == 'Jain'){ echo 'selected="selected"'; } ?> >Jain</option>
						                    <option value="Sikh" <?php if($religion == 'Sikh'){ echo 'selected="selected"'; } ?> >Sikh</option>
						             	</select>
	                 				</div></span>
	                  			</td>
								</tr>
								<tr>
									<td><br><label>Caste :</label></td>
									<td><br>
									<div class="select-block1">
									<input type="text" name="caste" value="<?php echo $caste; ?>" class="form-text inputs_fields">
	                    				
		                 			</div></td>
								</tr>
								<tr>
									<td><br><label>Mother Tongue :</label></td>
									<td><br>
									<div class="select-block1">
						                <select name="mothertounge"  class="inputs_fields">
						                    <option value="Kannada" <?php if($mother_tounge == 'Kannada'){ echo 'selected="selected"'; } ?>>Kannada</option>
						                    <option value="Hindi" <?php if($mother_tounge == 'Hindi'){ echo 'selected="selected"'; } ?> >Hindi</option> 
						               		<option value="English" <?php if($mother_tounge == 'English'){ echo 'selected="selected"'; } ?> >English</option> 
						                </select>
								    </div>
								    </td>
								</tr>
								<tr>
									<td><br><label>Education :</label></td>
									<td><br><div class="select-block1">
						                <select name="education" class="inputs_fields">
						                    <option value="Primary" <?php if($education == 'Primary'){ echo 'selected="selected"'; } ?> >Primary</option>
						                    <option value="Tenth level" <?php if($education == 'Tenth level'){ echo 'selected="selected"'; } ?> >Tenth level</option> 
						               		<option value="+2" <?php if($education == '+2'){ echo 'selected="selected"'; } ?> >+2</option> 
						               		<option value="Degree" <?php if($education == 'Degree'){ echo 'selected="selected"'; } ?> >Degree</option> 
						               		<option value="PG" <?php if($education == 'PG'){ echo 'selected="selected"'; } ?> >PG</option> 
						               		<option value="Doctorate" <?php if($education == 'Doctorate'){ echo 'selected="selected"'; } ?> >Doctorate</option> 
						                </select>
								    </div>
								    </td>
								</tr>
								<tr>
									<td><br><label>Occupation :</label></td>
									<td><br> <input type="text" name="occupation" value="<?php echo $occupation; ?>" placeholder="Occupation" class="form-text inputs_fields"></td>
								</tr>
								<tr>
									<td class="day_label"><br><label>Country of Residence :</label></td>
									<td class="day_value closed"><br>
										<div class="select-block1">
						                    <select name="country" class="inputs_fields">
							                    <option value="Not Applicable" <?php if($country == 'Not Applicable'){ echo 'selected="selected"'; } ?> >Country</option>
							                    <option value="India" <?php if($country == 'India'){ echo 'selected="selected"'; } ?> >India</option>
							                    <option value="China" <?php if($country == 'China'){ echo 'selected="selected"'; } ?> >China</option>
							                    <option value="UAE" <?php if($country == 'UAE'){ echo 'selected="selected"'; } ?> >UAE</option>
						                    </select>
						                 </div>
						            </td>
								</tr>
								<tr>
									<td><br><label>My Ideal Partner would be : </label></td>
									<td><br><textarea name="descr" value="<?php echo $descr; ?>" rows="5" style="width:600px;" class="inputs_fields"><?php echo $descr;?></textarea></td>
								</tr>
								<tr>
									<td colspan="2">
										<br><input type="submit" value="Update Preferences" id="update_preferences"></td>
								</tr>
							 </tbody>
				          </table>
						      
				        </div>
				  
				  </div>
				 
		     </div>
			 </form>
			 
				
				</div>
			<div class="clearfix"> </div>
		</div>
  
</div>



<div class="pull_bottom">
	<?php include_once("footer.php");?>
</div>