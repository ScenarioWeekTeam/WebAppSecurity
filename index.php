<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UCL CS feedback- home page</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
    <br>
    <br>
    <br>
    <br>
    <img src="img/ucllogo.png" width="100%"/>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">UCL CS Feedback</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="page-scroll">
                        <a href="feedback.php">Feedback</a>
                    </li>
                    <li class="page-scroll">
                        <a href="contactus.html">Contact Us</a>
                    </li>
                    <?php
                    
                    session_start();

                    if ($_SESSION['username']) {
                        echo "<li class='page-scroll'><a href='actions/logout.php'>Logout</a></li>";
                    }

                    ?>
                   
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
            <ul class="nav navbar-nav navbar-right">
                <form>
                    <input type="text" name="search" placeholder="Search.."  >
                </form>
            </ul>
        </div>
            
        <!-- /.container-fluid -->
    </nav>
    <br>
    <br>
    <?php
    
    if ($_GET['success']) {
        if ($_GET['success'] === 'logout') {
            echo '<div class="alert alert-success" role="alert">Logged out</div>';
        }
        else if ($_GET['success'] === 'login') {
            echo '<div class="alert alert-success" role="alert">Logged in</div>';
        }
        else if ($_GET['success'] === 'add') {
            echo '<div class="alert alert-success" role="alert">Thank you for providing feedback</div>';
        }
        else if ($_GET['success'] === 'delete') {
            echo '<div class="alert alert-warning" role="alert">Comment deleted</div>';
        }
    }
    
    if ($_GET['error']) {
        if ($_GET['error'] === 'delete') {
            echo '<div class="alert alert-danger" role="alert">Error deleting comment</div>';
        }
    }
    
    
    ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Start Giving Us Feedback</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <p>This website grants you the ability to provide us with feedback about the individual courses that you are learning. All the feedback is passed on to the department and lecturers. Choose the course and give us feedback.</p>
                </div>
            </div>
        </div>
   

    <!-- Course Grid Section -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Courses</h2>
                    <hr class="star-primary">
                </div> 
            </div>
            <div class="col-lg-8 col-lg-offset-2">
                <ul><li><h3>COMP101P: Principles of Programming </h3></li>
                    <li><h3>COMP102P: Theory 1</h3></li>
                    <li><h3>COMP201P: Network and Concurrency</h3></li>
                    <li><h3>COMP202P: Logic and Database Theory</h3></li>
                    <li> <h3>COMP203P: Software Engineering and Human Computer Interaction</h3></li>
                    <li><h3>ENGS101P: Engineering Challenge 1</h3></li>
                    
                </ul>
            </div>
        </div>
    <br>
    <br>
    <div class="container">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="form-group col-xs-12" align="center">
                <button type="submit" class="btn btn-success btn-lg" ><a href="login.php" style="text-decoration:none;color: inherit">Admin Login</a></button>
            </div>
        </div>
    </div>
    <br>
    <br>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>Gower St <br> Kings Cross<br>London WC1E 6BT</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About the Creators</h3>
                        <p>Pius Jude, Alex Hale and Pierce Grannell</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; UCL Feedback 2017
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
