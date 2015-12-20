<?php session_start(); ?>
<?php include("includes/connection.php"); ?>

<?php

if ($_GET['id']==1) {								//Refresh chat log of the user currently chatting
    $useremail = $_GET['email'];
    $query = "SELECT * from `$useremail`";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {
      echo '<div class="msgln">';
      echo '<b>';
      echo $row['name'].': ';
      echo '</b>'; 
      echo $row['msg'];
      echo '<br>';
      echo '</div>';
    }
}

else if($_GET['id']==2) {							//Insert admin's message to the persn currently chatting
  	$username = "Admin";
  	$useremail = $_GET['email'];
  	if (isset($_GET['msg'])) {
    $usermsg = $_GET['msg'];
    } else {
      $usermsg = "not set";
    }
  	$timestamp = strftime("%Y-%m-%d %H:%M:%S", time()+19800);
    $query = "INSERT INTO `$useremail` (name, msg, time)
            VALUES ('{$username}','{$usermsg}', '{$timestamp}')";
	  $connection -> query($query);

    if (mysqli_error($connection)) {
      echo mysqli_error($connection);
    }
}

else if ($_GET['id']==3) {							//Refresh all user list 
    $query = "SELECT * from allusers ORDER BY user_id DESC";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {			//list users with unread messages at the top
    	if ($row['new']==1) {
        	echo '<a href="index.php?usertb='.$row['tbname'].'" style="background-color:yellow">';
        	echo $row['username'];
        	echo '</a>';
        	echo '<br>';
        } 
        
    }
    $query = "SELECT * from allusers ORDER BY user_id DESC";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {			//list users with no unread messages
        if ($row['new']==0) {
        	echo '<a href="index.php?usertb='.$row['tbname'].'">';
        	echo $row['username'];
        	echo '</a>';
        	echo '<br>';
        } 
    }
}

else if ($_GET['id']==4) {							//Deleting all logs
	$query = "SELECT * from allusers";
	$result = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_array($result)) {
		$tbname = $row['tbname'];
		$querydel = "DROP TABLE `$tbname`";
		$connection -> query($querydel);
	}
	$query = "TRUNCATE allusers";
	$connection -> query($query);

	$username = "Sample";							//Insert a sample user to avoid mysqli errors
    $useremail = "sample@sample.com"; 
    $usermsg = "This is just a sample. Please do not reply.";
	$query = "INSERT INTO allusers (tbname, username)		
			  VALUES ('{$useremail}', '{$username}')";		//add the new tbname in the allusers table
	$connection -> query($query);
	$query = "CREATE TABLE `$useremail` (id INT AUTO_INCREMENT, PRIMARY KEY(id),name TEXT, msg TEXT, time VARCHAR(50))";
	mysqli_query($connection, $query);						//create a new table
    $timestamp = strftime("%Y-%m-%d %H:%M:%S", time()+19800);
    $query = "INSERT INTO `$useremail` (name, msg, time)
              VALUES ('{$username}','{$usermsg}', '{$timestamp}')";
    $connection -> query($query);
	header("Location: index.php");
}

?>

	