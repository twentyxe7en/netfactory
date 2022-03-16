<?php
$sn = "localhost";
$un = "root";
$pw = "";
$db = "netfactory";

// Create connection
$conn = new mysqli($sn, $un, $pw, $db);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
echo "Connected succesfully <br>";

$sql = "SELECT * FROM Accounts";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	// Output data of each row
	while($row = mysqli_fetch_assoc($result)) {
		/*
		echo "<table>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<td>" .$row["id"] . "</td>";
		echo "<th>NAME</th>";
		echo "<td>" .$row["name"] . "</td>";
		echo "<th>PASSWORD</th>";
		echo "<td>" .$row["password"] . "</td>";
		echo "</tr>";
		echo "</table>";
		*/
		if ($_POST["id"] == $row["id"] && $_POST["password"] == $row["password"]) {
			echo "Account matched.";
			mysqli_close($conn);
		}
	}
}
?>