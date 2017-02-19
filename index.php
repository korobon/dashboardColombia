<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="Yaneth">
    <title>Dashboard</title>

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

        <div class="row content-container">

            <!-- Main Content -->

            <section class="login">
               <div class="container">
                    <div class="center">
                        <h2><br>Login</h2>
                        <p class="lead">Lorem ipsum dolor sit ametveniam <br> ame consectetur adipisicing elit.</p>
                    </div>

                    <div class="row">

                        <div class="col-sm-6 col-md-4">
                            <div class="login-wrap">
                                <div class="center login-img">
                                    <img class="img-responsive" src="images/avatar.png">
                                </div>
                                <div class="login-form center">
                                    <form id="login-form" role="form">
                                      <div class="form-group">
                                        <div class="input-group">
                                          <span class="input-group-addon">@</span>
                                          <input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="sizing-addon1">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="input-group">
                                          <span class="input-group-addon">#</span>
                                          <input type="password" name="pass" class="form-control" placeholder="Password" aria-describedby="sizing-addon1">
                                        </div>
                                      </div>
                                      <a id="submit" class="btn btn-default default">Login</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                                              
                    </div><!--/.row-->
                </div><!--/.container-->
            </section><!--/.services-->


        </div><!--/content-container-->

        <footer>
            
        </footer><!--/footer-->
    </div><!--/app-container-->

    <!-- core JS -->
    <script src="js/jquery.min.js"></script>  
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">        
        $(document).ready(function(){
            ///////////////////////////////////////////
            //Manejador del login
            $("#submit").click(function() { 
                var form = $("form#login-form");
                $.post("validate.php",form.serialize())
                .done(function(result) {
                    if(result){
                        window.location.href = "panel.php";
                    } else {
                        alert("faild login");                        
                    }      
                })
                .fail(function() {
                    console.log("server error");
                });
            });
            ///////////////////////////////////////////

        });
    </script>

</body><!--/body-->

</html><!--/html-->