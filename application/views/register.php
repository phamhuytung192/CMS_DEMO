<?php
include "config.php";

if($_SERVER['REQUEST_METHOD']=='POST') {
    //prevent sql injection
    $user = mysqli_escape_string($db,$_POST['user']);
    //or
    $pass = strip_tags($_POST['pass']);
    $role = strip_tags($_POST['role']);

    $query = "INSERT INTO user(user,password,role) VALUES ('$user','$pass','$role')";
    $result = mysqli_query($db,$query);

    if(mysqli_affected_rows($db)==1) {
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
        $message = "Cannot add";

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
<form class="form-horizontal" method="post">
    <fieldset>
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <a class="navbar-brand hidden-xs" href="#">Register</a>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navHeaderCollapse">
                        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="navHeaderCollapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbspHome</a></li>
                        <li class="active"><a href="register.php"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbspRegister</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="form-group">
            <label class="col-md-4 control-label" for="txtID">Username</label>

            <div class="col-md-4">
                <input id="user" name="user" type="text" placeholder="Username" class="form-control input-md"
                       required="">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="txtPassword">Password: </label>

            <div class="col-md-4">
                <input id="pass" name="pass" type="password" placeholder="Password"
                       class="form-control input-md" required="">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="sltRole">Role</label>

            <div class="col-md-4">
                <select id="role" name="role" class="form-control">
                    <option value="Student">Student</option>
                    <option value="Lecturer">Lecturer</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="txtRegister"></label>

            <div class="col-md-4">
                <button id="txtRegister" name="txtRegister" class="btn btn-primary">Register</button>
            </div>
        </div>

    </fieldset>
</form>
</body>
</html>
