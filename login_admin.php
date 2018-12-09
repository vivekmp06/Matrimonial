<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<script src="js/bootstrap.min.js"></script>
<link href="css/new.css" rel='stylesheet' type='text/css' />

</head>
<body>

<?php include_once("header.php");?>

<div class="grid_3">
  <div class="container">
	<div class="agileits-register">
	<h3>Login</h3>
	<h5 class="error_text"><?php echo login_admin(); ?></h5>
   <div class="services">
   	 <div class=" login_left">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<div class="form-item form-type-textfield form-item-name">
					<label>Username <span class="form-required" title="This field is required.">*</span></label>
					<input type="text" id="edit-name" name="username" value="" size="60" maxlength="60" class="form-text required">
				</div>
				<div class="form-item form-type-password form-item-pass">
					<label>Password <span class="form-required">*</span></label>
					<input type="password" name="password" size="60" maxlength="128" class="form-text required">
				</div>
				<div class="form-actions">
					<input type="submit" id="edit-submit" name="op" value="Log in" class="btn_1 submit">
				</div>
			</form>
	  </div>
	  </div>
	  <div class="clearfix"> </div>
   </div>
  </div>
</div>

<?php include_once("footer.php");?>