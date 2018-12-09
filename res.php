<?php include_once("functions.php"); ?>
<?php 
if(!isloggedin())
 {
   header("location:login.php");
}
?>


<?php include_once("header.php");?>	

<link rel="stylesheet" type="text/css" href="css/profile.css">

<div class="grid_3">
  <div class="container dashboard">
   
   <div class="navigation" >
   	  	<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
		        <ul class="nav navbar-nav nav_1">
		            <li class=""><a href="dashboard.php">View Profile</a></li>
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
		<!-- <h2>Matching Profiles List</h2> -->
		<div class="col-md-9">
			<table class="table table-hover" id="display_searched_profiles">
		    
		    <tbody>

		    	<?php

					if(isset($_POST['search_profiles'])){
						$result = search_by_id();
						if($result) {
							while($row = mysqli_fetch_assoc($result)) {
						
				?>

		      <tr>
		        <td class="profile_img">

<?php 

$img_link='';

//echo $row["pic1"] . $row["pic2"] . $row["pic3"] . $row["pic4"];

if($row["pic1"] || $row["pic2"] || $row["pic3"] || $row["pic4"]){

	if($row["pic1"]){
		$img_link = $row["pic1"];
	}	
		
	}else{

		if($row["sex"] == 'Male'){
			$img_link = "images/male.jpg";
		}else{
			$img_link = "images/female.jpg";
		}

	}

?>       	
		        <img src="images/img/<?php echo $img_link; ?>" title="img" alt="img" style="border:2px solid #fff;" ></td>
		        
		        <td class="profile_info_txt" >

				<div class="info_sect sect_1">		        	
					<div class="float_left profile_label">
						<label>First Name</label>
						<label>Last Name</label>
						<label>Dob</label>
						<label>Gender</label>

					</div>

					<div class="float_left profile_values">
						<h5><span>:</span><?php echo $row["firstname"]; ?></h5>
						<h5><span>:</span><?php echo $row["lastname"]; ?></h5>
						<h5><span>:</span><?php echo $row["dateofbirth"]; ?></h5>
						<h5><span>:</span><?php echo $row["sex"]; ?></h5>

					</div>
				</div>

				<div class="info_sect sect_2">
					<div class="float_left profile_label">
						<label>Occupation</label>
						<label>Height</label>
						<label>Physically Disabled</label>
						<label>Mother Tounge</label>

					</div>

					<div class="float_left profile_values">
						<h5><span>:</span><?php echo $row["occupation"]; ?></h5>
						<h5><span>:</span><?php echo $row["height"]; ?></h5>
						<h5><span>:</span><?php echo $row["physical_status"]; ?></h5>
						<h5><span>:</span><?php echo $row["mothertounge"]; ?></h5>

					</div>
				</div>

				<p class="see_details_link"><a href="view_profile.php?id=<?php echo $row["cust_id"]; ?>"><i>See Details</i></a></p>

		        </td>
		      </tr>  <!-- Details List ends here -->
		      
		      <?php
		       		} }
				// }else{
				// 		header("location:search.php");
				 	}
				 ?>

		    </tbody>
		  </table>

		</div>
		
	</div>
	</div>
	</div>

<footer>
	
	<div class="copy-right"> 
			<p>© 2018 Vivaha. All rights reserved | Design by Match</a></p>
	</div> 
</footer>

</body>
</html>