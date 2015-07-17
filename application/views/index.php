<?php
include "config.php";
session_start();

if($_SERVER['REQUEST_METHOD']=='POST') {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM user WHERE user = '$user' AND password = '$pass'";
    $result = mysqli_query($db,$query);

    if(mysqli_num_rows($result)==1) {
        session_regenerate_id();
        list ($id, $user, $pass, $role) = mysqli_fetch_array($result,MYSQL_NUM);
        $_SESSION['id'] = $id;
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        $_SESSION['role'] = $role;
        header("Location:welcome.php");
        exit();
    }
    else
        $message = "Username and Password incorrect";

}
?>
<html>
    <head>
        <title>Demo PHP Session 1</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <a class="navbar-brand hidden-xs" href="#">Login</a>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navHeaderCollapse">
                        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="navHeaderCollapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbspHome</a></li>
                        <li><a href="register.php"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbspRegister</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container" style="margin-top:30px">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form method="post" >
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"
                                                                          aria-hidden="true"></span></span>
                                    <input class="form-control" name="user" placeholder="Username">
                                </div>
                                <br/>

                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"
                                                                          aria-hidden="true"></span></span>
                                    <input class="form-control" name="pass" placeholder="Password" type="password">
                                </div>
                                <br>
                                <button class="btn btn-lg btn-success btn-block" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
