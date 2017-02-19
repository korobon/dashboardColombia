<?php
session_start();
if($_SESSION["autentificado"] != "SI"){
    header("Location: ../index.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="Yaneth">
    <title>Dashboard | Users</title>

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>

  <!-- core CSS -->
    <link rel="shortcut icon" href="../images/ico/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

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
                                    <img src="../images/user.png">
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
                                <a href="../panel.php">
                                    <span class="icon fa fa-tachometer"></span><span class="title">Home</span>
                                </a>
                            </li>
                            <?php if($_SESSION["userRol"] == "ADMIN"):?>
                            <li>
                                <a href="newUsers.php">
                                    <span class="icon fa fa-archive"></span><span class="title">Register Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="allUsers.php">
                                    <span class="icon fa fa-thumbs-o-up"></span><span class="title">Users</span>
                                </a>
                            </li>
                            <?php endif;?>
                        </ul>
                    </div>
                </nav><!--/nav side-menu menuLateral-->
            </div><!--/div side-menu menuLateral-->

            <!-- Main Content -->

            <section class="users">
               <div class="container">
                    <div class="center">
                        <h2>Create Users</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
                    </div>

                    <div class="row">

                        <div class="col-sm-5">

                            <div class="users-wrap">
                                <div class="users-form center">
                                    <div style="display: none;" class="alert alert-warning" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <span id="content"></span>
                                    </div>
                                    <form id="users-form" role="form">
                                      <div class="form-group">
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Completo">
                                      </div>
                                      <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico">
                                      </div>
                                      <div class="form-group">
                                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña">
                                      </div>
                                      <div class="checkbox">
                                        <label><input type="checkbox" id="rol" name="rol" value="1">¿Permisos de Administrador?</label>
                                      </div>
                                      <a id="submitNew" class="btn btn-default default">Save</a>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div><!--/.row-->
                </div><!--/.container-->
            </section><!--/.users-->


        </div><!--/content-container-->

        <footer>
            
        </footer><!--/footer-->
    </div><!--/app-container-->

    <!-- core JS -->
    <script src="../js/jquery.min.js"></script>  
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/base.js"></script>
    <script type="text/javascript">        
        $(document).ready(function(){
            ///////////////////////////////////////////
            //Manejador del login
            $("#logout").click(function() { 
                $.ajax({
                  url: "../logout.php"
                }).done(function(result) {
                    if(result){
                        window.location.href = "../index.php";
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