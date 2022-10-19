<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Adviisory Application</title>
	<link rel="stylesheet" type="text/css" href="../css/patient_index.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Rubik+Moonrocks&display=swap" rel="stylesheet">
</head>
<body>
	<nav>
		<div class="cointainer nav_container"> 
			<a href="../patient/index.php" class="nav_logo"><h4>Adviisory</h4></a>
			
			<ul id="nav_menu" class="nav_items">
				<li><a href="../patient/index.php">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#articlesid">Articles</a></li>
				<li><a href="../patient/contact.php" target="_blank">Contact</a></li>
				<li><a href="../patient/login.php" class="login-btn">Login</a></li>	
				<!---<li class="nav_profile">
					<div class="avatar">
						<img src="">
					</div>
					<ul>
						<li><a href="../patient/dashboard.php">Dashboard</a></li>
						<li><a href="../patient/logout.php">Logout</a></li>
					</ul>
				</li>--->			
			</ul>
			<button id="open_nav-btn" ><i class="uil uil-bars"></i></button>			
			<button id="close_nav-btn" class="close_menu"><i class="uil uil-times-square"></i></button>
		</div>
	</nav>

	<header>
		<div class="container header_container">
			<div class="header_left">
				<h1>Start your journey with Adviisory</h1>
				<p>
					Adviisory provides a platform to interact with your therapist without necessary physical interaction. The aim is to help reduce the effects of the trauma which could be fatal or risky if not controlled.<br> We have a strict privacy policy that guarantees user-confidentiality and data protection.
				</p>
				<a href="../patient/signup.php">Sign Up</a>
			</div>

			<div class="header_right">
				<div class="header_right-image">
					<img src="../images/book-lovers.png">
				</div>
			</div>
		</div>

	</header>
	<section class="features">
		<div class="cointainer features_container">
			<div class="features_left">
				<h1>Features</h1>
				<p>These features describe how Adviisory is suited for it's users. Enjoy exploring the application and let Adviisory put a smile on your face.</p>
				
			</div>
			<class class="features_right">
				<article class="feature">
					<span class="feature_icon"><i class="uil uil-brain"></i></span>
					<h5>Therapy</h5>
					<p>Get therapy remotely from our licenced and expert professionals. </p>
				</article>				
				<article class="feature">
					<span class="feature_icon"><i class="uil uil-exclamation-circle"></i></span>
					<h5>Emergency contacts</h5>
					<p>You can choose who to contact incase of any emergencies.</p>
				</article>
				<article class="feature">
					<span class="feature_icon"><i class="uil uil-padlock"></i></span>
					<h5>Security</h5>
					<p>Adviisory app uses a GPS system to track and locate users devices incase of emergencies.</p>
				</article>
			</class>
		</div>
	</section>

	<section class="articles" id="articlesid">
		<h2>Here are some articles</h2>
		<div class="container articles_container">
			<article class="singleArticle">
				<div class="article_image">
					<img src="../images/group.png">
				</div>
				<div class="article_info">
					<h4>Group Therapy</h4>
					<p>This article articulates the benefits and effectiveness of group therapy.</p>
					<a href="../articles/groupTherapy.php">See article</a>
				</div>
			</article>
			<article class="singleArticle">
				<div class="article_image">
					<img src="../images/bed.png">
				</div>
				<div class="article_info">
					<h4>Sleep</h4>
					<p>This article articulates good sleep practices and the relationship between sleep and PTSD<p>
					<a href="../articles/sleep.php">See article</a>
				</div>				
			</article>
			<article class="singleArticle">
				<div class="article_image">
					<img src="../images/startingTherapy.png">
				</div>
				<div class="article_info">
					<h4>Starting Therapy</h4>
					<p>This article gives you a guildline of what you might need before starting therapy.</p>
					<a href="../articles/startingTherapy.php">See article</a>
				</div>				
			</article>
			<article class="singleArticle">
				<div class="article_image">
					<img src="../images/mentalHealth.png">
				</div>
				<div class="article_info">
					<h4>Mental Health</h4>
					<p>This article ardresses the stereotypes around mental health</p>
					<a href="../articles/mentalHealth.php">See article</a>
				</div>				
			</article>
			<article class="singleArticle">
				<div class="article_image">
					<img src="../images/breathing.png">
				</div>
				<div class="article_info">
					<h4>Boxed breathing</h4>
					<p>This article articulates the technique of boxed breathing and how effective it can be.</p>
					<a href="../articles/boxedBreathing.php">See article</a>
				</div>
			</article>
			<article class="singleArticle">
				<div class="article_image">
					<img src="../images/symptoms.png">
				</div>
				<div class="article_info">
					<h4>Symptoms of PTSD</h4>
					<p>This article articulates some of the common causes and symptoms of PTSD.</p>
					<a href="../articles/PTSDsymptims.php">See article</a>
				</div>				
			</article>
		</div>	
	</section>

	<section class="footer">
		<div class="container footer_container">
			<div class="footer1">
				<a href="../patient/index.php" class="footer_logo"><h4>Adviisory</h4></a>
				<a href="../patient/login.php">My account</a>
			</div>
			<div class="footer2">
				<h4>Links</h4>
				<ul class="perlinks">
					<li><a href="../patient/index.php">Home</a></li>
					<li><a href="../patient/services.php">About</a></li>					
					<li><a href="../patient/signin.php" target="_blank">Contact</a></li>
				</ul>
			</div>
			<div class="footer3">
				<h4>Privacy</h4>
				<ul class="privacy">
					<li><a href="">Privacy Policy</a></li>
					<li><a href="">Terms and conditions</a></li>					
				</ul>
			</div>
			<div class="footer4">
				<h4>Contact Us</h4>
				<div>
					<p>+2547 24 78 1342 </p>
					<p>adviisory@gmail.com</p>
				</div>
				<ul class="footer_socials">
				<li>
					<a href="https://www.facebook.com/" target="_blank"><i class="uil uil-facebook"></i></a>
				</li>
				<li>
					<a href="https://www.instagram.com/" target="_blank"><i class="uil uil-instagram"></i></a>
				</li>
				<li>
					<a href="https://www.twitter.com/" target="_blank"><i class="uil uil-twitter"></i></a>
				</li>
				<li>
					<a href="https://www.linkedin.com/" target="_blank"><i class="uil uil-linkedin"></i></a>
				</li>
			</ul>
			</div>
			
		</div>

		<div class="footer_copyright">
			<small>Copyright &copy; Adviisory Web Application</small>
		</div>	
	</section>
	


	<script type="text/javascript" src="../js/main.js"></script>
</body>
</html>