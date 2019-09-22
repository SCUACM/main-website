<?php require_once('./couch/cms.php'); ?>

<cms:template title='Board' clonable='1'>
	<cms:editable name='title' type='text' />
	<cms:editable name='name' type='text' />
	<cms:editable name='email' type='text' />
	<cms:editable name='image' type='image' />
	<cms:editable name='bio' type='richtext' />

	<cms:folder name="acm" title="ACM" />
	<cms:folder name="acmw" title="ACM-W" />
	<cms:folder name="advisor" title="Chapter Advisor" />
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

		<title>ACM Board</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css">

		<link rel="stylesheet" type="text/css" href="/css/vendor/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="/css/shared.css">

		<!-- <link rel="icon" type="image/png" href="/img/logos/logo_acm_navy.png" sizes="32x32"> -->
		<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
		

		<script type="text/javascript" src="/js/vendor/jquery.js"></script>
		<script type="text/javascript" src="/js/vendor/bootstrap.js"></script>
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
			<div id="wrapper">
				<!-- ACM Board -->
				<div class="container-fluid">
					<div id="bumper"></div>
					<h1 class="Club_name">ACM Board</h1>
					<hr class="title-divider">

					<cms:pages masterpage="board.php" folder="acm">
						<cms:set boardnum = "<cms:mod k_count '3' />" />
						<cms:if boardnum == '1'>
							<div class="row">
						</cms:if>
						<div class="col-sm-4 profile">
							<center><img src="<cms:show image />" class="img-circle prof-pic" style="height:250px"></center>
							<p class="prof-title">
								<i><b><cms:show title /></b>
								<br />
								<a class="email-link" href="mailto:<cms:show email />"><cms:show name /></a></i>
							</p>
							<hr class="prof-line" />
							<div class="prof-bio center"><cms:show bio /></div>
							<br />
							<br />
						</div>
						<cms:if (boardnum == '0') || (k_count == k_total_records)>
							</div>
						</cms:if>
					</cms:pages>
				</div>

				<!-- ACM-W Board -->
				<div class="container-fluid">
					<div id="bumper"></div>
					<h1 class="Club_name">ACM-W Board</h1>
					<center> <!-- ACM-W Contact Links -->
						<p class="acmw"> 
						<a href="mailto:acmw.scugirls@gmail.com">acmw.scugirls@gmail.com</a> |
						<a href="https://www.instagram.com/scuacmw/">Instagram</a> |
						<a href="https://www.facebook.com/groups/acmwscu/">Facebook</a> |
						<a href="https://www.scu.edu/engineering/beyond-the-classroom/student-organizations/acm-womens-chapter-acm-w/">SCU Website</a> |
						<a href="https://calendar.google.com/calendar/b/1?cid=YWNtdy5zY3VnaXJsc0BnbWFpbC5jb20">Google Calendar</a> 
					    </p>
				    </center>
					<hr class="title-divider">

					<cms:pages masterpage="board.php" folder="acmw">
						<cms:set boardnum = "<cms:mod k_count '3' />" />
						<cms:if boardnum == '1'>
							<div class="row">
						</cms:if>
						<div class="col-sm-4 profile">
							<center><img src="<cms:show image />" class="img-circle prof-pic" style="height:250px"></center>
							<p class="prof-title">
								<i><b><cms:show title /></b>
								<br />
								<a class="email-link" href="mailto:<cms:show email />"><cms:show name /></a></i>
							</p>
							<hr class="prof-line" />
							<div class="prof-bio center"><cms:show bio /></div>
							<br />
							<br />
						</div>
						<cms:if (boardnum == '0') || (k_count == k_total_records)>
							</div>
						</cms:if>
					</cms:pages>
				</div>


				<!-- Chapter Advisor -->
				<div class="container-fluid">
					<div id="bumper"></div>
					<h1 class="Club_name">Chapter Advisor</h1>
					<hr class="title-divider">

					<cms:pages masterpage="board.php" folder="advisor">
						<cms:set boardnum = "<cms:mod k_count '3' />" />
						<cms:if boardnum == '1'>
							<div class="row">
						</cms:if>
						<div class="col-sm-4 profile">
							<center><img src="<cms:show image />" class="img-circle prof-pic" style="height:250px"></center>
							<p class="prof-title">
								<i><b><cms:show title /></b>
								<br />
								<a class="email-link" href="mailto:<cms:show email />"><cms:show name /></a></i>
							</p>
							<hr class="prof-line" />
							<div class="prof-bio center"><cms:show bio /></div>
							<br />
							<br />
						</div>
						<cms:if (boardnum == '0') || (k_count == k_total_records)>
							</div>
						</cms:if>
					</cms:pages>
				</div>
				<br />
				<hr class="title-divider">
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
			<!-- </div> --> 
		</div>

		<script type="text/javascript" src="/js/navbar.js"></script>
	</body>
</html>

<?php COUCH::invoke();
