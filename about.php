
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    
    <!-- 
	//////////////////////////////////////////////////////

    Title  : Personal Website for Kieran Molloy
    Author : Kieran Molloy
    Date   : 29/05/2018
    Page   : About

	//////////////////////////////////////////////////////
	 -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KM &mdash; About</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A portfolio showing the work of myself, Kieran Molloy, in my endeavour to become a full stack developer" />
    <meta name="keywords" content="Kieran, Molloy, Kieran Molloy, Portfolio, Developer" />
    <meta name="author" content="Kieran Molloy" />
    
    
     <!-- Styles and Scripts -->
    <?php include('imports/StylesScripts/root.html'); ?>

</head>

<body>

    <!-- Loader -->
    <div class="wb1-loader"></div>

    <!-- Home + Blog Logo -->
    <?php include('imports/logo.html'); ?>

    <div id="wb1-main" role="main">

        <div class="container">


            <figure class="wb1-img">
                <img src="images/personalWebsite.JPG" class="img-responsive animate-box">
            </figure>

            <div class="row">
                <div class="col-md-8 col-md-push-4 wb1-heading">
                    <h1>A little about me</h1>
                    <p>I am a Mathematics student with a passion for programming, and I am currently in my first year at Manchester Metropolitan University. In the past few years I have worked on multiple independent projects alongside education, such as this website and my self-driving car. My goal is to develop my knowledge in mathematics using my programming skills through combined hardware and software skills. I have advanced knowledge in Java, C, VB.Net, MATLAB and Python, experience designing custom circuits and robotics, as well as this website using JavaScript, jQuery and Bootstrap.</p>
                    <p>I like Atom and Brackets</p>
                </div>
            </div>
            
            <!-- Adding Social Footer -->
                    <?php include('imports/social.html');?>

        </div>

    </div>

</body>
</html>

