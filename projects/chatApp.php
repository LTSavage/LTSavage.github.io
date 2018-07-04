<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kieran Molloy &mdash; Chat App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A portfolio showing the work of myself, Kieran Molloy, in my endeavour to become a full stack developer" />
    <meta name="keywords" content="Kieran, Molloy, Kieran Molloy, Portfolio, Developer" />
    <meta name="author" content="Kieran Molloy" />

    <!-- 
	//////////////////////////////////////////////////////

    Title : Personal Website for Kieran Molloy
    Author : Kieran Molloy
    Date : 29/05/2018
    Page: Chat Application - Basic Version CLIENT-SERVER

	//////////////////////////////////////////////////////
	 -->

   <!-- Styles and Scripts -->
    <?php include('../imports/StylesScripts/-1.html'); ?>
    
</head>

<body>

    <!-- Loader -->
    <div class="wb1-loader"></div>

    <!-- Home + Blog Logo -->
    <?php include('../imports/logo.html'); ?>

    <div id="wb1-main" role="main">

        <div class="container">



            <div class="row">
                <div class="col-md-8 col-md-push-4 wb1-heading">
                    <h1>Multi Client-Server Chat Application</h1>
                    <p>This Java Based Chat application is a project I completed as I was learning about the client-server model and java in general. And so with that, this is poorly written as of now. It works, and it i argue it works well. But I plan to go back and sort out the entire program to work with multiple sub-servers acting similar to group chats or for p2p uses. I plan to use a message object or json files that delete after reading. Then after that some security measures beyond the MySql userbase. (Note: This project is just for educational purposes, passwords are kept in plain text and I know this is very bad) </p>

                </div>
            </div>




            <!-- Adding Social Footer -->
            <?php include('../imports/social.html');?>
        </div>
    </div>


</body>

</html>
