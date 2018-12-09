<?php 
include_once("includes/session_check.php"); 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){ uploadphoto($_SESSION['id']); }
?>

<link href="css/new.css" rel='stylesheet' type='text/css' />

<?php include_once("header.php");?>

<div class="grid_3">
  <div class="container dashboard">
   
   <div class="navigation" >
   	  	<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
         <h2>Profile DP</h2>
		        <ul class="nav navbar-nav nav_1">
		            <li><a href="dashboard.php">View Profile</a></li>
		            <li><a href="partner_preference.php?id=<?php echo $id;?>">Partner Preference</a></li>
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

   <div class="services">
   	<div class="col-sm-6 login_left" style="margin-top:30px;">
	   <form action="" method="post" enctype="multipart/form-data">
	    <input type="file"  name="pic1" ><br>
        <input type="file"  name="pic2" ><br>
        <input type="file"  name="pic3" ><br>
        <input type="file"  name="pic4" ><br>
	    	<input type="submit" name="op" value="Upload" class="btn_1 submit">
	   </form>
	  </div>
   </div>

  </div>
</div>

<?php include_once("footer.php")?>  