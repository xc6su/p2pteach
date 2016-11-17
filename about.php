<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>About Us - P2PTeach</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="shortcut icon" href="images/shorticon.ico">
	</head>
	<body class="left-sidebar">
		<?php
			error_reporting(E_ERROR | E_PARSE);
			// server should keep session data for AT LEAST 1 hour
			ini_set('session.gc_maxlifetime', 3600);

			// each client should remember their session id for EXACTLY 1 hour
			session_set_cookie_params(3600);
			session_start();
			$name = array_key_exists("name", $_SESSION) ? $_SESSION["name"] : null;
		?>
		<script>
			function logOut(){
				jQuery.ajax({
			      "url":"http://localhost/p2pteach/destroy_session.php",
			      "success":function() {
			      	
			     }
   				});
				document.getElementById('signin').style.display = 'inline';
				document.getElementById('signup').style.display = 'inline';
				document.getElementById('welcome').style.display = 'none';
				document.getElementById('log_out').style.display = 'none';
			}
		</script>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="index.php">P2PTeach</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="#">Catalog</a></li>
							<li><a href="about.php">About Us</a></li>
							<li id="signin" style="display: inline"><a href="#" class="button">Sign In</a></li>
							<li id="signup" style="display: inline"><a href="signup.php" class="button special">Sign Up</a></li>
							<li id="welcome" style="display: none"> asdasd </li>
							<li id="log_out" style="display: none"><a onclick="logOut()" class="button special">Log out</a></li>
							<?php
								if (!is_null($name)){	
							?>
							<script type="text/javascript">
								document.getElementById('signin').style.display = 'none';
								document.getElementById('signup').style.display = 'none';
								document.getElementById('welcome').style.display = 'inline';
								document.getElementById('log_out').style.display = 'inline';
								document.getElementById('welcome').innerHTML = "Welcome, <?php echo $name?>";
							</script>
							<?php
								}
							?>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<article id="main">

					<header class="special container">
						<span class="icon fa-university"></span>
						<img id="p2picon" src="images/icon_grey.jpg" height="80px" width="288px">
						<h2><strong>ABOUT US</strong></h2>
					</header>

					<!-- One -->
						<section class="wrapper style4 container">

							<div class="row 150%">
								<div class="4u 12u(narrower)">

									<!-- Sidebar -->
										<div class="sidebar">
											<section>
												<header>
													<h3>Teaching Resources</h3>
												</header>
												<p>We invite teachers and qualified students from schools all around the world to be your personal tutor. Applicants who want to teach at p2pteach will be strictly evaluated by our education experts.</p>
												<footer>
													<ul class="buttons">
														<li><a href="#" class="button small">Learn More</a></li>
													</ul>
												</footer>
											</section>

											<section>
												<header>
													<h3>Course Catalog</h3>
												</header>
												<p>We have all kinds of courses in various fileds like science, literature, and languages. Courses vary from difficulty and duration, giving you plenty of choices.</p>
												<footer>
													<ul class="buttons">
														<li><a href="#" class="button small">Learn More</a></li>
													</ul>
												</footer>
											</section>
										</div>

								</div>
								<div class="8u 12u(narrower) important(narrower)">

									<!-- Content -->
										<div class="content">
											<section>
												<a href="#" class="image featured"><img src="images/pic05.jpg" alt="" /></a>
												<p>P2PTeach is driven by our core values that <strong>EVERYONE DESERVES EDUCATION</strong>.</p>
												<h3><strong>Building Community</strong></h3>
												<p>We are building an online community with experts in various fields. By involving learners, collaborators and instructors, we provide you a network to connect with your teacher, or your student.</p>
												<h3><strong>Learning from Your Peer</strong></h3>
												<p>Learning is a social activity that happens everywhere and everyday. Other than learning in classrooms, we believe that the best way to learn is sharing and connecting. Everyone has some unique talents in some field. Don't be shy, come and share your experience and knowledge with your peer!</p>
												<h3><strong>Manage Your Own Study Plan</strong></h3>
												<p>You can manage your personal study plan here. If you need help, we also have advisors in different fields to help you solving your questions. Based on your interest, we can also recommend the right courses for you. We do value your learning experience. And we believe it would be exceptional!</p>
											</section>
										</div>

								</div>
							</div>
						</section>

					<!-- Two -->
						

				</article>

				<section id="cta">

					<header>
						<h2>Ready to <strong>learn</strong>?</h2>
					</header>
					<footer>
						<ul class="buttons">
							<li><a href="signup.php" class="button special">Join us now</a></li>
						</ul>
					</footer>

				</section>
				<?php
					if (!is_null($name)){	
				?>
				<script type="text/javascript">
					document.getElementById('cta').style.display = 'none';
				</script>
				<?php
					}
				?>

			<!-- Footer -->
				<footer id="footer">

					<ul class="icons">
						<li><a href="#" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>

					<ul class="copyright">
						<li>&copy; P2PTeach Inc.</li>
					</ul>

				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>