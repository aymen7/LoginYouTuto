<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/11/2017
 * Time: 15:38
 */
?>
<!DOCTYPE html>

<html lang="en">
<!-------------------------- the head tag------------------------------------------>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hospital LogIn</title>
        <!-- Bootstrap -->
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- normalize css-->
    <link href="css/normalize.css" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- my style css-->
    <link rel="stylesheet" href="css/index.css">
    <!-- font links -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:700" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<!----------------------------- the body tag--------------------------------------->
<?php
//the redirection script
session_start();
if(isset($_SESSION['user_id']))
header("location: views/profile.php");
?>

<?php
//the form handling's script
if(isset($_POST['submit']))
{
    if(!empty($_POST['username']) && !empty($_POST['password']))
    {
        //include the data base class
        include 'scripts/DataBase.php';
        //make a new dataBase instance
        $dataBase =new DataBase("localhost","login_youtube","root","");
        //verify the data
        $userName=$dataBase->dataVerification($_POST['username']);
        $password=$dataBase->dataVerification($_POST['password']);
         //connect to database
         $conn=$dataBase->connect();
         //prepare the statement
         $query=$conn->prepare('select * from users WHERE user_name=?');
         //execute
         $query->execute(array($userName));
         if(!$query->rowCount()==0){
             //fetch the user data
             $result=$query->fetch();
             //getting the hash pass from the data base
             $hash_pass=$result['pass_word'];
             if(password_verify($password,$hash_pass)){
                 $_SESSION['user_id']=$result['id'];
                 $_SESSION['name']=$result['name'];
                 header("location: views/profile.php");

             }//the input pass equal the hash pass
             else{
                 $error_msg='<label id="login-error-msg">wrong password/username combination</label>';
             }//the input pass doesn't match the hash
         }//there is a record for this user
         else{
             $error_msg='<label id="login-error-msg">invalid username please try again !</label>';

         }//there is no record for this user

    }// if not empty

}//if form submitted

?>
<body>

<!-- login form wrapper it's wrap all the login div -->
<div class="container shadow" id="login-form-wrapper">
    <!-- login frame-->
    <div id="login-frame">
        <!-- frame title-->
        <h1>Hospital Me</h1>
        <!-- login form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
              method="post" class="form-horizontal" id="login-form">
            <div class="form-group">
                <input type="text" placeholder="username" class="form-control" name="username" required>
                <span id="user-span" class="icon-span"><i class="fa fa-user fa-2x" aria-hidden="true"></i></span>
            </div>
            <div class="form-group">
                <input type="password" placeholder="password" class="form-control" name="password" required>
                <span id="pass-span" class="icon-span"><i class="fa fa-lock fa-2x" aria-hidden="true"></i></span>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="submit">Log In</button>
            <?php
            //displaying the error msg
            if (isset($error_msg)){
                echo $error_msg;
            }
            ?>
        </form>
    </div><!-- end login-frame ---------------------->

</div>
<script src="js_files/jquery-3.1.1.js"></script>
<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
</body><!-- end of the body tag -------------->
</html><!-- end of the document-->



