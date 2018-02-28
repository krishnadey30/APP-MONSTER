<!DOCTYPE html>
<?php
session_start();
    $cookie_name = $_POST["name"];
    $cookie_password =$_POST["password"];


    if( strlen($cookie_name)>1 && strlen($cookie_password)>5)
    {
    	setcookie($cookie_name,$cookie_password,time() + (86400 * 30), "/");
    	echo("Cookie is set!");
    	echo("Cookie_name :".$_COOKIE[$cookie_name]);
    }
?>
<?php
        $username = "root";
        $servername = "localhost";
        $password = "krishna";
        $dbname = "play_store";
        $conn = mysqli_connect($servername , $username , $password , $dbname);
        if(!$conn)
        {
        	die("oops connection failed :".mysqli_connect_error());
        }


        $nameErr = $emailErr = $passwordErr = "";
        $name = $email = $gender = $password= "";
        $choose = $_POST["name"];
        $choose1 = $_POST["email"];
        $choose2 = $_POST["password"];


        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
        	if (empty($_POST["name"])) 
        	{
        		$nameErr = "Name is required";
        	} 
        	else 
        	{
        		$name = test_input($_POST["name"]);
        		// check if name only contains letters and whitespace
        		if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
        		{
        			$nameErr = "Only letters and white space allowed";
        		}
        	}

        	if (empty($_POST["password"])) 
        	{
        		$passwordErr = "Password is required";
        	} 
        	else 
        	{
        		$password = test_input($_POST["password"]);
        		// check if name only contains letters and whitespace
        		if (strlen($password)<6) 
        		{
        			$passwordErr = "Length should be greater than 5";
        			$choose2=NULL;
        		}
        	}  

        	if (empty($_POST["email"])) 
        	{
        		$emailErr = "Email is required";
        	} 
        	else 
        	{
        		$email = test_input($_POST["email"]);
        		// check if e-mail address is well-formed
        		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) //special function to validate an email.
        		{
        			$emailErr = "Invalid email format";
        			$choose1=NULL;
        		}
        	}
        }

        // This is function for validation.
        function test_input($data) {
        	$data = trim($data);
        	$data = stripslashes($data);
        	$data = htmlspecialchars($data);
        	return $data;
        }
    ?>
    <?php
        if(strlen($choose)>1 && strlen($choose1)>1 && strlen($choose2)>1)
        {   
        	$choose2=md5($choose2);
            $v1 = "INSERT INTO Users(username,email,password) VALUES ('$choose','$choose1','$choose2')";
            echo $v1;
            if(mysqli_query($conn,$v1))
            {
            	$v1="SELECT * FROM Users WHERE username='$choose'";
            	echo $v1;
            	$f=mysqli_query($conn,$v1);
            	$row=mysqli_fetch_assoc($f);
            	$_SESSION['userid']=$row["userid"];
                $_SESSION['username'] = $row["username"];
			  	$_SESSION['success'] = "You are now logged in";
			  	header('location: index.php');
            }
        }
    ?>
    <?php
	    $name=$_POST["lname"];
	    $password=$_POST["lpassword"];
	    $password=md5($password);
	    $v2 = "SELECT * FROM Users";
	    $p1 = mysqli_query($conn,$v2);
	    if(mysqli_num_rows($p1)>0)
	    {
	    	while($row=mysqli_fetch_assoc($p1))
	    	{
	    		if($row["username"]==$name && $row["password"]==$password)
	    		{
	    			$_SESSION["userid"] = $row["userid"];
	    			$_SESSION['username'] = $name;
				  	$_SESSION['success'] = "You are now logged in";
				  	header('location: index.php');
	    		}
	    	}
	    }
	?>
<?php  if (!isset($_SESSION['username'])) : ?>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>LOGIN </title>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/style1.css">  
</head>

<body>
    <!-- LOGIN MODULE -->
    <div class="login">
        <div class="wrap">
            <!-- SLIDER -->
            <div class="content">          
            <!-- SLIDESHOW -->
                <div id="slideshow">
                    <div class="one">
                        <h2><span>APPS</span></h2>
                        <p>ENJOY different types of apps.</p>
                    </div>
                    <div class="two">
                        <h2><span>INSTALL</span></h2>
                        <p>Install the apps .</p>
                    </div>
                    <div class="three">
                        <h2><span>GENRE</span></h2>
                        <p>Every variety u want.</p>
                    </div>
                </div>           
            </div>
            <!-- LOGIN FORM -->
            <div class="user">

                <div class="form-wrap">
                <!-- TABS -->
                    <div class="tabs">
                        <h3 class="signup-tab"><a class="sign-up  active" href="#signup-tab-content"><span>Sign Up</span></a></h3>
                        <h3 class="login-tab"><a class="log-in" href="#login-tab-content"><span>Login<span></a></h3>
                    </div>
                    <!-- TABS CONTENT -->
                    <!-- TABS CONTENT SIGNUP -->
                    <div class="tabs-content">
                        <div id="signup-tab-content"  class="active">
                            <form class="signup-form" action="login.php" method="post">
                                <span class="error"><input type="email" class="input"  placeholder="Email" name="email"><?php echo $emailErr;?></span>

                                <span class="error"><input type="text" class="input"  placeholder="Username" name="name"><?php echo $nameErr;?></span>

                                <span class="error"><input type="password" class="input"  placeholder="Password" name="password"><?php echo $passwordErr;?></span>
                                <br><br><br>
                                <center><input type="submit"  value="Sign Up"></center>
                            </form>
                            
                        </div>
                    <!-- TABS CONTENT LOGIN -->
                        <div id="login-tab-content">
                            <form class="login-form" action="" method="post">
                                <input type="text" class="input" id="user_login" autocomplete="off" placeholder="Username" name="lname">
                                <input type="password" class="input" id="user_pass" autocomplete="off" placeholder="Password" name ="lpassword">
                                <input type="checkbox" class="checkbox" checked id="remember_me"><br><br>
                                <!--	<label for="remember_me">Remember me</label><br>-->
                                <center><input type="submit" value="Login"></center>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script  src="js/index1.js"></script>
</body>
</html>
<?php else: ?>
  <?php header('location: index.php');
  ?>
 <?php endif ?>