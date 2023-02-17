<?php
$employeeid = $_POST['data[Employee_ID]'];
$firstname = $_POST['data[First_Name]'];
$lastname = $_POST['data[Last_Name]'];
$resourcename = $_POST['data[Resource_Name]'];
$workitemname = $_POST['data[Work_Item_Type]'];
$starttime = $_POST['data[Start_Time]'];
$endtime = $_POST['data[First_Name]'];
$endtime = $_POST['data[End_Time]'];
$datecompleted = $_POST['data[Date_Completed]'];
$hoursworked = $_POST['data[Hours_Worked]'];

if (!empty($employeeid) || !empty($firstname) || !empty($lastname) || !empty($resourcename) ||
 !empty($workitemname) || !empty($starttime) || !empty($endtime) || !empty($datecompleted) || !empty($hoursworked)) {
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "emit";

		//create connection
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
} else {
	echo "Fields are required";
	die();

}

?>
