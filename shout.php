<?php include("includes/onlineAdmin.php"); ?>
<?php include("includes/connection.php"); ?>

<?php

if($_POST)
{	
	//check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    } 
	
	if(isset($_POST["message"]) &&  strlen($_POST["message"])>0)
	{
		//sanitize user name and message received from chat box
		//You can replace username with registerd username, if only registered users are allowed.
		$username = filter_var(trim($_POST["username"]),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		$message = filter_var(trim($_POST["message"]),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		$email = filter_var(trim($_POST["email"]),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		$user_ip = $_SERVER['REMOTE_ADDR'];
		
		$uservalidate = validate_user($email, $connection);
		if ($uservalidate == 1) {
			$username = $_POST['username'];
            $useremail = $_POST['email']; 
            $usermsg = $_POST['message'];
            $timestamp = strftime("%Y-%m-%d %H:%M:%S", time()+19800);
            $query = "INSERT INTO `$useremail` (name, msg, time)
                      VALUES ('{$username}','{$usermsg}', '{$timestamp}')";
            $connection -> query($query);

            $query = "UPDATE allusers
            		  SET new=1
            		  WHERE tbname = '$useremail'";
            $connection -> query($query);

    	} 	else if ($uservalidate == 0) {
    		$username = $_POST['username'];
            $useremail = $_POST['email']; 
            $usermsg = $_POST['message'];
			$query = "INSERT INTO allusers (tbname, username)		
					  VALUES ('{$useremail}', '{$username}')";		//add the new tbname in the allusers table
			$connection -> query($query);

			$query = "CREATE TABLE `$useremail` (id INT AUTO_INCREMENT, PRIMARY KEY(id),name TEXT, msg TEXT, time VARCHAR(50))";
			mysqli_query($connection, $query);						//create a new table
            $timestamp = strftime("%Y-%m-%d %H:%M:%S", time()+19800);
            $query = "INSERT INTO `$useremail` (name, msg, time)
                      VALUES ('{$username}','{$usermsg}', '{$timestamp}')";
            $connection -> query($query);

            $query = "UPDATE allusers
            		  SET new=1
            		  WHERE tbname = '$useremail'";
            $connection -> query($query);
    	}

    	checkAdmin($connection, $useremail); 
    	

		
	} 
	else if($_POST["fetch"]==1)
	{	$useremail = $_POST['email'];	
		$results = mysqli_query($connection,"SELECT * FROM `{$useremail}`");
		while($row = mysqli_fetch_array($results))
		{
			$msg_time = date('h:i A M d',strtotime($row["time"])); //message posted time
			echo '<div class="shout_msg"><time>'.$msg_time.'</time><span class="username">'.$row["name"].'</span> <span class="message">'.$row["msg"].'</span></div>';
		}
	}
	else
	{
		header('HTTP/1.1 500 Are you kiddin me?');
    	exit();
	}

}

?>

<?php 
	function validate_user($useremail, $connection) {
		$result = mysqli_query($connection, "SELECT * FROM allusers WHERE tbname ='$useremail'");
		if(mysqli_num_rows($result)>0) {
			return 1;
		} else {
			return 0;
		}
	} 
?>