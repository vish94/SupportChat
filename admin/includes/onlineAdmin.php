<?php
	function setOnline($connection) {
		$adminID = $_SESSION['admin_id'];
		$query = "UPDATE admin 
				  SET online = 1
				  WHERE id = '$adminID'";
	    $connection -> query($query);
	}

	function setOffline($connection) {
		$adminID = $_SESSION['admin_id'];
		$query = "UPDATE admin 
				  SET online = 0
				  WHERE id = '$adminID'";
	    $connection -> query($query);
	}


	function checkAdmin($connection, $useremail) {
		$query = "SELECT online from admin";
		$result = mysqli_query($connection, $query);
		$flag = 0;
		while ($row = mysqli_fetch_array($result)) {
			if (($row['online'])==1) {
				$flag = 1;
			}
		}
		$username = "Admin";
		$timestamp = strftime("%Y-%m-%d %H:%M:%S", time()+19800);
		if ($flag == 0) {
			$usermsg ="Sorry , we are away. But ask your questions & give your email ID - We will help you. 
    				   You may also check back here for the response by using the email ID";
		}
		$query = "INSERT INTO `$useremail` (name, msg, time)
                      VALUES ('{$username}','{$usermsg}', '{$timestamp}')";
        $connection -> query($query);
	}

?>

