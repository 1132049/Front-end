<?php

$name = isset($_POST['name']) ? $_POST['name'] : '';
$surname = isset($_POST['surname']) ? $_POST['surname'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';
$empty = isset($_POST['empty']) ? $_POST['empty'] : '';
$check = isset($_POST['check']) ? $_POST['check'] : '';
$error = array("name" => "","surname" => "", "email" => "","phone" => "","message" => "","check" =>"","empty"=>"", "database" => "");

if($_POST) {

	if($check != 4 || strlen($name) == 0 || strlen($name) > 255 || strlen($email) == 0 || strlen($email) > 255 ||
	   strlen($email) > 255 || !strpos($email, '@') || strlen($phone) > 255 || strlen($phone) == 0 || strlen($message) == 0 || $empty!='') {

		if(strlen($name) == 0) {
			$error['name'] = 'Error: invalid data in name';
		}

		if(strlen($name) > 255) {
			$error['name'] = 'Error: data is too long in name';
		}

		if(strlen($surname) == 0) {
			$error['surname'] = 'Error: invalid data in surname';
		}

		if(strlen($surname) > 255) {
			$error['surname'] = 'Error: data is too long in surname';
		}

		if(strlen($email) == 0) {
			$error['email'] = 'Error: invalid data in email';
		}

		if(strlen($email) > 0 || !strpos($email,'@')) {
			$error['email'] = 'Error: no @ in email';
		}

		if(strlen($email) > 255) {
			$error['email'] = 'Error: data us too long in email';
		}

		if(strlen($phone) == 0) {
			$error['phone'] = 'Error: invalid data in phone';
		}

		if(strlen($phone) > 255) {
			$error['phone'] = 'Error: data is too long in phone';
		}

		if(strlen($message) == 0) {
			$error['message'] = 'Error: invalid data in message';
		}

		if($check != 4) {
			$error['check'] = 'Error: wrong 2 + 2 answer';
		}
		
		if($empty !== null) {
		 $error['empty'] = 'Error: empty must be empty';
		}

	}

	else {

		$conn = new mysqli('localhost','root','root','feedback');

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$name = $conn->real_escape_string($name);
		$surname = $conn->real_escape_string($surname);
		$email = $conn->real_escape_string($email);
		$phone = $conn->real_escape_string($phone);
		$message = $conn->real_escape_string($message);

		$saved = $conn->query("INSERT INTO event (name, surname, email, phone, message)
		VALUES ('$name','$surname','$email','$phone','$message')");

		if($saved){
			header('Location: ' . 'index.php#contact');
		}

		else{
			$error['database'] = "Error when saving";
		}
	}
}

?>


<!doctype html>
<html>
	<head>
		<title>Stepforward 2018</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous"/>
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="normalize.css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<link rel="icon" href="images/icon.png"/>
	</head>

	<body>
		<!---Header--->
		<header id = "header">
			<a href="#header"><div id = "logo"></div></a>
			<!---Nav bar--->
			<div class = "nav-cont">
				<div class="topnav" id="myTopnav">
					<a href="#section-2" class="active">About</a>
					<a href="#section-4">Agenda</a>
					<a href="#section-3 speakers-section">Speakers</a>
					<a href="#contacth">Contact us</a>
					<a href="https://www.bilietai.lt/lit/" target="blank">Tickets</a>
					<a href="blog.html" target="blank">Blog</a>
					<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
				</div>
				<script src = "myjs/header.js"></script>
				</header>

			<!-- --------Front Page -->
			<section id="section-1">
				<div class="text-wrapper">
					<h1 class = "front-h">Create your future</h1>
					<h3 class = "front-cont">vilnius, lithuania</h3>
					<h3 class = "front-cont">september 28</h3>
					<button class = "front-btn"><a href="https://www.bilietai.lt/" target="blank"> tickets </a></button>
				</div>
			</section>

			<!-- --------About -->
			<section id="section-2">
				<div class="about-container">
					<h2 id = "about-us">About us</h2>
					<article id = "about-article">
						<p>We believe that innovation comes from diversity and stepping forward and thinking out of the box is a one way to start your journey in the IT world. What else if not a diversity of ideas, skills, habits, cultural experiences and geographical peculiarities keeps our conversations, visions and projects interesting and innovative?
							StepForward is growing every year and attracts various talents from all over the world to present various IT trends and related topics. It started as a meetup of junior devs and with years has developed into the largest and most diverse meeting of innovative people from the Baltics. Every year the number of the participants is growing and we are happy to insipire so many newcomers to the tech world.
						</p>
					</article>
				</div>
			</section>

			<!-- --------Speakers -->
			<section id="section-3 speakers-section">
				<h2 id = "speakers-title">Speakers</h2>
				<!-- Modals  -->
				<div id="modalOne" class="modal">
					<div class="modal-content">
						<div class="modal-header">
							<i class="fa fa-close"></i>
							<p id = "tag">#AI</p>
						</div>
						<div class="modal-body">
							<div class="modal-left">
								<div class="img-wrap">
									<img class = "modal-image" src="images/Moojan%20Asghari%20.jpg" alt="Moojan Asghari"/>
								</div>
								<div class="links">
									<a href="https://twitter.com/"><i class="fa fa-twitter social-icon"><h4 class = "icon-text">Twitter</h4></i></a>
									<a href="https://www.linkedin.com/"><i class="fa fa-linkedin social-icon"><h4 class = "icon-text">Linkedin</h4></i></a>
									<a href="https://www.facebook.com/"><i class="fa fa-facebook-official social-icon"><h4 class = "icon-text">Facebook</h4></i></a>
								</div>
							</div>
							<div class="modal-right">
								<div class="head">
									<h2 class = "modal-name">Moojan Asghari</h2>
									<h3 class = "speaker">Speaker</h3>
									<p>Hacking House Project Manager</p>
								</div>
								<div class="speaker-about">
									<p>Moojan Asghari – is an adventurous entrepreneur, a dreamer and a tech-obsessed. She is the initiator and co-founder of Silk Road Startup, the biggest International Tech event in Iran, aiming at connecting the country to International communities and helping Iranian entrepreneurs with education, resources and meaningful connections. Passionate about the impact of AI on our lives, she also initiated Women in AI, an incredible group of women, aiming to close the gender gap in the field of Artificial Intelligence, which is lacking a drastic number of female influencers.   </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="modalTwo" class="modal">
					<div class="modal-content">
						<div class="modal-header">
							<i class="fa fa-close"></i>
							<p id = "tag">#AI</p>
						</div>
						<div class="modal-body">
							<div class="modal-left">
								<div class="img-wrap">
									<img class = "modal-image" src="images/Lenard%20Koschwitz.png" alt="Lenard Koschwitz"/>
								</div>
								<div class="links">
									<a href="https://twitter.com/"><i class="fa fa-twitter social-icon"><h4 class = "icon-text">Twitter</h4></i></a>
									<a href="https://www.linkedin.com/"><i class="fa fa-linkedin social-icon"><h4 class = "icon-text">Linkedin</h4></i></a>
									<a href="https://www.facebook.com/"><i class="fa fa-facebook-official social-icon"><h4 class = "icon-text">Facebook</h4></i></a>
								</div>
							</div>
							<div class="modal-right">
								<div class="head">
									<h2 class = "modal-name">Lenard Koschwitz</h2>
									<h3 class = "speaker">Speaker</h3>
									<p>Chief strategy Officer at Lyft</p>
								</div>
								<div class="speaker-about">
									<p>Lenard Koschwitz joined Allied for Startups in 2015. Since then he built up and led the organisations’ public policy activities in Europe. He’s passionate about policy and spends much of his time discussing tech and the Digital Single Market. Prior to that he advised a Spokesperson for Justice and Home Affairs in the European Parliament, mainly on data-related policies like privacy and data flows. He studied political science and European studies in Germany and Belgium. In 2001 he co-founded a platform for music journalism and user-generated content.  </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="modalThree" class="modal">
					<div class="modal-content">
						<div class="modal-header">
							<i class="fa fa-close"></i>
							<p id = "tag">#UI/UX</p>
						</div>
						<div class="modal-body">
							<div class="modal-left">
								<div class="img-wrap">
									<img class = "modal-image" src="images/avi-itzkovitch-58077ce268020.jpg" alt="Avi Itzkovitch"/>
								</div>
								<div class="links">
									<a href="https://twitter.com/"><i class="fa fa-twitter social-icon"><h4 class = "icon-text">Twitter</h4></i></a>
									<a href="https://www.linkedin.com/"><i class="fa fa-linkedin social-icon"><h4 class = "icon-text">Linkedin</h4></i></a>
									<a href="https://www.facebook.com/"><i class="fa fa-facebook-official social-icon"><h4 class = "icon-text">Facebook</h4></i></a>
								</div>
							</div>
							<div class="modal-right">
								<div class="head">
									<h2 class = "modal-name">Avi Itzkovitch </h2>
									<h3 class = "speaker">Speaker</h3>
									<p>CEO of UX Salon</p>
								</div>
								<div class="speaker-about">
									<p> Avi Itzkovitch is a longtime digital design professional with over 15 years of experience, owner of IoT News Network, an independent resource for the Internet of Things. Avi’s passion lies in the intersection of the physical and digital worlds and he is often invited to speak about emerging Design and UX trends. Currently, Avi is working as an Independent UX Consultant and is the Founder of UX Salon, an international UX Design conference in Tel-Aviv. </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="modalFour" class="modal">
					<div class="modal-content">
						<div class="modal-header">
							<i class="fa fa-close"></i>
							<p id = "tag">#Start up</p>
						</div>
						<div class="modal-body">
							<div class="modal-left">
								<div class="img-wrap">
									<img class = "modal-image" src="images/Milda%20Mitkute.jpg" alt="Milda Mitkute"/>
								</div>
								<div class="links">
									<a href="https://twitter.com/"><i class="fa fa-twitter social-icon"><h4 class = "icon-text">Twitter</h4></i></a>
									<a href="https://www.linkedin.com/"><i class="fa fa-linkedin social-icon"><h4 class = "icon-text">Linkedin</h4></i></a>
									<a href="https://www.facebook.com/"><i class="fa fa-facebook-official social-icon"><h4 class = "icon-text">Facebook</h4></i></a>
								</div>
							</div>
							<div class="modal-right">
								<div class="head">
									<h2 class = "modal-name">Milda Mitkutė</h2>
									<h3 class = "speaker">Speaker</h3>
									<p>Co-Founder of Vinted</p>
								</div>
								<div class="speaker-about">
									<p> Milda Mitkutė is the co-Founder at Vinted – the world’s largest pre-loved fashion marketplace. More than 21 million women around the world sell, buy, swap clothes they don’t wear anymore. Headquartered in Vilnius, Vinted employs 160 people. Founded as a hobby website in 2008, Vinted has raised over $60-million and is considered to be one of the most valuable start-ups in the Baltics. </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="modalFive" class="modal">
					<div class="modal-content">
						<div class="modal-header">
							<i class="fa fa-close"></i>
							<p id = "tag">#Careers</p>
						</div>
						<div class="modal-body">
							<div class="modal-left">
								<div class="img-wrap">
									<img class = "modal-image" src="images/AR-160129965.png" alt="Kei Karlson"/>
								</div>
								<div class="links">
									<a href="https://twitter.com/"><i class="fa fa-twitter social-icon"><h4 class = "icon-text">Twitter</h4></i></a>
									<a href="https://www.linkedin.com/"><i class="fa fa-linkedin social-icon"><h4 class = "icon-text">Linkedin</h4></i></a>
									<a href="https://www.facebook.com/"><i class="fa fa-facebook-official social-icon"><h4 class = "icon-text">Facebook</h4></i></a>
								</div>
							</div>
							<div class="modal-right">
								<div class="head">
									<h2 class = "modal-name">Kei Karlson </h2>
									<h3 class = "speaker">Speaker</h3>
									<p>Co-Founder of GoWorkaBit</p>
								</div>
								<div class="speaker-about">
									<p> Kei Karlson has more than 10 years of experience in HR industry. She has helped hundreds of companies with recruiting and innovating the way they build teams. In 2013 started building GoWorkaBit, webapp that connects companies with a need for additional short-term staff with people who want to choose where and when they work in a very flexible way.  </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="modalSix" class="modal">
					<div class="modal-content">
						<div class="modal-header">
							<i class="fa fa-close"></i>
							<p id = "tag">#Start up</p>
						</div>
						<div class="modal-body">
							<div class="modal-left">
								<div class="img-wrap">
									<img class = "modal-image" src="images/Seth%20Bannon.jpg" alt="Seth Bannon"/>
								</div>
								<div class="links">
									<a href="https://twitter.com/"><i class="fa fa-twitter social-icon"><h4 class = "icon-text">Twitter</h4></i></a>
									<a href="https://www.linkedin.com/"><i class="fa fa-linkedin social-icon"><h4 class = "icon-text">Linkedin</h4></i></a>
									<a href="https://www.facebook.com/"><i class="fa fa-facebook-official social-icon"><h4 class = "icon-text">Facebook</h4></i></a>
								</div>
							</div>
							<div class="modal-right">
								<div class="head">
									<h2 class = "modal-name">Seth Bannon</h2>
									<h3 class = "speaker">Speaker</h3>
									<p>Co-Fouder of Fifty Years </p>
								</div>
								<div class="speaker-about">
									<p> Seth Bannon is a Founding Partner at Fifty Years, a seed fund that backs entrepreneurs solving the world's biggest problems with technology. Seth has invested in a range of startups shaping the world for the better -- from a company engineering microbes to produce industrial chemicals sustainably, to a company building small satellites to cover the earth in internet, to a company culturing meat to eat. He is also the co-founder of impact.tech, a community of entrepreneurs combining purpose with profit, and the founder & CEO of Amicus, a startup that builds digital organising tools for nonprofits and political campaigns. He was named twice to the Forbes 30 Under 30 list for Social Entrepreneurship.</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="modalSeven" class="modal">
					<div class="modal-content">
						<div class="modal-header">
							<i class="fa fa-close"></i>
							<p id = "tag">#Cryptocurrencies</p>
						</div>
						<div class="modal-body">
							<div class="modal-left">
								<div class="img-wrap">
									<img class = "modal-image" src="images/pavel.jpg" alt="Pavel Muntyan"/>
								</div>
								<div class="links">
									<a href="https://twitter.com/"><i class="fa fa-twitter social-icon"><h4 class = "icon-text">Twitter</h4></i></a>
									<a href="https://www.linkedin.com/"><i class="fa fa-linkedin social-icon"><h4 class = "icon-text">Linkedin</h4></i></a>
									<a href="https://www.facebook.com/"><i class="fa fa-facebook-official social-icon"><h4 class = "icon-text">Facebook</h4></i></a>
								</div>
							</div>
							<div class="modal-right">
								<div class="head">
									<h2 class = "modal-name">Pavel Muntyan</h2>
									<h3 class = "speaker">Speaker</h3>
									<p>Chief strategy Officer at Lyft</p>
								</div>
								<div class="speaker-about">
									<p> Pavel Muntyan is animation producer driving power behind such iconic project as “Mr. Freeman”. In 2008 Pavel founded a full-cycle animation studio “Toonbox”, where he serves as a producer and a writer. Who needs ICO? How to prepare ICO? Is it really necessary? What are the responsibilities? How to start your own ICO and not go into prison? Why would you need your own currency? What you have to know to start it? At the conference Pavel will revael how creative industries can apply blockchain technologies and and earn from your own creativity in cryptocurrencies.</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="modalEight" class="modal">
					<div class="modal-content">
						<div class="modal-header">
							<i class="fa fa-close"></i>
							<p id = "tag">#Start up</p>
						</div>
						<div class="modal-body">
							<div class="modal-left">
								<div class="img-wrap">
									<img class = "modal-image" src="images/CORINNE%20VIGREUX%20.jpg" alt="Corinne Vigreux"/>
								</div>
								<div class="links">
									<a href="https://twitter.com/"><i class="fa fa-twitter social-icon"><h4 class = "icon-text">Twitter</h4></i></a>
									<a href="https://www.linkedin.com/"><i class="fa fa-linkedin social-icon"><h4 class = "icon-text">Linkedin</h4></i></a>
									<a href="https://www.facebook.com/"><i class="fa fa-facebook-official social-icon"><h4 class = "icon-text">Facebook</h4></i></a>
								</div>
							</div>
							<div class="modal-right">
								<div class="head">
									<h2 class = "modal-name">Corinne Vigreux</h2>
									<h3 class = "speaker">Speaker</h3>
									<p>Co-Founder of TomTom</p>
								</div>
								<div class="speaker-about">
									<p> Corinne Vigreux is a Co-Founder of TomTom, the navigation technologies company that continues to create cutting edge technologies that solve mobility problems and address the challenges of autonomous driving and smart cities. As one of the top fifty most inspirational women in European tech, Corinne champions women in the workforce and passionately advocates for improved social mobility through education. She is a member of the supervisory board of takeaway.com NV and Groupe ILIAD, member of the supervisory board of the Dutch National Opera & Ballet and advisor to the Amsterdam Economic Board. </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="modalNine" class="modal">
					<div class="modal-content">
						<div class="modal-header">
							<i class="fa fa-close"></i>
							<p id = "tag">#Start up</p>
						</div>
						<div class="modal-body">
							<div class="modal-left">
								<div class="img-wrap">
									<img class = "modal-image" src="images/Ieva%20Martinkenaite%20.jpg" alt="Ieva Martinkenaite"/>
								</div>
								<div class="links">
									<a href="https://twitter.com/"><i class="fa fa-twitter social-icon"><h4 class = "icon-text">Twitter</h4></i></a>
									<a href="https://www.linkedin.com/"><i class="fa fa-linkedin social-icon"><h4 class = "icon-text">Linkedin</h4></i></a>
									<a href="https://www.facebook.com/"><i class="fa fa-facebook-official social-icon"><h4 class = "icon-text">Facebook</h4></i></a>
								</div>
							</div>
							<div class="modal-right">
								<div class="head">
									<h2 class = "modal-name">Ieva Martinkenaite</h2>
									<h3 class = "speaker">Speaker</h3>
									<p>Vice President of Telenor Research</p>
								</div>
								<div class="speaker-about">
									<p>Ieva Martinkenaite is the Vice President of Telenor Research, and one of the leaders of Telenor-NTNU AI-Lab – a national powerhouse for AI and Machine Learning in Norway. Ieva holds a doctorate degree (PhD) in strategy and organization from BI Norwegian Business School. Previously Ieva served as a senior research scientist and advisor in Telenor, a research fellow at BI Norwegian Business School and at Fox School of Business (Temple University). Ieva also worked as Vice-Dean at ISM University of Management and Economics in Lithuania. Her passion lies in working with people, building collaborative communities for the digital age and promoting young girls in tech. </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Panels -->
				<div class="panels-container">
					<div class="panel-block">
						<div class="panel-content">
							<img class = "speaker-image" id ="speaker1" data-modal = "modalOne" src="images/Moojan%20Asghari%20.jpg" alt="speaker"/>
							<h3 class = "name">Moojan Asghari</h3>
							<p class = "profession"> Hacking House Project Manager</p>
						</div>
					</div>

					<div class="panel-block">
						<div class="panel-content">
							<img class = "speaker-image" id ="speaker1" data-modal = "modalTwo" src="images/Lenard%20Koschwitz.png" alt="speaker"/>
							<h3 class = "name">Lenard Koschwitz</h3>
							<p class = "profession">Director of European Affairs</p>
						</div>
					</div>

					<div class="panel-block">
						<div class="panel-content">
							<img class = "speaker-image" id ="speaker1" data-modal = "modalThree" src="images/avi-itzkovitch-58077ce268020.jpg" alt="speaker"/>
							<h3 class = "name">Avi Itzkovitch </h3>
							<p class = "profession">CEO of UX Salon</p>
						</div>
					</div>

					<div class="panel-block">
						<div class="panel-content">
							<img class = "speaker-image" id ="speaker1" data-modal = "modalFour" src="images/Milda%20Mitkute.jpg" alt="speaker"/>
							<h3 class = "name">Milda Mitkutė</h3>
							<p class = "profession">Head of Performace Marketing</p>
						</div>
					</div>
					<div class="panel-block">
						<div class="panel-content">
							<img class = "speaker-image" id ="speaker1" data-modal = "modalFive" src="images/AR-160129965.png" alt="speaker"/>
							<h3 class = "name">Kei Karlson </h3>
							<p class = "profession">Co-Founder of GoWorkaBit</p>
						</div>
					</div>

					<div class="panel-block">
						<div class="panel-content">
							<img class = "speaker-image" id ="speaker1" data-modal = "modalSix" src="images/Seth%20Bannon.jpg" alt="speaker"/>
							<h3 class = "name">Seth Bannon </h3>
							<p class = "profession"> Founding Partner of Fifty Years</p>
						</div>
					</div>


					<div class="panel-block">
						<div class="panel-content">
							<img class = "speaker-image" id ="speaker1" data-modal = "modalSeven" src="images/pavel.jpg" alt="speaker"/>
							<h3 class = "name">Pavel Muntyan</h3>
							<p class = "profession">Founder of ToonBo</p>
						</div>
					</div>

					<div class="panel-block">
						<div class="panel-content">
							<img class = "speaker-image" id ="speaker1" data-modal = "modalEight" src="images/CORINNE%20VIGREUX%20.jpg" alt="speaker"/>
							<h3 class = "name">Corinne Vigreux </h3>
							<p class = "profession">Founder of Codam College</p>
						</div>
					</div>

					<div class="panel-block panel-last">
						<div class="panel-content">
							<img class = "speaker-image" id ="speaker1" data-modal = "modalNine" src="images/Ieva%20Martinkenaite%20.jpg" alt="speaker"/>
							<h3 class = "name">Ieva Martinkenaite </h3>
							<p class = "profession">Vice President of Telenor Research</p>
						</div>
					</div>
				</div>
			</section>
			<!-- --------Agenda -->
			<section id="section-4">

				<h1 class="agendasectionh1"> Agenda </h1>
				<table class=agendatable>
					<tr>
						<td></td>
						<td><img class="agendaimg" height="430px"src="Images/agenda.png" alt="AgendaDots."/></td>
						<td>
							<div> <h3 class="time"> 9.00 - 9.15 Opening/ Welcome speech </h3></div>
							<div> <h3 class="time"> 9.15 - 10.00 <a href="#section-3 speakers-section">Moojan Asghari</a> </h3> "AI in our lives" </div>
							<div> <h3 class="time"> 10.00 - 11.00 <a href="#section-3 speakers-section">Lenard Koschwitz</a> </h3> "Can Europe become the leader of developing Artificial Inteligence?" </div>
							<div> <h3 class="time"> 11.00 - 12.00 <a href="#section-3 speakers-section">Avi Itzkovich</a> </h3> "UX trends. Why UX is important in nowadays?" </div>
							<div> <h3 class="time"> 12.00 - 13.00 <a href="#section-3 speakers-section"> Milda Mitkute</a> </h3> "Start Up success. How to make it work?" </div>
						</td>
					</tr>
					<tr>
						<td class="agendatable2">
							<div> <h3 class="time"> 13.00 - 14.00 <a href="#section-3 speakers-section">Kei Karlson</a> </h3> "How the trends for employing will change in the next year?" </div>
							<div> <h3 class="time"> 14.00 - 15.00 <a href="#section-3 speakers-section">Seth Bannon</a> </h3> "Social Entrepreneurship" </div>
							<div> <h3 class="time"> 15.00 - 16.00 <a href="#section-3 speakers-section">Pavel Muntyan</a> </h3> "Cryptocurrencies" </div>
							<div> <h3 class="time"> 16.00 - 17.00 <a href="#section-3 speakers-section">Corinne Virgeux</a> </h3> "Women in tech" </div>
							<div> <h3 class="time"> 17.00 - 18.00 <a href="#section-3 speakers-section">Ieva Martinkenaite</a> </h3> "AI and Machine Learning" </div>
						</td>
						<td><img class="agendaimg" height="450px"src="Images/agenda.png" alt="AgendaDots."></td>
					</tr>
				</table>
			</section>

			<!-- --------Gallery -->
			<section id="section-5">

				<h2 id = "events-title">Past events</h2>
				<div class="carousel-container">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
						</ol>
						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="item active">
								<img class = "carousel-image" src="images/car4.jpg" alt="Web summit"/>
								<div class="carousel-caption">
									<h2 class = "carousel-text">Web summit</h2>
								</div>
							</div>

							<div class="item">
								<img class = "carousel-image" src="images/a1.jpg" alt="audience"/>
								<div class="carousel-caption">
									<h2 class = "carousel-text">Full audience</h2>
								</div>
							</div>

							<div class="item">
								<img  class = "carousel-image" src="images/ftcong.jpg" alt="Future technologies"/>
								<div class="carousel-caption">
									<h2 class = "carousel-text">Future technologies</h2>
								</div>
							</div>
						</div>

						<!-- Left and right controls -->
						<a class="left carousel-control" href="#myCarousel" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</section>


			<!-- SPONSORS -->
			<section id="sponsors-main"
					 <div class="sponsors">

			<div><h2 id="sponsorsh">SPONSORS</h2></div>


			<div><a href="http://www.vilnius-events.lt/en/">
				<img class="imgsponsors" src="https://vilnius.lt/wp-content/themes/vilnius/layout/images/logo.png"
					 alt="Vilnius Logo"/>
				</a></div>

			<div><a href="https://lympo.io/">
				<img class="imgsponsors" src="https://lympo.io/wp-content/themes/lympoio/svg/logo.svg"
					 alt="Lympo Logo"/>
				</a></div>

			<div><a href="https://bcgateway.eu/">
				<img class="imgsponsors" src="https://bcgateway.eu/wp-content/uploads/2018/02/Blockchain-Centre-Vilnius-logo-e1518009727576.png"
					 alt="BLOCKCHAIN Vilnius Logo"/>
				</a></div>

			<div><a href="https://www.telia.lt/privatiems">
				<img class="imgsponsors" src="https://www.telia.lt/_ui/responsive/theme-teo/images/telia-logo.svg"
					 alt="Telia Logo"/>
				</a></div>

			<div><a href="https://www.codeacademy.lt/">
				<img class="imgsponsors" src="https://www.codeacademy.lt/wp-content/uploads/2017/05/logo.png"
					 alt="CodeAcademyLogo"/>
				</a></div>


			<div><a href="https://www.bttcloud.com/lt/pagrindinis">
				<img class="imgsponsors" src="https://uploads-ssl.webflow.com/5a8536047152ef000134b584/5aa12f19a722600001c13d1e_main_logo.svg"
					 alt="BTT Cloud Logo"/>
				</a></div>

			</section>

		</div>

	<!-- CONTACT -->
	<section id='contact'>
		<div class="contact">
			<div><h2 id="contacth"> CONTACT US </h2></div>
			<form method="post" class="footform" action="<?php echo 'index.php#contact' ?>">
				<div class="inputblock">
					<input type="text" placeholder="name" name="name" value="<?php echo $name; ?>"/>
					<div class="erwrapp"><p><?php echo $error['name']; ?></p></div>
				</div>
				<div class="inputblock">
					<input type="text" placeholder="surname" name = "surname" value="<?php echo $surname; ?>"/>
					<div class="erwrapp"><p><?php echo $error['surname']; ?></p></div>
				</div>
				<div class="inputblock">
					<input type="text" placeholder="email" name = "email" value="<?php echo $email; ?>"/>
					<div class="erwrapp"><p><?php echo $error['email']; ?></p></div>

				</div>
				<div class="inputblock">	<input type="text" placeholder="phone" name = "phone" value="<?php echo $phone; ?>"/>
					<div class="erwrapp"><p><?php echo $error['phone']; ?></p></div>
				</div>
				<div class="inputblock">
					<input type="text" placeholder="2 + 2" name = "check" value="<?php echo $check; ?>"/>
					<div class="erwrapp"><p><?php echo $error['check']; ?></p></div>
				</div>
				<textarea id="message" placeholder="message" name = "message"><?php echo $message; ?></textarea>
				<p><?php echo $error['message']; ?></p>
				<p><?php echo $error['empty']; ?></p>
				<input type="hidden" id = "empty" name = "empty"/>
				<input type="submit" value="send" id="sendbtn">
				<?php echo $error['database']; ?>
				<div id="back-button"> <a href="#header"></a>
				</div>
			</form>
			</section>


		<!-- FOOT -->
		<footer>
			<div class="foot">
				<div> <h5>Subscribe</h5>
					<p>Enter your email to get notified <span>about the latest news</span></p>
					<input type="text" placeholder="email" value="" id="suscribe"/>
					<span> <input type="submit" value="subscribe" id="suscribebtn"/> </span>
				</div>
				<div>
					<h5>Contact us</h5>
					<span>info@codeacademy.lt</span>
					<span>Saulėtekio al.15 Vilnius Lithuania</span>
					<span>+37066366555</span>

				</div>
				<div>
					<a href = "#header"><img  src="images/logo.png" class="lastlogo" /></a> <h5> Create your future</h5>
					<span>Follow us on social media</span>
					<a href="https://www.instagram.com/?hl=en"><i class="fab fa-instagram"></i></a>
					<a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
					<a href="https://www.linkedin.com"><i class="fab fa-linkedin-in"></i></a>
					<a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>

				</div>

				<div>
					© 2018 code4cookies. All rights reserved.

				</div>
			</div>


		</footer>

		</div>
	<script src="myjs/modal.js"></script>
	</body>
</html>
