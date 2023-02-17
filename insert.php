<?php
$employeeid = $_POST['data[Employee_ID]'];
$firstname = $_POST['data[First_Name]'];
$lastname = $_POST['data[Last_Name]'];
$resourcename = $_POST['data[Resource_Name]'];
$workitemname = $_POST['data[Work_Item_Type]'];
$starttime = $_POST['data[Start_Time]'];
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

		if(mysqli_connect_error()) {
			die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
		} else {
			$SELECT = "SELECT employeeid From timetb Where employeeid = ? Limit 1";
			$INSERT = "INSERT Into timetb (employeeid, firstname, lastname, resourcename, workitemname, starttime, endtime, datecompleted, hoursworked) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = $conn->prepare($SELECT),
			$stmt->bind_param('i', $employeeid);
			$stmt->execute();
			$stmt->bind_result($employeeid);
			$rnum = $stmt->num_rows;

			if ($rnum==0) {
				$stmt->close();

				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("issssiiii", $employeeid, $firstname, $lastname, $resourcename, $workitemname, $starttime, $endtime, $datecompleted, $hoursworked);
				$stmt->execute();
				echo "New record inserted successfully";
			} else {
				echo "Someone already has this id";
			}
			$stmt->close();
			$conn->close();
		}
} else {
	echo "Fields are required";
	die();

}

?>
