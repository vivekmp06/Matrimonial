<?php 
include_once("includes/session_check.php");
include_once("header.php");
require_once("includes/dbconn.php"); ?>
<?php
if(isset($_GET['id'])){
	$id=trim($_GET['id']);	
}else{
	header("Location:dashboard.php");
}

//safty purpose copy the get id
$profileid=$id;
$img_link='';

//getting profile details from db
$sql="SELECT * FROM customer WHERE cust_id = $id";
$result = mysqlexec($sql);
if($result){
$row=mysqli_fetch_assoc($result);

	$fname=$row['firstname'];
	$lname=$row['lastname'];
	$sex=$row['sex'];
	$dob=$row['dateofbirth'];
	$caste = $row['caste'];
	$country = $row['country'];
	$state=$row['state'];
	$district=$row['district'];
	$age=$row['age'];
	$maritalstatus=$row['maritalstatus'];
	$education=$row['education'];
	$edudescr=$row['education_sub'];
	$bodytype=$row['body_type'];
	$physicalstatus=$row['physical_status'];
	$drink=$row['drink'];
	$smoke=$row['smoke'];
	$mothertounge=$row['mothertounge'];
	$bloodgroup=$row['blood_group'];
	$weight=$row['weight'];
	$height=$row['height'];
	$colour=$row['colour'];
	$diet=$row['diet'];
	$occupation=$row['occupation'];
	$occupationdescr=$row['occupation_descr'];
	$fatheroccupation=$row['fathers_occupation'];
	$motheroccupation=$row['mothers_occupation'];
	$income=$row['annual_income'];
	$bros=$row['no_bro'];
	$sis=$row['no_sis'];
	$aboutme=$row['aboutme'];

//end of getting profile detils
	$pic1="";
	$pic2="";
	$pic3="";
	$pic4="";
//getting image filenames from db
$sql2="SELECT * FROM photos WHERE cust_id = $profileid";
$result2 = mysqlexec($sql2);
if($result2){
	$row2=mysqli_fetch_array($result2);
	$pic1=$row2['pic1'];
	$pic2=$row2['pic2'];
	$pic3=$row2['pic3'];
	$pic4=$row2['pic4'];
	
}
}else{
	echo "<script>alert(\"Invalid Profile ID\")</script>";
}

?>

<link type="text/css" rel="stylesheet" href="css/lightslider.css" />
<link type="text/css" rel="stylesheet" href="css/base.css" />                  
<script src="js/lightslider.js"></script>

<script>
    	 $(document).ready(function() {
			
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:4,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
		});
    </script>
<div class="grid_3">
  <div class="container dashboard">
   
   <div class="navigation" >
   	  	<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
		        <ul class="nav navbar-nav nav_1">
		            <li class="active_p"><a href="dashboard.php">View Profile</a></li>
		            <li><a href="partner_preference.php">Partner Preference</a></li>
		    		<li class="dropdown ">
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


   <div class="col-sm-12 profile_content" style="padding: 20px;">
	 <div class="col-sm-3">
		<div class="demo">
					<div class="item">            
							<div class="clearfix" style="max-width:474px;">
									<ul id="image-gallery" class="gallery list-unstyled cS-hidden">
									<?php if($pic1){?>
					 	
										<li data-thumb="images/img/thumb/<?php echo $pic1;?>">
										<img src="images/img/<?php echo $pic1;?>" width="200" />
									</li>
								<?php }
								if($pic2 != ''){?>
									<li data-thumb="images/img/thumb/<?php echo $pic2;?>">
										<img src="images/img/<?php echo $pic2;?>" width="200" />
									</li>
								<?php } if($pic3){?>	
									<li data-thumb="images/img/thumb/<?php echo $pic3;?>">
										<img src="images/img/<?php echo $pic3;?>" width="200" />
									</li>
								<?php }
								 if($pic4){ ?>	

									<li data-thumb="images/img/thumb/<?php echo $pic4; ?>">
										<img src="images/img/<?php echo $pic4; ?>" width="200" />	
									</li><?php } 
										else if((!$pic1 && !$pic2 && !$pic3 && !$pic4)){
											if($sex=='Male'){ 
													
												$img_link = "male.jpg";
											}
											else {
												$img_link = "female.jpg";
											}
											?>
										<li data-thumb="images/img/thumb/<?php echo $img_link;?>">
										<img src="images/img/<?php echo $img_link; ?>" height="170" width="200">
									</li>
											<?php

										} ?>
										
											
											
									</ul>
							</div>
					</div>
			</div>
		</div>
		<div class="col-sm-8 row_1">
				<table width="400" style="float:left;">
		        	<tbody>
		        		<tr>
							<td><label>Name :</label></td>
							<td><?php echo $fname . " " .$lname; ?></td>
						</tr><tr>
							<td><label>Age / Height :</label></td>
							<td><?php echo $age . " Years"; ?>/<?php echo $height . " Cm";?> </td>
						</tr>
					    <tr>
							<td><label>Marital Status :</label></td>
							<td><?php echo $maritalstatus;?></td>
						</tr>
					    <tr>
							<td><label>Country :</label></td>
							<td><?php echo $country;?></td>
						</tr>
					    <tr>
							<td><label>Education :</label></td>
							<td><span><?php echo $education;?></span></td>
						</tr>
				    </tbody>
				</table>
				</div>
			<div class="clearfix"> </div>
		
		<div class="col_4">
			   <div id="myTabContent" class="tab-content">
				  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
				    <div class="tab_box">
				    	<h2>About Me </h2>
				    	<p><?php echo $aboutme; ?></p>
				    </div>
				    <div class="basic_1">
				    	<h3>Basics &amp; Lifestyle</h3>
				    	<div class="col-md-6 basic_1-left">
				    	  <table width="400" style="float:left;">
				        	<tbody>
				        		<tr>
									<td><label>Name :</label></td>
									<td><?php echo $fname . " " .$lname; ?></td>
								</tr>
							    <tr>
									<td><label>Marital Status :</label></td>
									<td><?php echo $maritalstatus;?></td>
								</tr>
							    <tr>
									<td><label>Body Type :</label></td>
									<td><?php echo $bodytype;?></td>
								</tr>
							    
							    <tr>
									<td><label>Age / Height :</label></td>
									<td><?php echo $age; ?>/<?php echo $height;?> cm</td>
								</tr>
							    <tr>
									<td><label>Physical Status :</label></td>
									<td><span><?php echo $physicalstatus;?></span></td>
								</tr>
								<tr>
									<td><label>Drink :</label></td>
									<td><span><?php echo $drink;?></span></td>
								</tr>
						    </tbody>
				          </table>
				         </div>
				         <div class="col-md-6 basic_1-left">
				          <table width="400" style="float:left;">
				        	<tbody>
				        		<tr>
									<td><label>Age :</label></td>
									<td><?php echo $age;?></td>
								</tr>
							    <tr>
									<td><label>Mother Tongue :</label></td>
									<td><?php echo $mothertounge;?></td>
								</tr>
							    <tr>
									<td><label>Complexion :</label></td>
									<td><?php echo $colour;?></td>
								</tr>
							    <tr>
									<td><label>Weight :</label></td>
									<td><?php echo $weight;?> KG</td>
								</tr>
							    <tr>
									<td><label>Blood Group :</label></td>
									<td><?php echo $bloodgroup;?></td>
								</tr>
							    <tr>
									<td><label>Diet :</label></td>
									<td><span><?php echo $diet;?></span></td>
								</tr>
							    <tr>
									<td><label>Smoke :</label></td>
									<td><span><?php echo $smoke;?></span></td>
								</tr>
						    </tbody>
				        </table>
				        </div>
				        <div class="clearfix"> </div>
				    </div>
				    <div class="basic_1">
				    	<h3>Religious / Social & Astro Background</h3>
				    	<div class="col-md-6 basic_1-left">
				    	  <table class="table_working_hours" width="400" style="float:left;">
				        	<tbody>
				        		<tr>
									<td><label>Caste :</label></td>
									<td><?php echo $caste;?></td>
								</tr>
							    <tr>
									<td><label>Date of Birth :</label></td>
									<td><span><?php echo $dob;?></span></td>
								</tr>
							</tbody>
				          </table>
				         </div>
				        <div class="clearfix"> </div>
				    </div>
				    <div class="basic_1 basic_2">
				    	<h3>Education & Career</h3>
				    	<div class="basic_1-left">
				    	  <table class="table_working_hours" width="400" style="float:left;">
				        	<tbody>
				        		<tr>
									<td><label>Education :</label></td>
									<td><?php echo $education;?></td>
								</tr>
				        		<tr>
									<td><label>Education Detail :</label></td>
									<td><?php echo $edudescr;?></td>
								</tr>
							    <tr>
									<td><label>Occupation Detail :</label></td>
									<td><span><?php echo $occupationdescr;?></span></td>
								</tr>
							    <tr>
									<td><label>Annual Income :</label></td>
									<td><span><?php echo $income;?></span></td>
								</tr>
							 </tbody>
				          </table>
				         </div>
				         <div class="clearfix"> </div>
				    </div>
				  </div><br>

				  <div class="basic_1 basic_2">
				    	<h3>Family Details</h3>
				    	<div class="basic_1 basic_2"">
				    	  <table class="table_working_hours" width="400" style="float:left;">
				        	<tbody>
				        		<tr>
									<td><label>Father's Occupation :</label></td>
									<td><?php echo $fatheroccupation;?></td>
								</tr>
				        		<tr>
									<td><label>Mother's Occupation :</label></td>
									<td><?php echo $motheroccupation;?></td>
								</tr>
							    <tr>
									<td><label>No. of Brothers :</label></td>
									<td><span><?php echo $bros;?></span></td>
								</tr>
							    <tr>
									<td><label>No. of Sisters :</label></td>
									<td><span><?php echo $sis;?></span></td>
								</tr>
							 </tbody>
				          </table>
				         </div>
				         <div class="clearfix"> </div>
				    </div>
				  </div>
				 
<?php
//getting partner prefernce
$sql = "SELECT * FROM partnerprefs WHERE custId = $id";
$result = mysqlexec($sql);
$row= mysqli_fetch_assoc($result);

$agemin=$row['agemin'];
$agemax=$row['agemax'];
$maritalstatus=$row['maritalstatus'];
$complexion=$row['complexion'];
$height=$row['height'];
$diet=$row['diet'];
$religion=$row['religion'];
$caste=$row['caste'];
$mothertounge=$row['mothertounge'];
$education=$row['education'];
$occupation=$row['occupation'];
$country=$row['country'];
$descr=$row['descr'];
?>

			    <div class="basic_1 basic_2">
			    	<h3>Partner Preference</h3>
				       <div class="basic_1-left">
				    	  <table width="400" style="float:left;">
				        	<tbody>
				        		<tr>
									<td><label>Age   :</label></td>
									<td><?php if($agemin){$temp_to = ' to ';}else{$temp_to='';} echo $agemin . $temp_to . $agemax;?></td>
								</tr>
								<tr>	
									<td><label>Marital Status :</label></td>
									<td><?php echo $maritalstatus;?></td>
								</tr>
							    <tr>
									<td><label>Body Type :</label></td>
									<td><span><?php echo $bodytype;?></span></td>
								
								</tr>
								<tr>
									<td><label>Height:</label></td>
									<td><span><?php echo $height;?> Cm</span></td>
								</tr><tr>
									<td><label>Diet :</label></td>
									<td><span><?php echo $diet;?></span></td>
								</tr>
								<tr>
									<td><label>Religion :</label></td>
									<td><span><?php echo $religion;?></span></td>
								</tr>
								<tr>
									<td><label>Mother Tongue :</label></td>
									<td><span><?php echo $mothertounge;?></span></td>
								</tr>
								<tr>
									<td><label>Occupation :</label></td>
									<td><span><?php echo $occupation;?></span></td>
								</tr>
								<tr>
									<td><label>State :</label></td>
									<td><span><?php echo $state;?></span></td>
								</tr>
								
							 </tbody>
				          </table>

							<table width="400" style="float:left;">
				        	<tbody>
				        		
							    <tr>
									<td><label>Complexion :</label></td>
									<td><span><?php echo $colour;?></span></td>
								</tr>
								
								<tr>
									<td><label>Caste :</label></td>
									<td><span><?php echo $caste;?></span></td>
								</tr>
								<tr>
									<td><label>Education :</label></td>
									<td><span><?php echo $education;?></span></td>
								</tr>
								<tr>
									<td><label>Country of Residence :</label></td>
									<td><span><?php echo $country;?></span></td>
								</tr>							
								
							 </tbody>
				          </table>

				        </div>
				     </div>
				 </div>
		     </div>
		  </div>
	   </div>
</div>
       <div class="clearfix"> </div>

<div class="pull_bottom">
	<?php include_once("footer.php");?>
</div>