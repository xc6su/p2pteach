<!DOCTYPE HTML>
<html>
<script>
	var emailValid = false;

	function emailValidation() {
		var x = document.getElementById("id_email");
		var re = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/;
		var result = re.test(x.value);
		if (!result) {
			x.style.outline = "2px solid red";
			document.getElementById("error_id").style.display = "inline";
			emailValid = false;
		}
		else {
			x.style.outline = "none";
			emailValid = true;
			document.getElementById("error_id").style.display = "none";

		}
		if(emailValid){
			$('#signin_btn').removeAttr("disabled");
			$('#signin_btn').addClass("special");
			$('#signin_btn').removeClass("noeffect");
		}
		else{
			$('#signin_btn').attr("disabled", "disabled");
			$('#signin_btn').removeClass("special");
			$('#signin_btn').addClass("noeffect");
		}
	}

</script>
<?php
	error_reporting(E_ERROR | E_PARSE);
	// server should keep session data for AT LEAST 1 hour
	ini_set('session.gc_maxlifetime', 3600);

	// each client should remember their session id for EXACTLY 1 hour
	session_set_cookie_params(3600);

	session_start();
	$signin_error = array_key_exists("signin_error", $_SESSION) ? $_SESSION["signin_error"] : null;
?>
	<head>
		<title>Sign In - P2PTeach</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="shortcut icon" href="images/shorticon.ico">
	</head>
	<body class="contact">
		
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="index.html">P2PTeach</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="#">Catalog</a></li>
							<li><a href="about.php">About Us</a></li>
							<li><a href="signin.php" class="button">Sign In</a></li>
							<li><a href="signup.php" class="button special">Sign Up</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<article id="main">

					<header class="special container">
						<span class="icon fa-desktop"></span>
						<h2>Sign In</h2>
					</header>

					<!-- Sign Up Form -->
						<section class="wrapper style4 special container 75%">

							<!-- Content -->
								<div class="content">
									<form id="signin_form" method="post" action="signinController.php">
										<span  style="color:red" id="signin-errors"></span>
										<?php
											if ($signin_error){	
										?>
										<script type="text/javascript">
											document.getElementById('signin-errors').innerHTML = "<?php echo $signin_error ?>";
										</script>
										<?php
											}
											$_SESSION["signin_error"] = "";
										?>
										<!--    Log In Information    -->
										<div class="signup-start">
											<legend><strong>Email (Also Your Username)</strong></legend>
										</div>
										<div class="row 50%">
											<div class="6u 12u(mobile)">
												<input id="id_email" type="text" name="email" placeholder="Email" onkeyup="emailValidation()" required />
											</div>
											<div class="error" id="error_id" style="color:red; display: none;">
												Please enter a valid email address.
											</div>
										</div>
										<div class="signup-mid"></div>
										<div class="signup-mid">
											<legend><strong>Password</strong></legend>
										</div>
										<div class="row 50%">
											<div class="6u 12u(mobile)">
												<input type="password" name="password" placeholder="Password" required/>
											</div>
										</div>
										<div class="signup-mid"></div>
										
										<!--    Button    -->
										<div class="row">
											<div class="12u">
												<ul class="buttons">
													<li><input id="signin_btn" type="submit" class="noeffect" value="SIGN IN" disabled/></li>
												</ul>
											</div>
										</div>
									</form>
								</div>

						</section>

				</article>

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