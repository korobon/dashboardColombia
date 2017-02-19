<?php
session_start();
if($_SESSION["autentificado"] != "SI"){
    header("Location: index.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="Yaneth">
    <title>Dashboard | Home</title>

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>

  <!-- core CSS -->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head><!--/head-->

<body class="body-container">

    <div class="app-container">
        <header class="header-container">
            <nav class="navbar navbar-default navbar-fixed-top navbar-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-expand">
                            <i class="fa fa-bars icon"></i>
                        </button>
                        <ol class="breadcrumb navbar-breadcrumb">
                            <li class="">Dashboard</li>
                        </ol>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown notification">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-comments-o"></i></a>
                            <ul class="dropdown-menu">
                                <li class="title">
                                    Notification <span class="badge pull-right">0</span>
                                </li>
                                <li class="message">
                                    No new notification
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION["userName"]?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <img src="images/user.png">
                                </li>
                                <li>
                                    <div class="profile-info">
                                        <h4 class="username"><?php echo $_SESSION["userName"]?></h4>
                                        <p><?php echo $_SESSION["userEmail"]?></p>
                                        <div class="btn-group margin-bottom-2x" role="group">
                                            <a id="logout" class="btn btn-default default"><i class="fa fa-sign-out"></i> Logout</a>
                                        </div>
                                        <p></p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav><!--/nav menuSuperior-->
        </header><!--/header-->


        <div class="row content-container">
            <!--side-menu-->
            <div class="side-menu sidebar-inverse">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand">
                                <div class="icon fa fa-paper-plane"></div>
                                <div class="title">Dashboard</div>
                            </a>
                            <button type="button" class="navbar-expand-toggle pull-right">
                                <i class="fa fa-times icon"></i>
                            </button>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="">
                                <a href="panel.php">
                                    <span class="icon fa fa-tachometer"></span><span class="title">Home</span>
                                </a>
                            </li>
                            <?php if($_SESSION["userRol"] == "ADMIN"):?>
                            <li>
                                <a href="users/newUsers.php">
                                    <span class="icon fa fa-archive"></span><span class="title">Register Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="users/allUsers.php">
                                    <span class="icon fa fa-thumbs-o-up"></span><span class="title">Users</span>
                                </a>
                            </li>
                            <?php endif;?>
                        </ul>
                    </div>
                </nav><!--/nav side-menu menuLateral-->
            </div><!--/div side-menu menuLateral-->

            <!-- Main Content -->

            <section class="services">
               <div class="container">
                    <div class="center">
                        <h2><?php echo $_SESSION["userRol"]?></h2>
                        <p class="lead"><?php echo "Hola ".$_SESSION["userRol"].(($_SESSION["userRol"] == "ADMIN")?", ":", no ")?>tienes permiso para gestionar los usuarios. <br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
                    </div>

                    <div class="row">

                        <div class="col-sm-6 col-md-4">
                            <a href="#" class="services-btn">
                                <div class="services-wrap">
                                    <div class="pull-left">
                                        <img class="img-responsive" src="images/services/services1.png">
                                    </div>
                                    <div>
                                        <h3>Configuration</h3>
                                        <p>Lorem ipsum dolor sit ame consectetur adipisicing elit</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <a href="#" class="services-btn">
                                <div class="services-wrap">
                                    <div class="pull-left">
                                        <img class="img-responsive" src="images/services/services2.png">
                                    </div>
                                    <div>
                                        <h3>Configuration</h3>
                                        <p>Lorem ipsum dolor sit ame consectetur adipisicing elit</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <a href="#" class="services-btn">
                                <div class="services-wrap">
                                    <div class="pull-left">
                                        <img class="img-responsive" src="images/services/services3.png">
                                    </div>
                                    <div>
                                        <h3>Configuration</h3>
                                        <p>Lorem ipsum dolor sit ame consectetur adipisicing elit</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                                              
                    </div><!--/.row-->
                </div><!--/.container-->
            </section><!--/.services-->

            <section class="content">
               <div class="container">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="skill">
                                <h2>Our Skills</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                                <div class="progress-wrap">
                                    <h3>HTML</h3>
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                                       <span class="bar-width">95%</span>
                                      </div>
                                    </div>
                                </div>

                                <div class="progress-wrap">
                                    <h3>CSS</h3>
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="bar-width">80%</span>
                                      </div>
                                    </div>
                                </div>
                            </div><!--/.skill-->

                        </div><!--/.col-sm-6-->

                        <div class="col-sm-6">
                            <div class="skill">
                                <h2>Last Notice</h2>

                                    <div class="media">
                                      <div class="media-left media-middle">
                                        <a href="#">
                                          <img class="media-object" src="images/ads/ad1.png">
                                        </a>
                                      </div>
                                      <div class="media-body">
                                        <h4 class="media-heading">Middle aligned media</h4>
                                        <div>
                                            <span class="username">Tui2Tone</span> <span class="notice-datetime">1 day ago</span>
                                        </div>
                                        <div class="notice-message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.</div>
                                      </div>
                                    </div>

                                    <div class="media">
                                      <div class="media-left media-middle">
                                        <a href="#">
                                          <img class="media-object" src="images/ads/ad2.png">
                                        </a>
                                      </div>
                                      <div class="media-body">
                                        <h4 class="media-heading">Middle aligned media</h4>
                                        <div>
                                            <span class="username">Tui2Tone</span> <span class="notice-datetime">1 day ago</span>
                                        </div>
                                        <div class="notice-message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.</div>
                                      </div>
                                    </div>

                                    <div class="media">
                                      <div class="media-left media-middle">
                                        <a href="#">
                                          <img class="media-object" src="images/ads/ad3.png">
                                        </a>
                                      </div>
                                      <div class="media-body">
                                        <h4 class="media-heading">Middle aligned media</h4>
                                        <div>
                                            <span class="username">Tui2Tone</span> <span class="notice-datetime">1 day ago</span>
                                        </div>
                                        <div class="notice-message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.</div>
                                      </div>
                                    </div>

                                    <div class="media">
                                      <div class="media-left media-middle">
                                        <a href="#">
                                          <img class="media-object" src="images/ads/ad4.png">
                                        </a>
                                      </div>
                                      <div class="media-body">
                                        <h4 class="media-heading">Middle aligned media</h4>
                                        <div>
                                            <span class="username">Tui2Tone</span> <span class="notice-datetime">1 day ago</span>
                                        </div>
                                        <div class="notice-message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.</div>
                                      </div>
                                    </div>

                                <div class="skill-footer">
                                    <a href="#" class="notice-load-more text-center btn btn-default default">
                                        <i class="fa fa-refresh"></i> load more..
                                    </a>
                                </div>
                            </div>

                        </div><!--/.col-sm-6-->

                    </div><!--/.row-->
                </div><!--/.container-->
            </section><!--/.content-->


        </div><!--/content-container-->

        <footer>
            
        </footer><!--/footer-->
    </div><!--/app-container-->

    <!-- core JS -->
    <script src="js/jquery.min.js"></script>  
    <script src="js/bootstrap.min.js"></script>
    <script src="js/base.js"></script>
    <script type="text/javascript">        
        $(document).ready(function(){
            ///////////////////////////////////////////
            //Manejador del login
            $("#logout").click(function() { 
                $.ajax({
                  url: "logout.php"
                }).done(function(result) {
                    if(result){
                        window.location.href = "index.php";
                    } else {
                        alert("faild logout");                        
                    }  
                });
            });
            ///////////////////////////////////////////

        });
    </script>

</body><!--/body-->

</html><!--/html-->