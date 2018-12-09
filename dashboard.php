<?php include_once("includes/session_check.php"); ?>
<?php include_once("header.php");?>
<?php
$id=trim($_SESSION['id']);
//safty purpose copy the get id
$profileid=$id;

//getting profile details from db

$sql = "SELECT profile.id, profile.profile_for, profile.name, profile.gender, profile.Religion, profile.mob_no, profile.dob, profile.email, customer.cust_id, customer.age, customer.height, customer.sex, customer.caste, customer.district, customer.state, customer.country, customer.maritalstatus, customer.education, customer.education_sub, customer.firstname,customer.lastname, customer.body_type, customer.physical_status, customer.drink, customer.mothertounge, customer.colour, customer.weight, customer.blood_group, customer.diet, customer.smoke, customer.dateofbirth, customer.occupation, customer.occupation_descr,
customer.annual_income, customer.fathers_occupation, customer.mothers_occupation, customer.no_bro, customer.no_sis, customer.aboutme FROM profile INNER JOIN customer ON $id=customer.cust_id and profile.email=customer.email";

$result = mysqlexec($sql);

if($result){
$row=mysqli_fetch_assoc($result);

	$name = $row['name'];
	$profile_for = $row['profile_for'];
	$gender = $row['gender'];
	$religion = $row['Religion'];
	$mob_no = $row['dob'];
	$maritial_status = $row['maritalstatus'];
	$email = $row['email'];
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
	$img_link = '';
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
			
		<div class="col-sm-9 row_1">
				<table width="400" style="float:left;">
		        	<tbody>
		        		<tr>
									<td><label>Name :</label></td>
									<td><?php echo $name; ?> </td>
								</tr>
								<tr>
									<td><label>First Name :</label></td>
									<td><?php echo $fname; ?></td>
								</tr>
								<tr>
									<td><label>Last Name :</label></td>
									<td><?php echo $lname; ?></td>
								</tr>
								<tr>
									<td><label>Gender :</label></td>
									<td><?php echo $gender; ?></td>
								</tr>
									<tr>
									<td><label>Religion :</label></td>
									<td><?php echo $religion; ?></td>
								</tr>
									<tr>
									<td><label>DOB :</label></td>
									<td><?php echo $dob; ?></td>
								</tr>
									<tr>
									<td><label>Marital Status :</label></td>
									<td><?php echo $maritial_status; ?></td>
								</tr>
								<tr>
									<td><label>Email Id :</label></td>
									<td><?php echo $email; ?></td>
								</tr>
								<tr>
									<td><label>Mothertounge :</label></td>
									<td><?php echo $mothertounge; ?></td>
								</tr>
								<tr>
									<td><label>Sex :</label></td>
									<td><?php echo $sex; ?> </td>
								</tr>
								<tr>
									<td><label>DOB :</label></td>
									<td><?php echo $dob; ?></td>
								</tr>
								<tr>
									<td><label>Caste :</label></td>
									<td><?php echo $caste; ?></td>
								</tr>
				    </tbody>
				</table>



				<table width="400" style="float:left;">
		        	<tbody>
		        		<tr>
									<td><label>District :</label></td>
									<td><?php echo $district; ?></td>
								</tr>
									<tr>
									<td><label>State :</label></td>
									<td><?php echo $state; ?></td>
								</tr>
									<tr>
									<td><label>Country :</label></td>
									<td><?php echo $country; ?></td>
								</tr>
									<tr>
									<td><label>Age :</label></td>
									<td><?php echo $age; ?></td>
								</tr>
								<tr>
									<td><label>Education :</label></td>
									<td><?php echo $education; ?></td>
								</tr>
								<tr>
									<td><label>Body Type :</label></td>
									<td><?php echo $bodytype; ?></td>
								</tr>
								<tr>
									<td><label>Physical Status :</label></td>
									<td><?php echo $physicalstatus; ?></td>
								</tr>

								<tr>
									<td><label>Alcoholic :</label></td>
									<td><?php echo $drink; ?></td>
								</tr>

								<tr>
									<td><label>Smoking Habits :</label></td>
									<td><?php echo $smoke; ?></td>
								</tr>
								<tr>
									<td><label>Blood Group :</label></td>
									<td><?php echo $bloodgroup; ?></td>
								</tr>
								<tr>
									<td><label>Weight :</label></td>
									<td><?php echo $weight; ?></td>
								</tr>
								<tr>
									<td><label>Height :</label></td>
									<td><?php echo $height; ?></td>
								</tr>
								<tr>
									<td>About Me :</td>
									<td><?php echo $aboutme; ?> </td>
								</tr>
				    </tbody>
				</table>
				</div>
			<div class="clearfix"> </div>
		</div>
  
</div>

<?php include_once("footer.php")?>
  
</body>
</html>	