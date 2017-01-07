<?php 
session_start(); 
if(!$_SESSION['logged']){ 
    header("Location: login_page.php"); 
    exit; 
} 
$test = '<b>This is not a drill</b>';
echo 'Welcome, '. $_SESSION["firstname"]; 
echo '<b>HELLO</b>';
echo '\n',$test;
?>