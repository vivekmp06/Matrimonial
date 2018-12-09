<?php
session_start();

function mysqlexec($sql){
	$host="localhost"; // Host name
	$username="root"; // Mysql username
	$password=""; // Mysql password
	$db_name="matrimonial"; // Database name

// Connect to server and select databse.
	$conn=mysqli_connect("$host", "$username", "$password")or die("cannot connect");

	mysqli_select_db($conn,"$db_name")or die("cannot select DB");

	if($result = mysqli_query($conn, $sql)){
		return $result;
	}
	else{
		echo mysqli_error($conn);
	}


}/*
function searchid(){
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$cust_id=$_POST['cust_id'];
		$sql="SELECT * FROM customer WHERE cust_id=$cust_id";
		$result = mysqlexec($sql);
    	return $result;
	}
}*/



function register()
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	 {
	 	$profile_for=$_POST['profile_for'];
		$name=$_POST['Name'];
		$gender=$_POST['gender'];
		$religion=$_POST['religion'];
		$mobile=$_POST['mobile'];
		$dob=$_POST['dob'];
		$email=$_POST['Email'];
		$pass=md5($_POST['pass']);
		require_once("includes/dbconn.php");

		$sql_check = "select email from profile where email = '".$email."'";
		
		$rowcount=mysqli_num_rows(mysqli_query($conn, $sql_check));

			if($rowcount){
				echo "<span class='error_msg'>Account already Exists with this Email Id.</span>";
			}else{
				$sql = "INSERT INTO profile ( profile_for, name, gender, Religion, mob_no, dob, email , password ) 
			VALUES ('$profile_for', '$name', '$gender', '$religion', '$mobile', '$dob',  '$email', '$pass')";

				if (mysqli_query($conn,$sql)) 
					{
					echo "<span class='success_msg'>You have registered successfully, <a href='login.php'>please click here to login.</a></span>";
					}
					else
					{
					echo "<span  class='success_msg'>Error: " . $sql . "<br>" . $conn->error . "</span>";
					}
			}
		
	}

}

function isloggedin(){
	if(!isset($_SESSION['id'])){
	 	return false;
	}
	else{
		return true;
	}

}


function processprofile_form($id){
   
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$sex=$_POST['sex'];
	$email=$_POST['email'];
	$day=$_POST['day'];
	$month=$_POST['month'];
	$year=$_POST['year'];
	$dob=$year ."-" . $month . "-" .$day ;
	$caste = $_POST['caste'];
	$country = $_POST['country'];
	$state=$_POST['state'];
	$district=$_POST['district'];
	$age=$_POST['age'];
	$maritalstatus=$_POST['maritalstatus'];
	$education=$_POST['education'];
	$edudescr=$_POST['edudescr'];
	$bodytype=$_POST['bodytype'];
	$physicalstatus=$_POST['physicalstatus'];
	$drink=$_POST['drink'];
	$smoke=$_POST['smoke'];
	$mothertounge=$_POST['mothertounge'];
	$bloodgroup=$_POST['bloodgroup'];
	$weight=$_POST['weight'];
	$height=$_POST['height'];
	$colour=$_POST['colour'];
	$diet=$_POST['diet'];
	$occupation=$_POST['occupation'];
	$occupationdescr=$_POST['occupationdescr'];
	$fatheroccupation=$_POST['fatheroccupation'];
	$motheroccupation=$_POST['motheroccupation'];
	$income=$_POST['income'];
	$bros=$_POST['bros'];
	$sis=$_POST['sis'];
	$aboutme=$_POST['aboutme'];
	


	require_once("includes/dbconn.php");
	$sql="SELECT cust_id FROM customer WHERE cust_id=$id";
	$result=mysqlexec($sql);
	if(mysqli_num_rows($result)>=1){
	//there is already a profile in this table for loggedin customer
	//update the data
	$sql="UPDATE
   			customer 
		SET
		   age = '$age',
		   sex = '$sex',
		   email='$email',
		   caste = '$caste',
		   district = '$district',
		   state = '$state',
		   country = '$country',
		   maritalstatus = '$maritalstatus',
		   education  = '$education',
		   education_sub = '$edudescr',
		   firstname = '$fname',
		   lastname = '$lname',
		   body_type = '$bodytype',
		   physical_status = '$physicalstatus',
		   drink =  '$drink',
		   mothertounge = '$mothertounge',
		   colour = '$colour',
		   weight = '$weight',
		   smoke = '$smoke',
		   dateofbirth = '$dob', 
		   occupation = '$occupation', 
		   occupation_descr = '$occupationdescr', 
		   annual_income = '$income', 
		   fathers_occupation = '$fatheroccupation',
		   mothers_occupation = '$motheroccupation',
		   no_bro = '$bros', 
		   no_sis = '$sis', 
		   aboutme = '$aboutme'
		WHERE cust_id=$id; "
		   ;
   $result=mysqlexec($sql);
   if ($result) {
   	echo "<script>alert(\"Successfully Updated Profile\")</script>";
   	echo "<script> window.location=\"dashboard.php?id=$id\"</script>";
   }
}else{
	//Insert the data
	$sql = "INSERT 
				INTO
				   customer
				   (cust_id,age, sex,email, caste, district, state, country, maritalstatus,  education, education_sub, firstname, lastname, body_type, physical_status, drink, mothertounge, colour, weight, height, blood_group, diet, smoke,   dateofbirth, occupation, occupation_descr, annual_income, fathers_occupation, mothers_occupation, no_bro, no_sis, aboutme) 
				VALUES
				   ('$id','$age', '$sex', '$email','$caste',  '$district', '$state', '$country', '$maritalstatus', '$education', '$edudescr', '$fname', '$lname', '$bodytype', '$physicalstatus', '$drink', '$mothertounge', '$colour', '$weight', '$height', '$bloodgroup', '$diet', '$smoke', '$dob', '$occupation', '$occupationdescr', '$income', '$fatheroccupation', '$motheroccupation', '$bros', '$sis', '$aboutme')
			";
	if (mysqli_query($conn,$sql)) {
	  echo "Successfully Created profile";
	  echo "<a href=\"dashboard.php?id={$id}\">";
	  echo "Back to home";
	  echo "</a>";
	  //creating a slot for partner prefernce table for prefs details with cust id
	  $sql2="INSERT INTO partnerprefs (id, custId) VALUES('', '$id')";
	  mysqli_query($conn,$sql2);
	  $sql2="UPDATE TABLE users SET profilestat=1 WHERE id=$id";
	} 
	else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

}

function writepartnerprefs($id){
	// require_once("includes/dbconn.php");

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$agemin=$_POST['agemin'];
		$agemax=$_POST['agemax'];
		$maritalstatus=$_POST['maritalstatus'];
		$complexion=$_POST['colour'];
		$height=$_POST['height'];
		$diet=$_POST['diet'];
		$religion=$_POST['religion'];
		$caste=$_POST['caste'];
		$mothertounge=$_POST['mothertounge'];
		$education=$_POST['education'];
		$occupation=$_POST['occupation'];
		$country=$_POST['country'];
		$descr=$_POST['descr'];

		$sql_check = "select * from partnerprefs where custId = $id";
		$result_check=mysqlexec($sql_check);
		//$result_check = mysqli_query($conn, $sql_check);
		
		if (mysqli_num_rows($result_check) < 1) {
			$sql_insert = "insert into partnerprefs (id, custId) values('', $id)";
			$result_insert = mysqlexec($sql_insert);
		}

		$sql = "UPDATE
				   partnerprefs 
				SET
				   agemin = '$agemin',
				   agemax='$agemax',
				   maritalstatus = '$maritalstatus',
				   complexion = '$complexion',
				   height = '$height',
				   diet = '$diet',
				   religion='$religion',
				   caste = '$caste',
				   mothertounge = '$mothertounge',
				   education='$education',
				   descr = '$descr',
				   occupation = '$occupation',
				   country = '$country' 
				WHERE
				   custId = '$id'";

		$result = mysqlexec($sql);
		if ($result) {
			echo "<span class='success_msg'>Your Partner Preference have been Successfully updated.</span>";


		}
		else{
			echo "Error";
		}

	}
}

function search(){
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $agemin=$_POST['agemin'];
    $agemax=$_POST['agemax'];
    $maritalstatus=$_POST['maritalstatus'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $caste=$_POST['religion'];
    $mothertounge=$_POST['mothertounge'];
    $sex = $_POST['sex'];

    $sql="SELECT * FROM customer WHERE 
    sex='$sex' 
    AND age>='$agemin'
    AND age<='$agemax'
    AND maritalstatus = '$maritalstatus'
    AND country = '$country'
    AND state = '$state'
    AND religion = '$religion'
    AND mothertounge = '$mothertounge'
    ";

    $result = mysqlexec($sql);
    return $result;

  }
}

 function search_by_id(){

	require_once("includes/dbconn.php");

	if (($_SERVER['REQUEST_METHOD'] == 'POST')) {

		if(isset($_POST['cust_id_to_search']) && isset($_POST['search_profiles'])){

			$sql="SELECT customer.firstname,
			       customer.lastname,
			       customer.dateofbirth,
			       customer.sex,
			       customer.occupation,
			       customer.height,
			       customer.physical_status,
			       customer.mothertounge,
			       photos.cust_id,
			       photos.pic1, photos.pic2, photos.pic3, photos.pic4 FROM photos
					 INNER JOIN customer ON customer.cust_id = photos.cust_id where customer.cust_id=". $_POST['cust_id_to_search']." ORDER BY photos.cust_id";

			$result=mysqli_query($conn,$sql) or die ("Couldn't execute query: ".mysqli_error($conn));
	

			if (mysqli_num_rows($result) > 0) {

				return $result;
			} 
			else 
			{
				
    				echo  "<h4><strong>Invalid Profile ID</strong></h4>" . $sql;
			}

  		}

 		if(isset($_POST['search_pro_by_preference']) && isset($_POST['search_profiles']))
 		{
 			
 			$cust_query = '';
							
			    //$agemin= 
			    if(trim($_POST['gender'])){ $gender = trim($_POST['gender']); $cust_query .= "customer.sex='".$gender."' ";}else{ $gender = ""; $cust_query .= "";}
			    
			    if(trim($_POST['maritalstatus'])){ $maritalstatus = trim($_POST['maritalstatus']); $cust_query .= "AND customer.maritalstatus='".$maritalstatus."' ";}else{ $maritalstatus = ""; $cust_query .= "";}
			    
			    if(trim($_POST['district'])){ $district = trim($_POST['district']); $cust_query .= "AND customer.district='".$district."' "; }else{ $district = ""; $cust_query .= "";}
			    
			    if(trim($_POST['state'])){ $state = trim($_POST['state']); $cust_query .= "AND customer.state = '".$state."' "; }else{ $state = ""; $cust_query .= "";}
			    
			    if(trim($_POST['mothertounge'])){ $mothertounge = trim($_POST['mothertounge']); $cust_query .= "AND customer.mothertounge='".$mothertounge ."' "; }else{ $district = ""; $cust_query .= "";}

			    if(trim($_POST['agemin']) && trim($_POST['agemax'])){ 
			    	$agemin = trim($_POST['agemin']);
			    	$agemax = trim($_POST['agemax']);
			    	$cust_query .= "AND customer.age BETWEEN '".$agemin."' AND '".$agemax."'" ;}else{ 
			    		$agemin = ""; $agemax = ""; $cust_query .= "";}
			    
				if(isset($_POST['search_pro_by_preference']))
				{					
				
					$sql="SELECT customer.firstname,
				       customer.lastname,
				       customer.dateofbirth,
				       customer.age,
				       customer.sex,
				       customer.maritalstatus,
				       customer.district,
				       customer.state,				       
				       customer.occupation,
				       customer.height,
				       customer.physical_status,
				       customer.mothertounge,
				       photos.cust_id,
				       photos.pic1, photos.pic2, photos.pic3, photos.pic4
						 FROM photos
						 INNER JOIN customer ON customer.cust_id = photos.cust_id where $cust_query";

					$result=mysqli_query($conn,$sql) or die ("Couldn't execute query: ".mysqli_error($conn));

					if (mysqli_num_rows($result) > 0) {
						return $result;
					} else {
					    echo $sql;
					    echo  "<br><br><h4><strong>No Matching Profiles Found</strong>, <a href='search.php'>Click here to return</a></h4>";
					}
				}
		}
	}	

}

function login_member(){
	if (($_SERVER['REQUEST_METHOD'] == 'POST')) {

		if(isset($_POST['username'])){
			include_once("includes/dbconn.php");

			$username=$_POST["username"];
			$pass=md5($_POST["password"]);

			$sql = "select * from profile where email = '".$username."' AND password ='".$pass."'";

			$result = $conn->query($sql);
			if($result){
				if ($result->num_rows > 0) {

					// output data of each row
					while($row = $result->fetch_assoc()) {
						//session_start();
						$_SESSION['username']= $row['name'];
						$_SESSION['id']=$row['id'];	
						header("Location:dashboard.php?id={$row['id']}");
					}
				} else {
					echo "<span class='error_msg'>Please check Username & Password.</span>"; 
					//header("Location:login.php");
				}
			// }else{
				echo '<br>'.mysqli_error($conn);
				}
			$conn->close();
		}
	}	
}

function login_admin(){
	if (($_SERVER['REQUEST_METHOD'] == 'POST')) {

		if(isset($_POST['username'])){
			include_once("includes/dbconn.php");

			$username=$_POST["username"];
			$pass=$_POST["password"];

			$sql = "select * from admin where email = '".$username."' AND password ='".$pass."'";

			$result = $conn->query($sql);
			if($result){
				if ($result->num_rows > 0) {

					// output data of each row
					while($row = $result->fetch_assoc()) {
						//session_start();
						$_SESSION['username']= $row['name'];
						$_SESSION['id']=$row['id'];	
						header("Location:admin-home.php");
					}
				} else {
					echo "<span class='error_msg'>Please check Username & Password.</span>"; 
				}
				echo '<br>'.mysqli_error($conn);
				}
			$conn->close();
		}
	}	
}/*
function uploadphoto($id)
{
	$target = "profile/". $id ."/";
	$target_thumb = "profile/thumb/". $id ."/";
			if (!file_exists($target)) {
			    mkdir($target, 0777, true);
			}
			if (!file_exists($target_thumb)) {
			    mkdir($target_thumb, 0777, true);
			}

			$query_apend = '';
			$errors[] = '';

			$file_name2 = ''; $file_name3 = ''; $file_name4 = ''; $file_name5 = '';

			if(isset($_FILES['pic1'])){
				$errors= array();
				$file_name1 = $_FILES['pic1']['name'];
				$file_size1 =$_FILES['pic1']['size'];
				$file_tmp1 =$_FILES['pic1']['tmp_name'];
				$file_type1=$_FILES['pic1']['type'];
				$file_ext1=strtolower(end(explode('.',$_FILES['pic1']['name'])));
				

				if(empty($errors)==true){
				   move_uploaded_file($file_tmp1, $target.$file_name1);
				   $query_apend .= "pic1 = '".$target.$file_name1."'";
				   
				}else{
				   print_r($errors);
				}
			}

			if(isset($_FILES['pic2'])){
				$errors= array();
				$file_name2 = $_FILES['pic2']['name'];
				$file_size2 =$_FILES['pic2']['size'];
				$file_tmp2 =$_FILES['pic2']['tmp_name'];
				$file_type2=$_FILES['pic2']['type'];
				$file_ext2=strtolower(end(explode('.',$_FILES['pic2']['name'])));
				
				$expensions= array("jpeg","jpg","png");

				
				if(empty($errors)==true){
				   move_uploaded_file($file_tmp2, $target.$file_name2);
				   if($query_apend != ''){
					$query_apend .= ", pic2 = '".$target.$file_name2."'";
				   }else{
					$query_apend .= " pic2 = '".$target.$file_name2."'";
				   }
				   
				}else{
				   print_r($errors);
				}
			 }

			 if(isset($_FILES['pic3'])){
				$errors= array();
				$file_name3 = $_FILES['pic3']['name'];
				$file_size3 =$_FILES['pic3']['size'];
				$file_tmp3 =$_FILES['pic3']['tmp_name'];
				$file_type3=$_FILES['pic3']['type'];
				$file_ext3=strtolower(end(explode('.',$_FILES['pic3']['name'])));
				
				$expensions= array("jpeg","jpg","png");
				
				if(empty($errors)==true){
				   move_uploaded_file($file_tmp3, $target.$file_name3);
				   if($query_apend != ''){
					$query_apend .= ", pic3 = '".$target.$file_name3."'";
				   }else{
					$query_apend .= "pic3 = '".$target.$file_name3."'";
				   }
				}else{
				   print_r($errors);
				}
			 }


			 if(isset($_FILES['pic4'])){
				$errors= array();
				$file_name4 = $_FILES['pic4']['name'];
				$file_size4 =$_FILES['pic4']['size'];
				$file_tmp4 =$_FILES['pic4']['tmp_name'];
				$file_type4=$_FILES['pic4']['type'];
				$file_ext4=strtolower(end(explode('.',$_FILES['pic4']['name'])));
				
				$expensions= array("jpeg","jpg","png");

				
				if(empty($errors)==true){
				   move_uploaded_file($file_tmp4, $target.$file_name4);
				   if($query_apend != ''){
					$query_apend .= ", pic4 = '".$target.$file_name4."'";
				   }else{
					$query_apend .= "pic4 = '".$target.$file_name4."'";
				   }
				}else{
				   print_r($errors);
				}
			 }
			

			 $sql_check = "select * from photos where cust_id = $id";
			 $result_check=mysqlexec($sql_check);
			 //$result_check = mysqli_query($conn, $sql_check);
			 
			 if (mysqli_num_rows($result_check) < 1) {
				 $sql_insert = "insert into photos (id, cust_id) values('', $id)";
				 $result_insert = mysqlexec($sql_insert);
			 }

			 
			 $sql = "UPDATE photos SET $query_apend WHERE cust_id = $id";
			 $result = mysqlexec($sql);
	 

}
*/
function uploadphoto($id)
{
	$target = "profile/". $id ."/";
			if (!file_exists($target)) {
			    mkdir($target, 0777, true);
			}
			
			//specifying target for each file
			$target2 = $target . basename( $_FILES['pic1']['name']);
			$target3 = $target . basename( $_FILES['pic2']['name']);
			$target4 = $target . basename( $_FILES['pic3']['name']);
			$target5 = $target . basename( $_FILES['pic4']['name']);


			// This gets all the other information from the form
			$pic1=($_FILES['pic1']['name']);
			$pic2=($_FILES['pic2']['name']);
			$pic3=($_FILES['pic3']['name']);
			$pic4=($_FILES['pic4']['name']);

			$sql="SELECT id FROM photos WHERE cust_id = '$id'";
			$result = mysqlexec($sql);

			//code part to check weather a photo already exists
			if(mysqli_num_rows($result) == 0) {
			     // no photo for curret user, do stuff...
					$sql="INSERT INTO photos (id, cust_id, pic1, pic2, pic3, pic4) VALUES ('', '$id', '$pic1' ,'$pic2', '$pic3','$pic4')";
					// Writes the information to the database
					mysqlexec($sql);


					
			} else {
			    // There is a photo for customer so up
			     $sql="UPDATE photos SET  pic1 = '$pic1', pic2 = '$pic2', pic3 = '$pic3', pic4 = '$pic4' WHERE cust_id=$id";
					// Writes the information to the database
				mysqlexec($sql);
			}

			// Writes the photo to the server
			if(move_uploaded_file($_FILES['pic1']['tmp_name'], $target2)&&move_uploaded_file($_FILES['pic2']['tmp_name'], $target3)&&move_uploaded_file($_FILES['pic3']['tmp_name'], $target4)&&move_uploaded_file($_FILES['pic4']['tmp_name'], $target5))
			{

			// Tells you if its all ok
			echo "The files has been uploaded, and your information has been added to the directory";
			}
			else {

			// Gives and error if its not
			echo "Sorry, there was a problem uploading your file.";
			}

}

?>