
<h1>User Delete</h1>
<?php 
$username = '';
$password ='';
$role = '';
$status = '';
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
<form method="post" action="index.php?page=userdelete&?username=<?php echo $username?>">
Username
<input type="text" name="username" value="<?php echo $username?>" disabled="disabled"></br>
Password
<input type="password" name="password" value="<?php echo $password?>"></br>
Role
<input type="text" name="role" value="<?php echo $role?>"  disabled="disabled"></br>
Status
<input type="text" name="status" value="<?php echo $status?>" disabled="disabled"></br>
</br>
<input type="hidden" name="username" value="<?php echo $username?>">
<input type="submit" name="DeleteUser" value=" OK "></br>
</form>
<?php
if (isset($_POST['DeleteUser'])){
	$username = $_POST['username'];


	include 'dbconnect.php';
	// SQL query
	$sql = "DELETE FROM app_user
				WHERE username = '$username'";

	// Execute the query (the recordset $rs contains the result)
	if (mysqli_query($conn, $sql)) {
		echo "The record is deleted successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	mysqli_close($conn);
}
?>
</br><a href="index.php?page=userview">Back</
