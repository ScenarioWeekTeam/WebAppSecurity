<?php
session_start();

if ($_SESSION['username']) {
    header("Location: /index.html?error=alreadyloggedin");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UCL CS feedback- home page</title>



    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/alerts.min.css" rel="stylesheet">

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

<style>
form {
    border: 3px solid #f1f1f1;
    margin-left: 25%;
margin-right:25%;
    width: 50%;    
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<body>
<img src="img/ucllogo.png" width=100%>
<h2 align="center">Admin Login for UCL CS Feedback</h2>

<?php
    
if ($_GET['error']) {
    echo '<div class="alert alert-danger" role="alert">Incorrect username or password. Please try again.</div>';
}
    
?>
    
<form action="actions/login.php" method="post" >
    
      <div class="imgcontainer">
    <img src="img/img_avatar2.png" alt="Avatar" class="avatar">
    </div>
  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
      <br>
                              <?php
                        
                        $token = random_bytes(64);
                        
                        $_SESSION['CSRF-Login'] = $token;
                            
                        echo "<input type='hidden' name='CSRFToken' value='" . $token . "'>";
                        
                        ?>
      <button type="submit">Login</button>
      <br>
  </div>
    
       

  <div class="container" style="background-color:#f1f1f1">
       <button type="button" class="cancelbtn" align="center"><a href="index.html" style="text-decoration:none;color: inherit">Cancel</a></button>
  </div>
</form>

</body>
</html>

