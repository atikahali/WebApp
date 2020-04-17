<h1>User Details</h1>
<?php 

if (isset($_GET['username'])) {
	$user = $_GET['username'];
	// Cre ate connection
	include 'dbconnect.php';
	
	$sql = "SELECT username, password, role, status 
			FROM app_user
			WHERE username='$user'";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		$row = mysqli_fetch_assoc($result);
		$username = $row['username'];
		$password = $row['password'];
		$role = $row['role'];
		$status = $row['status'];		
		
	} else {
		echo "0 results";
	}
	
	mysqli_close($conn);
}
?>
<form method="post" action="index.php?page=useredit&username=<?php echo $username?>">
Username
<input type="text" name="username" value="<?php echo $username?>" disabled="disabled"></br>
Password
<input type="password" name="password" value="<?php echo $password?>" disabled="disabled"></br>
Role
<input type="text" name="role" value="<?php echo $role?>" disabled="disabled"></br>
Status
<input type="text" name="status" value="<?php echo $status?>" disabled="disabled"></br>
</br>
<input type="hidden" name="username" value="<?php echo $username?>">
</form>
</br><a href="index.php?page=userview">Back</a>
