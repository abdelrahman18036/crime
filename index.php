<?php
  session_start();
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: contact.php");
    exit;
}
 
require_once('include/config.php');
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            header("location: contact.php");
                        } else{
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($link);}
?>
<style>
    body {
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-weight: 400;
        overflow-x: hidden;
        overflow-y: auto;
        background: #00542a;
    }

    form {
        border: 3px solid #f1f1f1;
    }

    input[type=password],
    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }

    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px;
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
    h1,
    h4 {
        text-align: center;
    }
    a {
        color #777;
        text-decoration: none;
    }
    .padding-top {
        padding-top: 20px;
    }
    .login-page {
        width: 350px;
        margin: auto;
        position: relative;
        top: 70px;
        padding: 0 60px;
        background-color: #f9f9f9;
        border: 1px solid #f2f2f2;
    }
    .login-page .text-center {
        margin-bottom: 10px;
    }
    .box {
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #f2f2f2;
    }
    .page {
        position: relative;
        display: block;
        top: 50px;
        left: 0;
        padding: 35px 15px 20px 270px;
    }

    .page-lgn {
        position: relative;
        display: block;
        top: 50px;
        left: 0;
        padding: 35px 15px 20px 270px;
    }

    .bg-green {
        background-color: #A3C86D;
    }
    .bg-blue {
        background-color: #7ACBEE;
    }
    .bg-yellow {
        background-color: #FDD761;
    }
    .bg-red {
        background-color: #FF7857;
    }

    .bg-secondary1 {
        background-color: #b17897;
    }

    .bg-blue2 {
        background-color: #7a83ee;
    }
    .panel-default > .panel-heading {
        background-color: #f5f5f5;
        border-bottom: 2px solid #3498DB;
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 15px;
    }
    .panel-box {
        width: 100%;
        height: 100%;
        text-align: center;
        border: none;
    }
    .panel-value {
        width: 60%;
    }
    .panel-icon {
        padding: 30px;
        width: 40%;
        border-radius: 0;
    }
    .panel-icon {
        -webkit-border-radius: 3px 0 0 3px;
        -moz-border-radius: 3px 0 0 3px;
        border-radius: 3px 0 0 3px;
    }
    .panel-value {
        -webkit-border-radius: 0 3px 3px 0;
        -moz-border-radius: 0 3px 3px 0;
        border-radius: 0 3px 3px 0;
    }
    .panel-value h2 {
        margin-top: 30px;
    }
    .panel-icon i {
        line-height: 65px;
        font-size: 40px;
        color: #fff;
    }
    #header {
        position: fixed;
        z-index: 99;
        top: 0;
        left: 0;
        background-color: #fff;
        width: 100%;
        height: 65px;
        line-height: 65px;
        -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        box-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }
    header > .logo {
        color: #fff;
        text-align: center;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: inline-block;
        width: 250px;
        background-color: #db3434;
    }
    .header-date {
        color: #9b9b9b;
        margin-left: 20px;
    }
    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
        padding: 10px;
    }
    .info-menu {
        height: 60px;
        margin: 0;
        line-height: 60px;
        padding: 0 15px;
    }
    .info-menu li.profile {
        position: relative;
    }
    .profile a.toggle {
        text-decoration: none;
        text-align: center;
        font-size: 14px;
        color: rgba(150, 150, 158, 1.0);
        position: relative;
        padding: 10px 10px 10px 0;
        margin: 0;
        background: #f9f9f9;
        border-radius: 30px;
    }
    .info-menu li.profile a img {
        width: 30px;
        height: 30px;
    }
    .dropdown-menu {
        margin-top: 4px;
        border-color: #fefefe;
        border-radius: 0;
        box-shadow: 0 0 5px rgba(86, 96, 117, 0.15);
        -moz-box-shadow: 0 0 5px rgba(86, 96, 117, 0.15);
        -webkit-box-shadow: 0 0 5px rgba(86, 96, 117, 0.15);
    }
    .dropdown-menu li {
        margin: 0;
        padding: 0;
        display: block;
        line-height: 35px;
    }
    .dropdown-menu li a {
        text-decoration: none;
        display: block;
        font-size: 14px;
        position: relative;
        line-height: 30px;
        width: 100%;
        border-bottom: 1px solid #f4faf9;
    }
    .dropdown-menu li a i {
        margin-right: 5px;
    }
    .dropdown-menu li.last a {
        border-bottom: 0;
    }
    .datepicker {
        text-align: center;
    }
    .sidebar {
        position: fixed;
        z-index: 10;
        left: 0;
        top: 0;
        padding: 65px 0 0;
        height: 100%;
        width: 250px;
        background: #272727;
        border-right: 1px solid #ddd;
        text-align: center;
    }
    .sidebar ul li:hover,
    .submenu ul li:hover {
        -webkit-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
    }
    .sidebar ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .sidebar ul li {
        display: block;
    }
    .sidebar ul li:hover,
    ul.submenu {
        background-color: #35404d;
    }
    .sidebar ul li a:hover {
        color: white;
    }
    .sidebar ul li a,
    ul.submenu li a {
        color: #aeb2b7;
        display: block;
        overflow: hidden;
        position: relative;
        white-space: nowrap;
        text-decoration: none;
        text-align: left;
    }
    .sidebar ul li a span,
    .sidebar ul li i {
        font-size: 14px;
        font-weight: 300;
        letter-spacing: 1.5px;
        text-shadow: 0 1px rgba(0,0,0, 1);
    }
    .sidebar ul li a i {
        color: #aeb2b7;
        padding: 15px 22px;
        text-align: center;
    }
    ul.submenu {
        display: none;
        position: relative;
    }
    ul.submenu li a:hover {
        background-color: #35404d;
    }
    ul.submenu li a {
        padding-left: 45px;
    }
    ul.submenu li:before {
        content: "";
        display: block;
        position: absolute;
        z-index: 1;
        left: 25px;
        top: 0;
        bottom: 0;
        border: 1px dotted #d7d7d7;
        border-width: 0 0 0 1px;
    }
    ul.submenu li a:before {
        content: "";
        display: inline-block;
        position: absolute;
        width: 7px;
        left: 25px;
        top: 18px;
        border-top: 1px dotted #d7d7d7;
    }

    .sale_report_header {
        padding: 15px 0;
    }
    table td h6 {
        margin: 0 0 0.2em;
    }
    table tfoot tr td:first-child {
        border: 0;
    }
    table tfoot tr td:last-child {
        border-top: 1px solid #ccc;
    }
    table td h6,
    table tfoot tr td:last-child {
        color: #000;
        _font-size: 1.2em;
        font-weight: normal;
    }
    .form-control {
        color: #646464;
        border: 1px solid #e6e6e6;
        border-radius: 3px;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        -moz-transition: all 0.15s ease-out;
        -webkit-transition: all 0.15s ease-out;
        transition: all 0.15s ease-out;
    }
    .form-control:focus {
        background: #f8f8f8;
        border-color: #3498DB;
        outline: 0;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
    }
    .btn {
        border-radius: 3px;
        -webkit-transition: all 300ms ease-in-out;
        -moz-transition: all 300ms ease-in-out;
        transition: all 300ms ease-in-out;
    }
    .btn-primary {
        color: #fff;
        background-color: #51aded;
        border-color: #3d8fd8;
    }
    .btn-primary.active,
    .btn-primary.focus,
    .btn-primary:active,
    .btn-primary:focus,
    .btn-primary:hover {
        color: #fff;
        background-color: #3175b8;
        border-color: #3d8fd8;
    }
    .btn-success {
        background-color: #2ecc71;
    }
    .btn-success.active,
    .btn-success.focus,
    .btn-success:active,
    .btn-success:focus,
    .btn-success:hover {
        background-color: #27ae60;
    }
    .btn-warning {
        background-color: #e7c13e;
        border-color: #dfba3c;
    }
    .btn-warning.active,
    .btn-warning.focus,
    .btn-warning:active,
    .btn-warning:focus,
    .btn-warning:hover {
        background-color: #d0ac2c;
        border-color: #dfba3c;
    }
    .btn-danger {
        background-color: #78bc27;
    }
    .btn-danger.active,
    .btn-danger.focus,
    .btn-danger:active,
    .btn-danger:focus,
    .btn-danger:hover {
        background-color: #bb282a;
    }
    .input-group-addon {
        background-color: #fcfcfc;
        border: 1px solid #dbdbdb;
        border-radius: 0;
    }
    input[type=file] {
        text-indent: -99999px;
    }
    td img.img-thumbnail {
        width: 125px;
        height: 125px;
        vertical-align: top;
    }
    .img-avatar {
        width: 50px;
        height: 50px;
    }
    .jumbotron {
        margin-bottom: 0;
    }
    .list-group-item:first-child,
    .list-group-item:last-child {
        border-radius: 0;
    }
    .profile .jumbotron {
        border-radius: 3px 3px 0 0;
    }
    .profile .jumbotron h3 {
        color: white;
    }
    img.img-size-2 {
        width: 125px;
        height: 125px;
    }
    .logo-left {
        display: inline;
        position: relative;
        max-height: 100px;
        width: auto;

        margin: 20px 0 0 20px;
        height: auto;
    }

    .logo-right {
        display: inline;
        width: auto;
        position: relative;
        max-height: 100px;
        margin: 20px 20px 0 0;
        float: right;
        height: auto;

    }
    .logo-left-bot {
        width: auto;
        position: relative;
        max-height: 100px;
        margin: 30px 0 0 20px;
        height: auto;
    }

    .logo-right-bot {
        position: relative;
        max-height: 100px;
        margin: 30px 20px 0 0;
        float: right;
        height: auto;

    }
</style>

<div class="login-page">
    <div class="text-center">
        
        <h1>Login Panel</h1>
        <h4>Crime Investigation MANAGEMENT SYSTEM</h4>
    </div>
    <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="clearfix">
        <div class="form-group container">
            <label class="control-label">Username</label>
            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group container">
            <label class="control-label">Password</label>
            <input  type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger" style="border-radius:0%" value="Login">Login</button>
        </div>
    </form>
</div>