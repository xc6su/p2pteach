<!DOCTYPE HTML>
<html>
<?php
	// server should keep session data for AT LEAST 1 hour
	ini_set('session.gc_maxlifetime', 3600);

	// each client should remember their session id for EXACTLY 1 hour
	session_set_cookie_params(3600);

	session_start();
?>
<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

<script>

	var emailValid = false;
	var passValid = false;
	var nameValid = false;
	var cityValid = false;
	var stateValid = false;
	var zipValid = false;
	var cardValid = false;
	var expMonValid = false;
	var expYearValid = false;
	var cvcValid = false;

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
		if(allValid()){
	    	$('#signup_btn').removeAttr("disabled");
	    	$('#signup_btn').addClass("special");
	    	$('#signup_btn').removeClass("noeffect");
	    }
	    else{
	    	$('#signup_btn').attr("disabled", "disabled");
	    	$('#signup_btn').removeClass("special");
	    	$('#signup_btn').addClass("noeffect");
	    }
	}

	function nameValidation() {
		var x = document.getElementById("name_input");
		var re = /^(?:[a-zA-Z]+(?:[.'\-,])?\s?)+$/;
		var result = re.test(x.value);
		if (!result) {
			x.style.outline = "2px solid red";
			nameValid = false;
			document.getElementById("error_name").style.display = "inline";
		}
		else {
			x.style.outline = "none";
			nameValid = true;
			document.getElementById("error_name").style.display = "none";
			
		}
		if(allValid()){
	    	$('#signup_btn').removeAttr("disabled");
	    	$('#signup_btn').addClass("special");
	    	$('#signup_btn').removeClass("noeffect");
	    }
	    else{
	    	$('#signup_btn').attr("disabled", "disabled");
	    	$('#signup_btn').removeClass("special");
	    	$('#signup_btn').addClass("noeffect");
	    }
	}

	function cityValidation() {
		var x = document.getElementById("city_input");
		var re = /^(?:[a-zA-Z]+(?:[.'\-,])?\s?)+$/;
		var result = re.test(x.value);
		if (!result) {
			x.style.outline = "2px solid red";
			cityValid = false;
			document.getElementById("error_city").style.display = "inline";
		}
		else {
			x.style.outline = "none";
			cityValid = true;
			document.getElementById("error_city").style.display = "none";
		}
		if(allValid()){
	    	$('#signup_btn').removeAttr("disabled");
	    	$('#signup_btn').addClass("special");
	    	$('#signup_btn').removeClass("noeffect");
	    }
	    else{
	    	$('#signup_btn').attr("disabled", "disabled");
	    	$('#signup_btn').removeClass("special");
	    	$('#signup_btn').addClass("noeffect");
	    }
	}

	function stateValidation() {
		var x = document.getElementById("state_input");
		var re = /^(?:[a-zA-Z]+(?:[.'\-,])?\s?)+$/;
		var result = re.test(x.value);
		if (!result) {
			x.style.outline = "2px solid red";
			stateValid = false;
			document.getElementById("error_state").style.display = "inline";
			
			
		}
		else {
			x.style.outline = "none";
			stateValid = true;
			document.getElementById("error_state").style.display = "none";
		}
		if(allValid()){
	    	$('#signup_btn').removeAttr("disabled");
	    	$('#signup_btn').addClass("special");
	    	$('#signup_btn').removeClass("noeffect");
	    }
	    else{
	    	$('#signup_btn').attr("disabled", "disabled");
	    	$('#signup_btn').removeClass("special");
	    	$('#signup_btn').addClass("noeffect");
	    }
	}

	function zipValidation() {
		var x = document.getElementById("zip_input");
		var re = /[^0-9]/;
		var result = re.test(x.value);
		if (result) {
			x.style.outline = "2px solid red";
			zipValid = false;
			document.getElementById("error_zip").style.display = "inline";
		}
		else {
			x.style.outline = "none";
			zipValid = true;
			document.getElementById("error_zip").style.display = "none";
			
		}
		if(allValid()){
	    	$('#signup_btn').removeAttr("disabled");
	    	$('#signup_btn').addClass("special");
	    	$('#signup_btn').removeClass("noeffect");
	    }
	    else{
	    	$('#signup_btn').attr("disabled", "disabled");
	    	$('#signup_btn').removeClass("special");
	    	$('#signup_btn').addClass("noeffect");
	    }
	}

	function cardValidation() {
		var x = document.getElementById("card_input");
		var re = /^[0-9]{16}$/;
		var result = re.test(x.value);
		if (!result) {
			x.style.outline = "2px solid red";
			cardValid = false;
			document.getElementById("error_card").style.display = "inline";
		}
		else {
			x.style.outline = "none";
			cardValid = true;
			document.getElementById("error_card").style.display = "none";
			
		}
		if(allValid()){
	    	$('#signup_btn').removeAttr("disabled");
	    	$('#signup_btn').addClass("special");
	    	$('#signup_btn').removeClass("noeffect");
	    }
	    else{
	    	$('#signup_btn').attr("disabled", "disabled");
	    	$('#signup_btn').removeClass("special");
	    	$('#signup_btn').addClass("noeffect");
	    }
	}

	function expMonthValidation() {
		var x = document.getElementById("mon_input");
		var re = /^(0?[1-9]|1[012])$/;
		var result = re.test(x.value);
		if (!result) {
			x.style.outline = "2px solid red";
			expMonValid = false;
			document.getElementById("error_exp").style.display = "inline";
		}
		else {
			x.style.outline = "none";
			expMonValid = true;
			document.getElementById("error_exp").style.display = "none";
			
		}
		if(allValid()){
	    	$('#signup_btn').removeAttr("disabled");
	    	$('#signup_btn').addClass("special");
	    	$('#signup_btn').removeClass("noeffect");
	    }
	    else{
	    	$('#signup_btn').attr("disabled", "disabled");
	    	$('#signup_btn').removeClass("special");
	    	$('#signup_btn').addClass("noeffect");
	    }
	}

	function expYearValidation() {
		var x = document.getElementById("year_input");
		var re = /^[0-9]{4}$/;
		var result = re.test(x.value);
		if (!result) {
			x.style.outline = "2px solid red";
			expYearValid = false;
			document.getElementById("error_exp").style.display = "inline";
		}
		else {
			x.style.outline = "none";
			expYearValid = true;
			document.getElementById("error_exp").style.display = "none";
			
		}
		if(allValid()){
	    	$('#signup_btn').removeAttr("disabled");
	    	$('#signup_btn').addClass("special");
	    	$('#signup_btn').removeClass("noeffect");
	    }
	    else{
	    	$('#signup_btn').attr("disabled", "disabled");
	    	$('#signup_btn').removeClass("special");
	    	$('#signup_btn').addClass("noeffect");
	    }
	}

	function cvcValidation() {
		var x = document.getElementById("cvc_input");
		var re = /^[0-9]{3,4}$/;
		var result = re.test(x.value);
		if (!result) {
			x.style.outline = "2px solid red";
			cvcValid = false;
			document.getElementById("error_cvc").style.display = "inline";
		}
		else {
			x.style.outline = "none";
			cvcValid = true;
			document.getElementById("error_cvc").style.display = "none";
			
		}
		if(allValid()){
	    	$('#signup_btn').removeAttr("disabled");
	    	$('#signup_btn').addClass("special");
	    	$('#signup_btn').removeClass("noeffect");
	    }
	    else{
	    	$('#signup_btn').attr("disabled", "disabled");
	    	$('#signup_btn').removeClass("special");
	    	$('#signup_btn').addClass("noeffect");
	    }
	}

	function passwordValidation() {
		var pass_1 = document.getElementById("pass_id_1");
		var pass_2 = document.getElementById("pass_id_2");
		if (pass_1.value == pass_2.value || pass_2.value.length == 0 || pass_1.value.length == 0) {
			document.getElementById("pass_id_2").style.outline = "none";
			passValid = true;
			document.getElementById("error_pass_id").style.display = "none";
		}
		else {
			document.getElementById("pass_id_2").style.outline = "2px solid red";
			passValid = false;
			document.getElementById("error_pass_id").style.display = "inline";
			
		}
		if(allValid()){
	    	$('#signup_btn').removeAttr("disabled");
	    	$('#signup_btn').addClass("special");
	    	$('#signup_btn').removeClass("noeffect");
	    }
	    else{
	    	$('#signup_btn').attr("disabled", "disabled");
	    	$('#signup_btn').removeClass("special");
	    	$('#signup_btn').addClass("noeffect");
	    }
	}

	function allValid() {
		var isValid = true;
		$('body input').each(function() {
	        if($(this).val() == "") 
	        	isValid = false;
	    });

	    isValid = isValid && emailValid && passValid && nameValid && cityValid && stateValid && zipValid && cardValid && cvcValid && expMonthValidation && expYearValid;
	    return isValid;
	}
</script>

<script type="text/javascript">
  // This identifies your website in the createToken call below
  Stripe.setPublishableKey('pk_test_YO3bdFah8CpsxsIlzlQScRX1');
  // ...
</script>

<script type="text/javascript">
	jQuery(function($) {
	  $('#signup_form').submit(function(event) {
	    var $form = $(this);

	    // Disable the submit button to prevent repeated clicks
	    $form.find('#signup_btn').prop('disabled', true);

	    Stripe.card.createToken($form, stripeResponseHandler);

	    // Prevent the form from submitting with the default action
	    return false;
	  });
	});

	function stripeResponseHandler(status, response) {
	  var $form = $('#signup_form');

	  if (response.error) {
	    // Show the errors on the form
	    $form.find('.payment-errors').text(response.error.message);
	    $form.find('#signup_btn').prop('disabled', false);
	  } else {
	    // response contains id and card, which contains additional card details
	    var token = response.id;
	    // Insert the token into the form so it gets submitted to the server
	    $form.append($('<input type="hidden" name="stripeToken" />').val(token));
	    
	    // and submit
	    $form.get(0).submit();
	  }
	};
</script>

<head>
		<title>Sign Up - P2PTeach</title>
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
							<li><a href="index.html">Home</a></li>
							<li><a href="#">Catalog</a></li>
							<li><a href="about.php">About Us</a></li>
							<li><a href="#" class="button"> Sign In</a></li>
							<li><a href="signup.html" class="button special">Sign Up</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<article id="main">

					<header class="special container">
						<span class="icon fa-desktop"></span>
						<h2>Sign Up</h2>
						<p>BE A PROUD MEMBER OF OUR BUSINESS.</p>
					</header>

					<!-- Sign Up Form -->
						<section class="wrapper style4 special container 75%">

							<!-- Content -->
								<div class="content">
									<form method="post" action="" id="signup_form">
										<span class="payment-errors"></span>
										<div>
											<strong>Account Information</strong>
										</div>
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
												<input id="pass_id_1" type="password" name="password" placeholder="Password" onkeyup="passwordValidation()" required />
											</div>
										</div>
										<div class="signup-mid"></div>
										<div class="signup-mid">
											<legend><strong>Verify Password</strong></legend>
										</div>
										<div class="row 50%">
											<div class="6u 12u(mobile)">
												<input id="pass_id_2" type="password" placeholder="Verify Password" onkeyup="passwordValidation()" required />
											</div>
											<div class="error" id="error_pass_id" style="color:red; display: none;" >
												Password does not match!
											</div>
										</div>
										<div class="signup-mid"></div>
										<br/>
										<div>
											<strong>Personal Information</strong>
										</div>
										<div class="signup-mid">
											<legend><strong>Name</strong></legend>
										</div>
										<div class="row 50%">
											<div class="6u 12u(mobile)">
												<input id="name_input" type="text" name="name" placeholder="Name" onkeyup="nameValidation()" required />
											</div>
											<div class="error" id="error_name" style="color:red; display: none;" >
												Please enter a valid name.
											</div>
										</div>
										<div class="signup-mid"></div>
										<div class="signup-mid">
											<legend><strong>Address</strong></legend>
										</div>
										<div class="row 50%">
											<div class="8u 12u(mobile)">
												<input type="text" name="address" placeholder="Address" required />
											</div>
										</div>
										<div class="signup-mid"></div>
										<div class="signup-mid">
											<legend><strong>City</strong></legend>
										</div>
										<div class="row 50%">
											<div class="4u 12u(mobile)">
												<input id="city_input" type="text" name="city" placeholder="City" onkeyup="cityValidation()" required />
											</div>
											<div class="error" id="error_city" style="color:red; display: none;" >
												Please enter a valid city name.
											</div>
										</div>
										<div class="signup-mid"></div>
										<div class="signup-mid">
											<legend><strong>State</strong></legend>
										</div>
										<div class="row 50%">
											<div class="4u 12u(mobile)">
												<input id="state_input" type="text" name="state" placeholder="State" onkeyup="stateValidation()" required />
											</div>
											<div class="error" id="error_state" style="color:red; display: none;" >
												Please enter a valid state name.
											</div>
										</div>
										<div class="signup-mid"></div>
										<div class="signup-mid">
											<legend><strong>Zip Code</strong></legend>
										</div>
										<div class="row 50%">
											<div class="4u 12u(mobile)">
												<input id="zip_input" type="text" name="postal" placeholder="Zip Code" onkeyup="zipValidation()" required />
											</div>
											<div class="error" id="error_zip" style="color:red; display: none;" >
												Please enter a valid ZIP code. 
											</div>
										</div>
										<!--    Banking Information    -->
										<div>
											<strong>Banking Information</strong>
										</div>
										<div class="signup-mid">
											<legend><strong>Card Number</strong></legend>
										</div>
										<div class="row 50%">
											<div class="6u 12u(mobile)">
												<input id="card_input" type="text" placeholder="Card Number" required data-stripe="number" onkeyup="cardValidation()" size="20"/>
											</div>
											<div class="error" id="error_card" style="color:red; display: none;" >
												Please enter a valid card number. 
											</div>
										</div>
										<div class="signup-mid"></div>
										<div class="signup-mid">
											<legend><strong>Expiration Date</strong></legend>
										</div>
										<div class="row 50%">
											<div class="4u 12u(mobile)">
												<input id="mon_input" type="text" placeholder="MM" required data-stripe="exp-month" onkeyup="expMonthValidation()" size="2"/>
											</div>
											<span STYLE="font-size: 25pt;display:block;padding-top:28px">/</span>
											<div class="4u 12u(mobile)">
												<input id="year_input" type="text" placeholder="YYYY" required data-stripe="exp-year" onkeyup="expYearValidation()" size="4"/>
											</div>
											<div class="error" id="error_exp" style="color:red; display: none;" >
												Please enter a valid expiration date. 
											</div>
										</div>
										<div class="signup-mid"></div>
										<div class="signup-mid">
											<legend><strong>CVC</strong></legend>
										</div>
										<div class="row 50%">
											<div class="2u 12u(mobile)">
												<input id="cvc_input" type="text" placeholder="CVC" required data-stripe="cvc" onkeyup="cvcValidation()"/>
											</div>
											<div class="error" id="error_cvc" style="color:red; display: none;" >
												Please enter a valid CVC. 
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<ul class="buttons">
													<li><input id="signup_btn" type="submit" class="noeffect" value="SIGN UP" disabled/></li>
												</ul>
											</div>
											<div id = "tokentest"></div>
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
		<?php
			require 'vendor/autoload.php';
			require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
			//error_reporting(E_ERROR | E_PARSE);
			$servername = "localhost";
			$username = "root";
			$password = "lzk5658665";
			$database = "P2PTeach";

			\Stripe\Stripe::setApiKey("sk_test_W0nkrnYOHfwduHAhueRXBn9Z");

			// Create connection
			$conn = new mysqli($servername, $username, $password, $database);

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			$name = array_key_exists("name", $_POST) ? $_POST["name"] : null;
			$password = array_key_exists("password", $_POST) ? $_POST["password"] : null;
			$email = array_key_exists("email", $_POST) ? $_POST["email"] : null;
			$address = array_key_exists("address", $_POST) ? $_POST["address"] : null;
			$state = array_key_exists("state", $_POST) ? $_POST["state"] : null;
			$postal = array_key_exists("postal", $_POST) ? $_POST["postal"] : null;
			$city = array_key_exists("city", $_POST) ? $_POST["city"] : null;

			//stripe token
			$token = array_key_exists("stripeToken", $_POST) ? $_POST["stripeToken"] : null;

			//stripe customer information
			$customer = \Stripe\Customer::create(array(
			  "source" => $token,
			  "description" => $name)
			);

			$sql = "insert into Users(Name, Email, Password, Address, State, City, Postal, StripeID) values('{$name}', '{$email}', '{$password}', '{$address}', '{$state}', '{$city}', {$postal}, '{$customer->id}')";

			if ($conn->query($sql)){
				$_SESSION["name"] = $name;
				echo "<script> window.location.replace('index.php') </script>";

				\Stripe\Charge::create(array(
				  "amount" => 1000, // amount in cents, again
				  "currency" => "usd",
				  "customer" => $customer->id,
   				  "metadata" => array("order_id" => "6735")
				));

				// PHPmailer
				$mail = new PHPMailer;

				$mail->isSMTP();
				$mail->Host = 'smtp.gmail.com';
				$mail->SMTPAuth = true;									// Enable SMTP authentication
				$mail->Username = 'p2pteach@gmail.com';					// SMTP username
				$mail->Password = 'lzk5658665';							// SMTP password
				$mail->SMTPSecure = 'tls';								// Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;										// TCP port to connect to

				$mail->setFrom('p2pteach@gmail.com', 'p2pteach');
				$mail->addAddress($email, $name);		// Add a recipient
				$mail->addReplyTo('p2pteach@gmail.com', 'Information');

				$mail->isHTML(true);									// Set email format to HTML

				$mail->Subject = '[No Reply] Thank You for Registering!';
				$mail->Body = "Welcome, '{$name}'!<p></p> Thank you for your registration!  <p></p> A registration fee of $10 has been charged from your card.  <p></p> Thanks, <p></p>The P2PTeach Team";

				$mail->send();

				
				exit();
			}
			else{
				exit();
			}
		?>

		

	</body>
</html>