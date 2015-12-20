<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php include("includes/connection.php"); ?>
<?php include("includes/onlineAdmin.php"); ?>
<?php session_start(); ?>

<?php
if (isset($_GET['logout'])) {
	if ($_GET['logout']==true) {
		setOffline($connection);
		session_destroy();
		header("Location: index.php");
	}
}
?>	
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat - Admin Module</title>
<link type="text/css" rel="stylesheet" href="css/24x7chat.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/24x7chat.js"></script>
</head>

<?php
if (!isset($_SESSION['admin_id'])){
loginForm();
}
else 
{
?>
<div id="wrapper">
   
    <div id="menu">
        <p class="welcome" id="wel"><?php  
                                if (isset($_GET['usertb'])) {
                                    echo $_GET['usertb'];
                                    $usertb = $_GET['usertb'];
                                     $query = "UPDATE allusers
                                               SET new = 0
                                               where tbname = '$usertb'";
                                    $connection -> query($query);
                                } else {
                                     $query = "SELECT * from allusers";
                                     $result = mysqli_query($connection, $query);
                                     $row = mysqli_fetch_array($result);
                                     echo $row['tbname'];
                                }
                           ?> </p>
        <p class="logout"><a id="exit" href='index.php?logout=true'>Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox">
	<?php
        if (isset($_GET['usertb'])) {
            $useremail = $_GET['usertb'];
        } else {
            $query = "SELECT * from allusers";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_array($result);
            $useremail = $row['tbname'];
        }
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
	?>
	</div>
     
    
    <input name="usermsg" type="text" id="usermsg" size="63" /><br/>
    <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    <hr>
    <h4> List of Users </h4>
    <a href="post.php?id=4"><h6> Delete Log </h6></a>
    <div id="listwrapper">
	</div>
    
</div>

<?php
}
?>
</body>
</html>

<?php
 
function loginForm(){
    echo'
    <div id="loginform">
    <form action="index.php" method="post">
        <p>Please enter your name to continue:</p>
        <label for="name">Name:</label>
        <input type="text" name="username" id="name" /><br/>
        <label for="pass">Password:</label>
        <input type="password" name="password" id="pass" /><br/><br/>
        <input type="submit" name="enter" id="enter" value="Enter" />
    </form>
    </div>
    ';
}
 
if(isset($_POST['enter'])){					//validate admin using username and password
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $hash_pass= sha1($pass);
    
    $query = "SELECT * from admin LIMIT 1";
    $result = mysqli_query($connection, $query);
    $flag=0;
    while($row = mysqli_fetch_array($result)) {
        if (($user==$row['user']) && ($hash_pass==$row['password'])) {
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['adminname'] = $row['user'];
            $flag=1;
        }
    }

    if ($flag==1) {
    	setOnline($connection); 
        header("Location: index.php");
        exit();
    }
    else {
        header("Location: index.php?attempt=1");
        exit();
    }
}

?>

<?php 
    if (isset($_GET['attempt'])) {
        echo '<span class="error">Invalid User Id/Password</span>';
    }
?>
