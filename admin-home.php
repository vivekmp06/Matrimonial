<?
if(!loggedin())
{
  header("login_admin.php");
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Matrimony Site</title>
<link href="css/mine.css" rel="stylesheet" type="text/css" media="all" /> 
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<?php include_once("header_admin.php");?>
<?php include_once("functions.php"); ?>

<?php 
require_once("includes/dbconn.php");
  $sql=("SELECT * FROM profile ORDER BY id ASC");
 // $sql=" CALL `get profile` ();";
            $result=mysqli_query($conn,$sql) or die ("Couldn't execute query: ".mysqli_error($conn));
 echo '<table align="center" <br><br><br><br><br><br> ';
  echo "<tr><th> Customer_id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>&nbsp;&nbsp;&nbsp;&nbsp;Name</th><th>&nbsp;&nbsp;&nbsp;&nbsp;Email</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password</th></tr>"; 
 while($row = mysqli_fetch_array($result))
  {
		
	 echo "<tr><td> " . $row['id'] . ".</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['name'] ."</td><td>&nbsp;&nbsp;&nbsp;" . $row['email'] ."</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['password']. "</td></tr>"; 
	 
  }
 echo "</table>";
 
if(!mysqli_query($conn,$sql))
{
 //die('Error: ' . mysqli_error($conn));
}
require_once("includes/dbconn.php");
echo ' 

 <br><br>
<table align="center"> 
<form  method="post" action="#" >


<tr>
<td >Enter id of the  user to be deleted:</td>
</tr> 
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td><input type="text" value="0" name="id" ></td>
 </tr>
<br>  
		 <tr><td><br>
		 <input type="submit" name="submit" c value="Delete"  >
		 </td></tr>
 </table>
 </form>' ;
 
?>
<br>
<br>
<?php 
include_once("footer.php");
?>
</form>
</center>
   </body>
</html>
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
   {
      $uid=$_POST['id'];
      mysqli_query($conn,"DELETE FROM profile WHERE id='$uid'");
      mysqli_query($conn,"DELETE FROM customer WHERE id='$uid'");
      mysqli_query($conn,"DELETE FROM photos WHERE id='$uid'");
   }
  ?>