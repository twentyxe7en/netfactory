<!DOCTYPE html>
<html>
	<head>
		<title>Net Factory - Dashboard</title>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
		<link rel="icon" href="../images/logo/favicon.png">
	</head>
	<body>
		<header>
			<img src="../images/logo/netfactory-text.png">
		</header>
		<div id="container">
			<section id="nav">
				<ul>
					<table>
						<tr>
							<td class="active"><li><a href="#" class="active">Dashboard</a></li></td>
						</tr>
						<tr>
							<td><li><a href="#">Online Payment</a></li></td>
						</tr>
						<tr>
							<td><li><a href="#">View Billing</a></li></td>
						</tr>
						<tr>
							<td><li><a href="#">Account Settings</a></li></td>
						</tr>
					</table>
				</ul>
			</section>
			<section id="content">
				<div id="dashboard">
					<h1>Dashboard</h1>
					<table id="dash_tbl">
						<tr>
							<th>Account ID</th>
							<td id="acc_id">122899</td>
							<th>Account Name</th>
							<td id="acc_name">Administrator</td>
						</tr>
						<tr>
							<th>Data Plan</th>
							<td id="data_plan">100 MBPS</td>
							<th>Email Address</th>
							<td id="email">admin@netfactory.com</td>
						</tr>
						<tr>
							<th>Package Price</th>
							<td id="pack_price">1,999.00</td>
							<th>Contact Number</th>
							<td id="contact">+63 9123456789</td>
						</tr>
						<tr>
							<th>Installation Date</th>
							<td id="install_date">03-17-22</td>
							<th>Paid For This Month</th>
							<td id="pay_status">Yes</td>
						</tr>
					</table>
				</div>
				<div id="payment">
					<h1>Online Payment</h1>
					<table id="pay_tbl">
						<tr>
							<th>Account ID</th>
							<th>Account Name</th>
							<th>Data Plan</th>
							<th>Current Balance</th>
						</tr>
						<tr>
							<td id="acc_id">122899</td>
							<td id="acc_name">Administrator</td>
							<td id="data_plan">100 MBPS</td>
							<td id="curr_bal">0.00</td>
						</tr>
						<tr>
							<th>GCash Number</th>
							<td id="gcash_num"><input type="text" placeholder="Enter GCash Number"></td>
							<td></td>
							<td id="pay_btn"><button>Pay Thru GCash</button></td>
						</tr>
					</table>
				</div>
				<div id="billing">
					<h1>View Billing</h1>
				</div>
				<div id="settings">
					<h1>Account Settings</h1>
				</div>
			</section>
		</div>
	</body>
</html>