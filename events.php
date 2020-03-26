<?php require_once('./couch/cms.php'); ?>

<cms:template title='Events' clonable='1'>
		<cms:editable name='title' type='text' />
		<cms:editable name='datestr' type='text' />
		<cms:editable name='image' type='image' />
		<cms:editable name='description' type='richtext' />

		<cms:folder name="2014 - 2015" title="2014 - 2015" />
		<cms:folder name="2015 - 2016" title="2015 - 2016" />
		<cms:folder name="2016 - 2017" title="2016 - 2017" />
		<cms:folder name="2017 - 2018" title="2017 - 2018" />
		<cms:folder name="2018 - 2019" title="2018 - 2019" />
		<cms:folder name="2019 - 2020" title="2019 - 2020" />

</cms:template>

<!DOCTYPE html>
<html>
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112269442-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-112269442-1');
		</script>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

		<title>ACM Events</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css">

		<link rel="stylesheet" type="text/css" href="/css/vendor/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="/css/shared.css">
		<link rel="stylesheet" type="text/css" href="/css/vendor/jquery.qtip.min.css">
		<link rel="stylesheet" type="text/css" href="/css/fullcal/fullcalendar.min.css">
		<link rel="stylesheet" type="text/css" href="/css/fullcal/calendar.css">

		<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">

		<script type="text/javascript" src="/js/vendor/moment.min.js"></script>
		<script type="text/javascript" src="/js/vendor/jquery.js"></script>
		<script type="text/javascript" src="/js/vendor/bootstrap.js"></script>
		<script type="text/javascript" src="/js/vendor/jquery.qtip.min.js"></script>
		<script type="text/javascript" src="/js/fullcal/fullcalendar.js"></script>
		<script type="text/javascript" src="/js/fullcal/gcal.min.js"></script>
		<script type="text/javascript" src="/js/fullcal/init-cal.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top navbar-custom">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-left">
                        <li><a href="/"><img src="img/logos/logo_acm_white.png" height=30 width=70></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/about">About</a></li>
						<li><a href="/board">Board</a></li>
						<li><a href="/events">Events</a></li>
						<li><a href="/resources">Resources</a></li>
						<li><a href="/join">Join</a></li>
						<li><a href="http://hackforhumanity.io">H4H</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="paper">
			<!-- Calendar -->
			<!-- Calendar -->
			<div id="wrapper">
				<div class="container-fluid">
					<div id="bumper"></div>
					<h1 class="Club_name">Calendar</h1>
					<hr class="title-divider">
					<div id='loading'>loading...</div>
					<div id="calendar"></div>
					<br />
					<center>
					<p> View the ACM <a href="https://calendar.google.com/calendar/embed?src=santaclara.acm%40gmail.com&ctz=America%2FLos_Angeles">Google Calendar</a> or download the ACM <a href="https://calendar.google.com/calendar/ical/santaclara.acm%40gmail.com/public/basic.ics">iCal</a> 
					</p>
				    </center>
					<br />
				</div>
			</div> 

			

			<cms:folders masterpage="events.php" order="desc">
				<div id="wrapper">
					<div class="container-fluid">
						<div id="bumper"></div>
						<h1 class="Club_name"><cms:show k_folder_name /> Events</h1>
						<hr >
						<cms:pages masterpage="events.php" folder=k_folder_name>
							<cms:set eventnum = "<cms:mod k_count '2' />" />
							<cms:if eventnum == '1'>
								<div class="row">
							</cms:if>
							<div class="col-sm-6 profile">
								<center><img src="<cms:show image />" class="prof-pic" style="height:250px"></center>
								<p class="prof-title">
									<i>
										<b><cms:show datestr />, <cms:show k_folder_name /></b>
										<br>
									</i>
								</p>
								<hr class="prof-line">
								<p class="prof-bio-center"><cms:show description /></p>
								<br />
								<br />
							</div>
							<cms:if (eventnum == '0') || (k_count == k_total_records)>
								</div>
							</cms:if>
						</cms:pages>
					</div>
				</div>
			</cms:folders>

			<br />
				<div class="row">
					<div class="connect text-center">
						<h2>Connect with us!</h2>
					</div>
					<div class="text-center">
					<div class="col-xs-0 col-sm-2"></div>
					<div class="col-xs-12 col-sm-8">
						<div class="connect-bubble">
							<a href="https://www.facebook.com/groups/165822943541098/?ref=br_rs" target="_blank">
								<img src="img/logos/logo-fb.png">
							</a>
						</div>
						<div class="connect-bubble">
							<a href="https://scuacm.slack.com" target="_blank">
								<img src="img/logos/logo-slack.png">
									</a>
						</div>
						<div class="connect-bubble">
							<a href="https://www.instagram.com/scu_acm/" target="_top">
								<img src="img/logos/logo-instagram.png" height=55px width=60px>
							</a>
						</div>
						<div class="connect-bubble">
							<a href="mailto:acm@scu.edu" target="_top">
								<img src="img/logos/logo-email.png">
							</a>
						</div>
						<div class="connect-bubble">
							<a href="https://github.com/scuacm" taget="_blank">
								<img src="img/logos/logo-github.png">
							</a>
						</div>
						<div class="connect-bubble">
							<a href="https://discord.gg/ReQTuJD" target="_top">
								<img src="img/logos/logo-discord.png">
							</a>
						</div>
						<div class="connect-bubble">
							<a href="https://www.linkedin.com/groups/13597280/" target="_top">
								<img src="img/logos/logo-linkedin.png">
							</a>
						</div>
					</div>
					<div class="col-xs-0 col-sm-2"></div>
				</div>
				<br />
				<br />
				<br />
				<br />
				<br />
			<br />
		</div>
	</div>
		<script type="text/javascript" src="/js/navbar.js"></script>
	</body>
</html>

<?php COUCH::invoke();
