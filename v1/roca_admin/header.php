<div class="header-page">
	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
	    <div class="navbar-brand">
			<a href="home.php"><img src="../images/logo.png" height="45px" width="50px" alt="No Pic"></a>
		</div>
		<button class="navbar-toggler bg-info" type="button" data-toggle="collapse" data-target="#navbarNavDropdown1" aria-controls="navbarNavDropdown1" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown1">
			<div class="navbar-nav">
				<a class="nav-item nav-link text-info" href="home.php">Home</a>
				<a class="nav-item nav-link text-info" href="error.php">Message</a>
				<a class="nav-item nav-link text-info" href="faq.php">FAQ</a>
				<a class="nav-item nav-link text-info" href="review.php">Review</a>
				<a class="nav-item nav-link text-info" href="error.php">Satting</a>
				<a class="nav-item nav-link text-info" href="profile.php">Profile</a>
				<a class="nav-item nav-link text-info" href="logout.php">Logout</a>
			</div>
		</div>
	</nav>

	<nav class="navbar navbar-expand-lg navbar-light">	
		<span class="navbar-brand">Menu</span>
		<button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navbarNavDropdown2" aria-controls="navbarNavDropdown2" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown2"+>
			<div class="navbar-nav font-weight-bold">
				<li class="nav-item dropdown">
					<a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notice</a>
					<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item text-info" href="addnotice.php">Add</a>
						<a class="dropdown-item text-info" href="viewnotice.php">View</a>
						<a class="dropdown-item text-info" href="publishnotice.php">Publish</a>
						<a class="dropdown-item text-info" href="eventmessage.php">Message</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Events</a>
					<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item text-info" href="addevent.php">Add</a>
						<a class="dropdown-item text-info" href="viewevent.php">View</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gallery</a>
					<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item text-info" href="addgallery.php">Add</a>
						<a class="dropdown-item text-info" href="viewgallery.php">View</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Register User</a>
					<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item text-info" href="adduser.php">Add</a>
						<a class="dropdown-item text-info" href="viewuser.php">View</a>
						<a class="dropdown-item text-info" href="unregisteruser.php">Unregister User</a>
						<a class="dropdown-item text-info" href="transaction.php">Transaction Details</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Co-ordinator</a>
					<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item text-info" href="addco.php">Add</a>
						<a class="dropdown-item text-info" href="viewco.php">View</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Study Material</a>
					<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item text-info" href="addstudy.php">Add</a>
						<a class="dropdown-item text-info" href="viewstudy.php">View</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Payment</a>
					<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item text-info" href="addpay.php">Add</a>
						<a class="dropdown-item text-info" href="viewpay.php">View</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Participation</a>
					<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item text-info" href="memberparticipation.php">ROCA Member</a>
						<a class="dropdown-item text-info" href="subscriberparticipation.php">Subscriber</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Subscriber</a>
					<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item text-info" href="subscriber.php">View</a>
					</div>
				</li>
				<?php if($_SESSION['role']=="ADMINISTRATOR") { ?>
				<li class="nav-item dropdown">
					<a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Roca Members</a>
					<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item text-info" href="member.php">View</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Registration</a>
					<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item text-info" href="regstart.php">Start</a>
						<a class="dropdown-item text-info" href="regstop.php">Stop</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
					<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item text-info" href="addadmin.php">Add</a>
						<a class="dropdown-item text-info" href="viewadmin.php">View</a>
					</div>
				</li>
				<?php } ?>
			</div>
		</div>
	</nav>
</div>