<!DOCTYPE html>
<html>
    <?php
    require_once("Scripts/connect.php");
    $successfulLoged = true;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $usermail = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        if(connected()){
            $sql = "SELECT * FROM Users WHERE (userEmail = '{$usermail}' OR username = '{$usermail}') AND password ='{$password}'";
            $result = mysqli_query($conn,$sql);
            if($result) {
                $rowCount = $result->num_rows;
                if($rowCount == 1){
                    $resultRow =  mysqli_fetch_array($result);
                    $username = $resultRow['username'];
                    setcookie("uname", $username, time()-60, "/","", 0); //Destroy cookied

                    if($remember == "true") setcookie("uname",$username , time()+604800, "/","", 0); //One week
                    else setcookie("uname", $username, time()+86400, "/","", 0);//One day

                    mysqli_close($conn);
                    $server = $_SERVER['SERVER_NAME'];
                    header('Location: http://'.$server.'/GeekStars/');

                }else {
                    $successfulLoged = false;
                }
            }else{
                echo "<div class='alert alert-error alert-block'>
                      <a class='close' data-dismiss='alert' href='#'>&times;</a>
                      <h4 class='alert-heading'>Connection Error!</h4>
                     Couldn't access the database! Try Again
                      </div>
                    ";

            }
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
  <head>
    <title>Login | Geekstars</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <style>
         .error {color: red;}
    </style>
  </head>
  <body id="login">
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!$successfulLoged){
            echo "<div class='alert alert-error alert-block'>
                  <a class='close' data-dismiss='alert' href='#'>&times;</a>
                  <h4 class='alert-heading'>Not Valid Credentials!</h4>
                  Wrong Password/Email Combination
                  </div>
                ";
        }
    }
    ?>
    <div class="container">
        <form id = "logForm" class ="form-signin" method ="post" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate="novalidate">
            <h2 class="form-signin-heading">Please sign in</h2>
            <div class="control-group">
                <div class="controls">
                    <input type="email" class="input-block-level"  placeholder="Email/Username" name ="email" id="email">
                    <span class="error"></span>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="password" class="input-block-level" placeholder="Password" name ="password" id="password">
                    <span class="error"></span>
                </div>
            </div>

            <label class="checkbox">
                <input type="checkbox" value="true" name ="remember"> Remember me
            </label>
            <button class="btn btn-large btn-primary" type="submit" >Sign in</button>
        </form>

    </div>  <!-- /container -->
    <hr>
    <footer style="text-align: center">
        <p>&copy; Geekulcha TUT Crew 2014</p>
    </footer>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script>
        // When the browser is ready...
        $(function() {
            // Setup form validation on the #register-form element
            $("#logForm").validate({
                // Specify the validation rules
                rules: {email: {required: true,email: true },
                password: {required: true,  minlength: 2 }},
                // Specify the validation error messages
                messages: {password: {required: "Please provide a password", minlength: "Your password must be at least 2 characters long" },
                           email: "Please enter a valid email address"},
                submitHandler: function(form){form.submit();} });
        });
    </script>
    <?php
        $result = mysqli_query($conn,"Select * from readings");
        $strData = "";
        $rowCount = $result->num_rows;
        $x =0;
        while($resultsArray = mysqli_fetch_array($result)){
            $strData .= "{period: '".$resultsArray['time_workstation']."', temperature: ".$resultsArray['temp']."}";
            if($x != $rowCount-1){
                $strData .= ",";
            }
            $x++;
        }
        echo $strData;
    ?>
</body>
</html>