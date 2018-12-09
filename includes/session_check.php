<?php 
include_once("functions.php");
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
if(!isloggedin()){
    //echo $uriSegments[2];
    if($uriSegments[2] == 'login.php'){
    }else
    if($uriSegments[2] == 'index.php'){
    }else{
        header("location:login.php");
     }
   
}else{
    if(($uriSegments[2] == 'login.php') && ($uriSegments[2] == 'index.php')){
        header("location:dashboard.php");
    }
}
?>