<?php
session_start();
        $username = "root";
        $servername = "localhost";
        $password = "krishna";
        $dbname = "play_store";
        $conn = mysqli_connect($servername , $username , $password , $dbname);
        if(!$conn)
        {
          die("oops connection failed :".mysqli_connect_error());
        }
       $aname= $_POST["appname"];

?>
<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>App Monster</title>
    <link rel="stylesheet" href="css/details.css">
    <link href="css/font-awesome.css" rel="stylesheet"> 
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <?php 
        $v0 = "SELECT * FROM App_details where aname='$aname'";
        $v1 = mysqli_query($conn,$v0);
        $row=mysqli_fetch_assoc($v1);
        $aid=$row["aid"];
        $cost=$row["acost"];
        $rating=$row["rating"];
        $ratingc=$row["rating_c"];
        $gid=$row["gid"];
        $did=$row["did"];
        $v0 = "SELECT * FROM genre where gid='$gid'";
        $v1 = mysqli_query($conn,$v0);
        $row1=mysqli_fetch_assoc($v1);
        $gname=$row1["gname"];
        $v1 = "SELECT * FROM Developer where did='$did'";
        $v2 = mysqli_query($conn,$v1);
        $row2=mysqli_fetch_assoc($v2);
        $dname=$row2["dname"];
    ?><a href="index.php" style="color: #1b6377;font-size: 24px;"><i class="fa fa-home w3-margin-right" style="/*font-size: 40px;*/"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php  
    if (isset($_SESSION['username'])){?>
       <label><a href="index.php?logout='1'" style="color: #379f85;font-size: 24px;"><i class="fa fa-sign-out w3-margin-right"></i>Logout</a>  
        <li><a href="wishlist.php" ><i class="fa fa-heart w3-margin-right"></i></a> </li><?php
      }
      else
      {
        ?>
        <a href="index.php?login='1'" style="color: #379f85;font-size: 24px;"><i class="fa fa-sign-in w3-margin-right"></i>Login</a><?php
      }
      ?>
      <?php  
        if (isset($_SESSION['username'])) 
        {
            $uid=$_SESSION["userid"];
            $r="SELECT * from wishlist where aid='$aid' and userid='$uid' ";
            $v3=mysqli_query($conn,$r);
            if(mysqli_num_rows($v3)>0)
            {
                ?><h3 style="color:white">You already have this App</h3>
                <?php
            }
            else
            {
                ?>
                <form method="post" action="wishlist.php">
                <button type="submit" style="height: 50px;color: black;margin: 35px;" name="install" value="<?php echo $aid; ?>" >INSTALL</button>
                </form>
                <?php
            }
}
else
{
   
    ?>
    <h2 style="color:white">Please Login to Install the app</h2><?php
}
?>
        <div class="portfoliocard">
        <div class="coverphoto"></div>
        <!-- <div class="profile_picture"></div> -->
        <div class="left_col">
            <div class="followers">
                <div class="follow_count"><?php echo $rating?></div>
                Stars
            </div>
            <div class="following">
                <div class="follow_count"><?php echo $ratingc?></div>
                Rates
            </div>
        </div>
        <div class="right_col">
            <h2 class="name"><?php echo $aname;?></h2>
            <h3 class="location">$<?php echo $cost; ?>, <?php echo $gname; ?></h3>
            <ul class="contact_information">
                <li class="work"><?php echo $dname;?></li>
                <!-- <li class="website"><a class="nostyle" href="#">www.apple.com</a></li>
                <li class="mail">john.doe@apple.com</li>
                <li class="phone">1-(732)-757-2923</li>
                <li class="resume"><a href="#" class="nostyle">download resume</a></li> -->
            </ul>
        </div>
        </div>

    </body>
</html>
  




</body>

</html>