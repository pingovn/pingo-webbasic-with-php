<?php
include("info.php");
session_start();
//echo $text_info;
function connect(){
	$conn=mysql_connect("localhost","root","") or die("Could not connect to database");
	mysql_select_db("final_assignment_nhannguyen") or die("Could not select database");
	return $conn;
	}
function testuser($username)
{
	$conn = connect();
	$query = "SELECT * FROM user where username = '".$username."'";
	$result = mysql_query($query,$conn);
	$row = mysql_num_rows($result);
	if($row!=0)
	{
		return true;
	}
	else return false;
	mysql_close($conn);
}
function testlogin($username, $password)
{
	$conn = connect();
	$query = "SELECT * FROM user where username = '".$username."'and password ='".$password."'";
	$result = mysql_query($query,$conn);
	$row = mysql_num_rows($result);
	if($row!=0)
	{
		return true;
	}
	else return false;
	mysql_close($conn);
}

?>