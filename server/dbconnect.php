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
	$match = 0;
	$acc = 0;
	while($row = mysqli_fetch_assoc($result)) {
		if ($_POST["id"] == $row["id"] && $_POST["password"] == $row["password"]) {
			$acc++;
			echo "Account matched.";
			mysqli_close($conn);
		} else {
			$match++;
		}
	}
	if ($match < $acc) {
		echo "User do not exist!";
	}
}
?>
<html>
	<body>
		<form method="POST" action="../public/payment/" id="login_form">
			<h1>Received Data</h1>
			<?php
				echo '<input type="text" placeholder="Account ID" name="id" value="' . $_POST['id'] . '">';
				echo '<input type="text" placeholder="Password" name="password" value="' . $_POST['password'] . '">';
				echo '<input type="submit" value="Submit">';
				echo '<script>document.getElementById("login_form").submit()</script>';
			?>
		</form>
	</body>
</html>