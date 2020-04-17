
<style>
table {
	font-family: arial, sans-serif;
	border-collapse: collapse;
	width: 80%;
}

td, th {
	border: 1px solid #dddddd;
	text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<?php
include 'dbconnect.php';
$sql = "SELECT username, role, status FROM app_user";
$result = mysqli_query($conn, $sql);
?>
</br><a href="index.php?page=useradd">Add user</a>
<table>
  <tr>
    <th>Username</th>
    <th>Role</th>
    <th>Status</th>
    <th colspan="3">Action</th>
  </tr>
<?php 
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
?>	
    
    	<tr>
    	<td><?php echo $row["username"] ?></td>
    	<td><?php echo $row["role"] ?></td>
    	<td><?php echo $row["status"] ?></td>
    	<td><a href="index.php?page=useredit&username=<?php echo $row["username"] ?>">Edit</a></td>
		<td><a href="index.php?page=userdetails&username=<?php echo $row["username"] ?>">Details</a></td>
    	<td><a href="index.php?page=userdelete&username=<?php echo $row["username"] ?>">Delete</a></td>
    	</tr>
<?php
    }
} else {
    echo "<tr><td colspan='3'>0 results</td></tr>";
}

mysqli_close($conn);
?>
</table>