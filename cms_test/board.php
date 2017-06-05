<?php require_once('../couch/cms.php'); ?>

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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <title>ACM Board</title>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>    

        <link rel="stylesheet" type="text/css" href="/css/boardstyle.css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">

        <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top navbar-custom">
            <div class="container-fluid">
               <div class="navbar-header">  
                <p id="name">ACM</p>
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                           
                  </button> 
                </div>
                 <nav class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">  
                        <li><a href="/">Home</a></li>
                        <li><a href="/board">Board</a></li>
                        <li><a href="/events">Events</a></li>
                        <li><a href="/resources">Resources</a></li>
                        <li><a href="/join">Join</a></li>
                    </ul>
                </nav>
            </div>
        </nav>
        <div class="paper-clip-icon"></div>
        <div class="paper">
            <div id = "wrapper">
                <!-- ACM Board -->
                <div class="container-fluid">
                    <div id="bumper"></div>
                    <h1 class="Club_name">ACM Board</h1>
                    <hr class="title-divider">

                    <cms:pages masterpage="cms_test/board.php" folder="acm">
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
                    <hr class="title-divider">

                    <cms:pages masterpage="cms_test/board.php" folder="acmw">
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

                    <cms:pages masterpage="cms_test/board.php" folder="advisor">
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
                
            </div>
        </div>
        
        <div class="paper paper2">
            <div id = "wrapper2">
            </div>
        </div>
        
        <div class="paper paper3">
            <div id = "wrapper3">
            </div>
        </div>
        
        
        <script type="text/javascript" src="/js/changenavbar.js"></script>
        <script type="text/javascript">
        var ua = navigator.userAgent.toLowerCase(); 
        if (ua.indexOf('safari') != -1) { 
            if (ua.indexOf('chrome') > -1) {
                $('.paper-clip-icon ').css({'margin-left': '0'});
            } else {
                $('.paper-clip-icon ').css({'margin': 'auto'});
                $('.paper-clip-icon ').css({'position': 'absolute'});
                $('.paper-clip-icon ').css({'top': '0', 'left': '0', 'bottom': 0, 'right': '0'});
            }
        }
        </script>
    </body>
</html>

<?php COUCH::invoke();
