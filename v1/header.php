<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" <?php if($_SESSION["user_login"]=="True") { ?> href="home.php" <?php } else { ?> href="index.php" <?php } ?>><img src="images/logo.png" height="45px" width="50px"/></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a <?php if($_SESSION["user_login"]=="True") { ?> href="home.php" <?php } else { ?> href="index.php" <?php } ?> class="nav-link">Home</a></li>
				<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
				<li class="nav-item"><a href="events.php" class="nav-link">Events</a></li>
				<li class="nav-item"><a href="review.php" class="nav-link">Review</a></li>
				<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
				<?php if($_SESSION["user_login"]=="False" or $_SESSION["user_login"]=="") { ?>
				<li class="nav-item cta"><a href="login.php" class="nav-link"><span>Login/Register</span></a></li>
				<?php } else { ?>
				<li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>
				<li class="nav-item cta"><a href="logout.php" class="nav-link"><span>Logout</span></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>