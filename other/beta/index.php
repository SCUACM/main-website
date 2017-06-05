<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Santa Clara ACM</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

		<!--	
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/bootswatch/3.0.3/simplex/bootstrap.min.css" rel="stylesheet">
		-->

		<link rel="shortcut icon" href="img/favicon.ico">
		<link rel="icon" href="img/favicon.ico">
		<link href="css/bootstrap.css" rel = "stylesheet">
		<link href="css/styles.css" rel="stylesheet" type="text/css"/>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Light:300,700' rel='stylesheet' type='text/css'>


		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/jquery.transit.min"></script>
		<script src="js/scrolling.js"></script>


	</head>

	<body data-spy="scroll" data-target=".navbar-example">

		<header class="navbar navbar-inverse navbar-fixed-top transparent" role="navigation">
			<div class="container">
				<div class = "navbar-header">
					<a href="#index" class = "navbar-brand">Santa Clara ACM</a>

					<button class = "navbar-toggle" type = "button" data-toggle = "collapse" data-target=".bs-navbar-collapse">
						<span class = "icon-bar"></span>
						<span class = "icon-bar"></span>
						<span class = "icon-bar"></span>
					</button>
				</div>

				<nav class = "collapse navbar-collapse bs-navbar-collapse navbar-example" role = "navigation">
					<ul class = "nav navbar-nav navbar-right">
						<li class = "active"><a href="#index">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#events">Events</a></li>
						<li><a href="#contact">Contact</a></li>
						<li class = "dropdown">
							<a href="#" class = "dropdown-toggle" data-toggle = "dropdown"> Sites <b class = "caret"></b></a>
							<ul class = "dropdown-menu">
								<li><a href="https://plus.google.com/u/0/116018683226218792828/posts">Google+</a></li>
								<li><a href="http://www.facebook.com/santaclaraacm/">Facebook</a></li>
								<li><a href="http://www.scu.edu">SCU Site</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</header>

		<div id="index" class="jumbotron">
			<h1>Santa Clara ACM</h1>
			<p class="bg-text">
			    Welcome to the new Santa Clara ACM website! 
				Join us on Tuesdays at 1:45 in the Bannan Lounge for free pizza and 
				socializing with other computer science and engineering students.
				Chat about classes, labs, or anything else, and hear about our upcoming ACM events,
				from Hackathons to special coding lessons to exclusive tours in Silicon Valley companies!
			</p>
			<h2>But What Is Membership?</h2>
			<p class="bg-text">
				Meetings are completely open, and we welcome anybody interested in computers to join.
				Come meet your officers and other members so you can stay up-to-date. 
				If you are interested in official membership, you can sign up easily from here and 
				become a part of this international organization!
			</p>

			<br>
			<p class="text-center"><a class="btn btn-lg btn-info" href="#contact" role="button">Join Now!</a></p>
		</div>

		<div class = "section" id ="about">
		    <div class="post">
			   <h1>About ACM</h1>
				<div class="container-fluid">
					<div class="row">
						<h4><p>
						    ACM is the organization for Computer Science and Computer Engineering inclined students. Our goal is to encourage the development of CS and CE skills in addition to providing networking and community volunteer opportunities for students at Santa Clara University.
						</p></h4>
					</div> <!--/about-->
					<div class="row">
					    <div class="col-sm-6">
							<h2>ACM Officers</h2>
							<?php include "inc/acm_officers.html"?>
						</div> <!--/acm officers-->
						<div class="col-sm-6">
							<h2>ACM-W Officers</h2>
							<?php include "inc/acmw_officers.html"?>
						</div> <!--/acmw officers-->
					 </div><!--/officers row-->
				</div><!--/container-->								
			 </div><!--/post-->
		</div>

		<div class = "section" id="events">
			<div class="post">							
				<h1>Events</h1>
				<h3>Upcoming</h3>
			     <?php include "inc/upcoming_events.html"?>
			</div>
		</div>


		<div class = "section" id ="contact">
			<div class="post">	
			    <div class="container-fluid">
				   <div class="row">
					  <div class="col-sm-6">
						 <h1>Message Us</h1>
						 <?php if(!isset($_POST['message_email']) && !isset($_POST['message'])){ ?>
						 <form role="message" method="post" action="?#contact">
							<div class="form-group">
							    <label for="messageEmailInput">Email</label>
							    <input type="email" class="form-control" id="email" name="message_email" placeholder="SmittyWerbenManJensen@scu.edu"/>
							</div><!--email-group-->
							<div class="form-group">
							    <label for="messageBodyInput">Message</label>
							    <input type="text" class="form-control" id="messageBodyInput" name="message" placeholder="What Did the Fox Say?"/>
							</div>
							<button type="submit" class="btn btn-submit">Submit</button>
						 </form>
						 <?php }
						 else{
						 	$from	= $_POST['message_email'];
							$subject	= "[WEB] Message";
							$message	= $_POST['message'];
							mail("santaclaraacm@gmail.com",$subject,$message,"From: $from\n");
						?>
						<h3><p>Thank you for contacting us. We will try to respond to you as soon as possible.</p></h3>
						<?php } ?>
					  </div>
					  <div class="col-sm-6">
					    <h1>Join ACM!</h1>
					    <?php if(!isset($_POST['join_email'])){ ?>
					    <form role="form" method="post" onsubmit="return validateForm();" action="?#contact">
						     <div class="form-group">
						     	<label for="joinEmailInput">Email</label>
								<input type="email" class="form-control" name="join_email" id="joinEmailInput" placeholder="NyanCat@scu.edu"/>
							</div>
							<button type="submit" class="btn btn-submit">Submit</button>
						</form>
						<?php 
						} else{
							$from   = $_POST["join_email"]; // sender
							$subject= "[WEB] Email Subscription";
							$message= "Can I be added to the mailing list?";
							mail("santaclaraacm@gmail.com",$subject,$message,"From: $from\n");
						?>
						<h3><p> Thank You for joining the ACM mailing list. You will be notified of meetings and upcoming events. Oh, and don't worry; we don't spam.</p></h3>
						<?php } ?>							
					 </div><!--/column-->
					</div><!--/row-->
				 </div><!--/container-->
			 </div><!--/post-->
		</div><!--/section-->
	</body>
 </html>

<script>
	function validateForm()
	{
	    var x=document.forms["message"]["email"].value;
	    var atpos=x.indexOf("@");
	    var dotpos=x.lastIndexOf(".");
	    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
			  alert("Not a valid e-mail address");
			    return false;
		}
	 }
</script>
