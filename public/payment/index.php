<!DOCTYPE html>
<?php
	$cookie_id = $_POST["id"];
	$cookie_key = $_POST["password"];
	setcookie($cookie_id, $cookie_key, time() + (86400 * 60), "/");
?>
<?php 
	$sn = "localhost";
	$un = "root";
	$pw = "";
	$db = "netfactory";

	$conn = new mysqli($sn, $un, $pw, $db);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM billing WHERE id = '" . $_POST["id"] . "'";
	$result = mysqli_query($conn, $sql);

	$fname = "";
	$lname = "";
	$phone = "";
	$email = "";
	$city = "";
	$post_code = "";
	$address_1 = "";
	$address_2 = "";
	$state = "";

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$fname = $row["fname"];
			$lname = $row["lname"];
			$phone = $row["phone"];
			$email = $row["email"];
			$city = $row["city"];
			$post_code = $row["post_code"];
			$address_1 = $row["address_1"];
			$address_2 = $row["address_2"];
			$state = $row["state"];
		}
	}
	$name = $fname . " " . $lname;

	mysqli_close($conn);
?>
<html>
	<head>
		<title>Net Factory - Online Payment</title>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="icon" href="../images/logo/favicon.png">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php
			if(!isset($_COOKIE[$cookie_id])) {
				//echo "<script>alert('" . $cookie_id . "is not set!')</script>";
			} else {
				//echo "<script>alert('" . $cookie_id . "is set!')</script>";
				//echo "<script>alert('ID: " . $cookie_id . ", Key: " . $cookie_key . ".')</script>";
			}
		?>
		<header>
			<a href="#"><img id="title" src="../images/logo/netfactory-text.png"></a>
			<p><span id="acc-id">Account ID</span> | <a href="../">Log Out</a></p>
			<?php
				echo "<script>document.getElementById('acc-id').innerHTML = 'User#" . $_POST["id"] . "'</script>"; 
			?>
		</header>
		<div id="container">
			<form method="POST" action="">
				<section id="heading">
					<h1>Online Payment</h1>
				</section>
				<section id="bill-info">
					<h2>Billing Information</h2>
					<table id="bill-tbl">
						<tr>
							<th>Name</th>
							<?php echo '<td id="name">' . $name . '</td>';?>
							<th>Phone</th>
							<?php echo '<td id="phone">' . $phone . '</td>';?>
							<th>Email</th>
							<?php echo '<td id="email">' . $email . '</td>';?>
						</tr>
						<tr>
							<th>City</th>
							<?php echo '<td id="city">' . $city . '</td>';?>
							<th>Country</th>
							<td id="country">PH</td>
							<th>Postal Code</th>
							<?php echo '<td id="post-code">' . $post_code . '</td>';?>
						</tr>
						<tr>
							<th>Address 1</th>
							<?php echo '<td id="line-1">' . $address_1 . '</td>';?>
							<th>Address 2</th>
							<?php echo '<td id="line-2">' . $address_2 . '</td>';?>
							<th>State</th>
							<?php echo '<td id="state">' . $state . '</td>';?>
						</tr>
					</table>
				</section>
				<section id="pay-sect">
					<h2>Payment Section</h2>
					<table id="bill-pay">
						<tr>
							<th>Balance (PHP)</th>
							<td id="bill-bal">1199</td>
						</tr>
						<tr>
							<th>Payment Method</th>
							<td id="gcash"><input type="checkbox" checked> GCash</td>
						</tr>
						<tr>
							<td id="btn" colspan="2"><input type="button" value="Submit"></td>
						</tr>
					</table>
				</section>
			</form>
		</div>
	</body>
	<script>
		let name = document.getElementById("name").innerHTML;
		let phone = document.getElementById("phone").innerHTML;
		let email = document.getElementById("email").innerHTML;
		let city = document.getElementById("city").innerHTML;
		let post_code = document.getElementById("post-code").innerHTML;
		let address_1 = document.getElementById("line-1").innerHTML;
		let address_2 = document.getElementById("line-2").innerHTML;
		let state = document.getElementById("state").innerHTML;
		let bal = document.getElementById("bill-bal").innerHTML;
		let balance = parseInt(bal) * 100;

		const options = {
		    method: 'POST',
		    headers: {
		        Accept: 'application/json',
		    	'Content-Type': 'application/json',
		    	Authorization: 'Basic cGtfdGVzdF80VFpXTVd3R2J1N1JoNmhDRGhIdk1OSkM6'
		    },
		    body: JSON.stringify({
		    	data: {
		        	attributes: {
		        		amount: balance,
		        		redirect: {success: 'https://www.google.com', failed: 'https://www.youtube.com'},
		        		billing: {
		          			address: {
		            			line1: address_1,
		            			line2: address_2,
		            			state: state,
		            			postal_code: post_code,
		            			city: city,
		            			country: 'PH'
		          			},
		          			name: name,
		          			phone: phone,
		          			email: email
		        		},
			        	type: 'gcash',
			        	currency: 'PHP'
		      		}
		    	}
		  	})
		};

		fetch('https://api.paymongo.com/v1/sources', options)
		  	.then(response => response.json())
		  	.then(response => console.log(response))
		  	.catch(err => console.error(err));

		document.getElementById("btn").addEventListener("click", function() {
			window.location.href = data.attributes.redirect.checkout_url
		})

	</script>
</html>