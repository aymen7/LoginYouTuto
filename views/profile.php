<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/11/2017
 * Time: 15:56
 */
session_start();
//redirect to the login page if not a valid user
if(!isset($_SESSION['user_id'])){
    header("location: ../index.php");
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hospital LogIn</title>
    <!-- Bootstrap -->
    <link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- normalize css-->
    <link href="../css/normalize.css" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- my style css-->
    <link rel="stylesheet" href="../css/profile.css">
    <!-- font links -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:700" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container" id="profile-wrapper">
    <div class="row" id="dec-row">
        <a href='deconn.php' class="btn btn-danger">Logout</a>
    </div>
    <div class="row" id="table-wrapper">
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th>user id is: <?php echo $_SESSION['user_id']?></th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>the name of the user is : <?php echo $_SESSION['name']?></td>
            </tr>
            </tbody>
        </table>

    </div>
</div>

<script src="../js_files/jquery-3.1.1.js"></script>
<script type="text/javascript" src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</body>
</html>

