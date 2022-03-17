<!DOCTYPE html>
<html>
	<head>
		<title>Net Factory</title>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="icon" href="images/logo/favicon.png">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="container">
			<section id="sec-left">
				<img src="./images/logo/netfactory-text.png">
				<h2>High speed internet for you</h2>
			</section>
			<section id="sec-right"> 
				<form method="post" action="../server/dbconnect.php" id="login_form">
				<!--form method="POST" action="payment/index.php" id="login_form"-->
					<h1>Sign In</h1>
					<input name="id" placeholder="Account ID" type="text">
					<input name="password" placeholder="Password" type="password">
					<a href="#">Forgot password?</a>
					<input type="submit" value="Submit">
				</form>
			</section>
		</div>
	</body>
</html>